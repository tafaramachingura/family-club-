-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2021 at 07:53 AM
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
-- Table structure for table `dump`
--

CREATE TABLE `dump` (
  `id` int(11) NOT NULL,
  `dump` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `user_id` varchar(50) NOT NULL,
  `value` varchar(50) NOT NULL,
  `amount` int(50) NOT NULL,
  `payed_to` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`user_id`, `value`, `amount`, `payed_to`, `date`) VALUES
('12', 'complete tree.PNG', 0, '4', '2021-03-18'),
('13', 'complete tree.PNG', 0, '4', '2021-03-18'),
('14', 'complete tree.PNG', 0, '4', '2021-03-18'),
('18', 'complete tree.PNG', 0, '4', '2021-03-18'),
('4', 'complete tree.PNG', 0, '0', '2021-03-18');

-- --------------------------------------------------------

--
-- Table structure for table `potentials`
--

CREATE TABLE `potentials` (
  `potID` int(11) NOT NULL,
  `cell` varchar(50) NOT NULL,
  `user_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `potentials`
--

INSERT INTO `potentials` (`potID`, `cell`, `user_id`) VALUES
(3, '0784612', '3'),
(4, '0784612186', '3'),
(5, '0784612186', '4');

-- --------------------------------------------------------

--
-- Table structure for table `referals`
--

CREATE TABLE `referals` (
  `ref_id` int(11) NOT NULL,
  `child` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `uncle` int(11) NOT NULL,
  `grand_uncle` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referals`
--

INSERT INTO `referals` (`ref_id`, `child`, `parent`, `uncle`, `grand_uncle`, `status`) VALUES
(1, 4, 0, 0, 0, '1'),
(101, 5, 4, 0, 0, '1'),
(102, 6, 4, 0, 0, '1'),
(103, 7, 5, 4, 0, '1'),
(104, 8, 5, 4, 0, '1'),
(105, 9, 6, 4, 0, '1'),
(106, 10, 6, 4, 0, '1'),
(107, 11, 7, 5, 4, '1'),
(108, 12, 7, 5, 4, '1'),
(109, 13, 8, 5, 4, '1'),
(110, 14, 8, 5, 4, '1'),
(111, 15, 9, 6, 4, '1'),
(112, 16, 9, 6, 4, '1'),
(113, 17, 10, 6, 4, '1'),
(114, 18, 10, 6, 4, '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `cell` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `level` int(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `datereg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `surname`, `cell`, `username`, `level`, `password`, `email`, `role`, `datereg`) VALUES
(1, 'admin', 'admin', '+0782345', '4rrrrrrrrrrrr', 1, 'admin', 'admin@gmail.com', 'admin', '2021-03-15 05:38:41'),
(4, 'zibusiso', 'zibusiso', '+0784612187', 'zibusiso3', 4, 'password', 'zibuusiso@gmail.com', 'user', '2021-03-17 22:39:11'),
(5, 'musa', 'musa', '+0784612187', 'musa5', 3, 'musa', 'musa@gmail.com', 'user', '2021-03-17 22:49:25'),
(6, 'Arnold', 'anorld', '+078461218', 'Arnold', 3, 'arnold', 'arnold@gmail.com', 'user', '2021-03-17 22:49:25'),
(7, 'shineon', 'shineon', '+0784612187', 'shineon', 2, 'password', 'shineon@gmail.com', 'user', '2021-03-18 01:30:10'),
(8, 'prayer8', 'prayer8', '+0784612187', 'prayer8', 2, 'password', 'prayer@omgmail.c', 'user', '2021-03-18 01:30:56'),
(9, 'rich5', 'rich5', '+0784612187', 'rich5', 2, 'password', 'rich5@gmail.com', 'user', '2021-03-18 01:31:41'),
(10, 'graced7', 'graced7', '+0784612187', 'graced7', 2, 'password', 'graced@gmail.com', 'user', '2021-03-18 01:32:18'),
(11, 'Breakth1', 'breakth1', '+0784612187', 'Breakth1', 1, 'password', 'ta@gmail.com', 'user', '2021-03-18 01:38:30'),
(12, 'thandi', 'thandi', '+0784612187', 'Thandiwe2021', 1, 'password', 'makufa@gmail.com', 'user', '2021-03-18 01:39:49'),
(13, 'tinashe7', 'tinashe7', '+0784612187', 'tinashe7', 1, 'password', 'makufa@gmail.com', 'user', '2021-03-18 01:40:22'),
(14, 'progress3', 'progress3', '+0784612187', 'progress3', 1, 'password', 'makufa@gmail.com', 'user', '2021-03-18 01:40:22'),
(15, 'Themba1', 'Themba1', '+0784612187', 'Themba1', 1, 'password', 'an@gmail.com', 'user', '2021-03-18 01:42:54'),
(16, 'Chapter1', 'Chapter1', '0999999999999', 'Chapter1', 1, 'password', 'ggg@gmail.com', 'user', '2021-03-18 01:42:54'),
(17, 'Myking', 'Myking', '+0784612187', 'Myking', 1, 'password', 'ruby@gmail.com', 'user', '2021-03-18 01:43:32'),
(18, 'SK2021', 'SK2021', '+0784612187', 'SK2021', 1, 'password', 'dadzi@gmail.com', 'user', '2021-03-18 01:44:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dump`
--
ALTER TABLE `dump`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `potentials`
--
ALTER TABLE `potentials`
  ADD PRIMARY KEY (`potID`);

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
-- AUTO_INCREMENT for table `dump`
--
ALTER TABLE `dump`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `potentials`
--
ALTER TABLE `potentials`
  MODIFY `potID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `referals`
--
ALTER TABLE `referals`
  MODIFY `ref_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
