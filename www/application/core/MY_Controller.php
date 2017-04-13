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

   
    protected $secoes = [];
    protected $os_status = [];

    public function __construct() {
        parent::__construct();

        $this->load->helper('url_helper');
        $this->load->library('parser');
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
    ========================
     * Gets and Sets
    ======================== 
     */

    /*
    * Configura arrays comuns a toda aplicação
    */

    private function set_common(){
        $this->load->model('system_model');
        
        // Configura seções
        $this->secoes = $this->system_model->get_secoes();
        $this->os_status = $this->system_model->get_os_status();

    }

   
    protected function get_secoes(){
        return $this->secoes;
    }

    protected function get_os_status(){
        return $this->os_status;
    }

}
