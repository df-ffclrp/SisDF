<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
 * Mostra box com mensagem para o usuário
 *
 * Cria box dismissable do bootstrap para que ele possa remover na tela
 */

function show_alert_box() {

    $type = 'success';
    $CI =& get_instance();

    if(isset($_SESSION['warn_level'])){
        $type = $CI->session->flashdata('warn_level');
    }

?>
    <div class="row">
        <div class="alert alert-<?= $type ?> alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                <i class="fa fa-times-rectangle fa-fw"></i>
            </button>
            <?php
                echo $CI->session->flashdata('message');
            ?>
        </div>
    </div>

<?php }
