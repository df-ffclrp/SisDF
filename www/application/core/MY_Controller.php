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

    
/* Deixando seção pré montada para debugs */
//    protected $secoes = array(
//        array(
//            'id_secao' => 'all',
//            'nome_secao' => 'Todas as Áreas',
//            'icone' => 'fa-tasks'
//        )
//    );
    
    protected $secoes = [];

    public function __construct() {
        parent::__construct();

        $this->load->helper('url_helper');
        $this->load->library('parser');
        $this->load->library('session');
        $this->load->helper('login'); // Helper desenvolvido para a aplicação

        $this->set_secoes();

        // Habilita debugger para ambiente de desenvolvimento
        if (ENVIRONMENT == 'development'):
            $this->output->enable_profiler(TRUE);
        endif;
    }

    /*
     * Gets and Sets
     */

    protected function set_secoes() {
        $this->load->model('system_model');
        
        $result = $this->system_model->get_secoes();

        foreach ($result as $secao):

            array_push($this->secoes, $secao);
        endforeach;
    }
    
    protected function get_secoes(){
        return $this->secoes;
    }

}
