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

            $this->auth->check_login();//Vê se o usuário está logado

            $this->load->model('chamados_model');


        // Implementar nível de acesso

        }

        public function index(){

            echo "<h1> propriedade UI </h1>";
            var_dump($this->ui);
            echo "<hr>";

        }

     /*
		Mostra uma única ordem de serviço

		Mostra OS que o usuário abriu apenas
     */

    public function ver_os($id_os = NULL){
        if ($id_os === NULL || !is_numeric($id_os)){
            show_404();
        }

        //Busca metadados da ordem de serviço
        $os_metadata = $this->chamados_model->get_os_meta($id_os);

        // Se não tem metadados, redireciona...
        if(!$os_metadata){
            $this->redirection($this->get_base_controller());
        }


        // Se não é gestor da unidade (Nível Chuck Norris), verifica se é autorizado
        if(!$this->auth->is_gestor_unidade()){
            if(!$this->_authorized_user($os_metadata)){
                $this->redirection($this->get_base_controller());
                exit();
            }
        }

        // Show OS data:
        $data['os'] = $this->chamados_model->get_os_by_id($id_os);
        $data['notes'] = $this->chamados_model->get_notes($id_os);
        $data['custom_js'] = 'add_note.js';

        $this->load->view('ver_os', $data);

    }

    /*
        Checa se um usuário pode ver a ordem de serviço ou não,
        Baseado na sua seção, se é dono ou se é gestor da unidade.

        Utiliza os recursos da biblioteca de autenticação
    */

    private function _authorized_user($os_metadata){

        // Se não é dono, vê se está na seção que a OS foi aberta
        if(!$this->auth->is_owner($os_metadata)){
            if(!$this->auth->in_secao($os_metadata['secao'])){
                //echo "não é dono e não está na seção, então não pode!";
                return FALSE;
            }
        }
        //echo "é dono ou está na seção, então pode...";
        return TRUE;
    }

    /*
    Abre novo Chamado
    */

    public function novo($id_secao = NULL){
        if ($id_secao === NULL || !is_numeric($id_secao)){
            show_404();
        }

        $this->load->library('form_validation');
        $this->config->load('placeholders',TRUE);

        // always filter!
        $secao_exists = $this->_check_secao($id_secao);

        // Se a seção não existe, redireciona usuário para a base
        if(!$secao_exists){
            $this->redirection($this->get_base_controller());
        }

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
            $this->session->set_flashdata('warn_level','danger');
            $this->redirection($this->get_base_controller());
            exit();
        }

        $dados_os['id_resp_secao_fk'] = $id_responsavel_secao;
        $id_sala_dest = $this->input->post('sala');

        $id_responsavel_sala = $this->chamados_model->get_resp_sala($id_sala_dest);

        if(!$id_responsavel_sala){
            $msg = "<strong> Erro: </strong> Não há um responsável pela sala. Contacte o Administrador do sistema";
            $this->session->set_flashdata('message',$msg);
            $this->session->set_flashdata('warn_level','danger');
            $this->redirection($this->get_base_controller());
            exit();
        }

        $dados_os['id_resp_sala_fk'] = $id_responsavel_sala;
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
