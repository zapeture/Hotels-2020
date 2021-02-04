-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2021 at 03:10 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotels_project2020-2021`
--

-- --------------------------------------------------------

--
-- Table structure for table `hotel_list`
--

CREATE TABLE `hotel_list` (
  `id` int(11) NOT NULL,
  `hotel_Name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `rating` varchar(50) NOT NULL,
  `image` varchar(200) NOT NULL,
  `phone` int(200) NOT NULL,
  `post` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel_list`
--

INSERT INTO `hotel_list` (`id`, `hotel_Name`, `email`, `city`, `country`, `rating`, `image`, `phone`, `post`) VALUES
(123123, 'Oxford', 'oxofordia@mail.com', 'Dover', 'Great Britain', '3 Star', 'juke.jpg', 4213234, 765),
(123212, 'Tegeta Sands Hotel', 'sands@tegeta.com', 'Wiendoek', 'Namibia', '3 Star ', 'tegeta.jpg', 232343, 3453),
(123462, 'The Bando Valley', 'fortunechainz@gmail.com', 'Paris', 'France', '5 Star ', 'megeta.jpg', 342543, 354554),
(123463, 'Riplle Creek Hotel', 'Creek@mail.com', 'Boston MA', 'USA', '3 Star ', 'pexels-julie-aagaard-2096983.jpg', 54656546, 3454565),
(123464, 'Bismuth Watefall Hotel', 'waterfall@mail.com', 'Bulawayo', 'Zimbabwe', '4 Star ', 'pexels-engin-akyurt-1579253.jpg', 546356, 5345),
(123467, 'Jacobs Plaza', ' jacobs@mail.com', 'Bdgoszcz', 'Poland', '2 Star', 'juke.jpg', 56356456, 3553);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hotel_list`
--
ALTER TABLE `hotel_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hotel_list`
--
ALTER TABLE `hotel_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123469;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
