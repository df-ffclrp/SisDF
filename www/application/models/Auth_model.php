<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Model para a biblioteca de Autenticação
 *
 * @author André Luiz Girol - Departamento de Física - FFCLRP
 */

class Auth_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_roles(){
        $this->db->select('nome');
        $query = $this->db->get('role');

        foreach ($query->result_array() as $row) {
            $roles[] = $row['nome'];
        }
        return $roles;
    }

    /*
    Verifica se a OS pertence ao usuário que a solicita
    No caso, verifica se a OS pertence ao relator

    */

    public function is_os_owner($id_usuario,$id_os){
        $this->db->select('id_os');
        $this->db->from('ordem_servico');
        $this->db->where('id_relator_fk', $id_usuario);
        $this->db->where('id_os', $id_os);

        $result = $this->db->get();

        if ($result->num_rows() === 1):
            return TRUE;
        else:
            return FALSE;
        endif;

    }
}
