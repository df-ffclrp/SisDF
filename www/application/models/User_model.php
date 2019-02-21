<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Model para Lidar com dados do usuário. Cuida da alteração da senha
 *
 * @author André Luiz Girol - Departamento de Física - FFCLRP - USP
 */

class User_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }

    /*
     * Checa se a senha atual do usuário confere
     *
     */
    public function check_current_pass($num_usp = null, $senha = null)
    {

        $this->db->select('1');
        $this->db->where('num_usp', $num_usp);
        $this->db->where('senha', hash('sha256', $senha));

        $success = $this->db->get('usuario');

        if ($success->num_rows() == 1) {
            return true;
        }
        return false;
    }

    // Altera senha do usuário
    public function change_pass($nova_senha, $num_usp = null)
    {
        $data = array(
            'senha' => hash('sha256', $nova_senha)
        );

        $this->db->where('num_usp', $num_usp);

        return $this->db->update('usuario', $data);

    }

    /**
     * Busca os ids das seções do usuário
     * @return array
      */
    public function get_secoes_usuario()
    {
        $id_usuario_logado = $_SESSION['id_usuario'];

        $this->db->select('id_secao, nome_secao');
        $this->db->from('secao');
    
        $this->db->join('membro_secao', 'id_secao_fk = id_secao');
        $this->db->join('usuario', 'id_usuario_fk = id_usuario');
    
        $this->db->where('id_usuario', $id_usuario_logado);
        $this->db->group_by('id_secao');
        $result = $this->db->get();

        $array_ids_secoes = [];
        foreach($result->result_array() as $secao)
        {
            array_push($array_ids_secoes, $secao['id_secao']);
        }
        return $array_ids_secoes;
    }


}
