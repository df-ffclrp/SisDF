<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Painel extends MY_Controller {

    /**
     * Controller para nível de acesso de
     * Relator.
     *
     * Painel de controle com os acessos:
     *
     * - Abre chamados
     * - Lista chamados abertos por ele
     */
    private $data = [];

    public function __construct() {
        parent::__construct();

        $this->auth->check_login();//Vê se o usuário está logado

        $this->load->helper('alert_box');
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
            $this->data['lista_os'] = $this->relator_model->get_os_by_user($_SESSION['id_usuario']);

        endif;

        $this->load->view('common/header');
        $this->load->view('common/menus',$this->ui);
        $this->load->view('lista_chamados', $this->data);
        $this->load->view('common/footer');

    }


    /*
        Mostra ordens de serviço agrupadas por status

        Esse método mudará de acordo com a role, por isso
        Não está no controller Chamados
    */

    public function os_status($id_status_os = NULL){
        $status_exists = $this->_check_status($id_status_os);

        // Se status não existe, redireciona para a página inicial
        if(!$status_exists){
            $this->redirection($this->router->class);
        }

        $this->_set_page_header($status_exists);


        $this->data['lista_os'] = $this->relator_model->get_os_by_user($_SESSION['id_usuario'], $id_status_os);

        $this->load->view('common/header');
        $this->load->view('common/menus',$this->ui);
        $this->load->view('lista_chamados', $this->data);
        $this->load->view('common/footer');


    }

    /*
        Monta dados na view para passar ao parser
    */

    private function _set_ui_data(){

        $this->data['header'] = 'Todos';
        $this->data['header_icon'] = 'fa-tasks';

    }

    /*
     Seta o header da página de chamados conforme o status recebido

     @param $status_info : array()
    */


    private function _set_page_header($status_info){
        $this->data['header'] = $status_info['nome_status'];
        $this->data['header_icon'] = $status_info['icone'];
    }


}
