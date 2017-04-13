<?php
/*
Arquivo de métodos criados anteriormente, mas que podem vir a calhar depois


*/


// ======== Serão substituídos por AJAX ==============

    /*
     * Agrupa as Ordem de serviço por status
     * colocando no container gerado no outro método
     * 
     */

    private function _group_by_status($result_array,$container) {

        foreach ($result_array as $indice => $os){

            array_push($container[$os['status_alias']], $os);
            unset($result_array[$indice]); //Limpando memória

        }        
        
        return $container;
    }

    /*
     * Cria um container utilizando os alias cadastrados no banco
     * 
     * Serve para agrupar as Ordens de Serviço e mostrá-las na View
     * 
     * Formato de saída:
     * 
     * $os_container = array(
     *      status1 => []
     *      status2 => []
     *      status3 => []
     * );
     */

    private function _make_os_container($array_status) {

        $os_container = [];
        foreach ($array_status as $status) {

            $os_container[$status['alias']] = [];
            
        }
        
        return $os_container;
    }