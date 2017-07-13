
<?php
/*
 * Checa nível de acesso do usuário e seta estado de conexão
 *
 * Esse método será melhorado ao longo das versões do software
 *
 * Usado no controller Login.php
 */

private function _grant_user_rights($user_level) {
    switch ($user_level):
        case 1;
            $_SESSION['logged_in'] = 'gestor';
            break;
        case 2;
            $_SESSION['logged_in'] = 'tecnico';
            break;
        case 3;
            $_SESSION['logged_in'] = 'relator';
            break;
        case 4;
            $_SESSION['logged_in'] = 'admin';
            break;
        default:
            session_destroy();
    endswitch;
}
