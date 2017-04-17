<?php

defined('BASEPATH') OR exit('No direct script access allowed');

	/*
	 Controller para manipular chamados
	*/

class Chamados extends MY_Controller {

	 public function __construct() {
        parent::__construct();

        $this->load->model('chamados_model');
        // Implementar nível de acesso

     }

     public function index(){
     	echo "chamados index";
     }

     /*
		Mostra uma única ordem de serviço

		Mostra OS que o usuário abriu apenas
     */

     public function ver_os($id_os = null){
     	$os_info = $this->chamados_model->get_os_by_id($id_os);
     	var_dump($os_info);

     	$to_view['os'] = $os_info;
     	$to_parser['conteudo'] = $this->load->view('info_chamado', $to_view, TRUE);
     	$this->parser->parse('templates/principal', $to_parser);
     }
}