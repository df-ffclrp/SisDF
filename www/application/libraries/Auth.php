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


    /**
     *  Verifica se o usuário é dono do recurso a ser visualizado
     *  Por enquanto apenas verifica donos de OS
     * 
     * @param array $metadados_os - Esse parâmetro pode ser passado ou 
     * retirado de um construtor em Chamados Controller
     * 
     */

    public function is_owner($metadados_os)
    {

        $id_usuario = $_SESSION['id_usuario'];

        if ($metadados_os['id_relator'] == $id_usuario) {
            return true;
        }
        return false;

    }
    /**
     * Checa se o usuário está em determinada seção de atendimento
     * 
     * @param string $secao - Alias cadastrado no banco no campo "alias"
     * Tem o formato: 'informatica', 'manutencao', 'eletronica'
     */
    
    public function in_secao($secao = false)
    {
        $id_usuario_logado = $_SESSION['id_usuario'];
        $autorizado = $this->CI->auth_model->check_secao_usuario($id_usuario_logado, $secao);
        return $autorizado;
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

    /**
     * 
     * Checa se um usuário é gestor da unidade
     *  Wrapper para o método in_role()
     * 
     * Nível Chuck Norris
     */

    public function is_gestor_unidade()
    {
        return $this->in_role('gestor_unidade');
    }

    /**
     * Checa se um usuário pode ver a ordem de serviço ou não,
     * Baseado na sua seção, se é dono ou se é gestor da unidade.
     * 
     * @param array $os_metadata - Metadados da Ordem de Serviço providas no controller
     */
    public function authorized_user($os_metadata)
    {
        if ($this->is_gestor_unidade()) {
            return true;
        }
        // Se é dono, tudo certo
        if ($this->is_owner($os_metadata)) {
            return true;
        }
        // Se não é nenhum, está em sua seção?
        if ($this->in_secao($os_metadata['secao'])) {
            return true;
        }
    
        // echo "não é dono e não está na seção, então não pode!";
        return false;
    }
}
