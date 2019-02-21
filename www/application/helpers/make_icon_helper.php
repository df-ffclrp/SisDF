<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
 * Cria um ícone do Font Awesome dentro de uma view
 *
 */

function make_icon($fa_icon = '') {
    return "<i class='fa fa-fw {$fa_icon}'></i>";
}