<?php

defined('BASEPATH') OR exit('No direct script access allowed');

	/*
	 Controller para manipular chamados

     Este controller é comum a todos os usuários
	*/

     class Chamados extends MY_Controller {

    //public $menus = $this->ui;

        public function __construct() {
            parent::__construct();

            $this->load->model('chamados_model');

        // Implementar nível de acesso

        }

        public function index(){
            echo "<h1> propriedade UI </h1>";
            var_dump($this->ui);
        }

     /*
		Mostra uma única ordem de serviço

		Mostra OS que o usuário abriu apenas
     */

        public function ver_os($id_os = NULL){
        // Implementar controle de acesso

            $data['os'] = $this->chamados_model->get_os_by_id($id_os);
            $this->load->view('info_chamado', $data);

        }

    /*
    Abre novo Chamado
    */

    public function novo($id_secao = NULL){

        $this->load->library('form_validation');
        $this->config->load('placeholders',TRUE);

        // always filter!
        $secao_exists = $this->_check_secao($id_secao);

        // Se a seção não existe, redireciona usuário para a base
        if(!$secao_exists){
            $this->redirection($this->get_base_controller());
        }

        $data['salas'] = $this->chamados_model->get_salas();
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

        if($this->input->post('has_material') == 'true'){
            $this->form_validation->set_rules('forn_material', 'Fornecimento do Material', 'required');
            $this->form_validation->set_rules('desc_material', 'Descrição do Material', 'required');
        }

        if ($this->form_validation->run() === FALSE){
            $this->load->view('common/header');
            $this->load->view('common/menus',$this->ui);
            $this->load->view('forms/nova_os' , $data);
            $this->load->view('common/footer');

        } else {
            $this->_processa_os($id_secao);
        }

    }
    /*
    Processa o formulário enviado
    */

    private function _processa_os($id_secao){
        // Entra aqui apenas se foi pressionado o botão
        if(!isset($_POST['abrir_os'])){
            echo "Não foi enviado formulário...";
            exit();
        }

        //Monta dados do formulário para o banco
        $dados_os['id_os'] = NULL;
        $dados_os['id_relator_fk'] = $_SESSION['id_usuario'];
        $dados_os['resumo'] = $this->input->post('resumo');
        $dados_os['descricao'] = $this->input->post('descricao');
        $dados_os['data_abertura'] = date("Y-m-d H:i:s");
        $dados_os['data_fechamento'] = NULL;
        $dados_os['last_update'] = $dados_os['data_abertura'];
        $dados_os['id_atendente_fk'] = NULL;

        $id_responsavel_secao = $this->chamados_model->get_resp_secao($id_secao);

        if(!$id_responsavel_secao){
            $msg = "<strong> Erro: </strong> Não há um gestor da seção cadastrado";
            $this->session->set_flashdata('message',$msg);
            $this->redirection($this->get_base_controller());
            exit();
        }

        $dados_os['id_resp_secao_fk'] = $id_responsavel_secao;
        $id_sala_dest = $this->input->post('sala');
        $dados_os['id_resp_sala_fk'] = $this->chamados_model->get_resp_sala($id_sala_dest);
        $dados_os['id_status_fk'] = '1'; // Sempre 1 para aberto!
        $dados_os['id_sala_fk'] = $id_sala_dest;
        $dados_os['id_secao_fk'] = $id_secao;
        $dados_os['id_finalidade_fk'] = $this->input->post('finalidade');

        $last_os_id = $this->chamados_model->grava_os($dados_os);

        if(!empty($last_os_id)){
            $msg = "Ordem de Serviço <strong>cadastrada</strong> com sucesso.";
            $this->session->set_flashdata('message',$msg);
        }

        if($this->input->post('has_material') == 'true'){
            $dados_mat['id_material'] = NULL;
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

    private function _set_form_info($id_secao) {

        $secao = $this->get_secao($id_secao);

        $form_info['secao_dest'] = $secao;
        //recupera placeholder específico da seção
        $alias = $secao['alias'];
        $form_info['ph'] = $this->config->item($alias,'placeholders');

        return $form_info;
    }




    /*
    ==== MÉTODOS AJAX ====
    */
    public function aj_get_nome_sala() {
        $this->output->enable_profiler(FALSE);


        $id_sala = $this->input->post('sala');
        $res = $this->chamados_model->get_nome_sala($id_sala);

        echo $res['nome_sala'];
    }
}
