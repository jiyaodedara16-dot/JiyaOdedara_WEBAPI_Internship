-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 08, 2026 at 11:53 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intership`
--

-- --------------------------------------------------------

--
-- Table structure for table `intership`
--

CREATE TABLE `intership` (
  `stud_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(10) DEFAULT NULL,
  `mode` enum('Online','Onsite','Hybrid') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `intership`
--

INSERT INTO `intership` (`stud_name`, `email`, `contact`, `mode`) VALUES
('Aarav Shah', 'aarav.shah@gmail.com', '9876543301', 'Online'),
('Amit Verma', 'amit.verma@gmail.com', '9876543212', 'Onsite'),
('Anjali Gupta', 'anjali.gupta@gmail.com', '9876543219', 'Hybrid'),
('Arjun Chauhan', 'arjun.chauhan@gmail.com', '9876543222', 'Onsite'),
('Devansh Modi', 'devansh.modi@gmail.com', '9876543224', 'Onsite'),
('Diya Patel', 'diya.patel@gmail.com', '9876543302', 'Online'),
('Karan Singh', 'karan.singh@gmail.com', '9876543214', 'Onsite'),
('Komal Trivedi', 'komal.trivedi@gmail.com', '9876543221', 'Hybrid'),
('Krish Mehta', 'krish.mehta@gmail.com', '9876543303', 'Online'),
('Mitali Bhatt', 'mitali.bhatt@gmail.com', '9876543223', 'Hybrid'),
('Neha Joshi', 'neha.joshi@gmail.com', '9876543213', 'Hybrid'),
('Pooja Mehta', 'pooja.mehta@gmail.com', '9876543215', 'Hybrid'),
('Priya Patel', 'priya.patel@gmail.com', '9876543211', 'Hybrid'),
('Rahul Sharma', 'rahul.sharma@gmail.com', '9876543210', 'Onsite'),
('Riya Desai', 'riya.desai@gmail.com', '9876543304', 'Online'),
('Rohan Desai', 'rohan.desai@gmail.com', '9876543216', 'Onsite'),
('Sneha Shah', 'sneha.shah@gmail.com', '9876543217', 'Hybrid'),
('Vikram Kumar', 'vikram.kumar@gmail.com', '9876543218', 'Onsite'),
('Vivaan Joshi', 'vivaan.joshi@gmail.com', '9876543305', 'Online'),
('Yash Patel', 'yash.patel@gmail.com', '9876543220', 'Onsite');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `intership`
--
ALTER TABLE `intership`
  ADD PRIMARY KEY (`stud_name`,`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
