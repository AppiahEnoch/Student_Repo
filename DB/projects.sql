-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:63943
-- Generation Time: Aug 19, 2023 at 07:45 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

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
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `index_number` varchar(255) NOT NULL,
  `stu_name` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `faculty` text NOT NULL,
  `study_program` text NOT NULL,
  `file_path` text NOT NULL,
  `defence_date` date NOT NULL,
  `recdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`index_number`, `stu_name`, `title`, `faculty`, `study_program`, `file_path`, `defence_date`, `recdate`) VALUES
('1111111111', 'APPIAH ENOCH', 'DEVELOPMENT OF PONT OF SALE', 'Faculty of Technical Education', 'Department of InformationTechnology Education', '../projectDocs/11111111110553c8587f643fe0a85ccf2920ad299b1cccegg663cdb34a8b18.docx', '2023-08-24', '2023-08-19 04:47:23'),
('2222222222', 'APPIAH ENOCH2', 'AAMUSTED LIBRARY SYSTEM', 'Faculty of Applied Science and Mathematics Education', 'Department of Fashion Design and Textiles Education', '../projectDocs/2222222222ed53eef64b910e8c44a66972c866b06387685d8722247d9bbe9c.pdf', '2023-08-16', '2023-08-19 04:48:06'),
('3333333333', 'APPIAH ENOCH3', 'CONSTRUCTION PROJECT', 'Faculty of Vocational Education', 'Department of Mechanical & Automotive Technology Education', '../projectDocs/333333333374b4e7b7f37d3994c22334dfa5d8eb6e3e93a1dbeg8g55382ea1.docx', '2022-10-04', '2023-08-19 04:48:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`index_number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
