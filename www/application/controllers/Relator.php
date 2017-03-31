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

            var_dump($os_abertas);

            $os_status_array = $this->relator_model->get_os_status();
            
            $os_container = $this->_make_os_container($os_status_array);
            
            var_dump($os_container);


        endif;



        //Dados para os menus
        $to_view['controller'] = $this->router->class;
        $to_view['secoes'] = $this->get_secoes();

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
     */

    private function _group_by_status($result_array) {
        
    }

    /*
     * Cria um container utilizando os alias cadastrados no banco
     * 
     * Serve para agrupar as Ordens de Serviço e mostrá-las na View
     */

    private function _make_os_container($array_status) {

        $os_container = [];
        foreach ($array_status as $status => $propriedade) {

            $os_container[$propriedade['alias']] = [];
        }
        
        return $os_container;
    }

}
