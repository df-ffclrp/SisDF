<?php
/*
 * Mostra na do bootstrap o nível do acesso do usuário
 *
 */

function show_user_level() {

    $user_level = $_SESSION['nivel_acesso'];

    $no_underline = str_replace('_',' ',$user_level);

    echo ucwords($no_underline);

}
