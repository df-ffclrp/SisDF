<?php


defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Placeholders para formulário de abertura de chamado
 * 
 * Usado no Chamados Controller
 */

$config['manutencao'] = array(
		'resumo' => 'Exemplo: Troca de Lâmpada',
		'descricao' => 'Exemplo: Lâmpada localizada próxima ao bebedouro do bloco 5.',
		'desc_material' => 'Exemplo: Conjunto de 3 reatores.'
);

$config['informatica'] = array(
		'resumo' => 'Exemplo: Computador não liga',
		'descricao' => 'Exemplo: Computador emite sons intermitentes ao ser ligado.',
		'desc_material' => 'Exemplo: Fonte de Alimentação padrão ATX'
);

$config['eletronica'] = array(
		'resumo' => 'Exemplo: Solda de placa integrada',
		'descricao' => 'Exemplo: Reinstalar e refazer solda de 2 capacitores que vazaram na placa.',
		'desc_material' => 'Exemplo: 2 capacitores de 1600 uF'
);

$config['mecanica'] = array(
		'resumo' => 'Exemplo: Engrenagem de Alumínio',
		'descricao' => 'Exemplo: Engrenagem de alumínio para experimento do laboratório X',
		'desc_material' => 'Exemplo: 1 placa de alumínio de 20 x 20cm'
);
