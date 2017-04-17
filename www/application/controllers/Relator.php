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
        Mostra ordens de serviço agrupadas por status
    */

    public function os_status($id_status_os = NULL){

        $status_exists = $this->_check_status($id_status_os);

        // Se status não existe, redireciona para a página inicial
        if(!$status_exists){
            $this->redirection($this->router->class);
        }
        
        $this->_set_page_header($status_exists);

        $lista_os = $this->relator_model->get_os_by_user($_SESSION['id_usuario'], $id_status_os);

        $this->to_view['lista_os'] = $lista_os;

    // Monta dados na view para passar ao parser
        $this->to_parser['conteudo'] = $this->load->view('chamados', $this->to_view, TRUE);

        $this->parser->parse('templates/principal', $this->to_parser);
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
        $os_status_array = $this->get_os_status();



        // var_dump($os_status_array);
        foreach ($os_status_array as $status) {
            if ($status['id_status'] == $id_status_os) {
                return $status;
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
        $this->to_view['header_icon'] = 'tasks';
        $this->to_view['secoes'] = $this->get_secoes();
        $this->to_view['controller'] = $this->router->class;

    }

    /*
        Seta o header da página de chamados conforme o status recebido
    */


    private function _set_page_header($status_info){
        $this->to_view['header'] = $status_info['nome_status'];
        $this->to_view['header_icon'] = $status_info['icone'];
    }


}
