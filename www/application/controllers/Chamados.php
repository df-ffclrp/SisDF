<?php

defined('BASEPATH') OR exit('No direct script access allowed');

	/*
	 Controller para manipular chamados
	*/

    class Chamados extends MY_Controller {

    //public $menus = $this->ui;

    public function __construct() {
        parent::__construct();

        $this->load->model('chamados_model');

        // Implementar nível de acesso

    }

    public function index(){
        var_dump($this->ui);
    }

     /*
		Mostra uma única ordem de serviço

		Mostra OS que o usuário abriu apenas
     */

    public function ver_os($id_os = null){
        $data['os'] = $this->chamados_model->get_os_by_id($id_os);
        //var_dump($os_info);

        $this->load->view('info_chamado', $data);

    }

    public function novo(){

        $data['salas'] = $this->chamados_model->get_salas();

        //var_dump($data);
        $this->load->view('forms/manutencao',$data);

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
