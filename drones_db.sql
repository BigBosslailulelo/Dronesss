-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 29-11-2024 a las 19:33:45
-- Versión del servidor: 5.7.40
-- Versión de PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `drones_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `drones`
--

DROP TABLE IF EXISTS `drones`;
CREATE TABLE IF NOT EXISTS `drones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `drone_id` varchar(50) NOT NULL,
  `drone_name` varchar(100) NOT NULL,
  `pilot_name` varchar(100) NOT NULL,
  `birth_date` date DEFAULT NULL,
  `contact_number` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `drone_type` enum('racing','cinematic','freestyle') NOT NULL,
  `experience` enum('novice','intermediate','advanced') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `drones`
--

INSERT INTO `drones` (`id`, `drone_id`, `drone_name`, `pilot_name`, `birth_date`, `contact_number`, `email`, `drone_type`, `experience`) VALUES
(1, '123', 'asdasd', 'asdasdasd', '2024-11-04', '234455656', 'aadsf@gmail.com', 'racing', 'novice'),
(2, '123', 'asdasd', 'asdasdasd', '2024-11-05', '1234567', 'aadsf@gmail.com', 'racing', 'novice');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
