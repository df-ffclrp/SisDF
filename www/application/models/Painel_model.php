<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Model para a página inicial de listagem de chamados
 *
 * @author André Luiz Girol - Departamento de Física - FFCLRP
 */
class Painel_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /*
     * Busca todos os chamados abertos por um
     * determinado usuário (dono)
     *
     * - Busca chamados de todas as seções
     * - Filtra chamados por Status
     * - Pode ordenar por parâmetro externo
     */

    public function get_os_by_owner($id_usuario, $id_status = null, $order_by = 'id_status')
    {
        $this->db->select('id_os, resumo, data_abertura, nome_status, bs_label, os_status.icone, nome_secao, secao.icone as icone_secao');
        $this->db->from('ordem_servico');
        $this->db->join('os_status', 'id_status = id_status_fk');
        $this->db->join('secao', 'id_secao = id_secao_fk');

        $this->db->where('id_relator_fk', $id_usuario);

        if (isset($id_status)) {
            $this->db->where('id_status_fk', $id_status);
        }


        // Tá ali no parâmetro do método :3
        $this->db->order_by($order_by, 'ASC');

        $result = $this->db->get();

        return $result->result_array();

    }
    /**
     * Busca Ordens de Serviço de acordo com critérios de acesso
     * @param array $array_id_secao - IDs de seções que devem
     * @param int $id_status - IDs de status para busca refinada em certas buscas do sistema
     * @param boolean $is_index - Se é chamado para o painel inicial, limita os status a serem buscados
      */
    public function get_os_by_secao($array_id_secao, $id_status = null, $is_index = false)
    {
        $this->db->select('id_os, resumo, data_abertura, nome_status, bs_label, os_status.icone, nome_secao, secao.icone as icone_secao');
        $this->db->from('ordem_servico');
        $this->db->join('os_status', 'id_status = id_status_fk');
        $this->db->join('secao', 'id_secao = id_secao_fk');

        $this->db->where_in('id_secao', $array_id_secao);

        // Se é o index, mostra apenas os que estão abertos e em andamento
        // Índices 3 e 6 são para: 
        // Atendido e Cancelado respectivamente
        if ($is_index) {
            $this->db->where_not_in('id_status', array(3, 6));
        }

        if (!empty($id_status)) {
            $this->db->where('id_status_fk', $id_status);
        }


        $this->db->order_by('data_abertura', 'ASC');

        $result = $this->db->get();

        return $result->result_array();

    }
    /*
        Busca todas as OS.
        Usado no painel do gestor da unidade
     */
    public function get_all_os($id_status = null)
    {
        $this->db->select('id_os, resumo, data_abertura, nome_status, bs_label, os_status.icone, nome_secao, secao.icone as icone_secao');
        $this->db->from('ordem_servico');
        $this->db->join('os_status', 'id_status = id_status_fk');
        $this->db->join('secao', 'id_secao = id_secao_fk');


        if (!empty($id_status)) {
            $this->db->where('id_status_fk', $id_status);
        } else {
            $this->db->where_in('id_status', array(1, 2, 4));
        }

        $this->db->order_by('data_abertura', 'ASC');

        $result = $this->db->get();

        return $result->result_array();

    }
}
