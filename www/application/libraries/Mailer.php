<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Biblioteca para enviar emails 
 * 
 *
 * @author André Luiz Girol / FFCLRP - USP Ribeirão preto
 *  
 */
class Mailer {

    private $CI;

    public function __construct() {

        // Pega a instância do CI - super-object
        $this->CI = & get_instance();
        $this->CI->load->library('email');
        


        //Carrega Configs Padrão [ COLOCAR ARQUIVO EXTERNO ]
        $this->CI->email->from('robot@girol.com.br', 'Girol Robot');
    }

    /*
     * Envia senha criada em alguma das telas para o usuário
     */

    public function send_pass($password, $recipient) {


        $this->CI->email->subject('Cadastro - TSPanel');

        $message = "Olá,<br>"
                . "<p>Você recebeu este email pois foi cadastrado no sistema TSPanel da ExtremeZP.</p>"
                . "<p>Para começar a utilizar seus redirecionamentos, utilize a senha abaixo:</p>"
                . "=================================<br>"
                . "{$password}<br>"
                . "=================================<br>"
                . "<p>Para realizar login no sistema, utilize o link abaixo:<br>"
                . "{$this->login_url}</p>"
                . "<p>Para logar, utilize o mesmo email que recebeu esta mensagem.<p>"
                . "<p> Essa é uma mensagem automática. <strong>Não responda.</strong></p>";

        $this->CI->email->to($recipient);
        $this->CI->email->message($message);

        $this->CI->email->send();

        echo $this->CI->email->print_debugger();
    }

}