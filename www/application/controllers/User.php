<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Manipula dados do usuário
*
*/

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->library('session');
        $this->load->library('auth');
        $this->auth->check_login();//Vê se o usuário está logado

        $this->load->model('user_model');
        $this->load->helper('alert_box');

        // Habilita debugger para ambiente de desenvolvimento
        if (ENVIRONMENT == 'development'):
            $this->output->enable_profiler(TRUE);
        endif;
        
    }

    public function index(){


        $this->load->view('common/header');
        $this->load->view('common/user_menus');
        $this->load->view('user_info');

        $this->load->view('common/footer');

    }

    
    public function mudar_senha(){
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('senha_atual', 'Senha Atual', 'trim|required|callback__check_current_pass');
        $this->form_validation->set_rules('nova_senha', 'Nova Senha', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('verifica_senha', 'Verificação da Senha', 'required|matches[nova_senha]');

        if ($this->form_validation->run() === FALSE){
            
            $this->load->view('common/header');
            $this->load->view('common/user_menus');
            $this->load->view('forms/change_pass');
            $this->load->view('common/footer');

        } else {
            $this->_execute_change_pass();
        }
    }

    private function _execute_change_pass(){
        $nova_senha = $this->input->post('nova_senha');

        $query_ok = $this->user_model->change_pass($nova_senha, $_SESSION['num_usp']);

        if(!$query_ok){
            $msg = "<strong> Erro: </strong> Ocorreu um erro ao atualizar a senha. Entre em contato com o administrador";
            $warn_level = 'danger';
        } else {
            $msg = "Senha alterada com sucesso!";
            $warn_level = 'success';
        }
        
        $this->session->set_flashdata('message', $msg);
        $this->session->set_flashdata('warn_level', $warn_level);
        redirect($this->router->class, 'location', 301);

    }



    /*
     * Callback - FORM VALIDATION
     * 
     * verifica se a senha atual confere
     */
    public function _check_current_pass($senha_atual) {
        
        $valid_pass = $this->user_model->check_current_pass($_SESSION['num_usp'],$senha_atual);

        if ($valid_pass){
            return TRUE;
        }

        $this->form_validation->set_message('_check_current_pass', 'Senha atual inválida!');
        return FALSE;
    }


}