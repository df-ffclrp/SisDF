/*
Arquivo de testes de sql antes de implementar no código
*/
 
-- Testes com usuários que possuem roles mas não estão em nenhuma seção

SELECT `id_usuario`, `num_usp`, `usuario`.`nome`, `email`, `ramal`, `role`.`nome` as `nivel_acesso`, `nome_secao`
FROM `usuario`
JOIN `user_role` ON `usuario_id` = `id_usuario`
JOIN `role` ON `id_role` = `role_id`
LEFT JOIN `membro_secao`ON `id_usuario` = `id_usuario_fk`
LEFT JOIN `secao` ON `id_secao_fk` = `id_secao`
WHERE `usuario`.`num_usp` = '123456'
AND `usuario`.`senha` = '202cb962ac59075b964b07152d234b70'
AND `usuario`.`ativo` = 1 ;
 
 
SELECT `id_usuario`, `num_usp`, `usuario`.`nome`, `email`, `ramal`, `role`.`nome` as `nivel_acesso`
FROM `usuario`
JOIN `user_role` ON `id_role` = `role_id`
JOIN `user_role` ON `usuario_id` =  `id_usuario`
WHERE `usuario`.`num_usp` = '111111'
AND `usuario`.`senha` = '202cb962ac59075b964b07152d234b70'
AND `usuario`.`ativo` = 1 ;

-- Teste simples de joins com duas tabelas

-- SELECT `id_usuario`, `num_usp`, `usuario`.`nome`, `email`, `ramal`, `role_id`.`nome` as `nivel_acesso`
SELECT `id_usuario`, `num_usp`, `usuario`.`nome`, `email`, `ramal`, `role`.`nome` as `nivel_acesso`
FROM `usuario`
JOIN `user_role` ON `usuario_id` = `id_usuario`
JOIN `role` ON `id_role` = `role_id`
WHERE `usuario`.`num_usp` = '123456'
AND `usuario`.`senha` = '202cb962ac59075b964b07152d234b70'
AND `usuario`.`ativo` = 1 ;


-- Busca várias Roles testando o "SELECT 1"

SELECT 1
FROM `role`
WHERE `nome` = 'relweator' ; 


