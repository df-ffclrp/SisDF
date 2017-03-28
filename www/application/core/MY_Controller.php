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


    public function __construct() {
        parent::__construct();

        $this->load->helper('url_helper');
        $this->load->library('parser');
        $this->load->library('session');
        //$this->load->helper('login'); // Helper desenvolvido para a aplicação


        
        // Habilita debugger para ambiente de desenvolvimento
        if (ENVIRONMENT == 'development'):
            $this->output->enable_profiler(TRUE);
        endif;
    }
}