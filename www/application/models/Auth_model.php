<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Model para a biblioteca de Autenticação
 *
 * @author André Luiz Girol - Departamento de Física - FFCLRP
 */

class Auth_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_roles()
    {
        $this->db->select('nome');
        $query = $this->db->get('role');

        foreach ($query->result_array() as $row) {
            $roles[] = $row['nome'];
        }
        return $roles;
    }

    /**
     * Checa se determinado usuário está em uma role
     * @param int $id_usuario 
     * @param string $user_role 
     */

    public function check_user_role($id_usuario, $role_to_check)
    {
        $this->db->select('id_role, nome');
        $this->db->from('role');
    
        // Que nível de acesso?
        $this->db->join('user_role', "role_id = id_role");
        $this->db->where('role.nome', $role_to_check);

        $this->db->where('usuario_id', $id_usuario);
        $result = $this->db->get();

        if ($result->num_rows() == 1) {
            return true;
        };

        return false;
    }

    /**
     * Checa se determinado usuário está em uma Seção de Atendimento
     * @param int $id_usuario 
     * @param string $secao_a_checar - no formato 'caixa_baixa_snake_case'
     */

    public function check_secao_usuario($id_usuario, $secao_a_checar)
    {
        $this->db->select('id_secao, alias as nome_secao');
        $this->db->from('secao');

        $this->db->join('membro_secao', "id_secao_fk = id_secao");
        $this->db->where('nome_secao', $secao_a_checar);

        $this->db->where('id_usuario_fk', $id_usuario);
        $result = $this->db->get();

        if ($result->num_rows() == 1) {
            return true;
        };

        return false;
    }

}
