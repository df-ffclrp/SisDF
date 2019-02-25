<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Valida inputs das urls passadas aos controllers como parâmetros
 */
class Validator
{
    private $CI;
    public function __construct()
    {
        $this->CI = &get_instance();
    }
    /**
     * Verifica se o id passado na URL é numérico ou nulo
     * 
     * Mostra 404 caso não valide
     * 
     * NOTA:
     * Criado aqui um validador, pois, no momento do desenvolvimento desse código,
     * o sistema de rotas do Codeigniter não valida parâmetros de URL.
     * 
     * O sistema de injeção de Dependência no Codeigniter também é muito precário
     * sendo melhor resolver o problema seguindo o design do framework
     * 
     * Embora eu tenha conseguido fazer alguns testes usando rotas, a documentação 
     * explicita que as rotas não são filtros. Trecho abaixo:
     * 
     * Route rules are not filters! Setting a rule of e.g. 
     * 
     * ‘foo/bar/(:num)’ 
     * 
     * will NOT prevent controller Foo and method bar to be called with 
     * a non-numeric value if that is a valid route.
     * 
     */
    public function valida_id($id)
    {
        if (is_null($id) || !is_numeric($id)) {
            show_404();
        }
    }

    /**
     * Checagem extra se a ordem de serviço foi aberta corretamente com os dados:
     * - id_os
     * - id_relator
     * - secao que foi aberta
     * 
     * Alimenta atributo classe com os metadados atuais
     */
    public function valida_metadados_os($id_os)
    {
        // Busca metadados da ordem de serviço
        $os_metadata = $this->CI->chamados_model->get_os_meta($id_os);

        // Se não tem metadados, redireciona...
        if (!$os_metadata) {
            show_404();
        }
        return $os_metadata;
    }
}