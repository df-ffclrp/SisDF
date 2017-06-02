<?php
/*
 * Mostra box com mensagem para o usuário
 * 
 * Cria box dismissable do bootstrap para que ele possa remover na tela
 */

function show_alert_box() {
?>
    <div class="row">
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                <i class="fa fa-times-rectangle fa-fw"></i> 
            </button>
            <?php
            $CI =& get_instance();
            echo $CI->session->flashdata('message');
            ?>
            
        </div>
    </div>

<?php }
