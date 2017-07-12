-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 12, 2017 at 04:18 PM
-- Server version: 5.7.18-0ubuntu0.16.04.1
-- PHP Version: 7.0.18-0ubuntu0.16.04.1

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
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nome`, `role_desc`) VALUES
(1, 'relator', 'Usuário comum. Abre chamados.'),
(2, 'tecnico', 'Abre e Gerencia Chamados'),
(3, 'gestor_secao', 'Responsável pelo setor técnico de atendimento'),
(4, 'gestor_unidade', 'Monitora chamados de todas as seções de atendimento'),
(5, 'site_admin', 'Gerencia dados do back-end, como roles, salas, funções e novos usuários');
