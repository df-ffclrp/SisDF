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

        if($query_ok){
            echo "success";
        } else {
            echo "error";
        }

    }
}