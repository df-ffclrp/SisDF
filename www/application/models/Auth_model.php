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


}
