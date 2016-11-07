-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2016 at 01:44 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shephered`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `students` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`, `students`) VALUES
(1, 's1', 0),
(2, 's2', 0),
(3, 's3', 0),
(4, 's4', 0),
(5, 's5', 0),
(6, 's6', 0);

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL,
  `topicid` int(11) NOT NULL,
  `subtopic` int(11) NOT NULL,
  `classid` int(11) NOT NULL,
  `termid` int(11) NOT NULL,
  `theoryid` int(11) NOT NULL,
  `quizid` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(20) NOT NULL,
  `updated` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fileclicks`
--

CREATE TABLE `fileclicks` (
  `id1` int(3) NOT NULL,
  `docid` int(3) NOT NULL,
  `user` varchar(100) NOT NULL,
  `number` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fileclicks`
--

INSERT INTO `fileclicks` (`id1`, `docid`, `user`, `number`, `date`) VALUES
(1, 3, '0', 1, '2016-04-26 14:43:20'),
(2, 3, '0', 1, '2016-04-26 14:43:38'),
(3, 3, 'jwaiswa', 7, '2016-04-28 08:50:14'),
(4, 6, 'eorach', 2, '2016-04-26 17:58:24'),
(5, 3, 'eorach', 2, '2016-04-29 22:41:52'),
(6, 8, 'eorach', 3, '2016-05-02 11:31:42'),
(7, 4, 'eorach', 1, '2016-04-26 17:59:46'),
(8, 8, 'morach', 1, '2016-04-27 13:26:32'),
(9, 4, 'morach', 1, '2016-04-27 13:39:03'),
(10, 6, 'jwaiswa', 2, '2016-05-02 16:50:15'),
(11, 3, 'morach', 1, '2016-04-28 18:59:44'),
(12, 4, 'jwaiswa', 5, '2016-05-02 16:50:51'),
(13, 8, 'jwaiswa', 1, '2016-04-29 22:34:22'),
(14, 9, 'morach', 1, '2016-05-07 15:05:33'),
(15, 9, 'jwaiswa', 4, '2016-09-14 12:32:52'),
(16, 6, 'morach', 1, '2016-05-13 23:05:38'),
(17, 9, 'cmayanja', 3, '2016-05-18 22:12:41'),
(18, 9, '0', 1, '2016-05-23 13:30:32'),
(19, 9, 'gnankya', 11, '2016-10-31 13:13:03'),
(20, 10, 'gnankya', 5, '2016-10-31 14:23:14'),
(21, 11, 'gnankya', 1, '2016-10-20 13:05:18'),
(22, 14, 'gnankya', 3, '2016-10-20 16:31:56'),
(23, 15, 'gnankya', 2, '2016-10-31 14:22:54'),
(24, 3, 'gnankya', 3, '2016-10-27 12:40:42'),
(25, 2, 'gnankya', 2, '2016-10-30 13:41:59'),
(26, 4, 'gnankya', 1, '2016-10-27 12:44:30'),
(27, 5, 'gnankya', 1, '2016-10-31 10:47:55'),
(28, 6, 'gnankya', 11, '2016-11-07 10:07:02'),
(29, 13, 'gnankya', 3, '2016-10-31 14:23:02'),
(30, 17, 'gnankya', 1, '2016-10-31 14:22:45'),
(31, 16, 'gnankya', 1, '2016-10-31 14:22:49'),
(32, 12, 'gnankya', 1, '2016-10-31 14:23:06'),
(33, 8, 'gnankya', 1, '2016-10-31 14:23:17'),
(34, 18, 'gnankya', 1, '2016-10-31 14:24:07'),
(35, 19, 'gnankya', 1, '2016-10-31 14:24:12'),
(36, 20, 'gnankya', 1, '2016-10-31 14:24:18'),
(37, 21, 'gnankya', 2, '2016-11-01 11:37:15'),
(38, 22, 'gnankya', 2, '2016-11-01 11:38:42'),
(39, 7, 'gnankya', 2, '2016-11-07 10:06:55'),
(40, 23, 'gnankya', 2, '2016-11-01 23:21:26'),
(41, 30, 'gnankya', 1, '2016-11-01 23:14:46'),
(42, 29, 'gnankya', 1, '2016-11-01 23:14:50'),
(43, 24, 'gnankya', 2, '2016-11-01 23:21:53'),
(44, 25, 'gnankya', 1, '2016-11-01 23:21:31'),
(45, 28, 'gnankya', 1, '2016-11-01 23:21:43'),
(46, 27, 'gnankya', 1, '2016-11-01 23:22:02'),
(47, 26, 'gnankya', 1, '2016-11-01 23:22:39');

-- --------------------------------------------------------

--
-- Table structure for table `query_replies`
--

CREATE TABLE `query_replies` (
  `id` int(11) NOT NULL,
  `qtn_id` int(11) NOT NULL,
  `roleid` int(3) NOT NULL,
  `reply` varchar(800) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `query_replies`
--

INSERT INTO `query_replies` (`id`, `qtn_id`, `roleid`, `reply`, `created`) VALUES
(1, 1, 2, 'Good question\n<br>Let me find out, will get back to you in the next lesson... ', '2016-05-17 01:46:29'),
(2, 1, 1, 'Thanks, will remind you. ', '2016-05-17 01:47:11'),
(3, 2, 2, 'Thanks for asking David', '2016-05-18 16:41:37'),
(4, 2, 2, 'This is another response', '2016-05-18 19:09:55');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `titleid` int(11) DEFAULT NULL,
  `question` varchar(200) DEFAULT NULL,
  `options` varchar(2000) DEFAULT NULL,
  `correct_answer` varchar(200) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `titleid`, `question`, `options`, `correct_answer`, `weight`) VALUES
