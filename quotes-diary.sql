-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 03, 2020 at 06:58 PM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quotes-diary`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `status` int(255) NOT NULL,
  `likes` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_name`, `name`, `msg`, `status`, `likes`) VALUES
(2, 'AkashSingh', 'Akash Singh', 'Friendship is born at that moment when one person says to another: â€˜What! You too? I thought I was the only one.', 1, 0),
(3, 'AkashSingh', 'Akash Singh', 'This is my third post.', 1, 0),
(4, 'akash_singh', 'Akash Singh', 'A real friend is one who walks in when the rest of the world walks out.', 1, 0),
(5, 'akash_singh', 'Akash Singh', 'Sweet is the memory of distant friends! Like the mellow rays of the departing sun, it falls tenderly, yet sadly, on the heart.\r\n', 1, 0),
(6, 'akash_singh', 'Akash Singh', 'Thereâ€™s not a word yet for old friends whoâ€™ve just met.', 1, 0),
(7, 'asif_shaikh', 'Asif Shaikh', 'Lots of people want to ride with you in the limo, but what you want is someone who will take the bus with you when the limo breaks down.', 1, 0),
(8, 'asif_shaikh', 'Asif Shaikh', 'There is nothing I wouldnâ€™t do for those who are really my friends. I have no notion of loving people by halves; it is not my nature.', 1, 0),
(9, 'asif_shaikh', 'Asif Shaikh', 'A loyal friend laughs at your jokes when theyâ€™re not so good, and sympathizes with your problems when theyâ€™re not so bad.\r\n', 1, 0),
(10, 'ganesh_sawant', 'Ganesh sawant', 'Drawing includes three and a half quarters of the content of paintingâ€¦Drawing contains everything, except the hue.', 1, 0),
(11, 'ganesh_sawant', 'Ganesh sawant', 'I draw like other people bite their nails.', 1, 0),
(12, 'ganesh_sawant', 'Ganesh sawant', 'All the visible world is only light on form.', 1, 0),
(13, 'ganesh_sawant', 'Ganesh sawant', 'Drawing is vision on paper.', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `tag_line` varchar(255) NOT NULL,
  `profile_img` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pwd`, `tag_line`, `profile_img`, `user_name`, `status`) VALUES
(1, 'Akash Singh', 'akash9321singh@gmail.com', '$2y$10$ExeWGMdR7ty0Ad3ef13EEOOtQxf.fH6t6nLsq4vYdfI7a4rLVbn1O', 'This is Akash Singh', 'akash_singh_akashnew.jpeg', 'akash_singh', 1),
(2, 'Asif Shaikh', 'asifshaikh123@gmail.com', '$2y$10$BpU45/yTHd1mgqYth0vTl.MKD1g98voJVb8Nd5EQ47IkXEVr0qVpO', 'This is shayar boy!!', 'asif_shaikh_Asif.jpg', 'asif_shaikh', 1),
(3, 'Ganesh sawant', 'sawantganesh468@gmail.com', '$2y$10$gtWAoBGo09z41aRqFke1hO77zLMXhf5aQsQl4L6sWz5xGf2Q1B7By', 'I am artist', 'ganesh_sawant_Ganesh.jpg', 'ganesh_sawant', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
