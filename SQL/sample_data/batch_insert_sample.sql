-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 30, 2017 at 03:30 PM
-- Server version: 5.7.17-0ubuntu0.16.04.1
-- PHP Version: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisdf`
--
USE `sisdf`;

--
-- Dumping data for table `cargo`
--

INSERT INTO `cargo` (`id_cargo`, `nome_cargo`) VALUES
(1, 'Docente'),
(2, 'Funcionário');

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `num_usp`, `senha`, `nome`, `email`, `ramal`, `id_cargo_fk`, `ativo`) VALUES
(1, '500', MD5('dfusp'), 'Relator Simples', 'relator@dev.local', '5005', '2', '1'),
-- Manutenção Predial
(2, '100', MD5('dfusp'), 'Técnico Manutenção', 'manut@dev.local', '1000', '2', '1'),
(3, '101', MD5('dfusp'), 'Gestor Manutenção', 'gestor_manut@dev.local', '1001', '1', '1'),
-- Eletrônica
(4, '200', MD5('dfusp'), 'Técnico Eletrônica', 'eletronica@dev.local', '2000', '2', '1'),
(5, '201', MD5('dfusp'), 'Gestor Eletrônica', 'gestor_elet@dev.local', '2001', '1', '1'),
-- Oficina Mecânica
(6, '300', MD5('dfusp'), 'Técnico Mecânica', 'mecanica@dev.local', '3000', '2', '1'),
(7, '301', MD5('dfusp'), 'Gestor Mecânica', 'gestor_mecanica@dev.local', '3001', '1', '1'),
-- Informática
(8, '400', MD5('dfusp'), 'Técnico Informática', 'informatica@dev.local', '4000', '2', '1'),
(9, '401', MD5('dfusp'), 'Gestor Informática', 'gestor_inf@dev.local', '4001', '1', '1'),

-- Gestor da Unidade e outros para teste, adicionar abaixo deste
(10, '1000', MD5('dfusp'), 'Gestor da Unidade', 'gestor_unidade@dev.local', '9999', '2', '1');

--
-- Dumping data for table `sala`
--

INSERT INTO `sala` (`id_sala`, `num_sala`, `nome`, `ativo`) VALUES
(1, 220, 'Laboratório de Análises', 1),
(2, 256, 'Laboratório de Medições', 1),
(3, 335, 'Auditório 1', 1);

--
-- Dumping data for table `secao`
--


INSERT INTO `secao` (`id_secao`, `nome_secao`, `icone`, `alias`) VALUES
(1, 'Manutenção Predial', 'fa-building', 'manutencao'),
(2, 'Eletrônica', 'fa-microchip', 'eletronica'),
(3, 'Oficina Mecânica', 'fa-cog', 'mecanica'),
(4, 'Informática', 'fa-desktop', 'informatica');
--
-- Dumping data for table `finalidade`
--

INSERT INTO `finalidade` (`id_finalidade`, `descricao`) VALUES
(1, 'Projetos Didáticos'),
(2, 'Projetos de Pesquisa'),
(3, 'Projetos de Laboratório'),
(4, 'Departamento');

--
-- Dumping data for table `os_status`
--

INSERT INTO `os_status` (`id_status`, `nome_status`, `alias`, `bs_label` , `icone`) VALUES
(1, 'Aberto', 'aberto', 'default', 'fa-circle-o' ),
(2, 'Em Atendimento', 'em_atendimento', 'info' , 'fa-circle'),
(3, 'Atendido', 'atendido', 'success' , 'fa-check-circle'),
(4, 'Retorno', 'retorno', 'danger' , 'fa-exclamation-circle');

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nome`, `role_desc`) VALUES
(1, 'relator', 'Usuário comum. Abre chamados.'),
(2, 'tecnico', 'Abre e Gerencia Chamados'),
(3, 'gestor_secao', 'Responsável pelo setor técnico de atendimento'),
(4, 'gestor_unidade', 'Monitora chamados de todas as seções de atendimento'),
(5, 'site_admin', 'Gerencia dados do back-end, como roles, salas, funções e novos usuários');



-- SOMENTE ADICIONAR APÓS OS ANTERIORES

--
-- Dumping data for table `resp_sala`
--

INSERT INTO `resp_sala` (`id_resp_fk`, `id_sala_fk`) VALUES
(2, 1),
(3, 1);

--
-- Dumping data for table `user_role`
--
-- Tabela de autorização dos usuários
INSERT INTO `user_role` (`usuario_id`, `role_id`) VALUES
(1, 1),
-- Manutenção
(2, 2),
(3, 3),
-- Eletronica
(4, 2),
(5, 3),
-- Mecânica
(6, 2),
(7, 3),
-- Informática
(8, 2),
(9, 3),
-- Gestor Unidade
(10, 4);

--
-- Dumping data for table `membro_secao`
--

INSERT INTO `membro_secao` (`id_usuario_fk` , `id_secao_fk`) VALUES
-- Manutenção
(2, 1),
(3, 1),
-- Eletronica
(4, 2),
(5, 2),
-- Mecânica
(6, 3),
(7, 3),
-- Informática
(8, 4),
(9, 4);



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
