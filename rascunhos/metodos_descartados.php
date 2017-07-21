
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

/*
Verifica se a OS pertence ao usuário que a solicita
No caso, verifica se a OS pertence ao relator


usado anteriormente na model auth_model
*/

public function is_os_owner($id_usuario,$id_os){
    $this->db->select('id_os');
    $this->db->from('ordem_servico');
    $this->db->where('id_relator_fk', $id_usuario);
    $this->db->where('id_os', $id_os);

    $result = $this->db->get();

    if ($result->num_rows() === 1):
        return TRUE;
    else:
        return FALSE;
    endif;

}
