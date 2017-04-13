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

--
-- Dumping data for table `usuario`
--

USE `sisdf`;


INSERT INTO `usuario` (`id_usuario`, `num_usp`, `senha`, `nome`, `email`, `ramal`, `nivel_acesso`, `ativo`) VALUES 
(NULL, '123456', MD5('123'), 'André Luiz Girol', 'tester@email.local', '9988', '3', '1');

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

INSERT INTO `secao` (`id_secao`, `nome_secao`, `icone`) VALUES
(1, 'Manutenção Predial', 'fa-building'),
(2, 'Eletrônica', 'fa-microchip'),
(3, 'Oficina Mecânica', 'fa-cog'),
(4, 'Informática', 'fa-desktop');

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
(1, 'Aberto', 'aberto', 'default', 'circle-o' ),
(2, 'Em Atendimento', 'em_atendimento', 'info' , 'circle'),
(3, 'Atendido', 'atendido', 'success' , 'check-circle'),
(4, 'Retorno', 'retorno', 'danger' , 'exclamation-circle');

--
-- Dumping data for table `ordem_servico`
--

INSERT INTO `ordem_servico` (`id_os`, `resumo`, `descricao`, `data_abertura`, `data_fechamento`, `last_update`, `id_status_fk`, `id_sala_fk`, `id_usuario_fk`, `id_secao_fk`, `id_finalidade_fk`) VALUES
(1, 'Troca de Lâmpada', 'Mussum Ipsum, cacilds vidis litro abertis. Suco de cevadiss deixa as pessoas mais interessantiss. Em pé sem cair, deitado sem dormir, sentado sem cochilar e fazendo pose. Leite de capivaris, leite de mula manquis. Si u mundo tá muito paradis? Toma um mé que o mundo vai girarzis! ', '2017-02-09 17:24:21', NULL, '2017-02-09 17:24:21', 1, 1, 1, 1, 1),
(2, 'Troca de Reator', 'Mussum Ipsum, cacilds vidis litro abertis. Suco de cevadiss deixa as pessoas mais interessantiss. Em pé sem cair, deitado sem dormir, sentado sem cochilar e fazendo pose. Leite de capivaris, leite de mula manquis. Si u mundo tá muito paradis? Toma um mé que o mundo vai girarzis! ', '2017-02-11 12:01:21', NULL, '2017-02-11 12:01:21', 2, 1, 1, 1, 1),
(3, 'Troca de Tomada', 'Mussum Ipsum, cacilds vidis litro abertis. Suco de cevadiss deixa as pessoas mais interessantiss. Em pé sem cair, deitado sem dormir, sentado sem cochilar e fazendo pose. Leite de capivaris, leite de mula manquis. Si u mundo tá muito paradis? Toma um mé que o mundo vai girarzis! ', '2017-02-22 08:01:01', NULL, '2017-02-22 08:01:01', 3, 1, 1, 1, 1),
(4, 'Refazer Reboco', 'Mussum Ipsum, cacilds vidis litro abertis. Suco de cevadiss deixa as pessoas mais interessantiss. Em pé sem cair, deitado sem dormir, sentado sem cochilar e fazendo pose. Leite de capivaris, leite de mula manquis. Si u mundo tá muito paradis? Toma um mé que o mundo vai girarzis! ', '2017-03-19 14:29:21', NULL, '2017-03-19 14:29:21', 4, 1, 1, 1, 1),
(5, 'Instalação de Disjuntor', 'Mussum Ipsum, cacilds vidis litro abertis. Suco de cevadiss deixa as pessoas mais interessantiss. Em pé sem cair, deitado sem dormir, sentado sem cochilar e fazendo pose. Leite de capivaris, leite de mula manquis. Si u mundo tá muito paradis? Toma um mé que o mundo vai girarzis! ', '2017-03-20 11:32:00', NULL, '2017-03-20 11:32:00', 1, 1, 1, 1, 1);


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
