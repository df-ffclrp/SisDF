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
USE `sisdf`;
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
