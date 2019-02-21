<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Model padrão para checagem de usuários
 *
 * @author André Luiz Girol - Departamento de Física - FFCLRP
 */
class Login_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /*
     * Checa usuário e senha do usuário e alimenta Sessão
     *
     * Libera login apenas se usuário estiver ativo.
     */

    public function check_user($num_usp, $password)
    {

        $this->db->select(
            'id_usuario, 
            num_usp, 
            usuario.nome,
            email'
        );
        $this->db->from('usuario');

        $this->db->where('usuario.num_usp', $num_usp);
        $this->db->where('usuario.senha', hash('sha256', $password));
        $this->db->where('usuario.ativo', 1);

        $result = $this->db->get();

        if ($result->num_rows() == 0) {
            return false;
        }

        return $result->row_array();
    }

}
