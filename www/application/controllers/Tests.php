<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tests extends MY_Controller {


    public function __construct() {
        parent::__construct();

        // Secure it
        if (ENVIRONMENT !== 'development'):
            show_404();
        endif;
        
    }



    public function index() {

        echo "Controler para escrita de testes";

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

    public function make_login(){


        $this->load->library('session');
        $this->load->model('login_model');

        $num_usp = '333333';
        $senha = '123';
        // Gera um login automatico para testar permissões
        $user_data = $this->login_model->check_user($num_usp, $senha);

        if($user_data):
            $this->session->set_userdata($user_data);
            var_dump($_SESSION);
        else:
            echo "não tem usuário com esses dados";
        endif;

    }
    // Gera página de relatório de atendimento
    public function relatorio(){
        $this->output->enable_profiler(FALSE);

        $this->load->model('chamados_model');

        $data['report'] = $this->chamados_model->get_monthly_report();
        //var_dump($data);

        // $this->load->view('common/header');
        $this->load->view('common/report', $data);
        $this->load->view('common/footer');


    }

    // Criando testes de paginação
    public function paginacao(){
        $this->output->enable_profiler(FALSE);
        $this->load->library('pagination');

        # =========================
        # paginação
        $pg_config['base_url'] = base_url() . 'tests/paginacao';
        $pg_config['total_rows'] = 200;
        $pg_config['per_page'] = 10;

        // tags que formatam todo o grupo
        $pg_config['full_tag_open'] = '<ul class="pagination">';
        $pg_config['full_tag_close'] = '</ul>';

        
        // Texto que aparece em "próximo" e suas tags
        $pg_config['next_link'] = 'Proximo &rsaquo;';
        $pg_config['next_tag_open'] = '<li>';
        $pg_config['next_tag_close'] = '</li>';
        
        // Texto que aparece em "Anterior" e suas tags
        $pg_config['prev_link'] = '&lsaquo; Anterior';
        $pg_config['prev_tag_open'] = '<li>';
        $pg_config['prev_tag_close'] = '</li>';


        $pg_config['first_link'] = '&laquo; Primeiro';
        $pg_config['first_tag_open'] = '<li>';
        $pt_config['first_tag_close'] = '</li>';
        
        
        $pg_config['last_link'] = 'Último &raquo;';
        $pg_config['last_tag_open'] = '<li>';
        $pt_config['last_tag_close'] = '</li>';

        $pg_config['cur_tag_open'] = '<li class="active"><a>';
        $pg_config['cur_tag_close'] = '</a></li>';

        $pg_config['num_tag_open'] = '<li>';
        $pg_config['num_tag_close'] = '</li>';

        $this->pagination->initialize($pg_config);

        $this->load->view('common/header');
        $this->load->view('tests/pagination');
        
        $this->load->view('common/footer');

        
        var_dump($pg_config);
    }

}
