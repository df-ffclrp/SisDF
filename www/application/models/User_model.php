<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Model para Lidar com dados do usuário. Cuida da alteração da senha
 *
 * @author André Luiz Girol - Departamento de Física - FFCLRP
 */

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();

    }

    /*
     * Checa se a senha atual do usuário confere
     *
     */
    public function check_current_pass($num_usp = NULL, $senha = NULL) {

        $this->db->select('1');
        $this->db->where('num_usp', $num_usp);
        $this->db->where('senha', hash('sha256', $senha));

        $success = $this->db->get('usuario');

        if($success->num_rows() == 1){
            return TRUE;
        }
        return FALSE;
    }

    // Altera senha do usuário
    public function change_pass($nova_senha, $num_usp = null){
        $data = array(
            'senha' => hash('sha256', $nova_senha)
        );

        $this->db->where('num_usp', $num_usp);

        return $this->db->update('usuario', $data);

    }

  
}
