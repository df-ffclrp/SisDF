--
-- Dumping data for table `usuario`
--
USE `sisdf`;


INSERT INTO `usuario` (`id_usuario`, `num_usp`, `senha`, `nome`, `email`, `ramal`, `nivel_acesso`, `id_cargo_fk`, `ativo`) VALUES 
(1, '123456', MD5('123'), 'André Luiz Girol', 'tester@email.local', '9988', '3', '2', '1'),
(2, '654312', MD5('123'), 'Docente Carlos', 'dc@email.local', '1122', '3', '1', '1'),
(3, '111111', MD5('123'), 'Relator Fernandes', 'rf@email.local', '1111', '3', '2', '1'),
(4, '999999', MD5('123'), 'Responsável Manutenção', 'dmanut@email.local', '9999', '3', '1', '1'),
(5, '222222', MD5('123'), 'Técnico Manutenção', 'tec_manut@email.local', '2222', '3', '2', '1'),
(6, '889944', MD5('123'), 'Docente Las Neves', 'dn@email.local', '3322', '3', '1', '1');
