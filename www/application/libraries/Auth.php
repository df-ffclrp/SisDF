<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
Biblioteca Padrão de Autenticação

@author André Luiz Girol / FFCLRP - USP Ribeirão Preto

*/

class Auth {

    private $CI;

    private $roles = [];

    public function __construct() {

        // Pega a instância do CI - super-object
        $this->CI = & get_instance();
        $this->CI->load->model('auth_model');

        $this->roles = $this->CI->auth_model->get_roles();

    }
}
