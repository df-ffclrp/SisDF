<?php

defined('BASEPATH') OR exit('No direct script access allowed');

	/*
	 Controller para manipular consultar tarefas do mês

     Usado pelo Gestor da Unidade
	*/

class Relatorios extends MY_Controller {

    public function __construct(){

        parent::__construct();
        // var_dump($this);
        // exit();
        
        $this->auth->check_login();//Vê se o usuário está logado
        
        if(!$this->auth->is_gestor_unidade()){
            show_404();
        }

        $this->load->model('chamados_model');

    }

    public function index(){
        $data['secoes'] = $this->get_secoes();
        $data['os_status'] = $this->get_os_status();

        $this->load->view('common/header');
        $this->load->view('common/menus', $this->menu_info);
        $this->load->view('reports/reports_index',$data);
        $this->load->view('common/footer');
    }

}