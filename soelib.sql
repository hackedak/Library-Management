-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2020 at 12:28 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soelib`
--

-- --------------------------------------------------------

--
-- Table structure for table `authuser`
--

CREATE TABLE `authuser` (
  `registrationId` int(8) NOT NULL,
  `student` varchar(150) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authuser`
--

INSERT INTO `authuser` (`registrationId`, `student`, `password`) VALUES
(1100490, 'Admin', '781e5e245d69b566979b86e28d23f2c7'),
(20418071, 'Rahul R S', 'e388c1c5df4933fa01f6da9f92595589'),
(20418072, 'S Atul Krishnan', 'f4b4ab97a14ef3a543da2aa0cf236495');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` varchar(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `is_issued` tinyint(1) NOT NULL,
  `available_count` int(11) NOT NULL,
  `total_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `name`, `author`, `is_issued`, `available_count`, `total_count`) VALUES
('09TRY', 'This is a test', 'Unknown Author', 0, 2, 2),
('1232ABc', 'Data Structures and Algorithms', 'ABC', 0, 4, 4),
('1232Acc', 'Data Structures in C', 'ABCDE', 0, 4, 4),
('123erd', 'Data handling', 'ABD', 0, 3, 3),
('1244ABc', 'A mind for animals', 'YTU', 0, 2, 2),
('321187', 'CLRS', 'H.Cormen', 0, 4, 4),
('3222DES1', 'Principles of Programming Language', 'Gilles Dowek', 0, 2, 2),
('645RSD', 'A mind with Numbers', 'Barbera Okhley', 0, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `books_reserved`
--

CREATE TABLE `books_reserved` (
  `book_id` varchar(11) NOT NULL,
  `registration_id` int(8) NOT NULL,
  `issue_date` date NOT NULL,
  `return_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student` int(8) NOT NULL,
  `book_count` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student`, `book_count`) VALUES
(20418071, 0),
(20418072, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authuser`
--
ALTER TABLE `authuser`
  ADD PRIMARY KEY (`registrationId`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);
ALTER TABLE `books` ADD FULLTEXT KEY `name` (`name`);
ALTER TABLE `books` ADD FULLTEXT KEY `author` (`author`);

--
-- Indexes for table `books_reserved`
--
ALTER TABLE `books_reserved`
  ADD UNIQUE KEY `book_id` (`book_id`,`registration_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student`);

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `check book reserved` ON SCHEDULE EVERY 5 MINUTE STARTS '2020-12-24 16:50:59' ENDS '2020-12-29 16:50:59' ON COMPLETION PRESERVE ENABLE DO BEGIN
DELETE FROM `books_reserved` WHERE issue_date = date_format(NOW(),'%Y.%m.%d');
UPDATE books SET available_count = available_count + 1;
END$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
