<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Model para a controller de Chamados
 *
 * @author André Luiz Girol - Departamento de Física - FFCLRP
 */
class Chamados_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    /*
     * Busca um único chamado e todas as suas informações
     * determinado usuário
     * 
     */
    
    public function get_os_by_id($id_os){
        $this->db->select('
            id_os, 
            resumo,
            usuario.nome as relator,
            num_usp,
            ramal,
            email,
            ordem_servico.descricao as os_descricao,
            data_abertura,
            data_fechamento,
            last_update,
            nome_status, 
            nome_secao,
            secao.icone as secao_icone,
            num_sala,
            sala.nome as nome_sala,
            finalidade.descricao as finalidade



            ');
        $this->db->from('ordem_servico');
        $this->db->join('os_status', 'id_status = id_status_fk');
        $this->db->join('secao', 'id_secao = id_secao_fk');
        $this->db->join('finalidade', 'id_finalidade = id_finalidade_fk');
        $this->db->join('sala', 'id_sala = id_sala_fk');
        $this->db->join('usuario', 'id_usuario = id_usuario_fk');

        $this->db->where('id_os', $id_os);

        $result = $this->db->get();
        
        return $result->row_array();
        
    }
    

}