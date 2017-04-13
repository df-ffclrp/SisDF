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

    private $to_view = [];
    private $to_parser = [];

    public function __construct() {
        parent::__construct();

        check_login('relator'); //custom

        $this->load->helper('alert_box'); //custom
        $this->load->model('relator_model');

        $this->_set_ui_data();

        //var_dump($this->to_view);
    }

    /*
     * Painel do relator. Lista chamados
     */

    public function index($secao = NULL) {

        $secao_exists = $this->_check_secao($secao);

        // Se a seção não existir, mostra todas
        if (!$secao_exists):
            // mostra todos
            $lista_os = $this->relator_model->get_os_by_user($_SESSION['id_usuario']);

        endif;


        $this->to_view['lista_os'] = $lista_os;

        $this->to_parser['conteudo'] = $this->load->view('chamados', $this->to_view, TRUE);

        $this->parser->parse('templates/principal', $this->to_parser);
    }

    /*
     * Busca um único chamado aberto pelo usuário
     * 
     * link para o botão ver_chamado
     */
    
    
    public function ver_os($id_os) {


    }


    /*
    Mostra ordens de serviços agrupadas por status
    */

    public function os_status($id_status_os = NULL){
        $status_exists = $this->_check_status($id_status_os);

        // Se status não existe, redireciona para a página inicial
        if(!$status_exists){
            $this->redirection($this->router->class);
        }
        
        $to_view['header'] = 'Todos';
        $to_view['header_icon'] = 'fa-tasks';
        
        //Dados para os menus
        $to_view['controller'] = $this->router->class;
        $to_view['secoes'] = $this->get_secoes();

        $lista_os = $this->relator_model->get_os_by_user($_SESSION['id_usuario'], $id_status_os);

        $to_view['lista_os'] = $lista_os;

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
        Checa se um status existe no array de configuração
    */

    private function _check_status($id_status_os){
        $os_status_array = $this->relator_model->get_os_status();

        // var_dump($os_status_array);
        foreach ($os_status_array as $status) {
            if ($status['id_status'] == $id_status_os) {
                return true;
            }
        }

        return false;
    }

    /*

    Monta dados na view para passar ao parser
    */ 

    private function _set_ui_data(){

        //Dados para os menus
        $this->to_parser['secoes'] = $this->get_secoes();
        $this->to_parser['os_status'] = $this->get_os_status();

        $this->to_view['header'] = 'Todos';
        $this->to_view['header_icon'] = 'fa-tasks';
        $this->to_view['secoes'] = $this->get_secoes();
        $this->to_view['controller'] = $this->router->class;
    }


    // ======== Serão substituídos por AJAX ==============

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
