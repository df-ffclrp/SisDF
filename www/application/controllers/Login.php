<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller Login
 * 
 * Descricao: Verifica os usuários cadastrados no sistema
 * e os redireciona para a página correta.
 * 
 * @copyright (c) 2017, André Girol / FFCLRP - USP
 */
class Login extends MY_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->library('form_validation');
        $this->load->model('login_model');
    }

    public function index() {

        $this->form_validation->set_rules('num_usp', 'Número USP', 'is_numeric|trim|required');
        $this->form_validation->set_rules('senha', 'Senha', 'trim|required');


        if ($this->form_validation->run() === FALSE):

            $this->load->view('login');

        else:
            
            $num_usp = $this->input->post('num_usp');
            $senha = $this->input->post('senha');

            $dados_usuario = $this->login_model->check_user($num_usp, $senha);
            
            // Registra Sessão
            $this->session->set_userdata($dados_usuario);
            
            var_dump($dados_usuario);
            var_dump($_SESSION);

        endif;
    }

}
