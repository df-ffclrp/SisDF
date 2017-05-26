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
        $data['os'] = $this->chamados_model->get_os_by_id($id_os);
        //var_dump($os_info);

        $this->load->view('info_chamado', $data);

    }

    public function novo($id_secao = NULL){

        // always filter!
        $secao_exists = $this->_check_secao($id_secao);

        // Se a seção não existe, redireciona usuário para a base
        if(!$secao_exists){
            $this->redirection($this->get_base_controller());
        }

        $form = $this->_get_alias_secao($id_secao);

        $data['salas'] = $this->chamados_model->get_salas();
        $data['custom_js'] = 'nova_os.js';

        var_dump($data);
        $this->load->view('common/header');
        $this->load->view('common/menus',$this->ui);
        $this->load->view('forms/'.$form , $data);
        $this->load->view('common/footer');

    }

    /*
        Busca formulário baseado na seção de abertura
    */

    private function _get_alias_secao($id_secao){
    //public function get_alias_secao($id_secao = NULL){
        $secoes = $this->get_secoes();

        foreach ($secoes as $secao) {
            if ($secao['id_secao'] == $id_secao) {
                return $secao['alias'];
            }
        }

        return false;
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
