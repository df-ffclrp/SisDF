-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 31, 2017 at 04:06 PM
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
-- Dumping data for table `ordem_servico`
--

INSERT INTO `ordem_servico` (`id_os`, `resumo`, `descricao`, `data_abertura`, `data_fechamento`, `last_update`, `id_status_fk`, `id_sala_fk`, `id_usuario_fk`, `id_secao_fk`, `id_finalidade_fk`) VALUES
(1, 'Troca de Lâmpada', 'Mussum Ipsum, cacilds vidis litro abertis. Suco de cevadiss deixa as pessoas mais interessantiss. Em pé sem cair, deitado sem dormir, sentado sem cochilar e fazendo pose. Leite de capivaris, leite de mula manquis. Si u mundo tá muito paradis? Toma um mé que o mundo vai girarzis! ', '2017-02-09 17:24:21', NULL, '2017-02-09 17:24:21', 1, 1, 1, 1, 1),
(2, 'Troca de Reator', 'Mussum Ipsum, cacilds vidis litro abertis. Suco de cevadiss deixa as pessoas mais interessantiss. Em pé sem cair, deitado sem dormir, sentado sem cochilar e fazendo pose. Leite de capivaris, leite de mula manquis. Si u mundo tá muito paradis? Toma um mé que o mundo vai girarzis! ', '2017-02-11 12:01:21', NULL, '2017-02-11 12:01:21', 2, 1, 1, 1, 1),
(3, 'Troca de Tomada', 'Mussum Ipsum, cacilds vidis litro abertis. Suco de cevadiss deixa as pessoas mais interessantiss. Em pé sem cair, deitado sem dormir, sentado sem cochilar e fazendo pose. Leite de capivaris, leite de mula manquis. Si u mundo tá muito paradis? Toma um mé que o mundo vai girarzis! ', '2017-02-22 08:01:01', NULL, '2017-02-22 08:01:01', 3, 1, 1, 1, 1),
(4, 'Refazer Reboco', 'Mussum Ipsum, cacilds vidis litro abertis. Suco de cevadiss deixa as pessoas mais interessantiss. Em pé sem cair, deitado sem dormir, sentado sem cochilar e fazendo pose. Leite de capivaris, leite de mula manquis. Si u mundo tá muito paradis? Toma um mé que o mundo vai girarzis! ', '2017-03-19 14:29:21', NULL, '2017-03-19 14:29:21', 5, 1, 1, 1, 1),
(5, 'Instalação de Disjuntor', 'Mussum Ipsum, cacilds vidis litro abertis. Suco de cevadiss deixa as pessoas mais interessantiss. Em pé sem cair, deitado sem dormir, sentado sem cochilar e fazendo pose. Leite de capivaris, leite de mula manquis. Si u mundo tá muito paradis? Toma um mé que o mundo vai girarzis! ', '2017-03-20 11:32:00', NULL, '2017-03-20 11:32:00', 1, 1, 1, 1, 1);
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
