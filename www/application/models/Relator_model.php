<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Model para a página inicial de listagem de chamados
 *
 * @author André Luiz Girol - Departamento de Física - FFCLRP
 */
class Relator_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    /*
     * Busca todos os chamados abertos por um
     * determinado usuário
     */
    
    public function get_chamados($id_usuario){
        $this->db->select('id_os, resumo, data_abertura, id_status, nome_status as os_status');
        $this->db->from('ordem_servico');
        $this->db->join('os_status', 'id_status = id_status_fk');

        $this->db->where('id_usuario_fk', $id_usuario);
        $this->db->order_by('id_status','ASC');
        
        $result = $this->db->get();
        
        return $result->result_array();
        
    }
    
    /*
     * Busca todos os status
     * cadastrados no sistema
     */
    
    public function get_os_status(){
        $result = $this->db->get('os_status');
        
        return $result->result_array();
    }
}