<?php

defined('BASEPATH') or exit('No direct script access allowed');

/*
Biblioteca Padrão de Autenticação

@author André Luiz Girol / FFCLRP - USP Ribeirão Preto

 */

class Auth
{

    private $CI;

    private $roles = [];

    public function __construct()
    {

        // Pega a instância do CI - super-object
        $this->CI = &get_instance();
        $this->CI->load->model('auth_model');

        $this->roles = $this->CI->auth_model->get_roles();

    }
    /**
     *  Checa o usuário logado no sistema
     */
    public function check_login()
    {
        $this->CI->load->helper('url');

        if (!isset($_SESSION['num_usp'])) {
            session_destroy();
            $uri = base_url() . 'login';
            redirect($uri, 'location', 301);
            exit();
        }
    }


    /*
        Verifica se o usuário é dono do recurso a ser visualizado

        Por enquanto apenas verifica donos de OS
     */

    public function is_owner($os_metadata)
    {

        $id_usuario = $_SESSION['id_usuario'];

        if ($os_metadata['id_relator'] == $id_usuario) {
            return true;
        }
        return false;

    }
    /*
    Checa se o usuário está em determinada seção
    de atendimento
     */

    public function in_secao($secao = false)
    {

        if ($secao === $_SESSION['membro_secao']) {
            return true;
        } else {
            return false;
        }
    }


    /**
     * Checa se um usuário pertence a determinada role
     * A model já trata o tipo de retorno true / false
     * 
     * @param string $role - Cadastrada no banco manualmente na tabela Roles.
     * @return boolean
     */

    public function in_role($role = false)
    {
        $id_logged_user = $_SESSION['id_usuario'];
        $autorizado = $this->CI->auth_model->check_user_role($id_logged_user, $role);
        return $autorizado;

    }

    /*
        Checa se um usuário é gestor da unidade

        Nível Chuck Norris
     */
    public function is_gestor_unidade()
    {
        if ($_SESSION['nivel_acesso'] === 'gestor_unidade') {
            return true;
        }
        return false;
    }

}
