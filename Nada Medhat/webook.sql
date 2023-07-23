-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2023 at 01:07 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webook`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`name`, `email`, `password`) VALUES
('nadamedhat', 'admin1@gmial.com', 'admin1234');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `title` text NOT NULL,
  `authorName` text NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL,
  `publicationDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`title`, `authorName`, `image`, `description`, `publicationDate`) VALUES
('aaaaaaaaa', 'bbbbbbbbb', 'Capture.PNG', '111111111111', '2023-07-07'),
('boook', 'auther', 'Capture.PNG', 'some thing', '2023-07-08'),
('last chance', 'last auther', 'Capture.PNG', 'hello world', '2023-06-22'),
('other book', 'someauthor', 'Capture.PNG', 'description ', '2023-07-08'),
('other result', 'any author', 'Capture.PNG', 'any thing', '2023-07-14'),
('rich dad poor dad', 'nada elmasry', 'Capture.PNG', 'aaaaaaaaaaaaaa', '2023-07-08');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `ID` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `rating` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`ID`, `title`, `content`, `rating`, `name`) VALUES
(0, '', 'comment', 4, 'nadamedhat'),
(1, 'aaaaaaaaa', 'any comment', 4, 'nadamedhat'),
(2, 'aaaaaaaaa', 'some comment', 5, 'nadamedhat'),
(3, 'aaaaaaaaa', 'hello comment three', 3, 'nadamedhat'),
(4, 'aaaaaaaaa', 'what about that', 2, 'nadamedhat'),
(6, 'aaaaaaaaa', 'a comment is too looooooooooooooooooong', 1, 'nada'),
(7, 'aaaaaaaaa', 'zzzzzzzzzzzzzzzzzz', 5, 'nada');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `email`, `password`) VALUES
('nada', 'nadamedhat@gmail.com', '123456789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`email`(100));

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`title`(100));

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`(100));
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
