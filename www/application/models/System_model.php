<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Model do sistema que alimenta configurações básicas
 *
 * @author André Luiz Girol - Departamento de Física - FFCLRP
 */
class System_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /*
     * Pega áreas de atendimento
     * 
     * No banco são chamadas seções
     */

    public function get_secoes() {
//        $this->db->select('nome_secao');
//        $this->db->from('secao');

        $areas = $this->db->get('secao');
        return $areas->result_array();
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
