/*

DML que vincula foreign keys presentes na tabela 'ordem_servico' que referenciam a mesma chave
presente na tabela usuário

A estratégia é reutilizar aliases para os campos que seriam de cada tipo de usuário diferente,
simulando tabelas virtuais

`rel`.`nome` seria o equivalente a dizer: busque o nome na tabela de relatores (que é a mesma tabela 'usuario')

*/

SELECT `resumo`, `id_relator_fk`,`rel`.`nome` AS `relator`, `id_atendente_fk`, `atd`.`nome` AS `atendente`
FROM `ordem_servico`
JOIN `usuario` AS `rel` ON `rel`.`id_usuario` = `id_relator_fk`
JOIN `usuario` AS `atd` ON `atd`.`id_usuario` = `id_atendente_fk`
WHERE `id_os` = '4' ;