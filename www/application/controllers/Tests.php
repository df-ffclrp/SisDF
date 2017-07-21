<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tests extends MY_Controller {


    public function __construct() {
        parent::__construct();

        $this->load->library('auth');
        $this->output->enable_profiler(TRUE);
    }



    public function index() {

        echo "indexando";

    }

/*
Testa método da biblioteca Auth

Auth->is_owner
*/

    public function owner($id_os = NULL){
        $this->load->model('chamados_model');

        $os_meta = $this->chamados_model->get_os_meta($id_os);

        //var_dump($os_meta);

        var_dump($this->auth->os_owner($os_meta));

        if($this->auth->os_owner($os_meta)){
            echo "é minha";
            $data['os'] = $this->chamados_model->get_os_by_id($id_os);
            var_dump($data);
        } else {
            echo "num pode...";
        }
    }

}
