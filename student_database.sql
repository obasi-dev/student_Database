-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2025 at 08:54 PM
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
-- Database: `student_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `matric_no` varchar(50) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `dob` date NOT NULL,
  `department` varchar(100) NOT NULL,
  `level` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `email`, `matric_no`, `gender`, `dob`, `department`, `level`, `address`, `created_at`) VALUES
(1, 'John', 'Doe', 'john.doe1@example.com', 'MAT10001', 'Male', '0000-00-00', '', '', '', '2025-04-19 18:52:49'),
(2, 'Jane', 'Smith', 'jane.smith2@example.com', 'MAT10002', 'Male', '0000-00-00', '', '', '', '2025-04-19 18:52:49'),
(3, 'Michael', 'Brown', 'michael.brown3@example.com', 'MAT10003', 'Male', '0000-00-00', '', '', '', '2025-04-19 18:52:49'),
(4, 'Emily', 'Davis', 'emily.davis4@example.com', 'MAT10004', 'Male', '0000-00-00', '', '', '', '2025-04-19 18:52:49'),
(5, 'Daniel', 'Wilson', 'daniel.wilson5@example.com', 'MAT10005', 'Male', '0000-00-00', '', '', '', '2025-04-19 18:52:49'),
(6, 'Sarah', 'Moore', 'sarah.moore6@example.com', 'MAT10006', 'Male', '0000-00-00', '', '', '', '2025-04-19 18:52:49'),
(7, 'James', 'Taylor', 'james.taylor7@example.com', 'MAT10007', 'Male', '0000-00-00', '', '', '', '2025-04-19 18:52:49'),
(8, 'Linda', 'Anderson', 'linda.anderson8@example.com', 'MAT10008', 'Male', '0000-00-00', '', '', '', '2025-04-19 18:52:49'),
(9, 'Robert', 'Thomas', 'robert.thomas9@example.com', 'MAT10009', 'Male', '0000-00-00', '', '', '', '2025-04-19 18:52:49'),
(10, 'Patricia', 'Jackson', 'patricia.jackson10@example.com', 'MAT10010', 'Male', '0000-00-00', '', '', '', '2025-04-19 18:52:49'),
(11, 'Anthony', 'Wright', 'anthony.wright91@example.com', 'MAT10091', 'Male', '0000-00-00', '', '', '', '2025-04-19 18:52:49'),
(12, 'Lisa', 'Green', 'lisa.green92@example.com', 'MAT10092', 'Male', '0000-00-00', '', '', '', '2025-04-19 18:52:49'),
(13, 'Kevin', 'Hall', 'kevin.hall93@example.com', 'MAT10093', 'Male', '0000-00-00', '', '', '', '2025-04-19 18:52:49'),
(14, 'Nancy', 'Adams', 'nancy.adams94@example.com', 'MAT10094', 'Male', '0000-00-00', '', '', '', '2025-04-19 18:52:49'),
(15, 'Brian', 'Baker', 'brian.baker95@example.com', 'MAT10095', 'Male', '0000-00-00', '', '', '', '2025-04-19 18:52:49'),
(16, 'Karen', 'Nelson', 'karen.nelson96@example.com', 'MAT10096', 'Male', '0000-00-00', '', '', '', '2025-04-19 18:52:49'),
(17, 'Jason', 'Carter', 'jason.carter97@example.com', 'MAT10097', 'Male', '0000-00-00', '', '', '', '2025-04-19 18:52:49'),
(18, 'Betty', 'Mitchell', 'betty.mitchell98@example.com', 'MAT10098', 'Male', '0000-00-00', '', '', '', '2025-04-19 18:52:49'),
(19, 'Charles', 'Perez', 'charles.perez99@example.com', 'MAT10099', 'Male', '0000-00-00', '', '', '', '2025-04-19 18:52:49'),
(20, 'Susan', 'Roberts', 'susan.roberts100@example.com', 'MAT10100', 'Male', '0000-00-00', '', '', '', '2025-04-19 18:52:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `matric_no` (`matric_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
