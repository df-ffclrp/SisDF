<?php

defined('BASEPATH') or exit('No direct script access allowed');

	/*
	 Controller para manipular chamados

     Este controller é comum a todos os usuários
 */

class Chamados extends MY_Controller
{

    private $id_os;
    private $metadados_os;

    public function __construct()
    {
        parent::__construct();

        $this->auth->check_login();//Vê se o usuário está logado

        $this->load->model('chamados_model');
        
        // Busca terceiro segmento da URL. Se não tiver nada, retorna NULL
        $this->id_os = $this->uri->segment(3, null);

        // Verificações de segurança
        $this->_valida_id_os();
        $this->_valida_metadados_os();

        // Se não é autorizado, mostra 404
        if(!$this->auth->authorized_user($this->metadados_os))
        {
            show_404();
        }

    }

    # ======================================================= #
    # Segurança                                               #
    # ======================================================= #
    /**
     * Verifica se o id passado na URL é numérico ou nulo
     * 
     * Mostra 404 caso não valide
     */
    private function _valida_id_os()
    {
        if ($this->id_os == null || !is_numeric($this->id_os)) {
            show_404();
        }
    }

    /**
     * Checagem extra se a ordem de serviço foi aberta corretamente com os dados:
     * - id_os
     * - id_relator
     * - secao que foi aberta
     * 
     * Alimenta atributo classe com os metadados atuais
     */
    private function _valida_metadados_os()
    {
        // Busca metadados da ordem de serviço
        $os_metadata = $this->chamados_model->get_os_meta($this->id_os);

        // Se não tem metadados, redireciona...
        if (!$os_metadata) {
            
            $this->redirection($this->get_base_controller());
            exit();
        }
        $this->metadados_os = $os_metadata;
    }
    
    public function index()
    {
        show_404();

        // echo "<h1> propriedade UI </h1>";
        // var_dump($this->menu_info);
        // echo "<hr>";
        // var_dump($this->get_secoes());

    }

     /*
		Mostra uma única ordem de serviço

		Mostra OS que o usuário abriu apenas
     */

    public function ver_os($id_os = null)
    {
   
        // Mostra anotações:
        $data['os'] = $this->chamados_model->get_os_by_id($id_os);

        $cur_status = $os_metadata['id_status']; // status atual
        $data['change_status_menu'] = $this->chamados_model->get_other_status($cur_status);

        $data['notes'] = $this->chamados_model->get_notes($id_os, $limit = 9);

        // Se tem anotações, conte-as
        if ($data['notes']) {
            $data['num_notes'] = $this->chamados_model->get_num_notes($id_os);
        }
        $data['custom_js'] = 'ver_os.js';

        $this->load->view('ver_os', $data);

    }

    /** 
     * busca todas as Anotações / Tarefas do chamado
     * 
     *  
     */
    public function ver_tarefas($id_os)
    {

        $data['os'] = $os_metadata;
        // $data['notes'] = $this->chamados_model->get_notes($id_os , $limit = 10);
        $data['notes'] = $this->chamados_model->get_notes($id_os);

        if (!$data['notes']) {
            show_404();
        }
        $data['num_notes'] = $this->chamados_model->get_num_notes($id_os);
        // var_dump($data);
        $this->load->view('ver_tarefas', $data);

    }
    /**
     * Prepara página para impressão
     *
     */

    public function imprimir_os($id_os = null)
    {
        // Show OS data:
        $data['os'] = $this->chamados_model->get_os_by_id($id_os);
        $this->load->view('imprimir_os', $data);

    }

