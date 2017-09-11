<?php

defined('BASEPATH') OR exit('No direct script access allowed');

	/*
	 Manipula requisições Ajax
	*/

class Ajax extends CI_Controller {

    public function __construct(){
        parent::__construct();

        // if(!$this->input->is_ajax_request()){
        //     echo "não é ajax...";
        //     exit();
        // }
        $this->load->library('session');

        $this->output->enable_profiler(TRUE);
    }

    public function index(){
        echo "to no index";
    }

    public function add_note(){
        if(empty($_POST['anotacao'])){
            echo 'error';
            exit();
        }
        $insert['id_anotacao'] = NULL;
        $insert['data_anotacao'] = date("Y-m-d H:i:s");
        $insert['texto'] = $this->input->post('anotacao');
        $insert['id_os_fk'] = $this->input->post('id_os');
        $insert['id_usuario_fk'] = $this->input->post('id_usuario');

        $this->load->model('ajax_model');
        $query_ok = $this->ajax_model->add_note($insert);

        $this->_check_query($query_ok);
    }

    // Adiciona um técnico ao atendimento
    public function add_atendente_os(){
        // $this->output->enable_profiler(FALSE);
        if(empty($_POST['id_os'])){
            echo 'error';
            exit();
        }

        $this->load->model('ajax_model');
        $id_os = $this->input->post('id_os');
        // $id_os = 7;
        $query_ok = $this->ajax_model->add_atendente_os($id_os);
        $this->ajax_model->change_os_status( 2 , $id_os );
        
        $this->_check_query($query_ok);
    }

    // Muda Status da OS
    public function change_os_status(){

    }

    // Pra não ter que reescrever over and over again
    // @param $db_response = BOOLEAN
    // Retornado do query builder
    private function _check_query($db_response){
        if($db_response){
            echo 'success';
        } else {
            echo 'error';
        }
        exit();
    }
}
