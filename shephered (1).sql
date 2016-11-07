-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2016 at 08:47 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

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
(15, 9, 'jwaiswa', 2, '2016-05-17 02:18:41'),
(16, 6, 'morach', 1, '2016-05-13 23:05:38');

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
(2, 1, 1, 'Thanks, will remind you. ', '2016-05-17 01:47:11');

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
(5, 1, ' Large transformers, when used for some time, become very hot and are cooled by circulating oil. The heating of the transformer is due to', 'the heating effect of current alone:\r\nhysteresis loss alone:\r\nboth the heating effect of current and hysteresis loss:\r\nintense sunlight at noon', 'both the heating effect of current and hysteresis loss', 5);

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
(10, 1, 5, 'eorach', '\r\nhysteresis loss alone', 1);

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

INSERT INTO `quiz_general` (`id`, `title`, `duration`, `start_time`, `class`, `weight`, `year`, `term`, `status`, `num_of_qtns`, `createdby`, `subject`, `date`, `tot_mark`, `active`) VALUES
(1, 'Simple Physics', '3', '11:00', 'all', '3', '2016', 'II', 'o', NULL, 'jwaiswa', '1', '2016-05-19', 0, 1);

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
(2, 1, 'eorach', 17, 1, '2016-05-17 02:53:54');

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
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`) VALUES
(1, 'physics'),
(2, 'chemistry'),
(3, 'biology'),
(4, 'mathematics'),
(5, 'icts');

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
(1, 'What is the temperature of boiling water on mt Rwenzori', 'morach', 'eorach', 's6', '2016-05-17 01:43:25', 'Pressure', 1, '2015', 'III');

-- --------------------------------------------------------

--
-- Table structure for table `theory`
--

CREATE TABLE `theory` (
  `id` int(11) NOT NULL,
  `upload` varchar(100) DEFAULT NULL,
  `subjectid` int(11) DEFAULT NULL,
  `topic` varchar(50) DEFAULT NULL,
  `content` varchar(1000) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `clicked` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theory`
--

INSERT INTO `theory` (`id`, `upload`, `subjectid`, `topic`, `content`, `category`, `clicked`) VALUES
(9, 'Reflection of light.pdf', 1, 'Light REflection', 'Document describing the reflection of light.. :)', 'notes', 3);

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
(3, 'Gladys', 'Nankya', 'gnankya', '123456', 3, '', 'active'),
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
  `description` varchar(800) NOT NULL,
  `createdby` varchar(50) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `path`, `subjectid`, `topic`, `description`, `createdby`, `created`) VALUES
