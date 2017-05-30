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
            ordem_servico.descricao as os_descricao,

            rel.nome as relator,
            rel.num_usp as num_usp,
            rel.ramal,
            rel.email,
            data_abertura,
            data_fechamento,
            last_update,
            atd.nome as atendente,
            sec_resp.nome as resp_secao,
            sala_resp.nome as resp_sala,

            nome_status, 
            nome_secao,
            secao.icone as secao_icone,
            num_sala,
            sala.nome as nome_sala,
            finalidade.descricao as finalidade,
            descricao_mat,
            fornecimento

            ');

        $this->db->from('ordem_servico');

        $this->db->join('usuario as rel', 'rel.id_usuario = id_relator_fk' );
        // Se não tiver atendente, a query buga.
        $this->db->join('usuario as atd', 'atd.id_usuario = id_atendente_fk', 'left'); 
        $this->db->join('usuario as sec_resp', 'sec_resp.id_usuario = id_resp_secao_fk');
        $this->db->join('usuario as sala_resp', 'sala_resp.id_usuario = id_resp_sala_fk');

        $this->db->join('os_status', 'id_status = id_status_fk');
        $this->db->join('secao', 'id_secao = id_secao_fk');
        $this->db->join('finalidade', 'id_finalidade = id_finalidade_fk');
        $this->db->join('sala', 'id_sala = id_sala_fk');
        $this->db->join('material', 'id_os = id_os_fk', 'left');

        $this->db->where('id_os', $id_os);

        $result = $this->db->get();
        
        return $result->row_array();
        
    }
    
    public function get_salas(){
        $result = $this->db->get('sala');

        return $result->result_array();
    }

    public function get_finalidades(){
        $result = $this->db->get('finalidade');
        return $result->result_array();
    }

    // Busca responsável pela seção do atendimento
    public function get_resp_secao($id_secao){
        $this->db->select('id_usuario_fk as id_responsavel');
        $this->db->from('membro_secao');

        $this->db->where('responsabilidade','responsavel');

        $query = $this->db->get();
        
        $row_result = $query->row();
        return $row_result->id_responsavel;
    }

    // Busca responsável pela sala do atendimento
    public function get_resp_sala($id_sala){
        $this->db->select('id_resp_fk as responsavel');
        $this->db->from('resp_sala');

        $this->db->where('id_sala_fk',$id_sala);

        $query = $this->db->get();
        $row_result = $query->row();
        //var_dump($row_result);
        return $row_result->responsavel;
    }

    public function get_nome_sala($id_sala){
        $this->db->select('nome as nome_sala');
        $this->db->where('id_sala', $id_sala);

        $result = $this->db->get('sala');

        return $result->row_array();
    }

    public function grava_os($dados_os){
        $query =  $this->db->insert('ordem_servico',$dados_os);
        if($query){
            // Retorna o último ID inserido
            return $this->db->insert_id();
        }
    }
}
