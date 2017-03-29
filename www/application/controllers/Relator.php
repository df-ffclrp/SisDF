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
        
    }
    /*
     * Painel do relator. Lista chamados
     */
    
    public function index() {
        
        $dados['conteudo'] = $this->load->view('chamados', '' , TRUE);
        
        $this->parser->parse('templates/principal',$dados);
        
    }
    
    public function no_login(){
        echo "não pode logar aqui";
        
    }
    
}
