-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2021 at 08:14 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `familyclub`
--

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `levID` int(11) NOT NULL,
  `levName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`levID`, `levName`) VALUES
(1, 'Freshman'),
(2, 'Sophoremores'),
(3, 'juniors'),
(4, 'seniors');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `user_id` int(11) NOT NULL,
  `value` varchar(50) NOT NULL,
  `payed_to` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`user_id`, `value`, `payed_to`, `date`) VALUES
(2, 'Penguins.jpg', 0, '2021-03-13'),
(3, 'Desert.jpg', 0, '2021-03-14'),
(4, 'Penguins.jpg', 0, '2021-03-14'),
(5, 'Penguins.jpg', 0, '2021-03-14'),
(7, 'Penguins.jpg', 0, '2021-03-14'),
(8, 'Penguins.jpg', 0, '2021-03-14'),
(9, 'Penguins.jpg', 0, '2021-03-14'),
(10, 'Penguins.jpg', 0, '2021-03-14'),
(11, 'Penguins.jpg', 2, '2021-03-14'),
(12, 'Penguins.jpg', 2, '2021-03-14'),
(13, 'Penguins.jpg', 2, '2021-03-14'),
(14, 'Penguins.jpg', 2, '2021-03-14'),
(15, 'Penguins.jpg', 2, '2021-03-14'),
(16, 'Penguins.jpg', 2, '2021-03-14'),
(17, 'Penguins.jpg', 2, '2021-03-14'),
(18, 'Penguins.jpg', 2, '2021-03-14');

-- --------------------------------------------------------

--
-- Table structure for table `referals`
--

CREATE TABLE `referals` (
  `ref_id` int(11) NOT NULL,
  `child` varchar(50) NOT NULL,
  `parent` int(11) NOT NULL,
  `uncle` int(11) NOT NULL,
  `grand_uncle` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referals`
--

INSERT INTO `referals` (`ref_id`, `child`, `parent`, `uncle`, `grand_uncle`, `status`) VALUES
(1, '2', 0, 0, 0, '1'),
(3, '4', 2, 0, 0, '1'),
(4, '5', 2, 0, 0, '1'),
(6, '7', 4, 2, 0, '1'),
(7, '8', 4, 2, 0, '1'),
(8, '9', 5, 2, 0, '1'),
(9, '10', 5, 2, 0, '1'),
(10, '11', 7, 4, 2, '1'),
(11, '12', 7, 4, 2, '1'),
(12, '13', 8, 4, 2, '1'),
(13, '14', 8, 4, 2, '1'),
(14, '15', 9, 5, 2, '1'),
(15, '16', 9, 5, 2, '1'),
(16, '17', 10, 5, 2, '1'),
(17, '18', 10, 5, 2, '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `cell` varchar(50) NOT NULL,
  `nat_id` varchar(50) NOT NULL,
  `level` int(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `address`, `surname`, `cell`, `nat_id`, `level`, `password`, `email`, `role`) VALUES
(1, 'admin', '1876 kuw', 'admin', '+0782345', '4rrrrrrrrrrrr', 1, 'admin', 'admin@gmail.com', 'admin'),
(2, 'Tafara', '1876 kuw', 'machi', '+0782345', '4rrrrrrrrrrrr', 4, 'tafara', 'tafara@gmail.com', 'user'),
(4, 'ruby', '1876 kuw', 'Machingu', '+0782345', '4rrrrrrrrrrrr', 3, 'rubyt', 'ruby@gmail.com', 'user'),
(5, 'ranga', '1876 kuw', 'Machingu', '+0782345', '63-1585y07', 3, 'ranga', 'ranga@gmail.com', 'user'),
(7, 'fadzi', '1876 kuw', 'Machingu', '+0782345', '63-1585y07', 2, 'fadzai', 'fadzai@gmail.com', 'user'),
(8, 'maii', '1876 kuw', 'Machingu', '+0782345', '63-1585y07', 2, 'maii', 'mai@gmail.com', 'user'),
(9, 'mdara', '1876 kuw', 'Machingu', '+0782345', '63-1585y07', 2, 'mdara', 'mdara@gmail.com', 'user'),
(10, 'mukwasha', '1876 kuw', 'Machingu', '+0782345', '63-1585y07', 2, 'mukwasha', 'mukwasha@gmail.com', 'user'),
(11, 'martha', '1876 kuw', 'Machingu', '+0782345', '63-1585y07', 1, 'martha', 'martha@gmail.com', 'user'),
(12, 'melody', '1876 kuw', 'Machingu', '+0782345', '63-1585y07', 1, 'melody', 'melody@gmail.com', 'user'),
(13, 'calvin', '1876 kuw', 'Machingu', '+0782345', '63-1585y07', 1, 'calvin', 'calvin@gmail.com', 'user'),
(14, 'christine', '1876 kuw', 'Machingu', '+0782345', '63-1585y07', 1, 'christine', 'kristine@gmail.com', 'user'),
(15, 'francis', '1876 kuw', 'Machingu', '+0782345', '63-1585y07', 1, 'francis', 'francis@gmail.com', 'user'),
(16, 'monica', '1876 kuw', 'Mandebvu', '+0782345', '63-1585y07', 1, 'monica', 'monica@gmail.com', 'user'),
(17, 'chikandiwa', '1876 kuw', 'saunyama', '+0782345', '63-1585y07', 1, 'chikandiwa', 'chikandiwa@gmail.com', 'user'),
(18, 'saungwme', '1876 kuw', 'saunyama', '+0782345', '63-1585y07', 1, 'sauuuuuuuuuuuuuu', 'saungwemea@gmail.com', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`levID`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `referals`
--
ALTER TABLE `referals`
  ADD PRIMARY KEY (`ref_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `referals`
--
ALTER TABLE `referals`
  MODIFY `ref_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