    /*
    Abre novo Chamado

    @param $id_secao = int()
     */
    public function novo($id_secao = null)
    {
        if ($id_secao === null || !is_numeric($id_secao)) {
            show_404();
        }
        // always filter!
        $secao_exists = $this->_check_secao($id_secao);

        // Se a seção não existe, redireciona usuário para a base
        if (!$secao_exists) {
            $this->redirection($this->get_base_controller());
        }

        $this->load->library('form_validation');
        $this->config->load('placeholders', true);

        $data['salas'] = $this->chamados_model->get_salas();
        // fin = finalidade
        $data['fin'] = $this->chamados_model->get_finalidades();

        $data['custom_js'] = 'nova_os.js';

        // Busca informações do form baseadas no arquivo de configuração
        $data = array_merge($data, $this->_set_form_info($id_secao));
        //var_dump($data); // DEBUG

        // Basic form validation
        $this->form_validation->set_rules('resumo', 'Resumo do Chamado', 'trim|required');
        $this->form_validation->set_rules('descricao', 'Descrição do Chamado', 'trim|required');
        $this->form_validation->set_rules('sala', 'Sala', 'required');
        $this->form_validation->set_rules('finalidade', 'Finalidade', 'required');

        if ($this->input->post('has_material') == 'true') {
            $this->form_validation->set_rules('forn_material', 'Fornecimento do Material', 'required');
            $this->form_validation->set_rules('desc_material', 'Descrição do Material', 'required');
        }

        if ($this->form_validation->run() === false) {
            $this->load->view('common/header');
            $this->load->view('common/menus', $this->menu_info);
            $this->load->view('forms/nova_os', $data);
            $this->load->view('common/footer');

        } else {
            $this->_processa_os($id_secao);
        }

    }
    /*
    Processa o formulário enviado
     */

    private function _processa_os($id_secao)
    {
        // Entra aqui apenas se foi pressionado o botão
        if (!isset($_POST['abrir_os'])) {
            echo "Não foi enviado formulário...";
            exit();
        }

        //Monta dados do formulário para o banco
        $dados_os['id_os'] = null;
        $dados_os['id_relator_fk'] = $_SESSION['id_usuario'];
        $dados_os['resumo'] = $this->input->post('resumo');
        $dados_os['descricao'] = $this->input->post('descricao');
        $dados_os['data_abertura'] = date("Y-m-d H:i:s");
        $dados_os['data_fechamento'] = null;
        $dados_os['last_update'] = $dados_os['data_abertura'];
        $dados_os['id_atendente_fk'] = null;

        $id_responsavel_secao = $this->chamados_model->get_resp_secao($id_secao);

        if (!$id_responsavel_secao) {
            $msg = "<strong> Erro: </strong> Não há um gestor da seção cadastrado";
            $this->session->set_flashdata('message', $msg);
            $this->session->set_flashdata('warn_level', 'danger');
            $this->redirection($this->get_base_controller());
            exit();
        }

        $dados_os['id_resp_secao_fk'] = $id_responsavel_secao;
        $id_sala_dest = $this->input->post('sala');

        $id_responsavel_sala = $this->chamados_model->get_resp_sala($id_sala_dest);

        if (!$id_responsavel_sala) {
            $msg = "<strong> Erro: </strong> Não há um responsável pela sala. Contacte o Administrador do sistema.";
            $this->session->set_flashdata('message', $msg);
            $this->session->set_flashdata('warn_level', 'danger');
            $this->redirection($this->get_base_controller());
            exit();
        }
        
        // Empacotando para o Insert
        $dados_os['id_resp_sala_fk'] = $id_responsavel_sala;
        $dados_os['id_status_fk'] = '1'; // Sempre 1 para aberto!
        $dados_os['id_sala_fk'] = $id_sala_dest;
        $dados_os['id_secao_fk'] = $id_secao;
        $dados_os['id_finalidade_fk'] = $this->input->post('finalidade');

        // Se gravou corretamente, manda de volta o último ID cadastrado
        $last_os_id = $this->chamados_model->grava_os($dados_os);

        if (!empty($last_os_id)) {
            $msg = "Ordem de Serviço <strong>cadastrada</strong> com sucesso.";
            $this->session->set_flashdata('message', $msg);
        }

        if ($this->input->post('has_material') == 'true') {
            $dados_mat['id_material'] = null;
            $dados_mat['descricao_mat'] = $this->input->post('desc_material');
            $dados_mat['fornecimento'] = $this->input->post('forn_material');
            $dados_mat['id_os_fk'] = $last_os_id;

            $result = $this->chamados_model->grava_mat_os($dados_mat);
        }
        // Ação default é redirecionar para controller base
        $this->redirection($this->get_base_controller());
    }


    /*
    Busca placeholders e nomes para o formulário
     */

    private function _set_form_info($id_secao)
    {

        $secao = $this->get_secao($id_secao);

        $form_info['secao_dest'] = $secao;

        //recupera placeholder específico da seção
        $alias = $secao['alias'];

        // ph = placeholer - usado nos inputs!
        $form_info['ph'] = $this->config->item($alias, 'placeholders');

        return $form_info;
    }

}
