<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Relator extends MY_Controller {

    /**
     * Controller para nível de acesso de
     * Relator.
     * 
     * Painel de controle com os acessos:
     * 
     * - Abre chamados
     * - Lista chamados abertos por ele
     */
    public function __construct() {
        parent::__construct();

        check_login('relator'); //custom

        $this->load->helper('alert_box'); //custom
        $this->load->model('relator_model');
    }

    /*
     * Painel do relator. Lista chamados
     */

    public function index($secao = NULL) {

        $secao_exists = $this->_check_secao($secao);

        // Se a seção não existir, mostra todas
        if (!$secao_exists):
            $to_view['header'] = '';
            $to_view['header_icon'] = 'fa-tasks';

            // mostra todos
            $os_abertas = $this->relator_model->get_chamados($_SESSION['id_usuario']);

            
            // Testing
            
            $os_status_array = $this->relator_model->get_os_status();
            
            var_dump($os_status_array);
            
            $os_container = $this->_make_os_container($os_status_array);
            var_dump($os_container);
            
            echo '<hr>';
            $os_grouped = $this->_group_by_status($os_abertas, $os_container);
            
            echo 'OS Agrupadas: ';
            
            var_dump($os_grouped);
            
            echo "Select original<hr>";
            
            var_dump($os_abertas);


        endif;



        //Dados para os menus
        $to_view['controller'] = $this->router->class;
        $to_view['secoes'] = $this->get_secoes();
        $to_view['status_menu'] = $os_status_array;

        // Monta dados na view para passar ao parser
        $to_parser['conteudo'] = $this->load->view('chamados', $to_view, TRUE);

        $this->parser->parse('templates/principal', $to_parser);
    }

    /*
     * Checa se uma seção solicitada no index existe no array de configuração
     */

    private function _check_secao($id_secao) {
        $secoes = $this->get_secoes();

        foreach ($secoes as $secao) {
            if ($secao['id_secao'] == $id_secao) {
                return true;
            }
        }

        return false;
    }

    /*
     * Agrupa as Ordem de serviço por status
     * colocando no container gerado no outro método
     * 
     */

    private function _group_by_status($result_array,$container) {
        
        foreach ($result_array as $indice => $os){

            array_push($container[$os['status_alias']], $os);
            unset($result_array[$indice]); //Limpando memória
                 
        }        
        
        return $container;
    }

    /*
     * Cria um container utilizando os alias cadastrados no banco
     * 
     * Serve para agrupar as Ordens de Serviço e mostrá-las na View
     * 
     * Formato de saída:
     * 
     * $os_container = array(
     *      status1 => []
     *      status2 => []
     *      status3 => []
     * );
     */

    private function _make_os_container($array_status) {

        $os_container = [];
        foreach ($array_status as $status) {

            $os_container[$status['alias']] = [];
            
        }
        
        return $os_container;
    }

}
