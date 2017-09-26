--
-- Dumping data for table `usuario`
--
-- Cargos:
--      1 - Docente
--      2 - Funcionário

USE `sisdf`;


INSERT INTO `usuario` (`id_usuario`, `num_usp`, `senha`, `nome`, `email`, `ramal`, `id_cargo_fk`, `ativo`) VALUES
(1, '500', MD5('123'), 'Relator Simples', 'relator@dev.local', '5005', '2', '1'),
-- Manutenção Predial
(2, '100', MD5('123'), 'Técnico Manutenção', 'manut@dev.local', '1000', '2', '1'),
(3, '101', MD5('123'), 'Gestor Manutenção', 'gestor_manut@dev.local', '1001', '1', '1'),
-- Eletrônica
(4, '200', MD5('123'), 'Técnico Eletrônica', 'eletronica@dev.local', '2000', '2', '1'),
(5, '201', MD5('123'), 'Gestor Eletrônica', 'gestor_elet@dev.local', '2001', '1', '1'),
-- Oficina Mecânica
(6, '300', MD5('123'), 'Técnico Mecânica', 'mecanica@dev.local', '3000', '2', '1'),
(7, '301', MD5('123'), 'Gestor Mecânica', 'gestor_mecanica@dev.local', '3001', '1', '1'),
-- Informática
(8, '400', MD5('123'), 'Técnico Informática', 'informatica@dev.local', '4000', '2', '1'),
(9, '401', MD5('123'), 'Gestor Informática', 'gestor_inf@dev.local', '4001', '1', '1'),

-- Gestor da Unidade e outros para teste, adicionar abaixo deste
(10, '1000', MD5('123'), 'Gestor da Unidade', 'gestor_unidade@dev.local', '9999', '2', '1');
