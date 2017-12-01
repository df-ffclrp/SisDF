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
    * Busca dados de autorização da OS (metadados):
    * - id_os
    * - id_relator
    * - secao que foi aberta
    */
    public function get_os_meta($id_os){
        $this->db->select('id_os, id_relator_fk as id_relator, alias as secao, nome_secao, id_status_fk as id_status');
        $this->db->from('ordem_servico');
        $this->db->join('secao', 'id_secao = id_secao_fk');
        $this->db->where('id_os', $id_os);

        $result = $this->db->get();
        return $result->row_array();
    }

    /**

    * Busca todos os status menos o status ativo

    */
    public function get_other_status($not_in){
        $this->db->select('id_status, alias, nome_status, icone');
        $this->db->from('os_status');
        $this->db->where_not_in('id_status', $not_in);

        $result = $this->db->get();

        return $result->result_array();

    }

    /**
    * Muda o status da OS
    *
    *
    */
    public function change_status_os($new_status){
        $data = array(
            'id_status_fk' => $new_status,
        );

        $this->db->where('id_os', $id);

        return $this->db->update('ordem_servico', $data);
    
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
            id_atendente_fk as id_atendente,
            atd.nome as atendente,
            sec_resp.nome as resp_secao,
            sala_resp.nome as resp_sala,

            os_status.icone as status_icone,
            bs_label,
            nome_status,
            nome_secao,
            secao.icone as secao_icone,
            secao.alias as secao_os,
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
        $this->db->order_by('num_sala', 'ASC');
        $result = $this->db->get('sala');
        return $result->result_array();
    }

    public function get_finalidades(){
        $result = $this->db->get('finalidade');
        return $result->result_array();
    }

    // Busca responsável pela seção do atendimento
    public function get_resp_secao($id_secao){
        $this->db->select('id_usuario_fk as id_responsavel_secao');
        $this->db->from('membro_secao');
        $this->db->join('usuario','id_usuario_fk = id_usuario');
        $this->db->join('user_role','id_usuario = usuario_id');
        $this->db->join('role','id_role = role_id');

        $this->db->where('role.nome','gestor_secao');
        $this->db->where('id_secao_fk', $id_secao);

        $query = $this->db->get();

        $row_result = $query->row();
        if(isset($row_result)){
            return $row_result->id_responsavel_secao;
        } else {
            return FALSE;
        }
    }

    // Busca responsável pela sala do atendimento
    public function get_resp_sala($id_sala){
        $this->db->select('id_responsavel_fk as responsavel');
        $this->db->from('sala');

        $this->db->where('id_sala',$id_sala);

        $query = $this->db->get();

        $row_result = $query->row();
        if(!empty($row_result)){
            return $row_result->responsavel;
        } else {
            return FALSE;

        }
    }

    public function get_notes($id_os, $limit = NULL){
        $this->db->select('data_anotacao as data_anot, texto, nome as autor');
        $this->db->join('usuario','id_usuario_fk = id_usuario');
        $this->db->where('id_os_fk', $id_os);
        $this->db->order_by('data_anotacao', 'DESC');
        
        if($limit){
            $this->db->limit($limit);
        }

        $result = $this->db->get('anotacao');

        return $result->result_array();
    }

    public function get_num_notes($id_os){
        
        $this->db->where('id_os_fk', $id_os);
        return $this->db->count_all_results('anotacao');
    }

    public function grava_os($dados_os){
        $query =  $this->db->insert('ordem_servico',$dados_os);
        if($query){
            // Retorna o último ID inserido
            return $this->db->insert_id();
        }
    }

    public function grava_mat_os($dados_material) {
        return $this->db->insert('material', $dados_material);
    }
}
