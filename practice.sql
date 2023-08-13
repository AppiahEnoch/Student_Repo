-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2023 at 10:51 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `practice`
--

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `userid` varchar(50) NOT NULL,
  `file` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`userid`, `file`) VALUES
('12345', 'projects/ITE/547916book.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` bigint(20) NOT NULL,
  `index_number` varchar(15) NOT NULL,
  `stu_name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `study_program` varchar(255) NOT NULL,
  `defence_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `index_number`, `stu_name`, `title`, `faculty`, `study_program`, `defence_date`) VALUES
(1, '2223334444', 'trrrrrtt', 'errt', 'errt', 'ite', '2023-01-17 08:00:00'),
(2, '2222223333', 'edds', 'zzzzzzzzzzzzz', 'zzzzzzzzzzzzz', 'ite', '2023-01-17 08:00:00'),
(3, '445555', 'bnmmm', 'kkkkkkkkkkkk', 'kkkkkkkkkkkk', 'ljjjkkhgh', '2023-01-17 08:00:00'),
(4, '100000000', 'Kofi Kumah', 'Test item four', 'Faculty 3', 'Program 3', '0000-00-00 00:00:00'),
(5, '5555555', 'NUMBER FIVE', 'NUMBER FIVE PROJECT', 'Faculty 3', 'Department of Mathematics Education', '2023-08-04 07:00:00'),
(6, '6', 'number six', 'number six project', 'Faculty of Applied Science and Mathematics Education', 'Department of Mathematics Education', '2023-08-04 07:00:00'),
(9, '10101010', 'miracle saint', 'PowerPoint', 'Faculty 3', 'Program 1', '2023-08-04 07:00:00'),
(10, '10', 'TESTINNNNG', 'STILL TESTINNNNG', 'Faculty 3', 'Program 2', '2023-08-04 07:00:00'),
(11, '1000000000', 'TEST ONE', 'testing the app', 'FACULTY OF TECHNICAL EDUCATION', 'ITE', '0000-00-00 00:00:00'),
(15, '1000000001', 'TEST two', 'testing the app1', 'FACULTY OF TECHNICAL EDUCATION', 'ITE', '0000-00-00 00:00:00'),
(16, '1000000005', 'TEST test', 'try', 'Faculty 1', 'Program 1', '0000-00-00 00:00:00'),
(21, '21212122121', 'asdfghjkk zxcvbnm', 'wwwwertyuiiuhgfddfghjjjjjjjfgd', 'Faculty of Applied Science and Mathematics Education', 'Department of Mathematics Education', '2023-08-06 07:00:00'),
(27, '519104000', 'Kofi Awusco', 'Why Students don\'t like ICT', 'Why Students don\'t like ICT', 'ITE', '2023-01-30 08:00:00'),
(88888888, '20000000000', 'Azure', 'the cloud man', 'Faculty 1', 'Program 3', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('aadmin', '$2y$10$22eR7NQcuJPJEVU/1Shw9ee6XcCJHEkmkQfjOkA9ufB'),
('man', 'man'),
('man1', '$2y$10$bNg9otsTl6uOau2tzrgASeuLr78Dn0.sOdnzeFsE2yt'),
('nana', '$2y$10$lDa69u4rnQLh.mZRNNhbZORuN80YMwp6qsATr/zXGqk'),
('student', '$2y$10$R6uYqmHWwh4jNlPNOimb..SaQfzHfbr7gNTfBI.URts'),
('user', '$2y$10$yfesLT0LI277A4QbaCCin.HOcyWzLHaNxJWwSLtXEJb');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88888889;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
