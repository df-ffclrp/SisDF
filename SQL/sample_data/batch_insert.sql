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
(1, '123456', MD5('123'), 'André Luiz Girol', 'tester@email.local', '9988',  '2', '1'),
(2, '654312', MD5('123'), 'Docente Carlos', 'dc@email.local', '1122', '1', '1'),
(3, '111111', MD5('123'), 'Relator Fernandes', 'rf@email.local', '1111',  '2', '1'),
(4, '999999', MD5('123'), 'Responsável Manutenção', 'dmanut@email.local', '9999', '1', '1'),
(5, '222222', MD5('123'), 'Técnico Manutenção', 'tec_manut@email.local', '2222', '2', '1'),
(6, '889944', MD5('123'), 'Docente Las Neves', 'dn@email.local', '3322', '1', '1');

--
-- Dumping data for table `sala`
--

INSERT INTO `sala` (`id_sala`, `num_sala`, `nome`, `ativo`) VALUES
(1, 220, 'Laboratório de Análises', 1),
(2, 256, 'Laboratório de Medições', 1),
(3, 335, 'Sala FAMB', 1);

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
(1, 'Projetos Didátidos'),
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

INSERT INTO `user_role` (`usuario_id`, `role_id`) VALUES
(3, 1),
(1, 2),
(1, 5);

--
-- Dumping data for table `ordem_servico`
--

INSERT INTO `ordem_servico` (
	`id_os`,
	`id_relator_fk`,
	`resumo`,
	`descricao`,
	`data_abertura`,
	`data_fechamento`,
	`last_update`,
	`id_atendente_fk`,
	`id_resp_secao_fk`,
	`id_resp_sala_fk`,
	`id_status_fk`,
	`id_sala_fk`,
	`id_secao_fk`,
	`id_finalidade_fk`) VALUES

(NULL, '3', 'Troca de Lâmpada', 'Trocar lâmpada próxima à porta', '2017-04-04 08:21:47', NULL, '2017-04-04 08:21:47', '5', '4', '1', '1', '2', '1', '4');



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
