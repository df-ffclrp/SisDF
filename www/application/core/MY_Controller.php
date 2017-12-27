<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller base para carregar funções gerais do sistema
 *
 * Alimenta variáveis como:
 * - Profiler loader para ambiente dev
 *
 * @author André Luiz Girol
 */
class MY_Controller extends CI_Controller {

    public $menu_info = [];
    private $secoes = [];
    private $os_status = [];
    private $base_controller = 'painel';

    public function __construct() {
        parent::__construct();

        $this->load->helper('url_helper');
        $this->load->helper('make_icon_helper');
        //$this->load->helper('user_level');/
        $this->load->library('session');
        $this->load->library('auth');

        $this->set_common();

        // Habilita debugger para ambiente de desenvolvimento
        if (ENVIRONMENT == 'development'):
            $this->output->enable_profiler(TRUE);
        endif;
    }

    /*
    * Configura arrays comuns a toda aplicação
    */

    private function set_common(){
        $this->load->model('system_model');

        $this->secoes = $this->system_model->get_secoes();
        $this->os_status = $this->system_model->get_os_status();

        // Configura User Interface
        $this->menu_info['controller'] = $this->base_controller;
        $this->menu_info['status_menu'] = $this->os_status;
        $this->menu_info['secoes_menu'] = $this->secoes;

    }

    /*
      Helper para redirecionamento
    * Função que monta uma URL a partir da base_url e redireciona com refresh para outro local
    *
    * Para ser usado com a técnica POST - REDIRECT -GET
    *
    */

      protected function redirection($sublocation = '') {
        $uri = base_url() . $sublocation;
        redirect($uri, 'location', 301);
    }


    /**
     * Checa se uma seção solicitada no index existe no array de configuração
     *
     * Retorna true ou false
     */
    protected function _check_secao($id_secao) {
        $secoes = $this->get_secoes();

        foreach ($secoes as $secao) {
            if ($secao['id_secao'] == $id_secao) {
                return true;
            }
        }

        return false;
    }

    /**
    * Checa se um status existe no array de configuração (em memória)
    *
    *  Retorna o status completo
    */
    protected function _check_status($id_status_os){
        $os_status_array = $this->get_os_status();

        foreach ($os_status_array as $status) {
            if ($status['id_status'] == $id_status_os) {
                return $status;
            }
        }

        return false;
    }
    /**
     * Configura Paginação de resultados
     */

    protected function configure_pagination($id_os_status){
        // Hard Coded
        $pg_config['base_url'] = base_url() . 'painel/os_status';
        $pg_config['total_rows'] = 200;
        $pg_config['per_page'] = 10;

        $pg_config['prefix'] = $id_os_status .'/';
        $pg_config['uri_segment'] = 4;

        // tags que formatam todo o grupo
        $pg_config['full_tag_open'] = '<ul class="pagination">';
        $pg_config['full_tag_close'] = '</ul>'. PHP_EOL;

        $pg_config['first_link'] = '&laquo; Primeiro';
        $pg_config['first_tag_open'] = '<li>';
        $pt_config['first_tag_close'] = '</li>';
        $pg_config['first_url'] = $pg_config['base_url'] . "/{$id_os_status}";
        
        $pg_config['cur_tag_open'] = '<li class="active"><a>';
        $pg_config['cur_tag_close'] = '</a></li>';
        
        // Texto que aparece em "próximo" e suas tags
        $pg_config['next_link'] = 'Proximo &rsaquo;';
        $pg_config['next_tag_open'] = "<li>";
        $pg_config['next_tag_close'] = '</li>'. PHP_EOL;
        
        // Texto que aparece em "Anterior" e suas tags
        $pg_config['prev_link'] = '&lsaquo; Anterior';
        $pg_config['prev_tag_open'] = '<li>';
        $pg_config['prev_tag_close'] = '</li>';


        $pg_config['num_tag_open'] = '<li>';
        $pg_config['num_tag_close'] = '</li>';
        
        
        $pg_config['last_link'] = 'Último &raquo;';
        $pg_config['last_tag_open'] = '<li>';
        $pt_config['last_tag_close'] = '</li>';

        $this->pagination->initialize($pg_config);

    }

    /*
    ========================
     * Gets and Sets
    ========================
     */



    // ========= GETS ===============


    /*
      Busca seção baseado no seu id
    */

      protected function get_secao($id_secao){

        $secoes = $this->get_secoes();

        foreach ($secoes as $secao) {
            if ($secao['id_secao'] == $id_secao) {
                return $secao;
            }
        }
        return false;
    }

    protected function get_secoes(){
        return $this->secoes;
    }

    protected function get_os_status(){
        return $this->os_status;
    }

    protected function get_base_controller(){
        return $this->base_controller;
    }

    protected function get_ui_data(){
        return $this->menu_info;
    }

}
