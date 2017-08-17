<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
Biblioteca Padrão de Autenticação

@author André Luiz Girol / FFCLRP - USP Ribeirão Preto

*/

class Auth {

    private $CI;

    private $roles = [];

    public function __construct() {

        // Pega a instância do CI - super-object
        $this->CI = & get_instance();
        $this->CI->load->model('auth_model');

        $this->roles = $this->CI->auth_model->get_roles();

    }
    /*
        Checa o usuário logado no sistema
    */


    public function check_login() {
        if (!isset($_SESSION['nivel_acesso'])):


            session_destroy();
            // IMPLEMENTAR REDIRECT
            echo "Precisa estar logado!<br>";
            $url = base_url();

            echo '<a href="'.$url.'"> Logar </a>';

            exit();
        endif;
    }


    /*
        Verifica se o usuário é dono do recurso a ser visualizado

        Por enquanto apenas verifica donos de OS
    */

    public function is_owner($os_metadata){

        $id_usuario = $_SESSION['id_usuario'];

        if($os_metadata['id_relator'] == $id_usuario){
            return TRUE;
        } else {
            return FALSE;
        }

    }
    /*
    Checa se o usuário está em determinada seção
    de atendimento
    */

    public function in_secao($secao = FALSE){

        if($secao === $_SESSION['membro_secao']){
            return TRUE;
        } else {
            return FALSE;
        }
    }


    /*
        Checa quais roles estão autorzadas a ver aquele Recurso

        Não checa se o usuário é dono

        @param $roles = string
    */

    public function in_role($role = FALSE){
        if($role === $_SESSION['nivel_acesso']){
            return TRUE;
        } else {
            return FALSE;
        }

    }

    /*
        Checa se um usuário é gestor da unidade

        Nível Chuck Norris
    */
    public function is_gestor_unidade(){
        if($_SESSION['nivel_acesso'] === 'gestor_unidade'){
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
