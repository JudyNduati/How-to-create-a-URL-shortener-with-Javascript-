-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 05, 2021 at 10:08 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shorten-url`
--

-- --------------------------------------------------------

--
-- Table structure for table `url`
--

DROP TABLE IF EXISTS `url`;
CREATE TABLE IF NOT EXISTS `url` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `short_url` varchar(150) NOT NULL,
  `original_url` varchar(500) NOT NULL,
  `clicks` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `url`
--

INSERT INTO `url` (`id`, `short_url`, `original_url`, `clicks`) VALUES
(12, 'f4a8d', 'https://www.pcmag.com/how-to/how-to-capture-video-clips-in-windows-10', '0'),
(13, '73b7f', 'https://www.section.io/engineering-education/design-a-sign-up-and-login-gui-using-javafx/', '0'),
(14, '1d887', 'http://localhost/phpmyadmin/sql.php?db=shorten-url&table=url&pos=0', '0'),
(15, '2f299', 'https://support.microsoft.com/en-us/windows/fix-problems-with-xbox-game-bar-on-windows-10-74a718a1-2fbf-2ce3-5fbe-e959be352277#:~:text=If%20nothing%20happens%20when%20you,your%20Xbox%20Game%20Bar%20settings.&text=If%20Xbox%20Game%20Bar%20doesn,press%20it%20again%20to%20stop.', '0');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
