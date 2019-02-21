<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Cria um var_dump() e sai do script, parecido com o dd() do Laravel
 * @param mixed $minha_var - Variável a ser "dumpeada"
 */

function dd($minha_var){
    var_dump($minha_var);
    exit('Realizado Dump no Helper');
}