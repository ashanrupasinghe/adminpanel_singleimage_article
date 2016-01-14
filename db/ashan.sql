-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2016 at 04:23 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ashan`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `text` text NOT NULL,
  `images` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `slug` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `text`, `images`) VALUES
(29, 'news 1', 'news-1', 'news 1 content', '7b35a86da4e9ea95d30247f101addcec.png'),
(30, 'asdadd', 'asdadd', 'sadadad', '950e84221416ca3fcfaa120f9525b1ae.png'),
(31, 'jashjahj', 'jashjahj', 'asjkasjk aksjakjsa aksjakjk', '77ab3d1ecb2d247d42531f58959fa2e4.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `fname` varchar(30) DEFAULT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `pw` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`fname`, `lname`, `email`, `pw`) VALUES
('Abcde', 'Efghi', 'abc@gmai8l.co', 'b24331b1a138cde62aa1f679164fc62f'),
('Amila', 'Wickramasinghe', 'amilaali@yahoo.com', '93f56ccb72718b484ea3464e0c670327'),
('Neranja', 'Rupasinghe', 'ashan@yahoo.com', '79c7267afa6de4aae0270dd6161d93b1'),
('Ashani', 'Paranamanna', 'ashani@gmail.com', 'aad619af8f7157a1d4d40cfbebf0de8e'),
('Ashan', 'Rupasinghe', 'ashanrupasinghe11@gmail.com', '442243bef16fca1c2684a31c04d47f95'),
('Gayan', 'Kavindha', 'gayan@gmail.com', 'a63791c9c0a875957baeb7666aa90546'),
('hazan', 'ahamed', 'hazan@gmail.com', 'e00709ca511eae138501eb9bda9dc5c0'),
('Kasun', 'Kalhara', 'kasun@gmail.com', 'a7ec7f64c1a11102a16ed9ba938d20a8'),
('Nimal', 'Laza', 'nimal@gmail.com', 'e088f2a18812b8b90e235430874a0762'),
('Nimesha', 'Gangani', 'nimesha@yahoo.com', 'cb65df9140db72e57032cc176e15815d'),
('Prashan', 'Rupasinghe', 'prasan@yahoo.com', '05cbaa860cb60d3e6d2007f8b7dc8f43'),
('Ranil', 'Wickramasinghe', 'ranil@gmail.com', '2f8a4431b0ba44c819be3ff2afcb9e06'),
('Sanjan', 'Mirihan', 'sanjana@gmail.com', 'c5990a201e678b5ff2d3ad5091753f2f'),
('Sujith', 'Tharanga', 'sujith@tekmaz.lk', 'c12b240b5710c6c9ee00ef4529803aac'),
('Uthpala', 'Bandara', 'uthpala@gmail.com', 'f23ecc6ad9d4983cc97dbf0f81ed0954'),
('Ashanz', 'Rupasinghez', 'zaaa@gmail.co', 'f0026b99ea045306b6f2a8d1426769ce');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
