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


            if ($dados_usuario):


                // Registra Sessão
                $this->session->set_userdata($dados_usuario);
                
                // Registra Role
                $this->_check_user_rights($_SESSION['nivel_acesso']);


                redirect($_SESSION['logged_in'], 'refresh');
//                var_dump($dados_usuario);
//
//                var_dump($_SESSION);

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

    /*
     * Checa nível de acesso do usuário e seta estado de conexão
     * 
     * Esse método será melhorado ao longo das versões do software
     * 
     */

    public function _check_user_rights($user_level) {
        switch ($user_level):
            case 1;
                $_SESSION['logged_in'] = 'gestor';
                break;
            case 2;
                $_SESSION['logged_in'] = 'tecnico';
                break;
            case 3;
                $_SESSION['logged_in'] = 'relator';
                break;
            case 4;
                $_SESSION['logged_in'] = 'admin';
                break;
            default:
                session_destroy();
        endswitch;
    }

}
