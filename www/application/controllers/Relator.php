<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Relator extends MY_Controller {   

    /**
     * Controller para nível de acesso de
     * Relator.
     * 
     * Painel de controle com os acessos:
     * 
     * - Abre chamados
     * - Lista chamados abertos por ele
     */
    
    public function __construct() {
        parent::__construct();
        
        check_login('relator');
        
        $this->load->helper('alert_box'); //custom
    }
    /*
     * Painel do relator. Lista chamados
     */
    
    public function index($area = 'todas') {
        
        
        $to_view['secoes'] = $this->get_secoes();
        
        $to_parser['conteudo'] = $this->load->view('chamados', $to_view , TRUE);
        
        $this->parser->parse('templates/principal',$to_parser);
        
    }
    
    public function no_login(){
        echo "não pode logar aqui";
        
    }
    
}
