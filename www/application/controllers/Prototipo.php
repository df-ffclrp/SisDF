<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Prototipo extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('parser');
        $this->output->enable_profiler(TRUE);
    }
    
    
    
    public function index() {
        //$this->load->view('common/header');
//		$this->load->view('login');
        echo "indexando";
        //$this->load->view('common/footer');
    }

    /*
     * Protótipo da página de login
     */
    public function login() {
        
        $this->load->view('common/header');
        $this->load->view('prototipo/login');
        $this->load->view('common/js_footer');
        
    }
    
    /*
     * Protótipo do painel do gestor
     */
    
    public function painel() {
        
        $dados['conteudo'] = $this->load->view('chamados', '' , TRUE);
        
        $this->parser->parse('templates/principal',$dados);
        
    }
    

    /*
     * Teste de protótipo de Template
     * Protótipo de abertura de chamado
     */
    
    public function novo_sti() {
           
        
        $dados['conteudo'] = $this->load->view('forms/informatica', '' , TRUE);
        
        $this->parser->parse('templates/principal',$dados);
        
        
    }
}
