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

    //Adiciona um atendente a uma OS aberta
    public function add_atendente_os($id_os){
        
        $this->db->set('id_atendente_fk', $_SESSION['id_usuario']);
        $this->db->where('id_os', $id_os);

        return $this->db->update('ordem_servico');
    }

    // Muda o status da ordem de serviço
    public function change_os_status($id_status, $id_os = NULL){
        
        $this->db->set('id_status_fk', $id_status);
        $this->db->where('id_os', $id_os );
        
        return $this->db->update('ordem_servico');
        //{
        //     $error = $this->db->error();
        //     echo "Ocorreu um erro ao conectar ao banco de dados";
        //     exit();
        // }

    }

    public function get_nome_sala($id_sala){
        $this->db->select('nome as nome_sala');
        $this->db->where('id_sala', $id_sala);

        $result = $this->db->get('sala');

        return $result->row_array();
    }

}
