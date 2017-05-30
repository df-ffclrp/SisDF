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

    public $ui = [];
    private $secoes = [];
    private $os_status = [];
    private $base_controller = '';

    public function __construct() {
        parent::__construct();

        $this->load->helper('url_helper');
        
        $this->load->library('session');
        $this->load->helper('login'); // Helper desenvolvido para a aplicação

        $this->set_common();

        // Habilita debugger para ambiente de desenvolvimento
        if (ENVIRONMENT == 'development'):
            $this->output->enable_profiler(TRUE);
        endif;
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


    /*
     * Checa se uma seção solicitada no index existe no array de configuração
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

    /*
        Checa se um status existe no array de configuração
    */

        protected function _check_status($id_status_os){
            $os_status_array = $this->get_os_status();

        // var_dump($os_status_array);
            foreach ($os_status_array as $status) {
                if ($status['id_status'] == $id_status_os) {
                    return $status;
                }
            }

            return false;
        }

    /* 
    ========================
     * Gets and Sets
    ======================== 
     */

    /*
    * Configura arrays comuns a toda aplicação
    */

    private function set_common(){
        $this->load->model('system_model');
        
        // Configura seções e status
        //if(empty($this->secoes || empty($this->os_status))){
            $this->secoes = $this->system_model->get_secoes();
            $this->os_status = $this->system_model->get_os_status();
            
        //}

        if(isset($_SESSION)){
            $this->base_controller = $_SESSION['logged_in'];
        }

        // Configura User Interface
        $this->ui['controller'] = $this->base_controller;
        $this->ui['os_menu'] = $this->os_status;
        $this->ui['secoes_menu'] = $this->secoes;
        
    }

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
        return $this->ui;
    }

}
