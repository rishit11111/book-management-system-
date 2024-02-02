-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2023 at 06:29 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `Book_Title` varchar(25) NOT NULL,
  `ISBN_No` int(11) NOT NULL,
  `Author` varchar(20) NOT NULL,
  `Publisher` varchar(25) NOT NULL,
  `Edition` varchar(15) NOT NULL,
  `Category` varchar(15) NOT NULL,
  `Rack` int(11) NOT NULL,
  `Copies` int(11) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`Book_Title`, `ISBN_No`, `Author`, `Publisher`, `Edition`, `Category`, `Rack`, `Copies`, `Price`) VALUES
('Pride and Prejudice', 12345, 'Jane Austen', 'Modern Library', 'Paperback', 'Comics', 5, 10, 599),
('Chanakya Neeti', 12346, 'Radhakrishnan Pillai', 'Indian Library', 'Paperback - 3', 'Fiction', 3, 10, 499),
('Meditations', 12347, 'Marcus Aurelius', 'Unabridged Classics', 'Paperback', 'Classic', 3, 50, 199),
('Getting Started', 12348, 'Manny Coats', 'Kindle', 'Kindle Edition', 'Fiction', 4, 5, 599);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`ISBN_No`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
