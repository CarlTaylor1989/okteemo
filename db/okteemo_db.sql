-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 02, 2013 at 10:42 PM
-- Server version: 5.5.9
-- PHP Version: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `okteemo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` VALUES(1, 'CarlTaylor1989', 'carltaylor1989@gmail.com', 'wildangel123', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES(2, 'CarlTaylor1989', 'carltaylor1989@gmail.com', '8L5IldfuWEKatgc7ajvQX/sP7nMR8IWbd8vxybrzyo2eoJ/0VvBpyMqwCZGLmNKOjwr2KiYWO7JSo0Zd/hzFSQ==', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES(3, 'Test', 'test@test.com', 'G66koePLFNNgzQUJH6jdc/sJhA+kz8dk4LCRBht3L6xSAxuQA9D3mq3oq3ljmAPt5OAZ3hpPfV4LI4LUSMxKZA==', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES(4, 'test1', 'test1@test.com', 'cRku+26OnHSHHiRY8evkVF1T2AinYvIfhx7Q9GZ7+6fw20xHoFIazkP1YUjkNeksGXjgyZL180xd4opFJpzztw==', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES(5, 'test2', 'test2@test.com', 'BZ2Yqo6wYExM4q4+cOarleK6WT2niJQq4B2PVB09/42vFPYm2stVawy3k0fQ6MvVAKZhFQmRUmEw+MCGADdxyw==', '0000-00-00 00:00:00');
