<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Model para requisições Ajax
 *
 * @author André Luiz Girol - Departamento de Física - FFCLRP
 */

class Ajax_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /*
     * Checa usuário e senha do usuário e alimenta Sessão
     *
     * Libera login apenas se usuário estiver ativo.
     */

    public function add_note($note_data) {

        $success = $this->db->insert('anotacao',$note_data);
        if($success){
            return TRUE;
        }
        return FALSE;
    }

}