(1, 1, 'Radiocarbon is produced in the atmosphere as a result of', 'collision between fast neutrons and nitrogen nuclei present in the atmosphere:\r\naction of ultraviolet light from the sun on atmospheric oxygen:\r\naction of solar radiations particularly cosmic rays on:\r\nlightning discharge in atmosphere', 'collision between fast neutrons and nitrogen nuclei present in the atmosphere', 3),
(2, 1, 'It is easier to roll a stone up a sloping road than to lift it vertical upwards because', 'work done in rolling is more than in lifting:\r\nwork done in lifting the stone is equal to rolling it:\r\nwork done in both is same but the rate of doing work is less in rolling:\r\nwork done in rolling a stone is less than in lifting it', 'work done in rolling a stone is less than in lifting it', 2),
(3, 1, 'The absorption of ink by blotting paper involves', 'viscosity of ink:\r\ncapillary action phenomenon:\r\ndiffusion of ink through the blotting:\r\nsiphon action', 'capillary action phenomenon', 5),
(4, 1, 'Siphon will fail to work if', 'the densities of the liquid in the two vessels are equal:\r\nthe level of the liquid in the two vessels are at the same height:\r\nboth its limbs are of unequal length:\r\nthe temperature of the liquids in the two vessels are the same', 'the level of the liquid in the two vessels are at the same height', 3),
(5, 1, ' Large transformers, when used for some time, become very hot and are cooled by circulating oil. The heating of the transformer is due to', 'the heating effect of current alone:\r\nhysteresis loss alone:\r\nboth the heating effect of current and hysteresis loss:\r\nintense sunlight at noon', 'both the heating effect of current and hysteresis loss', 5),
(6, 1, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(8, 1, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(10, 1, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(12, 1, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(14, 1, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(16, 1, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(18, 1, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(20, 1, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(21, 2, NULL, NULL, NULL, NULL),
(22, 1, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(23, 2, NULL, NULL, NULL, NULL),
(24, 1, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(25, 2, NULL, NULL, NULL, NULL),
(26, 1, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(27, 2, NULL, NULL, NULL, NULL),
(28, 1, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(29, 2, NULL, NULL, NULL, NULL),
(30, 1, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(31, 2, NULL, NULL, NULL, NULL),
(32, 1, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(33, 2, NULL, NULL, NULL, NULL),
(34, 1, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(35, 2, NULL, NULL, NULL, NULL),
(36, 1, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(37, 2, NULL, NULL, NULL, NULL),
(38, 1, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(39, 2, NULL, NULL, NULL, NULL),
(40, 1, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(41, 2, NULL, NULL, NULL, NULL),
(42, 1, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(43, 2, NULL, NULL, NULL, NULL),
(44, 1, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(45, 2, NULL, NULL, NULL, NULL),
(46, 1, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(47, 2, NULL, NULL, NULL, NULL),
(48, 1, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(49, 2, NULL, NULL, NULL, NULL),
(50, 1, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(51, 2, NULL, NULL, NULL, NULL),
(52, 1, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(53, 2, NULL, NULL, NULL, NULL),
(54, 1, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(55, 2, NULL, NULL, NULL, NULL),
(56, 1, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(57, 2, NULL, NULL, NULL, NULL),
(58, 1, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(59, 2, NULL, NULL, NULL, NULL),
(60, 1, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(61, 2, NULL, NULL, NULL, NULL),
(62, 1, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(63, 2, NULL, NULL, NULL, NULL),
(64, 1, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(65, 2, NULL, NULL, NULL, NULL),
(66, 1, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(67, 2, NULL, NULL, NULL, NULL),
(68, 1, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(69, 2, NULL, NULL, NULL, NULL),
(70, 1, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(71, 2, NULL, NULL, NULL, NULL),
(72, 1, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(73, 2, NULL, NULL, NULL, NULL),
(74, 1, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(75, 2, NULL, NULL, NULL, NULL),
(76, 1, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(77, 2, NULL, NULL, NULL, NULL),
(78, 1, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(79, 2, NULL, NULL, NULL, NULL),
(80, 1, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(81, 2, NULL, NULL, NULL, NULL),
(82, 1, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(83, 2, NULL, NULL, NULL, NULL),
(84, 1, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys', NULL),
(133, 3, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(134, 0, NULL, NULL, NULL, NULL),
(135, 3, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(136, 0, NULL, NULL, NULL, NULL),
(137, 3, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(138, 0, NULL, NULL, NULL, NULL),
(139, 3, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(140, 0, NULL, NULL, NULL, NULL),
(141, 3, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(142, 0, NULL, NULL, NULL, NULL),
(143, 3, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(144, 0, NULL, NULL, NULL, NULL),
(145, 3, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(146, 0, NULL, NULL, NULL, NULL),
(147, 3, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(148, 0, NULL, NULL, NULL, NULL),
(149, 3, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(150, 0, NULL, NULL, NULL, NULL),
(151, 3, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(152, 0, NULL, NULL, NULL, NULL),
(153, 3, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(154, 0, NULL, NULL, NULL, NULL),
(155, 3, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(156, 0, NULL, NULL, NULL, NULL),
(157, 3, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(158, 0, NULL, NULL, NULL, NULL),
(159, 3, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(160, 0, NULL, NULL, NULL, NULL),
(161, 3, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(162, 0, NULL, NULL, NULL, NULL),
(163, 3, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(164, 0, NULL, NULL, NULL, NULL),
(165, 3, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(166, 0, NULL, NULL, NULL, NULL),
(167, 3, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(168, 0, NULL, NULL, NULL, NULL),
(169, 3, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(170, 0, NULL, NULL, NULL, NULL),
(171, 3, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(172, 0, NULL, NULL, NULL, NULL),
(173, 3, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(174, 0, NULL, NULL, NULL, NULL),
(175, 3, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(176, 0, NULL, NULL, NULL, NULL),
(177, 3, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(178, 0, NULL, NULL, NULL, NULL),
(179, 3, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(180, 0, NULL, NULL, NULL, NULL),
(181, 3, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(182, 0, NULL, NULL, NULL, NULL),
(183, 3, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(184, 0, NULL, NULL, NULL, NULL),
(185, 3, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(186, 0, NULL, NULL, NULL, NULL),
(187, 3, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(188, 0, NULL, NULL, NULL, NULL),
(189, 3, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(190, 0, NULL, NULL, NULL, NULL),
(191, 3, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(192, 0, NULL, NULL, NULL, NULL),
(193, 3, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(194, 0, NULL, NULL, NULL, NULL),
(195, 3, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(196, 0, NULL, NULL, NULL, NULL),
(197, 3, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(198, 0, NULL, NULL, NULL, NULL),
(199, 3, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(200, 0, NULL, NULL, NULL, NULL),
(201, 3, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(202, 0, NULL, NULL, NULL, NULL),
(203, 3, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(204, 0, NULL, NULL, NULL, NULL),
(205, 3, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(206, 0, NULL, NULL, NULL, NULL),
(207, 3, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(208, 0, NULL, NULL, NULL, NULL),
(209, 3, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(210, 0, NULL, NULL, NULL, NULL),
(211, 3, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys', NULL),
(260, 1, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(261, 0, NULL, NULL, NULL, NULL),
(262, 1, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(263, 0, NULL, NULL, NULL, NULL),
(264, 1, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(265, 0, NULL, NULL, NULL, NULL),
(266, 1, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(267, 0, NULL, NULL, NULL, NULL),
(268, 1, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(269, 0, NULL, NULL, NULL, NULL),
(270, 1, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(271, 0, NULL, NULL, NULL, NULL),
(272, 1, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(273, 0, NULL, NULL, NULL, NULL),
(274, 1, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(275, 0, NULL, NULL, NULL, NULL),
(276, 1, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(277, 0, NULL, NULL, NULL, NULL),
(278, 1, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(279, 0, NULL, NULL, NULL, NULL),
(280, 1, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(281, 0, NULL, NULL, NULL, NULL),
(282, 1, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(283, 0, NULL, NULL, NULL, NULL),
(284, 1, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(285, 0, NULL, NULL, NULL, NULL),
(286, 1, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(287, 0, NULL, NULL, NULL, NULL),
(288, 1, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(289, 0, NULL, NULL, NULL, NULL),
(290, 1, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(291, 0, NULL, NULL, NULL, NULL),
(292, 1, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(293, 0, NULL, NULL, NULL, NULL),
(294, 1, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(295, 0, NULL, NULL, NULL, NULL),
(296, 1, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(297, 0, NULL, NULL, NULL, NULL),
(298, 1, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(299, 0, NULL, NULL, NULL, NULL),
(300, 1, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(301, 0, NULL, NULL, NULL, NULL),
(302, 1, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(303, 0, NULL, NULL, NULL, NULL),
(304, 1, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(305, 0, NULL, NULL, NULL, NULL),
(306, 1, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(307, 0, NULL, NULL, NULL, NULL),
(308, 1, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(309, 0, NULL, NULL, NULL, NULL),
(310, 1, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(311, 0, NULL, NULL, NULL, NULL),
(312, 1, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(313, 0, NULL, NULL, NULL, NULL),
(314, 1, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(315, 0, NULL, NULL, NULL, NULL),
(316, 1, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(317, 0, NULL, NULL, NULL, NULL),
(318, 1, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(319, 0, NULL, NULL, NULL, NULL),
(320, 1, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(321, 0, NULL, NULL, NULL, NULL),
(322, 1, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(323, 0, NULL, NULL, NULL, NULL),
(324, 1, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(325, 0, NULL, NULL, NULL, NULL),
(326, 1, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(327, 0, NULL, NULL, NULL, NULL),
(328, 1, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(329, 0, NULL, NULL, NULL, NULL),
(330, 1, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(331, 0, NULL, NULL, NULL, NULL),
(332, 1, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(333, 0, NULL, NULL, NULL, NULL),
(334, 1, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys\r', NULL),
(335, 0, NULL, NULL, NULL, NULL),
(336, 1, 'Science is the study of living and non living things', 'true:false', 'true\r', NULL),
(337, 0, NULL, NULL, NULL, NULL),
(338, 1, 'All the following are physicists except', 'Netwon:Bohr:Archimedes:Heys', 'Heys', NULL),
(339, 2, 'The sum of 2 and 3 is?', '5:6:7:8', '5\r', NULL),
(340, 0, NULL, NULL, NULL, NULL),
(341, 2, 'what is soil?', 'top most material on the earthâ€™s surface and constitutes the outer most layer of the earthâ€™s crust:to the top most material on the earthâ€™s surface and constitutes the inner most layer of the earthâ€™s crust', 'to the top most material on the earthâ€™s surface and constitutes the outer most layer of the earthâ€™s crust', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_answers`
--

CREATE TABLE `quiz_answers` (
  `id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `qtn_id` int(11) NOT NULL,
  `participant` varchar(50) DEFAULT NULL,
  `answer` varchar(1000) DEFAULT NULL,
  `attempt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_answers`
--

INSERT INTO `quiz_answers` (`id`, `quiz_id`, `qtn_id`, `participant`, `answer`, `attempt`) VALUES
(1, 1, 1, 'morach', 'collision between fast neutrons and nitrogen nuclei present in the atmosphere', 1),
(2, 1, 2, 'morach', '\r\nwork done in both is same but the rate of doing work is less in rolling', 1),
(3, 1, 3, 'morach', '\r\ncapillary action phenomenon', 1),
(4, 1, 4, 'morach', '\r\nthe level of the liquid in the two vessels are at the same height', 1),
(5, 1, 5, 'morach', '\r\nboth the heating effect of current and hysteresis loss', 1),
(6, 1, 1, 'eorach', '\r\naction of ultraviolet light from the sun on atmospheric oxygen', 1),
(7, 1, 2, 'eorach', '\r\nwork done in both is same but the rate of doing work is less in rolling', 1),
(8, 1, 3, 'eorach', '\r\nsiphon action', 1),
(9, 1, 4, 'eorach', '\r\nthe level of the liquid in the two vessels are at the same height', 1),
(10, 1, 5, 'eorach', '\r\nhysteresis loss alone', 1),
(11, 1, 1, 'sdavid', 'collision between fast neutrons and nitrogen nuclei present in the atmosphere', 1),
(12, 1, 2, 'sdavid', '\r\nwork done in lifting the stone is equal to rolling it', 1),
(13, 1, 3, 'sdavid', '\r\ndiffusion of ink through the blotting', 1),
(14, 1, 4, 'sdavid', '\r\nboth its limbs are of unequal length', 1),
(15, 1, 5, 'sdavid', '\r\nboth the heating effect of current and hysteresis loss', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_general`
--

CREATE TABLE `quiz_general` (
  `id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `duration` varchar(50) DEFAULT NULL,
  `start_time` varchar(50) DEFAULT NULL,
  `class` varchar(10) DEFAULT NULL,
  `subtopic` varchar(100) NOT NULL,
  `topic` varchar(100) NOT NULL,
  `level` varchar(50) NOT NULL,
  `weight` varchar(50) DEFAULT NULL,
  `year` varchar(50) DEFAULT NULL,
  `term` varchar(50) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `num_of_qtns` int(11) DEFAULT NULL,
  `createdby` varchar(50) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `date` date NOT NULL,
  `tot_mark` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_general`
--

INSERT INTO `quiz_general` (`id`, `title`, `duration`, `start_time`, `class`, `subtopic`, `topic`, `level`, `weight`, `year`, `term`, `status`, `num_of_qtns`, `createdby`, `subject`, `date`, `tot_mark`, `active`) VALUES
(1, 'Sample version two quiz', NULL, NULL, 'Senior 1', 'moles', 'Magnetism', 'O-Level', '1', NULL, 'Term I', NULL, 20, 'gnankya', '1', '0000-00-00', 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_scores`
--

CREATE TABLE `quiz_scores` (
  `id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `score` int(3) NOT NULL,
  `attempt` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_scores`
--

INSERT INTO `quiz_scores` (`id`, `quiz_id`, `user`, `score`, `attempt`, `date`) VALUES
(1, 1, 'morach', 89, 1, '2016-05-17 02:53:06'),
(2, 1, 'eorach', 17, 1, '2016-05-17 02:53:54'),
(3, 1, 'sdavid', 44, 1, '2016-05-18 20:39:39');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'student'),
(2, 'teacher'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `current_year` varchar(20) DEFAULT NULL,
  `current_term` varchar(20) DEFAULT NULL,
  `createdby` varchar(50) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `current_year`, `current_term`, `createdby`, `created`) VALUES
(1, '2015', 'III', 'gnankya', '2015-05-07 06:17:12');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `level` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`, `level`) VALUES
(1, 'physics', NULL),
(2, 'chemistry', NULL),
(3, 'biology', NULL),
(4, 'mathematics', NULL),
(5, 'computer studies', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subtopic`
--

CREATE TABLE `subtopic` (
  `id` int(11) NOT NULL,
  `topicid` int(11) NOT NULL,
  `subtopic` varchar(100) NOT NULL,
  `class` varchar(10) NOT NULL,
  `term` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_student_querries`
--

CREATE TABLE `teacher_student_querries` (
  `id` int(11) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `receipient` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `author_class` varchar(10) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `topic` varchar(200) DEFAULT NULL,
  `subject` int(3) NOT NULL,
  `year` varchar(20) DEFAULT NULL,
  `term` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_student_querries`
--

INSERT INTO `teacher_student_querries` (`id`, `question`, `receipient`, `author`, `author_class`, `created`, `topic`, `subject`, `year`, `term`) VALUES
(1, 'What is the temperature of boiling water on mt Rwenzori', 'morach', 'eorach', 's6', '2016-05-17 01:43:25', 'Pressure', 1, '2015', 'III'),
(2, 'This is a test question on Magnetism', 'cmayanja', 'sdavid', 's6', '2016-05-18 16:40:25', 'Magnetism', 1, '2015', 'III');

-- --------------------------------------------------------

--
-- Table structure for table `theory`
--

CREATE TABLE `theory` (
  `id` int(11) NOT NULL,
  `upload` varchar(100) DEFAULT NULL,
  `subjectid` int(11) DEFAULT NULL,
  `topic` varchar(50) DEFAULT NULL,
  `subtopic` varchar(100) NOT NULL,
  `level` varchar(20) NOT NULL,
  `class` varchar(50) NOT NULL,
  `term` varchar(30) NOT NULL,
  `content` varchar(1000) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `clicked` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theory`
--

INSERT INTO `theory` (`id`, `upload`, `subjectid`, `topic`, `subtopic`, `level`, `class`, `term`, `content`, `category`, `clicked`) VALUES
(5, 'Refraction_senior_five.pdf', 1, 'Light', 'refraction', 'A-Level', 'senior 5', 'Term I', 'Simple description of the upload', 'notes', 1),
(6, 'NEWTONS LAWS OF MOTION.pdf', 1, 'Mechanics and properties of matter', 'Newton''s laws of motion', 'A-Level', 'senior 5', 'Term I', 'Simple description of the upload', 'notes', 16),
(7, 'SOLID FRICTION.pdf', 1, 'Mechanics and properties of matter', 'Solid friction', 'A-Level', 'senior 5', 'Term I', 'solid friction', 'notes', 2),
(8, 'UNIFORM MOTION IN A CIRCLE.pdf', 1, 'Mechanics and properties of matter', 'circular motion', 'A-Level', 'senior 5', 'Term I', 'Simple description of the upload', 'notes', 6),
(9, 'NUCLEAR PHYSICS.pdf', 1, 'atomic and nuclear physics', 'nuclear physics', 'A-Level', 'senior 6', 'Term III', 'Simple description of the upload', 'notes', 20),
(10, 'QUANTUM THEORY.pdf', 1, 'atomic and nuclear physics', 'quantum theory', 'A-Level', 'senior 6', 'Term III', 'Simple description of the upload', 'notes', 5),
(11, 'RADIOACTIVITY.pdf', 1, 'atomic and nuclear physics', 'radioactivity', 'A-Level', 'senior 6', 'Term III', 'Simple description of the upload', 'notes', 1),
(12, 'Cathode ray oscilloscope.pdf', 1, 'electronic devices', 'cathode ray oscilloscope', 'A-Level', 'senior 6', 'Term II', 'Simple description of the upload', 'notes', 1),
(13, 'ELECTRICAL FIELD.pdf', 1, 'Electrostatics and Current Electricity', 'Electrical Field', 'A-Level', 'senior 6', 'Term I', 'Simple description of the upload', 'notes', 3),
(15, 'CAPACITATORS.pdf', 1, 'Electrostatics and Current Electricity', 'Capacitators', 'A-Level', 'senior 6', 'Term I', 'Simple description of the upload', 'notes', 2),
(16, 'ELECTROMAGNETIC INDUCTION.pdf', 1, 'Electromagnetism', ' Induction', 'A-Level', 'senior 6', 'Term III', 'Simple description of the upload', 'notes', 1),
(17, 'SOILFORMATION.pdf', 3, 'soil', 'soil formation', 'O-Level', 'senior 2', 'term I', 'Simple description of the upload', 'notes', 1),
(18, 'SOIL PROFILE.pdf', 3, 'soil', 'soil profile', 'O-Level', 'senior 2', 'term I', 'Simple description of the upload', 'notes', 1),
(19, 'PROCESSES OF SOIL FORMATION AND SOIL PROFILE DEVELOPMENT.pdf', 3, 'soil', 'soil formation', 'O-Level', 'senior 2', 'term I', 'Simple description of the upload', 'notes', 1),
(20, 'ANIMAL NUTRITION.pdf', 3, 'Nutrition', 'Nutrition in Animals', 'O-Level', 'senior 2', 'Term II', 'Simple description of the upload', 'notes', 1),
(21, 'PLANT TRANSPORT.pdf', 3, 'transport', 'Transport in plants', 'O-Level', 'senior 2', 'Term II', 'Simple description of the upload', 'notes', 2),
(22, 'TRANSPORT OF MATERIALS IN ANIMALS.pdf', 3, 'transport', 'transport in animals', 'O-Level', 'senior 2', 'Term II', 'Simple description of the upload', 'notes', 2),
(23, 'LOCOMOTION IN ANIMALS.pdf', 3, 'locomotion', 'overview', 'O-Level', 'senior 4', 'Term II', 'Simple description of the upload', 'notes', 2),
(24, 'LOCOMOTION IN BIRDS.pdf', 3, 'locomotion', 'birds', 'O-Level', 'senior 4', 'Term II', 'Simple description of the upload', 'notes', 2),
(25, 'LOCOMOTION IN FISH.pdf', 3, 'locomotion', 'fish', 'O-Level', 'senior 4', 'Term II', 'Simple description of the upload', 'notes', 1),
(26, 'FLIGHT IN INSECTS.pdf', 3, 'locomotion', 'insects', 'O-Level', 'senior 4', 'Term II', 'Simple description of the upload', 'notes', 1),
(27, 'Coordination in plants.pdf', 3, 'Coordination', 'coordination in plants', 'O-Level', 'senior 4', 'Term I', 'Simple description of the upload', 'notes', 1),
(28, 'EXCRETION.pdf', 3, 'Excretion', 'overview', 'O-Level', 'senior 3', 'Term III', 'Simple description of the upload', 'notes', 1),
(29, 'RESPONSE IN ANIMALS.pdf', 3, 'Coordination', 'response', 'O-Level', 'senior 4', 'Term I', 'Simple description of the upload', 'notes', 1),
(30, 'THE HUMAN NERVOUS SYSTEM.pdf', 3, 'Coordination', 'nervous system', 'O-Level', 'senior 4', 'Term I', 'Simple description of the upload', 'notes', 1),
(31, 'Biology-REPRODUCTION.pdf', 3, 'Reproduction', 'sexual and asexual reproduction', 'O-Level', 'Senior 4', 'Term II', 'Simple description of the upload', 'notes', 0),
(32, 'BALANCE BIOLOGY.pdf', 3, 'Coordination', 'nervous system', 'O-Level', 'Senior 4', 'Term I', 'Simple description of the upload', 'notes', 0),
(33, 'cell_biology.pdf', 3, 'cell biology', 'intoduction', 'A-Level', 'Senior 5', 'Term I', 'Simple description of the upload', 'notes', 0),
(34, 'CHEMICALS OF LIFE.pdf', 3, 'chemicals of life', 'chemicals of life', 'A-Level', 'Senior 5', 'Term I', 'Simple description of the upload', 'notes', 0),
(35, 'CHLORINE AND ITS COMPOUNDS 2.pdf', 2, 'chlorine and its compounds', 'chlorine and its compounds', 'O-Level', 'Senior 3', 'Term II', 'Simple description of the upload', 'notes', 0),
(36, 'SULPHUR AND ITS COMPOUNDS 1.pdf', 2, 'sulphur and its compounds', 'sulphur and its compounds', 'O-Level', 'Senior 4', 'Term I', 'Simple description of the upload', 'notes', 0),
(37, 'CARBON AND ITS COMPOUNDS2.pdf', 2, 'carbon and its compounds', 'carbon and its compounds', 'O-Level', 'Senior 2', 'Term III', 'Simple description of the upload', 'notes', 0),
(38, 'Chem A grp 1,11 elments vol-1.pdf', 2, 'Periodic table', 'Periodic table', 'O-Level', 'Senior 2', 'Term I', 'Simple description of the upload', 'notes', 0),
(39, 'Chem A Grp1,11 elments vol-2.pdf', 2, 'Periodic table', 'Periodic table', 'O-Level', 'Senior 2', 'Term I', 'Simple description of the upload', 'notes', 0),
(40, 'HEAT.pdf', 1, 'Periodic table', 'Periodic table', 'O-Level', 'Senior 3', 'Term II', 'Simple description of the upload', 'notes', 0),
(41, 'HEAT.pdf', 1, 'Heat', 'Heat', 'O-Level', 'Senior 3', 'Term I', 'Simple description of the upload', 'notes', 0),
(42, 'HEAT.pdf', 1, 'Heat', 'Heat', 'O-Level', 'Senior 3', 'Term II', 'Simple description of the upload', 'notes', 0),
(43, 'Waves.pdf', 1, 'waves', 'waves', 'O-Level', 'Senior 3', 'Term II', 'Simple description of the upload', 'notes', 0),
(44, 'MAGNETISM.pdf', 1, 'Magnetism', 'magnetism', 'O-Level', 'Senior 4', 'Term III', 'Simple description of the upload', 'notes', 0),
(45, 'MACHINES.pdf', 1, 'Machines', 'Machines', 'O-Level', 'Senior 3', 'Term III', 'Simple description of the upload', 'notes', 0),
(46, 'ARCHIMEDES AND FLOATATION.pdf', 1, 'floatation and archimede''s principle', 'floatation and archimede''s principle', 'O-Level', 'Senior 2', 'Term II', 'Simple description of the upload', 'notes', 0),
(47, 'ELECTROSTATICS.pdf', 1, 'Electrostatics and Current Electricity', 'electrostatistics', 'O-Level', 'Senior 2', 'Term III', 'Simple description of the upload', 'notes', 0),
(48, 'measurement.pdf', 1, 'measurement', 'measurement', 'O-Level', 'Senior 1', 'Term I', 'Simple description of the upload', 'notes', 0),
(49, 'FORCE.pdf', 1, 'force', 'force', 'O-Level', 'Senior 1', 'Term II', 'Simple description of the upload', 'notes', 0),
(50, 'ECOLOGYnew.pdf', 3, 'ecology', 'ecology', 'O-Level', 'Senior 3', 'Term III', 'Simple description of the upload', 'notes', 0),
(51, 'BIOLOGY HOMEO ASTATIS.pdf', 3, 'homeostatis', 'homeostatis', 'O-Level', 'Senior 3', 'Term III', 'Simple description of the upload', 'notes', 0),
(52, 'RESPIRATION.pdf', 3, 'respiration', 'respiration', 'O-Level', 'Senior 3', 'Term III', 'Simple description of the upload', 'notes', 0),
(53, 'ENZYMES.pdf', 3, 'Enzymes', 'enzymes', 'O-Level', 'Senior 2', 'Term III', 'Simple description of the upload', 'notes', 0),
(54, 'Computer software.pdf', 5, 'computer software', 'introduction', 'O-Level', 'Senior 2', 'Term I', 'Simple description of the upload', 'notes', 0),
(55, 'MSWord.pdf', 5, 'word processing', 'word processing', 'O-Level', 'Senior 2', 'Term II', 'Simple description of the upload', 'notes', 0),
(56, 'presentations.pdf', 5, 'computer presentations', 'introduction', 'O-Level', 'Senior 2', 'Term III', 'Simple description of the upload', 'notes', 0),
(57, 'presentations.pdf', 5, 'computer presentations', 'introduction', 'O-Level', 'Senior 2', 'Term III', 'Simple description of the upload', 'notes', 0),
(58, 'presentations.pdf', 5, 'computer presentations', 'introduction', 'O-Level', 'Senior 2', 'Term III', 'Simple description of the upload', 'notes', 0),
(59, 'presentations.pdf', 5, 'computer presentations', 'introduction', 'O-Level', 'Senior 2', 'Term III', 'Simple description of the upload', 'notes', 0);

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `id` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL,
  `topic` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` varchar(20) NOT NULL,
  `class` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `class` varchar(10) NOT NULL,
  `teacher` varchar(50) NOT NULL,
  `path` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdby` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `topic` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(20) DEFAULT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `roleid` int(11) NOT NULL,
  `class` varchar(10) DEFAULT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `roleid`, `class`, `status`) VALUES
(1, 'Moses', 'Wasswa', 'mwasswa', '33667000f223ce8b688dd4de29962c81bb9afb63', 1, 's6', 'active'),
(2, 'michael', 'luswata', 'lmichael', '123456', 2, NULL, ''),
(3, 'Gladys', 'Nankya', 'gnankya', '8cb2237d0679ca88db6464eac60da96345513964', 3, '', 'active'),
(6, 'Pauline', 'Namuyanja', 'pnamuyanja', '4283f0e6737e874bbaad4f9b713167f0e308b513', 1, 's6', 'inactive'),
(7, 'Gerald', 'Mukiibi', 'gmukiibi', '123mukiibi', 2, '', ''),
(8, 'Claire', 'Claire', 'claire', '123claire', 2, '', ''),
(9, 'Andrew', 'Muwonge', 'mandrewz', '12345', 3, 's4', 'active'),
(10, 'Test', 'Test Last Name', 'Username', '12345', 3, 's5', 'active'),
(11, 'Charles', 'Mayanja', 'cmayanja', '8cb2237d0679ca88db6464eac60da96345513964', 2, '', 'active'),
(12, 'Beatrice', 'Nakiranda', 'bnakiranda', '123456', 2, '', 'active'),
(13, 'esther', 'asiimwe', 'mwesther', '914bac7302f1191d1a19bb0cc9a6492ccdce5809', 2, '', 'active'),
(14, 'Rachael', 'Atuhaire', 'arachael', '8cb2237d0679ca88db6464eac60da96345513964', 3, '', 'active'),
(15, 'Brian', 'Mugasha', 'bmugasha', '8cb2237d0679ca88db6464eac60da96345513964', 1, 's6', 'active'),
(16, 'David', 'Ssenoga', 'sdavid', '8cb2237d0679ca88db6464eac60da96345513964', 1, 's6', 'active'),
(17, 'Innocent', 'Kedi', 'kedii', '8cb2237d0679ca88db6464eac60da96345513964', 1, 's2', 'active'),
(18, 'Edward', 'Lubega', 'elubega', '8cb2237d0679ca88db6464eac60da96345513964', 1, 's2', 'active'),
(19, 'Joshua', 'Waiswa', 'jwaiswa', '33667000f223ce8b688dd4de29962c81bb9afb63', 3, '', 'active'),
(20, 'Eve', 'Orach', 'eorach', '33667000f223ce8b688dd4de29962c81bb9afb63', 1, 's6', 'active'),
(21, 'Mary', 'Orach', 'morach', '33667000f223ce8b688dd4de29962c81bb9afb63', 2, 's6', 'active'),
(22, 'Mary', 'Wambi', 'mwambi', '33667000f223ce8b688dd4de29962c81bb9afb63', 2, 's4', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `path` varchar(100) DEFAULT NULL,
  `subjectid` int(11) DEFAULT NULL,
  `topic` varchar(100) NOT NULL,
  `subtopic` varchar(100) NOT NULL,
  `level` varchar(20) NOT NULL,
  `term` varchar(10) NOT NULL,
  `class` varchar(20) NOT NULL,
  `description` varchar(800) NOT NULL,
  `createdby` varchar(50) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `path`, `subjectid`, `topic`, `subtopic`, `level`, `term`, `class`, `description`, `createdby`, `created`) VALUES
(1, 'Angular Momentum.mp4', 1, 'Magnetism', 'moles', 'O-Level', 'Term I', 'senior 1', 'This is a description on moles in mole concept', '0', '2016-10-27 06:55:07'),
(2, '12. Hydrocarbons.mp4', 2, 'Moleconcept', 'moles', 'O-Level', 'Term II', 'senior 2', 'This is a description on moles in mole concept', 'Gladys Nankya', '2016-10-27 09:38:48'),
(3, 'Cathode Rays.mp4', 1, 'Modern Physics', 'Electronic Devices', 'A-Level', 'Term III', 'senior 6', 'Cathode Rays', 'Gladys Nankya', '2016-10-30 11:37:50'),
(4, 'Nuclear Fusion.mp4', 1, 'Modern Physics', 'Nuclear Fusion', 'A-Level', 'Term III', 'senior 6', 'Nuclear Fusion', 'Gladys Nankya', '2016-10-30 11:39:30'),
(5, 'Photoelectric Effect and Photoelectric Cell.mp4', 1, 'Modern Physics', 'Photo-electric Effect', 'A-Level', 'Term III', 'senior 6', 'Photo electric effect', 'Gladys Nankya', '2016-10-30 11:40:51'),
(6, 'Davisson Germer Experiment.mp4', 1, 'Modern Physics', 'wave particle duality', 'A-Level', 'Term III', 'senior 6', 'Electron as a wave', 'Gladys Nankya', '2016-10-30 11:43:40'),
(7, 'Ruther Alpha Scattering Experiment.mp4', 1, 'Modern Physics', 'Applications', 'A-Level', 'Term III', 'senior 6', 'Applications', 'Gladys Nankya', '2016-10-30 11:48:41'),
(8, 'Reflection of Light.mp4', 1, 'Light', 'Reflection', 'A-Level', 'Term I', 'senior 5', 'Reflection of light', 'Gladys Nankya', '2016-10-30 11:55:25'),
(9, 'Verification of the Laws of Reflection.mp4', 1, 'Light', 'Reflection', 'A-Level', 'Term I', 'senior 5', 'Verification of the laws of reflection', 'Gladys Nankya', '2016-10-30 11:59:48'),
(10, 'Total Internal Reflection Physics.mp4', 1, 'Light', 'Total Internal reflection', 'A-Level', 'Term I', 'senior 5', 'Total Internal Reflection', 'Gladys Nankya', '2016-10-30 12:03:53'),
(11, 'Effects of Total Internal Reflection.mp4', 1, 'Light', 'Total Internal reflection', 'A-Level', 'Term I', 'senior 5', 'Total Internal Reflection', 'Gladys Nankya', '2016-10-30 12:04:30'),
(12, 'Refraction Of Light.mp4', 1, 'Light', 'refraction', 'A-Level', 'Term I', 'senior 5', 'Refraction of Light', 'Gladys Nankya', '2016-10-30 12:15:02'),
(13, 'Formation of an Image Due to Multiple Reflection of Light.mp4', 1, 'Light', 'Reflection', 'A-Level', 'Term I', 'senior 5', 'Formation of multiple images', 'Gladys Nankya', '2016-10-30 12:17:55'),
(14, 'Some Effects of Refraction.mp4', 1, 'Light', 'refraction', 'A-Level', 'Term I', 'senior 5', 'Effects of refractionn', 'Gladys Nankya', '2016-10-30 12:22:27'),
(15, 'Refraction Through  a Prism.mp4', 1, 'Light', 'refraction', 'A-Level', 'Term I', 'senior 5', 'Refraction through a Prism', 'Gladys Nankya', '2016-10-30 12:24:20'),
(16, 'Rectilinear Propagation of Light.mp4', 1, 'Light', 'Rectilinear propagation', 'O-Level', 'Term II', 'senior 1', 'Rectilinear propagation of light', 'Gladys Nankya', '2016-10-30 12:28:11'),
(17, 'Periscope.mp4', 1, 'Light', 'Reflection', 'A-Level', 'Term I', 'senior 5', 'Applications of reflection', 'Gladys Nankya', '2016-10-30 12:32:51'),
(18, 'Lenses.mp4', 1, 'Light', 'Lenses', 'A-Level', 'Term I', 'senior 5', 'Lenses', 'Gladys Nankya', '2016-10-30 12:36:23'),
(19, 'Uses of Lenses.mp4', 1, 'Light', 'Lenses', 'A-Level', 'Term I', 'senior 5', 'Applications of Lenses', 'Gladys Nankya', '2016-10-30 12:38:51'),
(20, 'Image Formation in a Plane Mirror.mp4', 1, 'Light', 'Reflection', 'A-Level', 'Term I', 'senior 5', 'Image formation in a plane mirror', 'Gladys Nankya', '2016-10-30 12:47:41'),
(21, 'Uses Of Spherical Mirrors.mp4', 1, 'Light', 'Spherical Mirrors', 'A-Level', 'Term I', 'senior 5', 'Spherical Mirrors', 'Gladys Nankya', '2016-10-30 12:53:16'),
(22, 'Determination of Focal Length of Concave Mirror.mp4', 1, 'Light', 'Spherical Mirrors', 'A-Level', 'Term I', 'senior 5', 'Focal Length of a concave mirror', 'Gladys Nankya', '2016-10-30 12:54:33'),
(23, 'Formation Of Image By a Concave Mirror In Ray Diagram.mp4', 1, 'Light', 'Spherical Mirrors', 'A-Level', 'Term I', 'senior 5', 'Image formation in a concave mirror', 'Gladys Nankya', '2016-10-30 12:55:58'),
(24, 'Formation of Image by a convex Mirror In Ray Diagram.mp4', 1, 'Light', 'Spherical Mirrors', 'A-Level', 'Term I', 'senior 5', 'Focal Length of a convex mirror', 'Gladys Nankya', '2016-10-30 12:57:32'),
(25, 'Refractive Index of Glass by Apparent Depth Method.mp4', 1, 'Light', 'refraction', 'A-Level', 'Term I', 'senior 5', 'Refractive index of a glass by apparent method', 'Gladys Nankya', '2016-10-30 13:01:15'),
(26, 'Real Depth and Apparent Depth.mp4', 1, 'Light', 'refraction', 'A-Level', 'Term I', 'senior 5', 'Real Depth and Apparent Depth', 'Gladys Nankya', '2016-10-30 13:03:33'),
(27, 'To Measure The Radius of Curvature Of a Spherical Surface.mp4', 1, 'Light', 'Spherical Mirrors', 'A-Level', 'Term I', 'senior 5', 'To measure the radius of curvature of the spherical surface ', 'Gladys Nankya', '2016-10-30 13:06:06'),
(28, 'Simple Microscope.mp4', 1, 'Light', 'Applications', 'A-Level', 'Term I', 'senior 5', 'Simple Microscope', 'Gladys Nankya', '2016-10-30 13:12:05'),
(29, 'Determination of the Focal Length of a Convex Lens.mp4', 1, 'Light', 'Lenses', 'A-Level', 'Term I', 'senior 5', 'Focal Length of a convex lens - determination', 'Gladys Nankya', '2016-10-30 13:15:13'),
(30, 'Experiment to Measure the Angle of Deviation of a Prism.mp4', 1, 'Light', 'refraction', 'A-Level', 'Term I', 'senior 5', 'Angle of deviation of a prism', 'Gladys Nankya', '2016-10-30 13:17:19'),
(31, 'Compound Microscope.mp4', 1, 'Light', 'Applications', 'A-Level', 'Term I', 'senior 5', 'Compound Microscope', 'Gladys Nankya', '2016-10-30 13:47:51'),
(32, 'Recombination of the Dispersed White Light.mp4', 1, 'Light', 'refraction', 'A-Level', 'Term I', 'senior 5', 'Recombination of white light', 'Gladys Nankya', '2016-10-30 13:53:52'),
(33, 'Adaptation Of The Human Eye.mp4', 1, 'Light', 'Human Eye', 'A-Level', 'Term I', 'senior 5', 'This is a description on the human eye', 'Gladys Nankya', '2016-10-30 13:57:04'),
(34, 'Astigmatism.mp4', 1, 'Light', 'Human Eye', 'A-Level', 'Term I', 'senior 5', 'Astigmatism', 'Gladys Nankya', '2016-10-30 13:58:02'),
(35, 'Myopia..mp4', 1, 'Light', 'Human Eye', 'A-Level', 'Term I', 'senior 5', '', 'Gladys Nankya', '2016-10-30 13:59:26'),
(36, 'Optical Fibres.mp4', 1, 'Light', 'Applications', 'A-Level', 'Term I', 'senior 5', 'Optical Fibers', 'Gladys Nankya', '2016-10-30 14:00:11'),
(37, 'Myopia..mp4', 1, 'Light', 'Human Eye', 'A-Level', 'Term I', 'senior 5', 'Myopia', 'Gladys Nankya', '2016-10-30 14:01:55'),
(38, 'Dispersion Of  White Light.mp4', 1, 'Light', 'refraction', 'A-Level', 'Term I', 'senior 5', 'Dispersion of white light', 'Gladys Nankya', '2016-10-30 14:04:40'),
(39, 'An Effect of Dispersion.mp4', 1, 'Light', 'refraction', 'A-Level', 'Term I', 'senior 5', 'Dispersion of white light - effect', 'Gladys Nankya', '2016-10-30 14:05:49'),
(40, 'Diffraction  of Light.mp4', 1, 'Light', 'Diffraction', 'A-Level', 'Term I', 'senior 5', 'Diffraction of light', 'Gladys Nankya', '2016-10-30 14:10:56'),
(41, 'Lens Camera.mp4', 1, 'Light', 'Applications', 'A-Level', 'Term I', 'senior 5', 'Lens Camera', 'Gladys Nankya', '2016-10-30 14:12:58'),
(42, 'Kaleidoscope.mp4', 1, 'Light', 'Applications', 'A-Level', 'Term I', 'senior 5', 'Kaleidoscope', 'Gladys Nankya', '2016-10-30 14:14:49'),
(43, 'REFLECTION OF LIGHT.mp4', 1, 'Light', 'Reflection', 'A-Level', 'Term I', 'senior 5', 'Reflection of light', 'Gladys Nankya', '2016-10-30 14:22:31'),
(44, 'Verification of Laws of Refraction.mp4', 1, 'Light', 'refraction', 'A-Level', 'Term I', 'senior 5', 'Refraction of Light verification', 'Gladys Nankya', '2016-10-30 14:23:50'),
(45, 'Specular and Diffuse Reflection of Light.mp4', 1, 'Light', 'Reflection', 'A-Level', 'Term I', 'senior 5', 'Diffuse and Regular reflection', 'Gladys Nankya', '2016-10-30 14:24:52'),
(46, 'Specular and Diffuse Reflection 2.mp4', 1, 'Light', 'Reflection', 'A-Level', 'Term I', 'senior 5', 'Diffuse and Regular reflection', 'Gladys Nankya', '2016-10-30 14:25:52'),
(47, 'Physics Help - How to Calculate Density.mp4', 1, 'Mechanics and properties of matter', 'Density', 'O-Level', 'Term I', 'senior 1', 'Measurement of Density', 'Gladys Nankya', '2016-10-30 14:40:52'),
(48, 'Relative Density of a Solid.mp4', 1, 'Mechanics and properties of matter', 'Relative Density', 'O-Level', 'Term II', 'senior 1', 'Relative Density of a solid', 'Gladys Nankya', '2016-10-30 14:42:46'),
(49, 'Matter In Our Surroundings.mp4', 1, 'Mechanics and properties of matter', 'matter', 'O-Level', 'Term I', 'senior 1', 'States of matter', 'Gladys Nankya', '2016-10-30 14:44:24'),
(50, 'Introduction to Forces in Physics.mp4', 1, 'Mechanics and properties of matter', 'forces', 'O-Level', 'Term I', 'senior 1', 'Introduction to forces', 'Gladys Nankya', '2016-10-30 14:47:09'),
(51, 'Types of Forces.mp4', 1, 'Mechanics and properties of matter', 'forces', 'O-Level', 'Term I', 'senior 1', 'Types of forces', 'Gladys Nankya', '2016-10-30 14:48:58'),
(52, 'Classification of Force.mp4', 1, 'Mechanics and properties of matter', 'forces', 'O-Level', 'Term I', 'senior 1', 'Classification of force', 'Gladys Nankya', '2016-10-30 14:49:58'),
(53, 'Meaning Of Force.mp4', 1, 'Mechanics and properties of matter', 'forces', 'O-Level', 'Term I', 'senior 1', 'Meaning of force', 'Gladys Nankya', '2016-10-30 14:50:42'),
(54, 'Vernier Caliper.mp4', 1, 'Mechanics and properties of matter', 'measurements', 'O-Level', 'Term I', 'senior 1', 'Vernier Caliper', 'Gladys Nankya', '2016-10-30 14:54:28'),
(55, 'Physics Work Energy Power part 1 (Introduction) CBSE class 11.mp4', 1, 'Mechanics and properties of matter', 'Work Power Energyy', 'O-Level', 'Term I', 'senior 2', 'Work Power and Energy', 'Gladys Nankya', '2016-10-30 14:59:34'),
(56, 'Meaning Of Work.mp4', 1, 'Mechanics and properties of matter', 'Work Power Energyy', 'O-Level', 'Term I', 'senior 2', 'Work Power and Energy', 'Gladys Nankya', '2016-10-30 15:01:04'),
(57, 'GCSE Physics P3 Revision- The turning effect of a force.mp4', 1, 'Mechanics and properties of matter', 'forces', 'O-Level', 'Term I', 'senior 2', 'Turning effect of a force', 'Gladys Nankya', '2016-10-30 15:07:34'),
(58, 'Balanced and Unbalanced Forces.mp4', 1, 'Mechanics and properties of matter', 'forces', 'O-Level', 'Term I', 'senior 2', 'Balanced and Unbalanced forces', 'Gladys Nankya', '2016-10-30 15:12:22'),
(59, 'Motion.mp4', 1, 'Mechanics and properties of matter', 'motion', 'O-Level', 'Term I', 'senior 3', 'Motion', 'Gladys Nankya', '2016-10-30 15:20:10'),
(60, 'Netwon''s Laws Of Motion.mp4', 1, 'Mechanics and properties of matter', 'motion', 'O-Level', 'Term I', 'senior 3', 'Newtons laws of motion', 'Gladys Nankya', '2016-10-30 15:21:17'),
(61, 'Different Types Of Motion.mp4', 1, 'Mechanics and properties of matter', 'motion', 'O-Level', 'Term I', 'senior 3', 'Types of motion', 'Gladys Nankya', '2016-10-30 15:22:33'),
(62, 'Acceleration.mp4', 1, 'Mechanics and properties of matter', 'motion', 'O-Level', 'Term I', 'senior 3', 'Acceleration', 'Gladys Nankya', '2016-10-30 15:23:59'),
(63, 'Vectors Scalars.mp4', 1, 'Mechanics and properties of matter', 'motion', 'O-Level', 'Term I', 'senior 3', 'Vector and scalar quantities', 'Gladys Nankya', '2016-10-30 15:25:05'),
(64, 'Demonstration Of Newton''s Third Law Of Motion.mp4', 1, 'Mechanics and properties of matter', 'motion', 'O-Level', 'Term I', 'senior 3', 'Motion', 'Gladys Nankya', '2016-10-30 15:27:48'),
(65, 'Experimental Verification Of Newton''s Second Law Of Motion.mp4', 1, 'Mechanics and properties of matter', 'motion', 'O-Level', 'Term I', 'senior 3', 'verification of newton''s second law', 'Gladys Nankya', '2016-10-30 15:28:47'),
(66, 'Speed, Velocity, and Acceleration.mp4', 1, 'Mechanics and properties of matter', 'motion', 'O-Level', 'Term I', 'senior 3', 'speed velocity acceleration', 'Gladys Nankya', '2016-10-30 15:31:39'),
(67, 'Buoyant Force and Archimedes Principle.mp4', 1, 'Mechanics and properties of matter', 'Archimedes principle', 'O-Level', 'Term I', 'senior 3', 'Archimedes principle', 'Gladys Nankya', '2016-10-30 15:33:53'),
(68, 'Screw Gauge.mp4', 1, 'Mechanics and properties of matter', 'measurements', 'O-Level', 'Term I', 'senior 1', 'Screw guage', 'Gladys Nankya', '2016-10-30 15:35:56'),
(69, 'Inertia.mp4', 1, 'Mechanics and properties of matter', 'motion', 'O-Level', 'Term I', 'senior 3', 'Inertia', 'Gladys Nankya', '2016-10-30 15:37:56'),
(70, 'Moment Of Inertia.mp4', 1, 'Mechanics and properties of matter', 'motion', 'O-Level', 'Term I', 'senior 3', 'moment of inertia', 'Gladys Nankya', '2016-10-30 15:39:02'),
(71, 'V T  Graph Or Velocity Time Graph.mp4', 1, 'Mechanics and properties of matter', 'motion', 'O-Level', 'Term I', 'senior 3', 'Velocity time graph', 'Gladys Nankya', '2016-10-30 15:41:04'),
(72, 'S T GraphOR Distance Time Graph.mp4', 1, 'Mechanics and properties of matter', 'motion', 'O-Level', 'Term I', 'senior 3', 'distance time graph', 'Gladys Nankya', '2016-10-30 15:41:52'),
(73, 'Scalar Product and Vector Product Of Two Vectors.mp4', 1, 'Mechanics and properties of matter', 'motion', 'O-Level', 'Term I', 'senior 3', '', 'Gladys Nankya', '2016-10-30 15:42:30'),
(74, 'Angular Momentum.mp4', 1, 'Mechanics and properties of matter', 'circular motion', 'A-Level', 'Term I', 'senior 5', 'Angular momentum', 'Gladys Nankya', '2016-10-30 16:58:44'),
(75, '9. Study Of Gas Laws.mp4', 1, 'Gas laws', 'Boyles law', 'O-Level', 'Term I', 'senior 4', 'Study of gas laws', 'Gladys Nankya', '2016-10-30 17:27:42'),
(76, '41.Boyle''s Law.mp4', 1, 'Gas laws', 'Boyles law', 'O-Level', 'Term I', 'senior 4', 'boyles law', 'Gladys Nankya', '2016-10-30 17:29:41'),
(77, '42. Boyle''s Law Demonstration.mp4', 1, 'Gas laws', 'Boyles law', 'O-Level', 'Term I', 'senior 4', 'demonstration of Boyles law', 'Gladys Nankya', '2016-10-30 17:30:36'),
(78, '43. Boyle''s Law Graph.mp4', 1, 'Gas laws', 'Boyles law', 'O-Level', 'Term I', 'senior 4', 'Graph of Boyles law', 'Gladys Nankya', '2016-10-30 17:31:48'),
(79, '44. Charle''s Law.mp4', 1, 'Gas laws', 'charles law', 'O-Level', 'Term I', 'senior 4', 'Charles law', 'Gladys Nankya', '2016-10-30 17:32:33'),
(80, '45. Charles Law Graph.mp4', 1, 'Gas laws', 'charles law', 'O-Level', 'Term I', 'senior 4', 'demonstration of Charles law', 'Gladys Nankya', '2016-10-30 17:34:00'),
(81, '12. Dry Cell.mp4', 1, 'Electricity', 'Electric cells', 'O-Level', 'Term II', 'senior 4', 'The Dry Cell', 'Gladys Nankya', '2016-10-30 17:38:32'),
(82, '26. Leclanche Cell.mp4', 1, 'Electricity', 'Electric cells', 'O-Level', 'Term II', 'senior 4', 'Leclanche cell', 'Gladys Nankya', '2016-10-30 17:39:38'),
(83, '39. Solar Cell.mp4', 1, 'Electricity', 'Electric cells', 'O-Level', 'Term II', 'senior 4', 'Solar cell', 'Gladys Nankya', '2016-10-30 17:40:22'),
(84, 'Symbols Used In an Electric Circuit.mp4', 1, 'Electricity', 'ammeters voltmeters and galvanometers', 'O-Level', 'Term II', 'senior 4', 'ammeters voltmeters and galvanometers', 'Gladys Nankya', '2016-10-30 17:43:44'),
(85, '86. Daniell Cell.mp4', 1, 'Electricity', 'Electric cells', 'O-Level', 'Term II', 'senior 4', 'Daniell cell', 'Gladys Nankya', '2016-10-30 17:46:42'),
(86, '32. Ohm''s Law.mp4', 1, 'Electricity', 'Ohms law', 'O-Level', 'Term II', 'senior 4', 'Ohms law', 'Gladys Nankya', '2016-10-30 17:56:20'),
(87, '18. Electricity.mp4', 1, 'Electricity', 'Electric current', 'O-Level', 'Term II', 'senior 4', 'Introduction to electricity', 'Gladys Nankya', '2016-10-30 17:57:59'),
(88, '25. Kirchoffs Law.mp4', 1, 'Electricity', 'kirchoffs laws', 'O-Level', 'Term II', 'senior 4', 'kirchoffs laws', 'Gladys Nankya', '2016-10-30 18:00:47'),
(89, '34. Resistors in Combination.mp4', 1, 'Electricity', 'effective resistance', 'O-Level', 'Term II', 'senior 4', 'Effective resistance', 'Gladys Nankya', '2016-10-30 18:02:39'),
(90, '35. Resistors In Parallel.mp4', 1, 'Electricity', 'effective resistance', 'O-Level', 'Term II', 'senior 4', 'resistors in parallel', 'Gladys Nankya', '2016-10-30 18:05:39'),
(91, '36. Resistors In Series.mp4', 1, 'Electricity', 'effective resistance', 'O-Level', 'Term II', 'senior 4', 'Resistors in series', 'Gladys Nankya', '2016-10-30 18:06:29'),
(92, '10. DC Motor.mp4', 1, 'Magnetism', 'Electric motor', 'O-Level', 'Term III', 'senior 4', 'DC Motor', 'Gladys Nankya', '2016-10-30 18:13:26'),
(93, 'Electromagnetic Induction.mp4', 1, 'Magnetism', 'electromagnetic induction', 'O-Level', 'Term III', 'senior 4', 'electromagnetic induction', 'Gladys Nankya', '2016-10-30 18:15:43'),
(94, 'Motion of Free Electrons in a Metal Wire.mp4', 1, 'Electricity', 'electrons', 'O-Level', 'Term III', 'senior 4', 'electrons', 'Gladys Nankya', '2016-10-30 18:18:46'),
(95, 'Cathode Rays.mp4', 1, 'Magnetism', 'cathode rays', 'O-Level', 'Term III', 'senior 4', 'Cathode Rays', 'Gladys Nankya', '2016-10-30 18:24:09'),
(96, '4. Structure Of an Atom.mp4', 1, 'Modern Physics', 'atomic and nuclear structures', 'O-Level', 'Term III', 'senior 4', 'atomic and nuclear structures', 'Gladys Nankya', '2016-10-30 19:54:36'),
(97, 'CBSE & ICSE Class 9 Physics - Thermometry (Chapter 5) - Heat Introduction.mp4', 1, 'Heat', 'Thermometry', 'O-Level', 'Term II', 'senior 1', 'Thermometry', 'Gladys Nankya', '2016-10-30 20:02:42'),
(98, 'I - Heat Transfer (IGCSE Physics).mp4', 1, 'Heat', 'heat transfer', 'O-Level', 'Term II', 'senior 1', 'Heat transfer', 'Gladys Nankya', '2016-10-30 20:04:14'),
(99, '51. Determination of Specific Latent Heat Capacity of Fusion.mp4', 1, 'Heat', 'latent heat', 'O-Level', 'Term II', 'senior 3', 'latent heat', 'Gladys Nankya', '2016-10-30 20:14:54'),
(100, 'Thermal Expansion.mp4', 1, 'Heat', 'thermal expansion', 'O-Level', 'Term II', 'senior 3', 'thermal expansion', 'Gladys Nankya', '2016-10-30 20:17:22'),
(101, 'Applications of Thermal Expansion and Contraction of Solids.mp4', 1, 'Heat', 'thermal expansion', 'O-Level', 'Term II', 'senior 3', 'thermal expansion', 'Gladys Nankya', '2016-10-30 20:18:44'),
(102, 'Meiosis Reduction Division.mp4', 3, 'Genetics', 'Meosis', 'O-Level', 'Term II', 'senior 4', 'Meosis and cell division', 'Gladys Nankya', '2016-10-31 11:33:25'),
(103, 'The Circulatory System In Man.mp4', 3, 'transport', 'circulatory system', 'O-Level', 'Term II', 'senior 3', 'The circulatory system', 'Gladys Nankya', '2016-10-31 11:36:02'),
(104, 'Transpiration In Plants.mp4', 3, 'transport', 'transpiration', 'O-Level', 'Term II', 'senior 3', 'Transpiration in plants', 'Gladys Nankya', '2016-10-31 11:37:35'),
(105, 'Photosynthesis.mp4', 3, 'Nutrition', 'Nutrition in green plants', 'O-Level', 'Term II', 'senior 2', 'Photosynthesis', 'Gladys Nankya', '2016-10-31 11:39:37'),
(106, 'Factors That Affect Photosynthesis.mp4', 3, 'Nutrition', 'Nutrition in green plants', 'O-Level', 'Term II', 'senior 2', 'factors affecting photosynthesis', 'Gladys Nankya', '2016-10-31 11:40:27'),
(107, 'Respiration In Plants.mp4', 3, 'Respiration', 'respiration in plants', 'O-Level', 'Term III', 'senior 3', 'Respiration in plants', 'Gladys Nankya', '2016-10-31 11:41:36'),
(108, 'Structure And Working Of Stomata.mp4', 3, 'Respiration', 'respiration in plants', 'O-Level', 'Term III', 'senior 3', 'Structure of the stomata', 'Gladys Nankya', '2016-10-31 11:42:13'),
(109, '12. Hydrocarbons.mp4', 2, 'Hydrocarbons', 'intoduction', 'A-Level', 'Term I', 'senior 5', 'Hydrocarbons', 'Gladys Nankya', '2016-10-31 11:58:49'),
(110, '20. Test for hydrocarbons.mp4', 2, 'Hydrocarbons', 'intoduction', 'A-Level', 'Term I', 'senior 5', 'Test for hydrocarbons', 'Gladys Nankya', '2016-10-31 12:02:19'),
(111, '7. Ethyne.mp4', 2, 'Hydrocarbons', 'Ethyne', 'A-Level', 'Term I', 'senior 5', 'Ethyne', 'Gladys Nankya', '2016-10-31 12:07:41'),
(112, '17. Methane.mp4', 2, 'Hydrocarbons', 'methane', 'A-Level', 'Term I', 'senior 5', 'methane', 'Gladys Nankya', '2016-10-31 12:09:41'),
(113, '19. Chemical properties of Ethanol.mp4', 2, 'Hydrocarbons', 'Ethanol', 'A-Level', 'Term I', 'senior 5', 'Chemical properties of Ethanol', 'Gladys Nankya', '2016-10-31 12:11:19'),
(114, '14. Isomerism in Butane.mp4', 2, 'Hydrocarbons', 'Butane', 'A-Level', 'Term I', 'senior 5', 'Isomerism in butane', 'Gladys Nankya', '2016-10-31 12:17:55'),
(115, '15. Isomerism in Pentane.mp4', 2, 'Hydrocarbons', 'pentane', 'A-Level', 'Term I', 'senior 5', 'Isomerism in pentane', 'Gladys Nankya', '2016-10-31 12:19:02'),
(116, '24. Mole Concept Numerical.mp4', 2, 'Matter', 'Mole concept', 'A-Level', 'Term I', 'senior 5', '', 'Gladys Nankya', '2016-10-31 13:30:28'),
(117, '62. Redox Reactions.mp4', 2, 'Matter', 'Redox reactions', 'A-Level', 'Term I', 'senior 5', '', 'Gladys Nankya', '2016-10-31 13:33:34'),
(118, '3. Atoms and Molecules.mp4', 2, 'Matter', 'Atoms Molecules and Ions', 'A-Level', 'Term I', 'senior 5', '', 'Gladys Nankya', '2016-10-31 13:36:58'),
(119, 'Combination of Solids(1).mp4', 2, 'Matter', 'Solid state of matter', 'A-Level', 'Term I', 'senior 5', '', 'Gladys Nankya', '2016-10-31 13:44:19'),
(120, '27. Arrangement Of Electrons In An Atoms.mp4', 2, 'Atomic Structure and Periodic Table', 'Electronic Structure of Atoms', 'A-Level', 'Term I', 'senior 5', '', 'Gladys Nankya', '2016-10-31 13:51:44'),
(121, '8. Major Divisions of the Periodic Table.mp4', 2, 'Atomic Structure and Periodic Table', 'The Periodic Table', 'A-Level', 'Term I', 'senior 5', '', 'Gladys Nankya', '2016-10-31 13:54:04'),
(122, '7. Modern Periodic Table A Puzzle.mp4', 2, 'Atomic Structure and Periodic Table', 'The Periodic Table', 'A-Level', 'Term I', 'senior 5', '', 'Gladys Nankya', '2016-10-31 13:55:53'),
(123, '6. Atomic structure And Chemical Bonding.mp4', 2, 'Structure and Bonding', 'Chemical Bonding', 'A-Level', 'Term III', 'senior 5', '', 'Gladys Nankya', '2016-10-31 13:59:30'),
(124, 'Calorimeter.mp4', 2, 'Thermochemistry (Chemical Energetics)', 'Calorimetry', 'A-Level', 'Term III', 'senior 5', '', 'Gladys Nankya', '2016-10-31 14:08:10'),
(125, '23. Arrangement Of Molecules In The Three States Of Matter.mp4', 2, 'Matter', 'States of Matter', 'A-Level', 'Term I', 'senior 5', '', 'Gladys Nankya', '2016-10-31 14:12:06'),
(126, '15. Chemical Equilibrium.mp4', 2, 'Chemical Equlibrium', 'The Concept of Chemical Equilibrium', 'A-Level', 'Term III', 'senior 5', '', 'Gladys Nankya', '2016-10-31 14:18:11'),
(127, '17. Action of Indicators on Acids and Bases.mp4', 2, 'Ionic Equilibria', 'Acid Base Titrations ', 'A-Level', 'Term II', 'senior 6', '', 'Gladys Nankya', '2016-10-31 14:24:17'),
(128, '39. Factors Affecting Rate Of a Reaction An Activity.mp4', 2, 'Chemical Kinetics', 'Factors Affecting Rates of Reaction', 'A-Level', 'Term II', 'senior 6', '', 'Gladys Nankya', '2016-10-31 14:27:58'),
(129, '64. Electrolysis.mp4', 2, 'Electrochemistry', 'Electrolysis', 'A-Level', 'Term II', 'senior 6', '', 'Gladys Nankya', '2016-10-31 15:06:48'),
(130, '68. Faraday''s First Law of Electrolysis.mp4', 2, 'Electrochemistry', 'Electrolysis', 'A-Level', 'Term II', 'senior 6', '', 'Gladys Nankya', '2016-10-31 15:07:35'),
(131, '69. Faraday''s Second Law of Electrolysis.mp4', 2, 'Electrochemistry', 'Electrolysis', 'A-Level', 'Term II', 'senior 6', '', 'Gladys Nankya', '2016-10-31 15:08:23'),
(132, '70. Electrolysis Of Water.mp4', 2, 'Electrochemistry', 'Electrolysis', 'A-Level', 'Term II', 'senior 6', '', 'Gladys Nankya', '2016-10-31 15:10:03'),
(133, '71. Preparation Of hydrogen By Electrolysis Of Water.mp4', 2, 'Electrochemistry', 'Electrolysis', 'A-Level', 'Term II', 'senior 6', '', 'Gladys Nankya', '2016-10-31 15:10:42'),
(134, '65. Electrolysis An Activity.mp4', 2, 'Electrochemistry', 'Electrolysis', 'A-Level', 'Term II', 'senior 6', '', 'Gladys Nankya', '2016-10-31 15:11:29'),
(135, '67. Applications of Electrolysis.mp4', 2, 'Electrochemistry', 'Electrolysis', 'A-Level', 'Term II', 'senior 6', '', 'Gladys Nankya', '2016-10-31 15:12:15'),
(136, '26. Leclanche Cell.mp4', 2, 'Electrochemistry', 'Electrochemical cells', 'A-Level', 'Term II', 'senior 6', '', 'Gladys Nankya', '2016-10-31 15:16:56'),
(137, '4. Structure Of an Atom.mp4', 2, 'Matter', 'Atoms Molecules and Ions', 'A-Level', 'Term I', 'senior 5', '', 'Gladys Nankya', '2016-11-01 07:25:27'),
(139, '27. Arrangement Of Electrons In An Atoms.mp4', 2, 'Matter', 'Atoms Molecules and Ions', 'A-Level', 'Term I', 'senior 5', '', 'Gladys Nankya', '2016-11-01 07:30:10'),
(140, '62.Relative Atomic Mass.mp4', 2, 'Matter', 'Atoms Molecules and Ions', 'A-Level', 'Term I', 'senior 5', '', 'Gladys Nankya', '2016-11-01 07:30:52'),
(141, '29. Bohr''s Model of Atom.mp4', 2, 'Matter', 'Atoms Molecules and Ions', 'A-Level', 'Term I', 'senior 5', '', 'Gladys Nankya', '2016-11-01 07:31:26'),
(142, '1. What Is A Chemical Compound.mp4', 2, 'Third Short Period of the Periodic Table', 'Compounds of the Elements', 'A-Level', 'Term I', 'senior 5', '', 'Gladys Nankya', '2016-11-01 07:33:23'),
(143, '4. Carbon and its compounds.mp4', 2, 'Third Short Period of the Periodic Table', 'Compounds of the Elements', 'A-Level', 'Term I', 'senior 5', '', 'Gladys Nankya', '2016-11-01 07:34:31'),
(144, '16. Lab preperation of Carbondioxide.mp4', 2, 'Third Short Period of the Periodic Table', 'Compounds of the Elements', 'A-Level', 'Term I', 'senior 5', '', 'Gladys Nankya', '2016-11-01 07:35:49'),
(145, '10. Physical Properties of Metals.mp4', 2, 'The Chemistry of Group II Elements', 'properties', 'A-Level', 'Term II', 'senior 5', '', 'Gladys Nankya', '2016-11-01 07:43:46'),
(146, '11. Metal Reactivity Series.mp4', 2, 'The Chemistry of Group II Elements', 'Chemical Reactions of Group II Elements', 'A-Level', 'Term II', 'senior 5', '', 'Gladys Nankya', '2016-11-01 07:45:30'),
(147, '18. Carbon Dioxide Detection.mp4', 2, 'Third Short Period of the Periodic Table', 'Compounds of the Elements', 'A-Level', 'Term I', 'senior 5', '', 'Gladys Nankya', '2016-11-01 07:48:32'),
(148, '56. Laboratory Preparation of Chlorine.mp4', 2, 'The Chemistry of Group VII Elements', 'Compounds of the Elements', 'A-Level', 'Term I', 'senior 6', '', 'Gladys Nankya', '2016-11-01 07:51:29'),
(149, 'Law of indices part 1.mp4', 4, 'Indices Logarithms and Surds', 'indices', 'A-Level', 'Term I', 'Senior 5', 'laws of indices', 'Gladys Nankya', '2016-11-01 17:42:17'),
(150, '3 Minute Math - Indices.mp4', 4, 'Indices Logarithms and Surds', 'indices', 'A-Level', 'Term I', 'Senior 5', '', 'Gladys Nankya', '2016-11-01 17:44:03'),
(151, 'MathTube _ Indices _ Tutorial.mp4', 4, 'Indices Logarithms and Surds', 'indices', 'A-Level', 'Term I', 'Senior 5', '', 'Gladys Nankya', '2016-11-01 17:45:05'),
(152, 'Logarithms.mp4', 4, 'Indices Logarithms and Surds', 'logarithms', 'A-Level', 'Term I', 'Senior 5', '', 'Gladys Nankya', '2016-11-01 17:49:13'),
(153, 'What is a Logarithm _ Logarithms, Lesson 1.mp4', 4, 'Indices Logarithms and Surds', 'logarithms', 'A-Level', 'Term I', 'Senior 5', '', 'Gladys Nankya', '2016-11-01 17:50:19'),
(154, 'What is a Logarithm Lesson 2.mp4', 4, 'Indices Logarithms and Surds', 'logarithms', 'A-Level', 'Term I', 'Senior 5', '', 'Gladys Nankya', '2016-11-01 17:53:28'),
(155, 'the Two Important Types of Logarithms  Lesson 3.mp4', 4, 'Indices Logarithms and Surds', 'logarithms', 'A-Level', 'Term I', 'Senior 5', '', 'Gladys Nankya', '2016-11-01 17:55:08'),
(156, 'How to Solve Logarithms by Using the Change of Base Formula _ Logarithms, Lesson 4.mp4', 4, 'Indices Logarithms and Surds', 'logarithms', 'A-Level', 'Term I', 'Senior 5', '', 'Gladys Nankya', '2016-11-01 17:55:57'),
(157, 'Polynomials.mp4', 4, 'polynomials', 'polynomials', 'A-Level', 'Term I', 'Senior 5', '', 'Gladys Nankya', '2016-11-01 18:06:19'),
(158, 'Division Algorithm For Polynomials.mp4', 4, 'polynomials', 'polynomials', 'A-Level', 'Term I', 'Senior 5', '', 'Gladys Nankya', '2016-11-01 18:06:50'),
(159, 'Solving Simultaneous Equations by Elimination Example 1.mp4', 4, 'equations', 'simultaneous', 'A-Level', 'Term I', 'Senior 5', '', 'Gladys Nankya', '2016-11-01 18:08:06'),
(160, 'Graphical Solution Of Simultaneous Linear Equations.mp4', 4, 'equations', 'simultaneous', 'A-Level', 'Term I', 'Senior 5', '', 'Gladys Nankya', '2016-11-01 18:08:49'),
(161, 'Simultaneous Equations Solving Graphically.mp4', 4, 'equations', 'simultaneous', 'A-Level', 'Term I', 'Senior 5', '', 'Gladys Nankya', '2016-11-01 18:09:39'),
(162, 'Quadratic Equation.mp4', 4, 'equations', 'quadratic', 'A-Level', 'Term I', 'Senior 5', '', 'Gladys Nankya', '2016-11-01 18:11:00'),
(163, 'Equation Form Of a Function.mp4', 4, 'functions', 'functions', 'O-Level', 'Term I', 'Senior 1', '', 'Gladys Nankya', '2016-11-01 18:28:01'),
(164, 'Trigonometric Identities.mp4', 4, 'Trigonometry', 'Trigonometry', 'A-Level', 'Term I', 'Senior 5', '', 'Gladys Nankya', '2016-11-01 18:39:19'),
(165, 'Trigonometric Functions.mp4', 4, 'Trigonometry', 'Trigonometry', 'A-Level', 'Term I', 'Senior 5', '', 'Gladys Nankya', '2016-11-01 18:40:10'),
(166, 'Introduction to Vectors and Scalars.mp4', 4, 'Vectors', 'Vectors', 'A-Level', 'Term II', 'Senior 5', '', 'Gladys Nankya', '2016-11-01 18:51:52'),
(167, 'Addition and Subtraction Of Vectors.mp4', 4, 'Vectors', 'Vectors', 'A-Level', 'Term II', 'Senior 5', '', 'Gladys Nankya', '2016-11-01 18:52:28'),
(168, 'LAWS OF VECTORS, GCSE MATHS EXAM QUESTION IN VECTORS.mp4', 4, 'Vectors', 'Vectors', 'A-Level', 'Term II', 'Senior 5', '', 'Gladys Nankya', '2016-11-01 18:53:45'),
(169, 'Vectors _ Unit Vectors _ ExamSolutions.mp4', 4, 'Vectors', 'Vectors', 'A-Level', 'Term II', 'Senior 5', '', 'Gladys Nankya', '2016-11-01 18:54:28'),
(170, 'Addition Of Vectors(1).mp4', 4, 'Vectors', 'Vectors', 'A-Level', 'Term II', 'Senior 5', '', 'Gladys Nankya', '2016-11-01 18:56:55'),
(171, 'Trigonometry Lesson 1 Bearings.mp4', 4, 'Bearing and direction', 'Bearing and direction', 'O-Level', 'Term II', 'Senior 1', '', 'Gladys Nankya', '2016-11-01 18:59:40'),
(172, 'Introduction To Locus _ Coordinate Geometry _ Maths Geometry.mp4', 4, 'coordinate geometry', 'coordinate geometry', 'A-Level', 'Term II', 'Senior 5', '', 'Gladys Nankya', '2016-11-01 19:27:02'),
(173, 'Tutor Vista - Implicit Differentiation.mp4', 4, 'Differentiaition', 'Differentiaition', 'A-Level', 'Term II', 'Senior 5', '', 'Gladys Nankya', '2016-11-01 19:28:23'),
(174, 'Indefinite integrals.mp4', 4, 'integration', 'integration', 'A-Level', 'Term III', 'Senior 5', '', 'Gladys Nankya', '2016-11-01 19:33:03'),
(175, 'Application of integrals Problem1.mp4', 4, 'integration', 'integration', 'A-Level', 'Term III', 'Senior 5', '', 'Gladys Nankya', '2016-11-01 19:33:28'),
(176, 'Application Integration.mp4', 4, 'integration', 'integration', 'A-Level', 'Term III', 'Senior 5', '', 'Gladys Nankya', '2016-11-01 19:33:55'),
(177, 'Application Integration.mp4', 4, 'integration', 'integration', 'A-Level', 'Term III', 'Senior 5', '', 'Gladys Nankya', '2016-11-01 19:34:31'),
(178, 'Math Class - Antiderivative of xcosx using integration by parts.mp4', 4, 'integration', 'integration', 'A-Level', 'Term III', 'Senior 5', '', 'Gladys Nankya', '2016-11-01 19:34:57'),
(179, 'Taylor _ Maclaurin Series for Sin (x).mp4', 4, 'Maclaurins theorem', 'Maclaurins theorem', 'A-Level', 'Term I', 'Senior 6', '', 'Gladys Nankya', '2016-11-01 19:40:51'),
(180, 'Complex Numbers in Under 10 Minutes.mp4', 4, 'complex numbers', 'complex numbers', 'A-Level', 'Term III', 'Senior 6', '', 'Gladys Nankya', '2016-11-01 19:44:55'),
(181, 'Complex Numbers in Under 10 Minutes.mp4', 4, 'complex numbers', 'complex numbers', 'A-Level', 'Term III', 'Senior 6', '', 'Gladys Nankya', '2016-11-01 19:45:45'),
(182, 'Maths Complex Number Part 1 (Definition, Algerba of complex number) Mathematics CBSE Class X1.mp4', 4, 'complex numbers', 'complex numbers', 'A-Level', 'Term III', 'Senior 6', '', 'Gladys Nankya', '2016-11-01 19:46:28'),
(183, 'Algebra 2 4.4d - Complex Numbers, Part 4 - Mathematical Operations.mp4', 4, 'complex numbers', 'complex numbers', 'A-Level', 'Term III', 'Senior 6', '', 'Gladys Nankya', '2016-11-01 19:47:17'),
(184, 'Probablity.mp4', 4, 'probability theory', 'probability theory', 'A-Level', 'Term I', 'Senior 5', '', 'Gladys Nankya', '2016-11-01 20:02:41'),
(185, 'Probability Tutorial 1.mp4', 4, 'probability theory', 'probability theory', 'A-Level', 'Term I', 'Senior 5', '', 'Gladys Nankya', '2016-11-01 20:03:52'),
(186, 'Probability Numerical1.mp4', 4, 'probability theory', 'probability theory', 'A-Level', 'Term I', 'Senior 5', '', 'Gladys Nankya', '2016-11-01 20:04:59'),
(187, 'Probability Numerical2.mp4', 4, 'probability theory', 'probability theory', 'A-Level', 'Term I', 'Senior 5', '', 'Gladys Nankya', '2016-11-01 20:05:38'),
(188, 'Probability for Beginners _ Solving Math Problems.mp4', 4, 'probability theory', 'probability theory', 'A-Level', 'Term I', 'Senior 5', '', 'Gladys Nankya', '2016-11-01 20:06:23'),
(189, 'Circle Theorems.mp4', 4, 'coordinate geometry', 'circles', 'A-Level', 'Term II', 'Senior 6', '', 'Gladys Nankya', '2016-11-01 20:35:31'),
(190, '8. Extraction of petroleum.mp4', 2, 'organic chemistry', 'petroleum', 'O-Level', 'Term I', 'Senior 4', '', 'Gladys Nankya', '2016-11-02 10:01:59'),
(191, 'The Straight Line.mp4', 4, 'equations', 'straight line', 'O-Level', 'Term I', 'Senior 2', '', 'Gladys Nankya', '2016-11-03 16:28:49'),
(192, 'Triangle Similarity - SSS, SAS, and AA 128-2.28.mp4', 4, 'similarity and enlargement', 'similar figures', 'O-Level', 'Term II', 'Senior 2', '', 'Gladys Nankya', '2016-11-03 16:32:17'),
(193, 'Converse Of Pythagoras Theorem.mp4', 4, 'pythagoras theorem', 'pythagoras theorem', 'O-Level', 'Term III', 'Senior 2', '', 'Gladys Nankya', '2016-11-03 16:35:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fileclicks`
--
ALTER TABLE `fileclicks`
  ADD PRIMARY KEY (`id1`);

--
-- Indexes for table `query_replies`
--
ALTER TABLE `query_replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `title_fk_to_quiz_general_id` (`titleid`);

--
-- Indexes for table `quiz_answers`
--
ALTER TABLE `quiz_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_general`
--
ALTER TABLE `quiz_general`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_scores`
--
ALTER TABLE `quiz_scores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subtopic`
--
ALTER TABLE `subtopic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_student_querries`
--
ALTER TABLE `teacher_student_querries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theory`
--
ALTER TABLE `theory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fileclicks`
--
ALTER TABLE `fileclicks`
  MODIFY `id1` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `query_replies`
--
ALTER TABLE `query_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=342;
--
-- AUTO_INCREMENT for table `quiz_answers`
--
ALTER TABLE `quiz_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `quiz_general`
--
ALTER TABLE `quiz_general`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `quiz_scores`
--
ALTER TABLE `quiz_scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `subtopic`
--
ALTER TABLE `subtopic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `teacher_student_querries`
--
ALTER TABLE `teacher_student_querries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `theory`
--
ALTER TABLE `theory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
