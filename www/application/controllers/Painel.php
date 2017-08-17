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
    private $data = array(
        'header_icon' => 'fa-tasks'
    );

    public function __construct() {
        parent::__construct();

        $this->auth->check_login();//Vê se o usuário está logado

        $this->load->helper('alert_box');
        $this->load->model('painel_model');

        //$this->_set_ui_data();


    }

    /*
     * Painel de controle Geral
     */

    public function index() {

        if($this->auth->in_role('tecnico')){
            $this->data['header'] = "Painel de Atendimento";
            $this->data['header_icon'] = "fa-inbox";
            $this->data['lista_os'] = $this->painel_model->get_os_by_secao($_SESSION['id_secao'], NULL , $is_index = TRUE);
        } else {
            $this->data['header'] = "Chamados Ativos";
            $this->data['lista_os'] = $this->painel_model->get_os_by_user($_SESSION['id_usuario']);
        }


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
        if ($id_status_os === NULL || !is_numeric($id_os)){
            show_404();
        }

        $status_exists = $this->_check_status($id_status_os);

        // Se status não existe, redireciona para a página inicial
        if(!$status_exists){
            $this->redirection($this->router->class);
        }

        $this->_set_page_header($status_exists);


        if($this->auth->in_role('tecnico')){
            $this->data['lista_os'] = $this->painel_model->get_os_by_secao($_SESSION['id_secao'], $id_status_os);
        } else {
            $this->data['lista_os'] = $this->painel_model->get_os_by_user($_SESSION['id_usuario'], $id_status_os);
        }

        $this->load->view('common/header');
        $this->load->view('common/menus',$this->ui);
        $this->load->view('lista_chamados', $this->data);
        $this->load->view('common/footer');

    }

    /*
        Lista chamados abertos pelo usuário.

        Estará presente nos painéis do gestor, técnico e gestor da unidade
    */
    public function meus_chamados(){


        $this->data['header'] = "Meus Chamados";
        $this->data['lista_os'] = $this->painel_model->get_os_by_user($_SESSION['id_usuario']);

        $this->load->view('common/header');
        $this->load->view('common/menus',$this->ui);
        $this->load->view('lista_chamados', $this->data);
        $this->load->view('common/footer');

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
