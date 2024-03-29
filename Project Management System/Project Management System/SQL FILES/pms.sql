-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2023 at 08:09 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` int(10) NOT NULL,
  `Password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `Password`) VALUES
(123456, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `Id` int(10) NOT NULL,
  `Password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`Id`, `Password`) VALUES
(123, 'fac1');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `Id` int(11) NOT NULL,
  `definition` varchar(50) NOT NULL,
  `flag` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`Id`, `definition`, `flag`) VALUES
(123, '12', 1),
(12345, 'SMS', 1),
(123456, 'hey', 1),
(1234567, 'Hii', 1),
(12345678, 'Projob', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `enrollment_no` int(12) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`enrollment_no`, `password`) VALUES
(123, 'stud'),
(12345, 'stud4'),
(123456, 'stud3'),
(1234567, 'stud2'),
(12345678, 'stud1');

-- --------------------------------------------------------

--
-- Table structure for table `submission`
--

CREATE TABLE `submission` (
  `Id` int(11) NOT NULL,
  `doclink` longblob NOT NULL,
  `pptlink` longblob NOT NULL,
  `projectlink` longblob NOT NULL,
  `flag` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `submission`
--

INSERT INTO `submission` (`Id`, `doclink`, `pptlink`, `projectlink`, `flag`) VALUES
(12345678, 0x68747470733a2f2f64726976652e676f6f676c652e636f6d2f66696c652f642f31346f7338764f487a6471466c5f4632777077494b7a41416f42513279567849482f766965773f7573703d73686172655f6c696e6b, 0x68747470733a2f2f64726976652e676f6f676c652e636f6d2f66696c652f642f31346f7338764f487a6471466c5f4632777077494b7a41416f42513279567849482f766965773f7573703d73686172655f6c696e6b, 0x68747470733a2f2f64726976652e676f6f676c652e636f6d2f66696c652f642f31346f7338764f487a6471466c5f4632777077494b7a41416f42513279567849482f766965773f7573703d73686172655f6c696e6b, 1),
(1234567, 0x68747470733a2f2f64726976652e676f6f676c652e636f6d2f66696c652f642f31346f7338764f487a6471466c5f4632777077494b7a41416f42513279567849482f766965773f7573703d73686172655f6c696e6b, 0x68747470733a2f2f64726976652e676f6f676c652e636f6d2f66696c652f642f31346f7338764f487a6471466c5f4632777077494b7a41416f42513279567849482f766965773f7573703d73686172655f6c696e6b, 0x68747470733a2f2f64726976652e676f6f676c652e636f6d2f66696c652f642f31346f7338764f487a6471466c5f4632777077494b7a41416f42513279567849482f766965773f7573703d73686172655f6c696e6b, 1),
(123456, 0x687474703a2f2f6c6f63616c686f73742f50726f6a6563742532304d616e6167656d656e7425323053797374656d2f5375626d697373696f6e2e706870, 0x687474703a2f2f6c6f63616c686f73742f50726f6a6563742532304d616e6167656d656e7425323053797374656d2f5375626d697373696f6e2e706870, 0x687474703a2f2f6c6f63616c686f73742f50726f6a6563742532304d616e6167656d656e7425323053797374656d2f5375626d697373696f6e2e706870, 1),
(123, 0x687474703a2f2f6c6f63616c686f73742f7068706d7961646d696e2f696e6465782e7068703f726f7574653d2f73716c2664623d706d73267461626c653d7375626d697373696f6e26706f733d30, 0x687474703a2f2f6c6f63616c686f73742f7068706d7961646d696e2f696e6465782e7068703f726f7574653d2f73716c2664623d706d73267461626c653d7375626d697373696f6e26706f733d30, 0x687474703a2f2f6c6f63616c686f73742f7068706d7961646d696e2f696e6465782e7068703f726f7574653d2f73716c2664623d706d73267461626c653d7375626d697373696f6e26706f733d30, 1),
(12345, 0x687474703a2f2f6c6f63616c686f73742f50726f6a6563742532304d616e6167656d656e7425323053797374656d2f5375626d697373696f6e2e706870, 0x687474703a2f2f6c6f63616c686f73742f50726f6a6563742532304d616e6167656d656e7425323053797374656d2f5375626d697373696f6e2e706870, 0x687474703a2f2f6c6f63616c686f73742f50726f6a6563742532304d616e6167656d656e7425323053797374656d2f5375626d697373696f6e2e706870, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `define` (`definition`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`enrollment_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `enrollment_no` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123456790;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