(6, 'Gauss.mp4', 1, 'Magnetism', 'Just edited Gauss Law Video Info', NULL, '0000-00-00 00:00:00'),
(11, 'Heat Capacity and Nature Of Substance.mp4', 1, 'Heat and Thermodynamics', 'Heat Capacity', NULL, '0000-00-00 00:00:00'),
(12, 'REFLECTION OF LIGHT.mp4', 1, 'Light', 'Light Video', NULL, '0000-00-00 00:00:00'),
(19, 'Buoyant Force and Archimedes Principle (1).mp4', 1, 'Mechanics', 'Archimedes', 'Charles Mayanja', '2015-04-22 16:03:08'),
(20, 'Photosynthesis.mp4', 3, 'Photosynthesis', 'This is a video on photosynthesis', 'Charles Mayanja', '2015-05-25 09:05:57'),
(24, '2 Forms of matter.mp4', 2, 'Matter', 'This is another video on the states of matter', 'Charles Mayanja', '2015-06-01 09:05:31'),
(28, '20. Manufacture Of Sulphuric Acid By Contact Process.mp4', 2, 'Sulphuric Acid', 'This is test info', 'Rachael Atuhaire', '2015-06-07 17:15:25'),
(30, 'Quadratic Equation.mp4', 4, 'quad equation', '', 'Gladys Nankya', '2015-06-18 04:06:10'),
(31, 'Indefinite integrals.mp4', 4, 'Indefinite integrals', '', 'Gladys Nankya', '2015-06-18 04:10:54'),
(32, 'Simultaneous Equations Solving Graphically.mp4', 4, 'Simultaneous Equations', '', 'Gladys Nankya', '2015-06-18 04:14:29'),
(33, 'Files and Folders - Computer File Management Basics.mp4', 5, 'Files and Folders', '', 'Gladys Nankya', '2015-06-18 04:18:24'),
(35, 'Amoeba Feeds!(1).mp4', 3, 'Kingdom Protoctista', 'How Amoeba feeds', 'Gladys Nankya', '2015-06-19 06:49:11'),
(36, '3. Cathode Rays.mp4', 1, 'Modern Physics', 'William Crookes discovered cathode rays', 'Gladys Nankya', '2015-06-19 16:42:43'),
(37, '4. Cyclotron.mp4', 1, 'Magnetism', 'Cyclotron', 'Gladys Nankya', '2015-06-19 16:52:46'),
(38, '5. Davisson Germer Experiment.mp4', 1, 'Modern Physics', 'Germer and Davisson', 'Gladys Nankya', '2015-06-19 17:05:48'),
(39, '9. Ruther''s Alpha Scattering Experiment2.mp4', 1, 'Modern Physics', 'Ruther', 'Gladys Nankya', '2015-06-19 17:10:49'),
(40, 'First Law Of Thermodynamics.mp4', 1, 'Heat and Thermodynamics', 'First Law', 'Gladys Nankya', '2015-06-19 17:21:51'),
(41, 'Heat Engines  And Second Law Of Thermodynamics(1).mp4', 1, 'Heat and Thermodynamics', 'Second Law', 'Gladys Nankya', '2015-06-19 17:26:36'),
(42, 'Applications of Thermal Expansion and Contraction of Solids.mp4', 1, 'Heat and Thermodynamics', 'Applications ', 'Gladys Nankya', '2015-06-19 17:27:48'),
(43, 'Difference Between Evaporation and Vaporization.mp4', 1, 'Heat and Thermodynamics', 'Difference', 'Gladys Nankya', '2015-06-19 17:29:16'),
(44, 'Evaporation Causes Cooling.mp4', 1, 'Heat and Thermodynamics', 'Evaporation', 'Gladys Nankya', '2015-06-19 17:31:05'),
(47, 'software.mp4', 5, 'Software', 'desc', NULL, '2015-07-03 19:19:39'),
(48, 'Indefinite integrals.mp4', 4, 'Calculus', 'Indefinite Integrals', 'Gladys Nankya', '2015-07-04 06:19:54'),
(49, 'Application of integrals Problem1.mp4', 4, 'Clculus', 'Application of integrals', 'Gladys Nankya', '2015-07-04 06:20:29'),
(50, 'Quadratic Equation.mp4', 4, 'Equations', 'Quadratic Equations', 'Gladys Nankya', '2015-07-04 06:21:18'),
(51, 'Simultaneous Equations Solving Graphically.mp4', 4, 'Equations', 'Simultaneous Equations', 'Gladys Nankya', '2015-07-04 06:21:53'),
(52, 'LimitsandDerivatives.mp4', 4, 'Limits and Derivatives', 'Limits and Derivatives', NULL, '2015-07-04 06:50:06'),
(53, 'Adaptation Of The Human Eye.mp4', 1, 'Light', 'Adaptation of Human Eye', 'Gladys Nankya', '2015-07-04 11:06:42'),
(54, 'An Effect of Dispersion.mp4', 1, 'Light', 'An effect on Dispersion', 'Gladys Nankya', '2015-07-04 11:07:24'),
(55, 'Application of Lasers.mp4', 1, 'Light', 'Application of Lasers', 'Gladys Nankya', '2015-07-04 11:07:51'),
(56, 'Astigmatism.mp4', 1, 'Light', 'Defects of Vision', 'Gladys Nankya', '2015-07-04 11:09:54'),
(57, 'Color Filters An Activity.mp4', 1, 'Light', 'Color Filters', 'Gladys Nankya', '2015-07-04 11:10:46'),
(58, 'Colour Phenomena In Nature.mp4', 1, 'Light', 'Color Phenomena in nature', 'Gladys Nankya', '2015-07-04 11:23:01'),
(59, 'Compound Microscope.mp4', 1, 'Light', 'Compound Microscrope', 'Gladys Nankya', '2015-07-04 11:23:47'),
(60, 'Determination of Focal Length of Concave Mirror.mp4', 1, 'Light', 'Determination of focal length', 'Gladys Nankya', '2015-07-04 11:24:23'),
(61, 'Diffraction  of Light.mp4', 1, 'Light', 'Diffraction of Light', 'Gladys Nankya', '2015-07-04 11:24:50'),
(62, 'Determination of the Focal Length of a Convex Lens.mp4', 1, 'Light', 'Determination of focal length', 'Gladys Nankya', '2015-07-04 11:25:33'),
(63, 'Dispersion Of  White Light.mp4', 1, 'Light', 'Dispersion of Light', 'Gladys Nankya', '2015-07-04 11:30:06'),
(64, 'Effects of Total Internal Reflection.mp4', 1, 'Light', 'Effects of total Internal Reflection', 'Gladys Nankya', '2015-07-04 11:30:51'),
(65, 'Experiment to Measure the Angle of Deviation of a Prism.mp4', 1, 'Light', 'As a ray of light enters a transparent material, the ray''s direction is deflected, based on both the entrance angle (typically measured relative to the perpendicular to the surface) and the material''s refractive index, and according to Snell''s Law. A beam passing through an object like a prism or water drop is deflected twice: once entering, and again when exiting. The sum of these two deflections is called the deviation angle', 'Gladys Nankya', '2015-07-04 11:33:10'),
(66, 'Formation Of Image By a Concave Mirror In Ray Diagram.mp4', 1, 'Light', 'When an object is placed at infinity, the rays coming from it are parallel to each other. Let us consider two rays, one striking the mirror at its pole and the other passing through the centre of curvature. The ray which is incident at the pole gets reflected according to the law of reflection and the second ray which passes through the centre of curvature of the mirror retraces its path. These rays after reflection form an image at the focus. The image formed is real, inverted and diminished.', 'Gladys Nankya', '2015-07-04 11:53:58'),
(67, 'Formation of Image by a convex Mirror In Ray Diagram(1).mp4', 1, 'Light', 'Any incident ray traveling parallel to the principal axis on the way to a convex mirror will reflect in such a manner that its extension will pass through the focal point. Any incident ray traveling towards a convex mirror such that its extension passes through the focal point will reflect and travel parallel to the principal axis.', 'Gladys Nankya', '2015-07-04 12:05:24'),
(68, 'Image Formation by a Concave Lens.mp4', 1, 'Light', 'Concave lenses are thinner at the middle. Rays of light that pass through the lens are spread out (they diverge). A convex lens is a diverging lens. When parallel rays of light pass through a concave lens the refracted rays diverge so that they appear to come from one point called the principal focus. The distance between the principal focus and the centre of the lens is called the focal length. The image formed is virtual and diminished (smaller)', 'Gladys Nankya', '2015-07-04 12:12:25'),
(69, 'Image Formation by a Convex Lens When the Object is at Infinity.mp4', 1, 'Light', 'Convex lenses are thicker at the middle. Rays of light that pass through the lens are brought closer together (they converge). A convex lens is a converging lens. When parallel rays of light pass through a convex lens the refracted rays converge at one point called the principal focus. The distance between the principal focus and the centre of the lens is called the focal length.', 'Gladys Nankya', '2015-07-04 12:14:08'),
(70, 'Interference.mp4', 1, 'Light', 'In order for an interference pattern to be stable the waves must be emitted from coherent and monochromatic sources. • Most natural light sources are both non-coherent and polychromatic so interference is not widely observed in nature', 'Gladys Nankya', '2015-07-04 12:43:21'),
(71, 'Kaleidoscope.mp4', 1, 'Light', 'Kaleidoscope', 'Gladys Nankya', '2015-07-04 12:47:49'),
(72, 'Laser.mp4', 1, 'Light', 'A laser is a device that emits light through a process of optical amplification based on the stimulated emission of electromagnetic radiation.', 'Gladys Nankya', '2015-07-04 12:50:15'),
(73, 'Lens Camera.mp4', 1, 'Light', 'A camera lens (also known as photographic lens or photographic objective) is an optical lens or assembly of lenses used in conjunction with a camera body and mechanism to make images of objects either on photographic film or on other media capable of storing an image chemically or electronically', 'Gladys Nankya', '2015-07-04 12:52:11'),
(74, 'Lenses.mp4', 1, 'Light', 'A lens is a transmissive optical device that affects the focus of a light beam through refraction. A simple lens consists of a single piece of material, while a compound lens consists of several simple lenses (elements), usually along a common axis. Lenses are made from transparent materials such as glass, ground and polished to a desired shape. A lens can focus light to form an image, unlike a prism, which refracts light without focusing', 'Gladys Nankya', '2015-07-04 12:55:46'),
(75, 'Mixing of Colours or Spectral Colours(1).mp4', 1, 'Light', 'Mixing of colours', 'Gladys Nankya', '2015-07-04 13:00:44'),
(76, 'Mixing of Pigments.mp4', 1, 'Light', 'mixing of pigments', 'Gladys Nankya', '2015-07-04 13:09:06'),
(77, 'Myopia..mp4', 1, 'Light', 'Myopia is is a condition of the eye where the light that comes in does not directly focus on the retina but in front of it, causing the image that one sees when looking at a distant object to be out of focus, but in focus when looking at a close object', 'Gladys Nankya', '2015-07-04 13:11:55'),
(78, 'Optical Fibres.mp4', 1, 'Light', 'An optical fiber (or optical fibre) is a flexible, transparent fiber made by drawing glass (silica) or plastic to a diameter slightly thicker than that of a human hair. Optical fibers are used most often as a means to transmit light between the two ends of the fiber and find wide usage in fiber-optic communications, where they permit transmission over longer distances and at higher bandwidths (data rates) than wire cables', 'Gladys Nankya', '2015-07-04 13:17:54'),
(79, 'Perfect Black Body and Its Spectrum.mp4', 1, 'Light', 'A black body in thermal equilibrium (that is, at a constant temperature) emits electromagnetic radiation called black-body radiation. The radiation is emitted according to Planck', 'Gladys Nankya', '2015-07-04 13:22:18'),
(80, 'Periscope.mp4', 1, 'Light', 'A periscope is an instrument for observation over, around or through an object, obstacle or condition that prevents direct line-of-sight observation from an observer', 'Gladys Nankya', '2015-07-04 13:25:33'),
(81, 'Production of Laser.mp4', 1, 'Light', 'A laser is a device that emits light through a process of optical amplification based on the stimulated emission of electromagnetic radiation.A laser differs from other sources of light in that it emits light coherently. Spatial coherence allows a laser to be focused to a tight spot, enabling applications such as laser cutting and lithography', 'Gladys Nankya', '2015-07-04 13:35:32'),
(85, 'Rectilinear Propagation of Light(1).mp4', 1, 'Light', 'In a homogenous transparent medium light travels in a straight line and this is known as rectilinear propagation of light', 'Gladys Nankya', '2015-07-04 17:29:23'),
(86, 'Real Depth and Apparent Depth.mp4', 1, 'Light', 'The refraction of light at the surface of water makes ponds and swimming pools appear shallower than they really are. A 1m deep pond would only appear to be 0.75 m deep when viewed from directly above. Refractive index = real depth/apparent depth', 'Gladys Nankya', '2015-07-04 17:34:07'),
(87, 'Recombination of the Dispersed White Light.mp4', 1, 'Light', 'Recombination of the seven colors of the dispersed white light to get white light is known as Recomposition of white light', 'Gladys Nankya', '2015-07-04 17:40:22'),
(88, 'Reflection of Light.mp4', 1, 'Light', 'LAW OF REFLECTION FROM FLAT MIRRORS. The incident ray, the reflected ray, and the normal to the surface all lie in the same plane, and the angle of incidence, ?i , equals the angle of reflection, ?r. ', 'Gladys Nankya', '2015-07-04 17:48:22'),
(89, 'Reflection On The basis Of Wave Theory.mp4', 1, 'Light', 'The wave theory of light was proposed by Huygen in 1678.  The main features of Huygen’s wave theory of light are as follows:  1. According to Huygen, light is propagated in the form of waves. 2. The waves are emitted from a source of light and travel with a very high velocity. 3. The waves can propagate in all possible directions with a constant velocity in a homogeneous medium. 4. When these waves enter our eyes, we get the sensation of light. 5. The different colors of light are due to the different wavelengths of the light waves.', 'Gladys Nankya', '2015-07-04 17:57:22'),
(90, 'Refractive Index of Glass by Apparent Depth Method.mp4', 1, 'Light', 'Refrative Index of glass by apparent method', 'Gladys Nankya', '2015-07-04 18:17:15'),
(91, 'Some Effects of Refraction.mp4', 1, 'Light', 'Effects of Refration', 'Gladys Nankya', '2015-07-04 18:18:15'),
(92, 'Simple Microscope.mp4', 1, 'Light', 'A magnifying glass, an ordinary double convex lens having a short focal length, is a simple microscope. The reading lens and hand lens are instruments of this type. When an object is placed nearer such a lens than its principal focus, i.e., within its focal length, an image is produced that is erect and larger than the original object. The image is also virtual; i.e., it cannot be projected on a screen as can a real image.', 'Gladys Nankya', '2015-07-04 18:20:53'),
(93, 'To Measure The Radius of Curvature Of a Spherical Surface.mp4', 1, 'Light', 'Experiment to measure the radius of  curvature of Spherical surface', 'Gladys Nankya', '2015-07-04 18:22:53'),
(94, 'Total Internal Reflection Physics.mp4', 1, 'Light', 'Total internal reflection is a phenomenon which occurs when a propagating wave strikes a medium boundary at an angle larger than a particular critical angle with respect to the normal to the surface.', 'Gladys Nankya', '2015-07-04 18:24:22'),
(95, 'Uses of Lenses.mp4', 1, 'Light', 'Uses of Lenses', 'Gladys Nankya', '2015-07-04 18:25:00'),
(96, 'Uses Of Spherical Mirrors(1).mp4', 1, 'Light', 'Uses of Spherical mirrors', 'Gladys Nankya', '2015-07-04 18:25:36'),
(97, 'Verification of the Laws of Reflection.mp4', 1, 'Light', 'According to the laws of reflection the incident ray, reflected ray and the normal at the point of incidence all lie in the same plane. The angle of incidence is equal to the angle of reflection.', 'Gladys Nankya', '2015-07-04 18:32:28'),
(98, 'Verification Of Snells Law using Huygens Principle.mp4', 1, 'Light', 'Snells law states that the ratio of the sines of the angles of incidence and refraction is equivalent to the ratio of phase velocities in the two media, or equivalent to the reciprocal of the ratio of the indices of refraction.', 'Gladys Nankya', '2015-07-04 18:36:37'),
(99, 'Tyndall Effect.mp4', 1, 'Light', 'Tyndall effect, also known as Tyndall scattering, is light scattering by particles in a colloid or particles in a fine suspension. Under the Tyndall effect, the longer-wavelength light is more transmitted while the shorter-wavelength light is more reflected via scattering.', 'Gladys Nankya', '2015-07-04 18:39:23'),
(100, '2. Alternating Current Generator.mp4', 1, 'Electricity', 'A.C. generators or alternators (as they are usually called) operate on the same fundamental principles of electromagnetic induction as D.C. generators.     Alternating voltage may be generated by rotating a coil in the magnetic field or by rotating a magnetic field within a stationary coil. The value of the voltage generated depends on-                       the number of turns in the coil.                       strength of the field.                       the speed at which the coil or magnetic field rotates.', 'Gladys Nankya', '2015-07-04 18:46:26'),
(101, '3. Capacitors.mp4', 1, 'Electricity', 'A capacitor is a device for storing charge, made up of two parallel plates with a space between them. The plates have an equal and opposite charge on them, creating a potential difference between the plates.', 'Gladys Nankya', '2015-07-04 20:32:15'),
(102, '4. Charging an Electroscope by Induction.mp4', 1, 'Electricity', 'An electroscope is made up of a couple of very thin metal leaves that hang down near to each other. They are connected to a metal rod that extends upwards, and ends in a knob on the end.', 'Gladys Nankya', '2015-07-04 20:35:55'),
(103, '12. Dry Cell.mp4', 1, 'Electricity', 'The video shows the composition of a dry cell and how it works', 'Gladys Nankya', '2015-07-04 21:06:40'),
(104, '11. Dry Cell Batteries.mp4', 1, 'Electricity', 'The video shows the different parts of a dry cell', 'Gladys Nankya', '2015-07-04 21:07:17'),
(105, '5. Common Types Of Circuits.mp4', 1, 'Electricity', 'Different types of circuits', 'Gladys Nankya', '2015-07-04 21:10:22'),
(106, '6. Conductors Insulators and Semi Conductors.mp4', 1, 'Electricity', 'Classification of materials', 'Gladys Nankya', '2015-07-04 21:10:59'),
(107, '9. Dc Generator.mp4', 1, 'Electricity', 'Video shows how a DC generator works', 'Gladys Nankya', '2015-07-04 21:11:39'),
(108, '8. Coulomb''s Torsion Balance.mp4', 1, 'Electricity', 'Experiment on Coulomb''s law of electrostatics', 'Gladys Nankya', '2015-07-04 21:13:11'),
(109, '7. Copper Voltameter.mp4', 1, 'Electricity', 'The video shows how the Cooper Voltmeter is used in electrolysis', 'Gladys Nankya', '2015-07-04 21:18:39'),
(110, '10. DC Motor.mp4', 1, 'Electricity', 'Application of DC generator', 'Gladys Nankya', '2015-07-04 21:19:45'),
(111, '13. Electric Charge.mp4', 1, 'Electricity', 'Experiment showing behaviour of static electric charges', 'Gladys Nankya', '2015-07-04 21:22:37'),
(112, '14. Electric Field Lines.mp4', 1, 'Electricity', 'An electric field can be represented diagrammatically as a set of lines with arrows on, called electric field-lines, which fill space. Electric field-lines are drawn according to the following rules: The direction of the electric field is everywhere tangent to the field-lines, in the sense of the arrows on the lines. The magnitude of the field is proportional to the number of field-lines per unit area passing through a small surface normal to the lines. Thus, field-lines determine the magnitude, as well as the direction, of the electric field. In particular, the field is strong at points where the field-lines are closely spaced, and weak at points where they are far apart.', 'Gladys Nankya', '2015-07-04 21:26:52'),
(113, '15. Electric Flux.mp4', 1, 'Electricity', 'The electric flux through an area is defined as the electric field multiplied by the area of the surface projected in a plane perpendicular to the field', 'Gladys Nankya', '2015-07-04 21:30:09'),
(114, '16. Electric Fuse.mp4', 1, 'Electricity', 'Application of electricity', 'Gladys Nankya', '2015-07-04 21:35:40'),
(115, '17. Electrical method Of Magnetisation.mp4', 1, 'Electricity', 'Experiment showing magnetic effect of an electric current', 'Gladys Nankya', '2015-07-04 21:42:28'),
(116, '21. Gold Leaf Electroscope.mp4', 1, 'Electricity', 'Experiment that is used to detect electric charge on a body', 'Gladys Nankya', '2015-07-04 22:04:23'),
(117, '32. Ohm''s Law.mp4', 1, 'Electricity', 'Verification of Ohms Law', 'Gladys Nankya', '2015-07-04 22:07:23'),
(118, '22. Hydroelectric Power Plant.mp4', 1, 'Electricity', 'The video shows how hydroelectricity plant works', 'Gladys Nankya', '2015-07-04 22:12:50'),
(119, '23. Integrated Circuit.mp4', 1, 'Electricity', 'Applications of Integrated circuits', 'Gladys Nankya', '2015-07-04 22:16:57'),
(120, '24. Intrinsic And Extrinsic Semi Conductors1.mp4', 1, 'Electricity', 'Classification of semi conductors', 'Gladys Nankya', '2015-07-04 22:18:04'),
(121, '25. Kirchoffs Law.mp4', 1, 'Electricity', 'Kirchoff''s law of electricity', 'Gladys Nankya', '2015-07-04 22:21:02'),
(122, '26. Leclanche Cell.mp4', 1, 'Electricity', 'Leclanche cell', 'Gladys Nankya', '2015-07-04 22:26:54'),
(123, '27. Lightning Conductor.mp4', 1, 'Electricity', 'Lightning conductor', 'Gladys Nankya', '2015-07-04 22:28:49'),
(124, '19. Electrification or Charging of a Body.mp4', 1, 'Electricity', 'Charging means gaining or losing electron. Matters can be charged with three ways, charging by friction, charging by contact and charging by induction.', '0', '2015-07-05 05:03:24'),
(125, '29. Logic Gate..mp4', 1, 'Electricity', 'Logic gate is digital circuit which allows signal to pass through it and if only certain logical conditions are satisfied.', '0', '2015-07-05 05:05:23'),
(126, 'AcGenerator.mp4', 1, 'Electricity', 'This is a video on the AC Generator', NULL, '2015-07-05 05:38:53'),
(127, 'Refrigerators.mp4', 1, 'Heat and Thermodynamics', 'Refrigerators', 'Gladys Nankya', '2015-07-05 11:38:27'),
(128, 'Mechanical Equivalent Of Heat.mp4', 1, 'Heat and Thermodynamics', 'Mechanical Equivalent of Heat', 'Gladys Nankya', '2015-07-05 11:39:40'),
(129, 'Mass Dependence Of Heat Capacity.mp4', 1, 'Heat and Thermodynamics', 'Mass Dependence on Heat', 'Gladys Nankya', '2015-07-05 12:05:23'),
(130, 'Calibration Of a Thermometer.mp4', 1, 'Heat and Thermodynamics', 'Calibration of a thermometer', 'Gladys Nankya', '2015-07-05 12:06:24'),
(131, 'Ascentofsap.mp4', 3, 'Plants', 'Ascent of sap', NULL, '2015-07-06 03:44:52'),
(132, 'Pollination.mp4', 3, 'Plants', 'Pollination', NULL, '2015-07-06 03:49:19'),
(133, 'Ascent of sap (3) (1).mp4', 3, 'Plants', 'ascent of sap 1', 'Gladys Nankya', '2015-07-06 12:10:01'),
(134, 'Binary fission in Amoeba (1).mp4', 3, 'Binary Fusion', 'Binary Fusion in Amoeba', '0', '2015-07-06 17:12:11'),
(135, 'Binary fission in Amoeba Part 2.mp4', 3, 'Binary Fusion', 'Binary Fusion in Amoeba Part 2', '0', '2015-07-06 17:16:09'),
(136, 'Absorption root.mp4', 3, 'Plants', 'Roots Absorption', 'Gladys Nankya', '2015-07-06 17:47:30'),
(137, 'Root Absorption Part2.mp4', 3, 'Plants', 'Roots Absorption', 'Gladys Nankya', '2015-07-06 18:00:31'),
(138, 'Root Absorption Part 3.mp4', 3, 'Plants', 'Root Absorption', 'Gladys Nankya', '2015-07-06 18:11:18'),
(139, 'Root Absorption Part 4.mp4', 3, 'Plants', 'Root Absorption', 'Gladys Nankya', '2015-07-06 18:21:47'),
(141, '25. Ionic Bonding.mp4', 2, 'Bonding', 'Ionic Bonding', 'Gladys Nankya', '2015-07-06 19:30:56'),
(142, '26. Covalent Bonding.mp4', 2, 'Bonding', 'Covalent Bonding', 'Gladys Nankya', '2015-07-06 19:31:33'),
(143, '27. Polar Covalent Bonding.mp4', 2, 'Bonding', 'Polar covalent bonding', 'Gladys Nankya', '2015-07-06 19:32:48'),
(144, '28. Hydrogen.mp4', 2, 'Hydrogen and its Compound', 'Hydrogen', 'Gladys Nankya', '2015-07-06 19:40:11'),
(145, '28. Hydrogen Continued.mp4', 2, 'Hydrogen and its Compound', 'Hydrogen Continued', 'Gladys Nankya', '2015-07-06 19:44:02'),
(146, '29. Hydrogen is Lighter Than Air.mp4', 2, 'Hydrogen and its Compound', 'Hydrogen - Lighter than Air', 'Gladys Nankya', '2015-07-06 19:49:54'),
(147, '30. Laboratory Preparation Of Hydrogen.mp4', 2, 'Hydrogen and its Compound', 'Laboratory preparation of Hydrogen', 'Gladys Nankya', '2015-07-06 19:50:40'),
(148, '31. Preparation of Hydrogen Sulphide.mp4', 2, 'Hydrogen and its Compound', 'preparation of Hydrogen Sulphide', 'Gladys Nankya', '2015-07-06 19:51:28'),
(149, '32. Laboratory Preparation of Dihydrogen.mp4', 2, 'Hydrogen and its Compound', 'Lab preparation of diHydrogen', 'Gladys Nankya', '2015-07-06 19:52:52'),
(150, '33. Manufacture of Dihydrogen.mp4', 2, 'Hydrogen and its Compound', 'Manufacture of diHydrogen', 'Gladys Nankya', '2015-07-06 19:53:28'),
(151, '73. Chemical Properties Of Hydrogen Combustion.mp4', 2, 'Hydrogen and its Compound', 'Chemical properties of Hydrogen', 'Gladys Nankya', '2015-07-06 19:55:31'),
(152, '1. Classification of Matter.mp4', 2, 'Matter', 'Classification of Matter', 'Gladys Nankya', '2015-07-06 19:57:36'),
(153, '1. What Is A Chemical Compound.mp4', 2, 'Inorganic Chemistry', 'Chemical Compounds', 'Gladys Nankya', '2015-07-09 06:05:16'),
(154, '2. Percentage Composition of a Compound.mp4', 2, 'Inorganic Chemistry', 'How to find the percentage composition of a compound', 'Gladys Nankya', '2015-07-09 06:07:26'),
(155, '4. Structure Of an Atom.mp4', 2, 'Inorganic Chemistry', 'Structure of an Atom', 'Gladys Nankya', '2015-07-09 06:08:45'),
(156, '5. Alpha, Beta and Gamma Radiations.mp4', 2, 'Inorganic Chemistry', 'Alpha and Beta radiations', 'Gladys Nankya', '2015-07-09 06:09:46'),
(157, '8. Major Divisions of the Periodic Table.mp4', 2, 'Inorganic Chemistry', 'Periodic Table', 'Gladys Nankya', '2015-07-09 06:14:09'),
(158, '9. Summary Of Periodic Properties.mp4', 2, 'Inorganic Chemistry', 'Periodic properties', 'Gladys Nankya', '2015-07-09 06:14:41'),
(159, '10. Physical Properties of Metals.mp4', 2, 'Inorganic Chemistry', 'Physical properties of metals', 'Gladys Nankya', '2015-07-09 06:17:44'),
(160, '11. Metal Reactivity Series.mp4', 2, 'Inorganic Chemistry', 'Reactivity  series of metals', 'Gladys Nankya', '2015-07-09 06:18:54'),
(161, '12. Reaction of Non Metals with Oxygen.mp4', 2, 'Inorganic Chemistry', 'Reaction of metals with Oxygen', 'Gladys Nankya', '2015-07-09 06:19:52'),
(162, '13. Manufacture of Steel by Bessemer Process.mp4', 2, 'Inorganic Chemistry', 'Manufacture of Steel', 'Gladys Nankya', '2015-07-09 06:21:08'),
(163, '14. Extraction of Copper.mp4', 2, 'Inorganic Chemistry', 'Extraction of Copper', 'Gladys Nankya', '2015-07-09 06:21:56'),
(165, '17. Action of Indicators on Acids and Bases.mp4', 2, 'Acids, Bases and Salts', 'Action of Indicators on Acids and Bases', 'Gladys Nankya', '2015-07-09 06:31:46'),
(166, '18. Carbon Dioxide Detection.mp4', 2, 'Acids, Bases and Salts', 'Reaction of Acid with carbondioxide', 'Gladys Nankya', '2015-07-09 06:34:26'),
(167, '19. Hydrogen Detection.mp4', 2, 'Acids, Bases and Salts', 'Hydrogen detection', 'Gladys Nankya', '2015-07-09 06:39:49'),
(168, '21. Types Of Chemical Reactions.mp4', 2, 'Inorganic Chemistry', 'Types of Chemical reactions', 'Gladys Nankya', '2015-07-09 06:40:59'),
(169, '22. Osmosis.mp4', 2, 'Inorganic Chemistry', 'Osmosis', 'Gladys Nankya', '2015-07-09 06:41:34'),
(170, '23. Molecular Formula of a Compound Numerical.mp4', 2, 'Inorganic Chemistry', 'Molecular Formula of a compound', 'Gladys Nankya', '2015-07-09 06:42:41'),
(171, '25. Gay Lussac''s Law of Combining Volumes.mp4', 2, 'Inorganic Chemistry', 'Gay Lussac''s Law', 'Gladys Nankya', '2015-07-09 06:47:21'),
(172, '27. Arrangement Of Electrons In An Atoms.mp4', 2, 'Inorganic Chemistry', 'Arrangement of electrons in an atom', 'Gladys Nankya', '2015-07-09 06:48:13'),
(173, '29. Bohr''s Model of Atom.mp4', 2, 'Inorganic Chemistry', 'Bohr''s Model of an Atom', 'Gladys Nankya', '2015-07-09 06:49:05'),
(174, '30. Froth Floatation Process.mp4', 2, 'Inorganic Chemistry', 'Froth Flotation process', 'Gladys Nankya', '2015-07-09 06:49:50'),
(175, '31. IUPAC  Names And Structures Of Hydrocarbons An Activity.mp4', 2, 'Hydrocarbons', 'Names and Structures of Hydrocarbons', 'Gladys Nankya', '2015-07-09 06:53:04'),
(176, '33. S Block Element In the Modern periodic Table.mp4', 2, 'Periodic Table', 'S Block elements', 'Gladys Nankya', '2015-07-09 06:54:47'),
(177, '34. Hydraulic Washing.mp4', 2, 'Inorganic Chemistry', 'Hydraulic Washing', 'Gladys Nankya', '2015-07-09 06:55:30'),
(178, '35. Action of Acid on Alkaline Neutralisation.mp4', 2, 'Acids, Bases and Salts', 'Action of an acid on Alkaline neutralization', 'Gladys Nankya', '2015-07-09 06:56:21'),
(179, '35. Blast Furnace For The Extraction Of Copper.mp4', 2, 'Inorganic Chemistry', 'Extraction of Copper', 'Gladys Nankya', '2015-07-09 06:56:53'),
(180, '36. Thermal Equilibrium.mp4', 2, 'Inorganic Chemistry', 'Thermal Equilibrium', 'Gladys Nankya', '2015-07-09 06:58:09'),
(181, '37. To Separate a Mixture of Water and Sulphur.mp4', 2, 'Inorganic Chemistry', 'Separation of a mixture of Sulfur and Water', 'Gladys Nankya', '2015-07-09 06:59:16'),
(182, '38. To separate Ammonium Chloride from Sand.mp4', 2, 'Inorganic Chemistry', 'Separation of Ammonium Chloride from sand', 'Gladys Nankya', '2015-07-09 07:00:38'),
(183, '39. To Separate Common Salt From Common Salt Sodium.mp4', 2, 'Inorganic Chemistry', 'Separation of common salt from brine', 'Gladys Nankya', '2015-07-09 07:02:36'),
(184, '40. Filtration.mp4', 2, 'Inorganic Chemistry', 'Filtration', 'Gladys Nankya', '2015-07-09 07:03:11'),
(185, '41. Electrolytes and Non Electrolytes.mp4', 2, 'Inorganic Chemistry', 'Electrolytes and non electrolytes', 'Gladys Nankya', '2015-07-09 07:04:04'),
(186, '42. Metallurgy of Aluminium.mp4', 2, 'Inorganic Chemistry', 'Extraction of Aluminium', 'Gladys Nankya', '2015-07-09 07:04:42'),
(187, '43. Ammonia.mp4', 2, 'Ammonia', 'Ammonia', 'Gladys Nankya', '2015-07-09 07:05:41'),
(188, '44. Catalytic Oxidation of Ammonia.mp4', 2, 'Ammonia', 'Catalytic oxidation of Ammonia', 'Gladys Nankya', '2015-07-09 07:06:15'),
(189, '46. Uses Of Ammonia.mp4', 2, 'Ammonia', 'Uses of ammonia', 'Gladys Nankya', '2015-07-09 07:06:46'),
(190, '47. Preparation of Ammonia.mp4', 2, 'Ammonia', 'Preparation of  ammonia', 'Gladys Nankya', '2015-07-09 07:07:25'),
(191, '45. Ammonia Fountain Experiment.mp4', 2, 'Ammonia', 'Ammonia Fountain experiment', 'Gladys Nankya', '2015-07-09 07:08:53'),
(192, '48. Factors Affecting Solubility.mp4', 2, 'Inorganic Chemistry', 'Factors affecting solubility', 'Gladys Nankya', '2015-07-09 07:09:52'),
(193, '50. Composition of Alloys.mp4', 2, 'Inorganic Chemistry', 'Composition of alloys', 'Gladys Nankya', '2015-07-09 07:10:43'),
(194, '51. Electrolytes.mp4', 2, 'Inorganic Chemistry', 'Electrolytes', 'Gladys Nankya', '2015-07-09 07:11:48'),
(195, '52. Flow Chat For Extraction Of Aluminium.mp4', 2, 'Inorganic Chemistry', 'Flow Chart  for extraction of Aluminium', 'Gladys Nankya', '2015-07-09 07:12:46'),
(196, '53. Preparation Of Oxygen Using Hydrogen Peroxide.mp4', 2, 'Inorganic Chemistry', 'Preparation of Oxygen using hydrogen peroxide', 'Gladys Nankya', '2015-07-09 07:14:21'),
(197, '55. Bleaching Action of Sulphur Dioxide.mp4', 2, 'Inorganic Chemistry', 'Bleaching action of Sulphurdioxide', 'Gladys Nankya', '2015-07-09 07:15:12'),
(198, '54. Contact Process An Activity.mp4', 2, 'Inorganic Chemistry', 'Contact Process', 'Gladys Nankya', '2015-07-09 07:15:56'),
(199, '54. Preparation Of Oxygen Using Potassium Chlorate.mp4', 2, 'Inorganic Chemistry', 'Preparation of Oxygen using Potassium Chlorate', 'Gladys Nankya', '2015-07-09 07:17:20'),
(200, '56. Laboratory Preparation of Chlorine.mp4', 2, 'Inorganic Chemistry', 'Laboratory preparation of Chlorine', 'Gladys Nankya', '2015-07-09 07:18:49'),
(201, '57. Laboratory Preparation of Nitric Acid.mp4', 2, 'Nitric Acid', 'Laboratory preparation of Nitric Acid', 'Gladys Nankya', '2015-07-09 07:20:19'),
(202, '58. Laboratory Preparation of Sulphur Dioxide.mp4', 2, 'Inorganic Chemistry', 'Laboratory preparation of Sulphurdioxide', 'Gladys Nankya', '2015-07-09 07:21:56'),
(203, '60. Nitric Acid and Nitrates.mp4', 2, 'Nitric Acid', 'Nitric acid and Nitrates', 'Gladys Nankya', '2015-07-09 07:22:53'),
(204, '61. Preparation of Hydrochloric Acid.mp4', 2, 'Inorganic Chemistry', 'Preparation of Hydrochloric Acid', 'Gladys Nankya', '2015-07-09 07:24:04'),
(205, '62.Relative Atomic Mass.mp4', 2, 'Inorganic Chemistry', 'Relatve Atomic Mass', 'Gladys Nankya', '2015-07-09 07:25:21'),
(206, '59. Manufacturing of Bleaching Powder.mp4', 2, 'Inorganic Chemistry', 'Manufacturing of Bleaching powder', 'Gladys Nankya', '2015-07-09 07:26:23'),
(207, '1.  Action with Sodium Hydroxide.mp4', 2, 'Inorganic Chemistry', 'Action of Sodium hydroxide', 'Gladys Nankya', '2015-07-09 07:29:28'),
(208, '2. Allotropes of Carbon.mp4', 2, 'Organic chemistry', 'Allotrope of Carbon', 'Gladys Nankya', '2015-07-09 07:30:17'),
(209, '3. Catenation in Carbon.mp4', 2, 'Organic chemistry', 'Catenation of Carbon', 'Gladys Nankya', '2015-07-09 07:31:02'),
(210, '5. Carbon cycle in nature.mp4', 2, 'Organic chemistry', 'Carbon cycle in nature', 'Gladys Nankya', '2015-07-09 07:32:00'),
(211, '6. Dehydrating property of concetrated sulphuric acid.mp4', 2, 'Sulphuric Acid', 'Dehydrating property of concentrated Sulphuric acid', 'Gladys Nankya', '2015-07-09 07:43:33'),
(212, '7. Ethyne.mp4', 2, 'Organic chemistry', 'Ethyne', 'Gladys Nankya', '2015-07-09 07:44:02'),
(213, '10. Functional groups in organic compounds.mp4', 2, 'Organic chemistry', 'Functional groups in organic compounds', 'Gladys Nankya', '2015-07-09 07:44:45'),
(214, '13. Identification of functional groups.mp4', 2, 'Organic chemistry', 'Identification of Functional groups', 'Gladys Nankya', '2015-07-09 07:45:57'),
(215, '8. Extraction of petroleum.mp4', 2, 'Organic chemistry', 'Extraction of Petroleum', 'Gladys Nankya', '2015-07-09 07:46:31'),
(216, '9. Fractions of petroleum.mp4', 2, 'Organic chemistry', 'Fractions of Petroleum', 'Gladys Nankya', '2015-07-09 07:47:02'),
(217, '11. Gram molecular volume.mp4', 2, 'Organic chemistry', 'Gram molecular volume', 'Gladys Nankya', '2015-07-09 07:47:44'),
(218, '12. Hydrocarbons.mp4', 2, 'Organic chemistry', 'Hydrocarbons', 'Gladys Nankya', '2015-07-09 07:48:35'),
(219, '14. Isomerism in Butane.mp4', 2, 'Organic chemistry', 'Isomerism in Butane', 'Gladys Nankya', '2015-07-09 07:49:02'),
(220, '15. Isomerism in Pentane.mp4', 2, 'Organic chemistry', 'Isomerism in Pentane', 'Gladys Nankya', '2015-07-09 07:49:38'),
(221, '17. Methane.mp4', 2, 'Organic chemistry', 'Methane', 'Gladys Nankya', '2015-07-09 07:50:09'),
(222, '18. Polar convalent bonding.mp4', 2, 'Organic chemistry', 'Polar covalent bonding', 'Gladys Nankya', '2015-07-09 07:50:36'),
(223, '19. Chemical properties of Ethanol.mp4', 2, 'Organic chemistry', 'Chemical Properties of Ethanol', 'Gladys Nankya', '2015-07-09 07:51:55'),
(224, '16. Lab preperation of Carbondioxide.mp4', 2, 'Organic chemistry', 'Laboratory preparation of Carbondioxide ', 'Gladys Nankya', '2015-07-09 07:52:45'),
(225, '20. Test for hydrocarbons.mp4', 1, 'Organic chemistry', 'Test for hydrocarbons', 'Gladys Nankya', '2015-07-09 07:53:12'),
(227, '21. Zone refining.mp4', 2, 'Organic chemistry', 'Zone refining', 'Gladys Nankya', '2015-07-09 07:55:09'),
(228, '22. Action with Ammonium hydroxide.mp4', 2, 'Organic chemistry', 'Acttion with Ammonium hydroxide', 'Gladys Nankya', '2015-07-09 07:56:00'),
(229, '1. Classification of Matter.mp4', 2, 'Physical Chemistry', 'Classification of Matter', 'Gladys Nankya', '2015-07-09 08:12:34'),
(230, '2 Forms of matter.mp4', 2, 'Physical Chemistry', 'Forms of matter', 'Gladys Nankya', '2015-07-09 08:13:07'),
(231, '4. The Static State.mp4', 2, 'Physical Chemistry', 'The Static state', 'Gladys Nankya', '2015-07-09 08:13:36'),
(232, '5. Change of State.mp4', 2, 'Physical Chemistry', 'Change of state', 'Gladys Nankya', '2015-07-09 08:14:46'),
(233, '6. Different States of Water.mp4', 2, 'Physical Chemistry', 'Different states of water', 'Gladys Nankya', '2015-07-09 08:15:22'),
(234, '7. Liquation.mp4', 2, 'Physical Chemistry', 'Liquation', 'Gladys Nankya', '2015-07-09 08:15:53'),
(235, '8. Air is Necessary for Combustion.mp4', 2, 'Physical Chemistry', 'Air is necessary for combustion', 'Gladys Nankya', '2015-07-09 08:16:20'),
(236, '9. Study Of Gas Laws.mp4', 2, 'Physical Chemistry', 'Study of Gas Laws', 'Gladys Nankya', '2015-07-09 08:16:48'),
(237, '10. Physical And Chemical Changes.mp4', 2, 'Physical Chemistry', 'Physical and Chemical changes', 'Gladys Nankya', '2015-07-09 08:17:21'),
(238, '11. Difference in Chemical and Physical Changes.mp4', 2, 'Physical Chemistry', 'Difference in chemical and physical changes', 'Gladys Nankya', '2015-07-09 08:18:08'),
(239, '14. Behaviour Of Perfect Gas And Kinetic Theory.mp4', 2, 'Physical Chemistry', 'Behaviour of a perfect gas and Kinetic theory', 'Gladys Nankya', '2015-07-09 08:19:29'),
(240, '15. Chemical Equilibrium.mp4', 2, 'Physical Chemistry', 'Chemical Equilibrium', 'Gladys Nankya', '2015-07-09 08:20:04'),
(241, '17. Reversible Reaction.mp4', 2, 'Physical Chemistry', 'Reversible reaction', 'Gladys Nankya', '2015-07-09 08:21:25'),
(242, '18. Irreversible Reaction.mp4', 2, 'Physical Chemistry', 'Irreversible reaction', 'Gladys Nankya', '2015-07-09 08:22:29'),
(243, '19. Dynamic Nature of Equilibrium.mp4', 2, 'Physical Chemistry', 'Dynamic nature of Equilibrium', 'Gladys Nankya', '2015-07-09 08:23:12'),
(244, '20. Solid Liquid Equilibrium.mp4', 2, 'Physical Chemistry', 'Solid Liquid Equilibrium', 'Gladys Nankya', '2015-07-09 08:23:44'),
(245, '22. Regelation.mp4', 2, 'Physical Chemistry', 'Regelation', 'Gladys Nankya', '2015-07-09 08:24:13'),
(246, '23. Arrangement Of Molecules In The Three States Of Matter.mp4', 2, 'Physical Chemistry', 'Arrangement of molecules', 'Gladys Nankya', '2015-07-09 08:24:40'),
(247, '21. Liquid Gas Equilibrium.mp4', 2, 'Physical Chemistry', 'Liquid Gas equilibrium', 'Gladys Nankya', '2015-07-09 08:25:52'),
(248, '25. Ionic Bonding.mp4', 2, 'Physical Chemistry', 'Ionic Bonding', 'Gladys Nankya', '2015-07-09 08:26:10'),
(249, '26. Covalent Bonding.mp4', 2, 'Physical Chemistry', 'Covalent Bonding', 'Gladys Nankya', '2015-07-09 08:27:13'),
(250, '27. Polar Covalent Bonding.mp4', 2, 'Physical Chemistry', 'Polar covalent bonding', 'Gladys Nankya', '2015-07-09 08:27:28'),
(251, '34. Spontaneous Combustion.mp4', 2, 'Physical Chemistry', 'Spontaneous Combustion', 'Gladys Nankya', '2015-07-09 08:30:50'),
(252, '35. Combustion and Fire Extinguishing.mp4', 2, 'Physical Chemistry', 'Combustion and fire extinguishing', 'Gladys Nankya', '2015-07-09 08:31:42'),
(253, '37. Calculating Molecular Masses Of Compounds.mp4', 2, 'Moles', 'Calculating molecular mass', 'Gladys Nankya', '2015-07-09 08:32:24'),
(254, '39. Factors Affecting Rate Of a Reaction An Activity.mp4', 2, 'Physical Chemistry', 'Factors affecting rate of reaction', 'Gladys Nankya', '2015-07-09 08:33:15'),
(255, '38. Problem on Relative Molecular Mass.mp4', 2, 'Physical Chemistry', 'Problem on relative molecular mass', 'Gladys Nankya', '2015-07-09 08:34:11'),
(256, '40. Effect Of Temperature On Rate Of Reaction.mp4', 2, 'Physical Chemistry', 'Effect of temperature on rate of reaction ', 'Gladys Nankya', '2015-07-09 08:35:13'),
(257, '41.Boyle''s Law.mp4', 2, 'Physical Chemistry', 'Boyles Law', 'Gladys Nankya', '2015-07-09 08:35:44'),
(258, '43. Boyle''s Law Graph.mp4', 2, 'Physical Chemistry', 'Boyles Law Graph', 'Gladys Nankya', '2015-07-09 08:36:45'),
(259, '44. Charle''s Law.mp4', 2, 'Physical Chemistry', 'Charles Law', 'Gladys Nankya', '2015-07-09 08:37:18'),
(260, '45. Charles Law Graph.mp4', 2, 'Physical Chemistry', 'Charles Law gragh', 'Gladys Nankya', '2015-07-09 08:37:46'),
(261, '46. Charles Law Simulation.mp4', 2, 'Physical Chemistry', 'Charles Law Simulation', 'Gladys Nankya', '2015-07-09 08:38:16'),
(262, 'Absorptionroot.mp4', 3, 'Transport', '', NULL, '2015-07-14 21:18:43'),
(263, 'AlimentarycanalandActionofenzymes.mp4', 3, 'Nutrition', '', NULL, '2015-07-14 21:22:03'),
(264, 'AutonomicNervousSystemnew.mp4', 3, 'Nervous System', 'Test', 'Moses Wasswa', '2015-07-29 08:01:45'),
(265, 'software2.mp4', 5, 'Software', 'This is a new description', 'Charles Mayanja', '2015-07-30 09:17:40');

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
-- AUTO_INCREMENT for table `fileclicks`
--
ALTER TABLE `fileclicks`
  MODIFY `id1` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `query_replies`
--
ALTER TABLE `query_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `quiz_answers`
--
ALTER TABLE `quiz_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `quiz_general`
--
ALTER TABLE `quiz_general`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `quiz_scores`
--
ALTER TABLE `quiz_scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
-- AUTO_INCREMENT for table `teacher_student_querries`
--
ALTER TABLE `teacher_student_querries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `theory`
--
ALTER TABLE `theory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=266;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
