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

    public function get_resp_sala($id_sala){
        $this->db->select('usuario.nome');
        $this->db->from('usuario');
        $this->db->join('sala','id_responsavel_fk = id_usuario');
        $this->db->where('id_sala', $id_sala);

        $result = $this->db->get();

        return $result->row_array();
    }

    /**
     * Busca os por seção e por status
     * 
     */

    public function get_os_by($id_secao = NULL , $id_status = NULL){
        $this->db->select('id_os, 
            resumo, 
            data_abertura, 
            nome_status, 
            bs_label, 
            os_status.icone, 
            nome_secao, 
            secao.icone as icone_secao');
        $this->db->from('ordem_servico');
        $this->db->join('os_status', 'id_status = id_status_fk');
        $this->db->join('secao', 'id_secao = id_secao_fk');

        if($id_secao){
            $this->db->where('id_secao', $id_secao);
        }

        if($id_status){
            $this->db->where('id_status_fk', $id_status);
        }


        $this->db->order_by('data_abertura','ASC');

        $result = $this->db->get();

        return $result->result_array();

    }
}
