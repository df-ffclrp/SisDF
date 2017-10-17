<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Model padrão para checagem de usuários
 *
 * @author André Luiz Girol - Departamento de Física - FFCLRP
 */
class Login_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /*
     * Checa usuário e senha do usuário e alimenta Sessão
     *
     * Libera login apenas se usuário estiver ativo.
     */

    public function check_user($num_usp, $password) {

        $this->db->select('id_usuario, num_usp, usuario.nome, email, ramal, role.nome as nivel_acesso, id_secao, secao.alias as membro_secao');
        $this->db->from('usuario');

        // Que nível de acesso?
        $this->db->join('user_role', 'usuario_id = id_usuario');
        $this->db->join('role', 'role_id = id_role');

        // Membro de qual seção?
        $this->db->join('membro_secao', 'id_usuario = id_usuario_fk', 'left');
        $this->db->join('secao', 'id_secao_fk = id_secao','left');

        // Dados específicos para autenticação

        ## IMPLEMENTAR HASHING ##
        $this->db->where('usuario.num_usp', $num_usp);
        $this->db->where('usuario.senha', hash('sha256', $password));
        $this->db->where('usuario.ativo', 1);
        $this->db->where('usuario.ativo', 1);

        ## Refatorar ##
        $this->db->order_by('role_id', 'DESC');

        $result = $this->db->get();

        ## IMPLEMENTAR MULTI ROLES ##
        if ($result->num_rows() > 0):

            return $result->row_array();

        else:

            return FALSE;

        endif;
    }

}
