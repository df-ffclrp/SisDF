<?php
/*
 * Arquivo de Helpers Personalizados
 * 
 * Checa se a sessão existe. Se não existe, redirecina o usuário
 * 
 */

// Checa se cliente está logado
function check_login($user_type) {
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== $user_type):
        
        session_destroy();
        // IMPLEMENTAR REDIRECT
        echo "Precisa estar logado!<br>";
        $url = base_url();
    
        echo '<a href="'.$url.'"> Logar </a>';
        exit();
    endif;
}




