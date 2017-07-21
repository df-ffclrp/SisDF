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
class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->helper('url_helper');
        $this->load->library('form_validation');
        $this->load->model('login_model');
        $this->load->library('session');

        // Habilita debugger para ambiente de desenvolvimento
        if (ENVIRONMENT == 'development'):
            $this->output->enable_profiler(TRUE);
        endif;
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


            if ($dados_usuario):


                // Registra Sessão
                $this->session->set_userdata($dados_usuario);
                redirect($_SESSION['nivel_acesso'], 'refresh');

            else:
                $data['erro'] = ('Email e/ou senha inválidos');
                $this->load->view('login', $data);
            endif;

        endif;
    }

    /*
     * Desloga o usuário
     */

    public function sair() {
        unset($_SESSION);
        session_destroy();


        echo "Fez logoff!<br>";
        $url = base_url();
        echo '<a href="' . $url . '"> Logar </a>';
    }

    //===================================
    //Métodos Privados
    //===================================



}
