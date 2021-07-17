-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2021 at 01:11 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `first` varchar(100) NOT NULL,
  `last` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first`, `last`, `username`, `password`, `email`, `contact`, `pic`) VALUES
(1, 'shreya', 'sharma', 'shreya', 'Shreya@123', 'shreyasharma291192gmail.com', '8210991243', 'finalprofile.png'),
(2, 'disha', 'patani', 'patani', 'dishu', 'disha@gmail.com', '8210991243', 'admin.png'),
(3, 'Radhika', 'Arora', 'arora', 'Radhika', 'radhika@gmail.com', '2092801982091', 'Selling Beats Online, Bringing In The Traffic.jpg'),
(4, 'shubham', 'mehta', 'mehta', 'subham', 'shubhammehta@gmail.com', '876764354253', 'nandha-kumar-pj-jTRRhLw8MJc-unsplash.jpg'),
(5, 'rahul', 'dev', 'dev', 'rahul', 'rahul@gmail.com', '27080329033', 'admin.png');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `authors` varchar(100) NOT NULL,
  `edition` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bid`, `name`, `authors`, `edition`, `status`, `quantity`, `department`) VALUES
(0, 'xyz', 'abc', '20', 'available', 83, 'cse'),
(1, 'Data Structure and Algorithms Made Easy', 'Narasimha Karumanchi', '3rd', 'Available', 11, 'CSE'),
(2, 'Getting Started with SQL', 'Thomas Neild', 'Grayscale Edition', 'Available', 15, 'CSE'),
(3, 'Web Technologies Black Book', 'DreamTech', '5th', 'Available', 16, 'CSE'),
(4, 'Principal of electronics', 'V.K. Mehta, Rohit Mehta', '3rd', 'Not Available', 7, 'EEE'),
(7, 'Hello World', 'XYZ', '7th', 'Available', 99, 'CSE');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `comments` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `username`, `comments`) VALUES
(21, 'shreya', 'Why I am not getting book even after adding it!!'),
(22, 'raghav', 'when will book xyz be available?'),
(23, 'Admin', 'It will be available soon');

-- --------------------------------------------------------

--
-- Table structure for table `issue_book`
--

CREATE TABLE `issue_book` (
  `username` varchar(100) NOT NULL,
  `bid` int(100) NOT NULL,
  `approve` varchar(100) NOT NULL,
  `issue` varchar(100) NOT NULL,
  `return` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issue_book`
--

INSERT INTO `issue_book` (`username`, `bid`, `approve`, `issue`, `return`) VALUES
('raghav', 4, '<p style=\"color:yellow; background-color:green;\">RETURNED</p>', '2021-07-18', '2021-08-18'),
('abhilasha', 1, 'Yes', '2021-08-1', '2021-09-1'),
('shreya', 2, '<p style=\"color:yellow; background-color:green;\">RETURNED</p>', '2021-05-12', '2021-05-20'),
('surbhi', 0, '<p style=\"color:yellow; background-color:red;\">EXPIRED</p>', '2021-04-12', '2021-04-20'),
('raghav', 3, '<p style=\"color:yellow; background-color:red;\">EXPIRED</p>', '2021-03-21', '2021-04-21'),
('raghav', 4, '<p style=\"color:yellow; background-color:green;\">RETURNED</p>', '2021-03-21', '2021-04-21'),
('abhilasha', 1, '<p style=\"color:yellow; background-color:red;\">EXPIRED</p>', '2021-01-12', '2021-02-12'),
('abhilasha', 0, '<p style=\"color:yellow; background-color:red;\">EXPIRED</p>', '2021-02-12', '2021-03-12'),
('rishav', 3, '<p style=\"color:yellow; background-color:green;\">RETURNED</p>', '2021-04-13', '2021-04-04'),
('rishav', 4, '<p style=\"color:yellow; background-color:red;\">EXPIRED</p>', '2021-04-13', '2021-04-04'),
('shreya', 0, '<p style=\"color:yellow; background-color:red;\">EXPIRED</p>', '2021-04-13', '2021-04-04'),
('surbhi', 1, '<p style=\"color:yellow; background-color:green;\">RETURNED</p>', '2021-04-13', '2021-04-04'),
('abhilasha', 2, 'Yes', '2021-07-18', '2021-08-15'),
('abhilasha', 7, 'Yes', '2021-07-20', '2021-08-20'),
('abhilasha', 4, '', '', ''),
('surbhi', 1, '', '', ''),
('Rashi@123', 1, '', '', ''),
('Rashi@123', 3, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `first` varchar(100) NOT NULL,
  `last` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `roll` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` int(100) NOT NULL,
  `pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`first`, `last`, `username`, `password`, `roll`, `email`, `contact`, `pic`) VALUES
('shreya', 'sharma', 'shreya', 'Shreya', 12, 'shreya.cse.1842@iiitbh.ac.in', 2147483647, 'shreya2.jpg'),
('Rags', 'Jays', 'raghav', 'juyal', 112, 'raghav@gmail.com', 887656758, 'shiva.jpg'),
('Abhilasha', 'Kumari', 'abhilasha', 'kumari', 121, 'abhilasha@gmail.com', 98865554, 'admin.png'),
('Rashi', 'Krishna', 'Rashi@123', 'rk', 123, 'rashi@gmail.com', 2147483647, 'pexels-ali-pazani-2752045.jpg'),
('Rishav', 'Kumar', 'rishav', 'kumar', 454, 'rishav@gmail.com', 88786765, 'admin.png'),
('Surbhi', 'Sharma', 'surbhi', 'sharma', 621, 'surbhi@gmail.com', 676567454, 'pexels-ali-pazani-2584269.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD UNIQUE KEY `roll` (`roll`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
