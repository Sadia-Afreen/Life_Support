-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2019 at 11:57 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `life_support`
--

-- --------------------------------------------------------

--
-- Table structure for table `donation_history`
--

CREATE TABLE `donation_history` (
  `donation_id` int(11) NOT NULL,
  `Hospital_name` varchar(255) DEFAULT NULL,
  `Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donation_history`
--

INSERT INTO `donation_history` (`donation_id`, `Hospital_name`, `Date`) VALUES
(45, '81dc9bdb52d04dc20036dbd8313ed055', '2019-11-09'),
(47, 'Life Source Hospital', '2019-10-30'),
(44, 'Life Source Hospital', '2019-11-01');

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `D_ID` int(11) NOT NULL,
  `D_Age` int(11) DEFAULT NULL,
  `D_Name` varchar(255) DEFAULT NULL,
  `D_Gender` varchar(255) DEFAULT NULL,
  `D_Weight` varchar(255) DEFAULT NULL,
  `D_BloodGroup` varchar(255) DEFAULT NULL,
  `D_Division` varchar(255) DEFAULT NULL,
  `D_Area` varchar(255) DEFAULT NULL,
  `D_Email` varchar(255) DEFAULT NULL,
  `D_Mobile` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`D_ID`, `D_Age`, `D_Name`, `D_Gender`, `D_Weight`, `D_BloodGroup`, `D_Division`, `D_Area`, `D_Email`, `D_Mobile`) VALUES
(40, 2, 'asd', 'FEMALE', '2', 'sad', 'Rajshahi', 'asd', 's@gm.com', '123'),
(44, 21, 'Rakiba Akter', 'female', '50', 'A+', 'Dhaka', 'Mirpur 14', 'rakiba@gamil.com', '01949328244'),
(45, 25, 'Sakib Z', 'MALE', '70', 'AB+', 'Dhaka', 'Taltola', 'sakib@gamil.com', '01949328244'),
(47, 21, 'Sadia Afreen', 'female', '60.5', 'O+', 'Dhaka', 'Mirpur', 's.afreen07@gmail.com1', '01949328244'),
(48, 22, 'Rakiba Akter', 'female', '65', 'A+', 'Dhaka', 'Mirpur 14', 'rakiba1@gamil.com', '01949328244');

-- --------------------------------------------------------

--
-- Table structure for table `donor_login`
--

CREATE TABLE `donor_login` (
  `id` int(11) NOT NULL,
  `D_Username` varchar(255) NOT NULL,
  `D_Email` varchar(255) NOT NULL,
  `D_Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donor_login`
--

INSERT INTO `donor_login` (`id`, `D_Username`, `D_Email`, `D_Password`) VALUES
(40, 'sadia', 's.afreen07@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(44, 'rakiba', 'rakiba@gamil.com', 'c20ad4d76fe97759aa27a0c99bff6710'),
(45, 'sakib', 'sakib@gamil.com', 'ec6a6536ca304edf844d1d248a4f08dc'),
(47, 'sadi', 's.afreen07@gmail.com1', '81dc9bdb52d04dc20036dbd8313ed055'),
(44, 'raki', 'rakiba1@gamil.com', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `donor_medical_history`
--

CREATE TABLE `donor_medical_history` (
  `donor_id` int(11) NOT NULL,
  `smoker` varchar(255) DEFAULT NULL,
  `aids` varchar(255) DEFAULT NULL,
  `allergy` varchar(255) DEFAULT NULL,
  `blood_pressure` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donor_medical_history`
--

INSERT INTO `donor_medical_history` (`donor_id`, `smoker`, `aids`, `allergy`, `blood_pressure`) VALUES
(45, 'Yes', 'No', 'No Allergy', 'Low'),
(47, 'No', 'No', 'No Allergy', 'Normal'),
(44, 'No', 'No', 'No Allergy', 'Normal');

-- --------------------------------------------------------

--
-- Table structure for table `donor_status`
--

CREATE TABLE `donor_status` (
  `D_ID` int(11) NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donor_status`
--

INSERT INTO `donor_status` (`D_ID`, `status`) VALUES
(44, '108 days left to donate');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `P_ID` int(11) NOT NULL,
  `P_Name` varchar(255) DEFAULT NULL,
  `P_Age` int(11) DEFAULT NULL,
  `P_Email` varchar(255) DEFAULT NULL,
  `P_Gender` varchar(255) DEFAULT NULL,
  `P_Bloodgroup` varchar(255) DEFAULT NULL,
  `P_Weight` int(11) DEFAULT NULL,
  `P_Disease` varchar(255) DEFAULT NULL,
  `P_Division` varchar(255) DEFAULT NULL,
  `P_Area` varchar(255) DEFAULT NULL,
  `P_Mobile_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`P_ID`, `P_Name`, `P_Age`, `P_Email`, `P_Gender`, `P_Bloodgroup`, `P_Weight`, `P_Disease`, `P_Division`, `P_Area`, `P_Mobile_no`) VALUES
(2, 'Sakib Zaman', 25, 'sakib@gamil.com', 'male', 'O+', 70, 'Dengue', 'Dhaka', 'North Kafrul', 1949328244);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donation_history`
--
ALTER TABLE `donation_history`
  ADD KEY `donation_history_ibfk_1` (`donation_id`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`D_ID`);

--
-- Indexes for table `donor_login`
--
ALTER TABLE `donor_login`
  ADD KEY `donor_login_ibfk_1` (`id`);

--
-- Indexes for table `donor_medical_history`
--
ALTER TABLE `donor_medical_history`
  ADD KEY `donor_medical_history_ibfk_1` (`donor_id`);

--
-- Indexes for table `donor_status`
--
ALTER TABLE `donor_status`
  ADD KEY `D_ID` (`D_ID`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`P_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donation_history`
--
ALTER TABLE `donation_history`
  MODIFY `donation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `D_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `donor_medical_history`
--
ALTER TABLE `donor_medical_history`
  MODIFY `donor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `donor_status`
--
ALTER TABLE `donor_status`
  MODIFY `D_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `P_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donation_history`
--
ALTER TABLE `donation_history`
  ADD CONSTRAINT `donation_history_ibfk_1` FOREIGN KEY (`donation_id`) REFERENCES `donor` (`D_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `donor_login`
--
ALTER TABLE `donor_login`
  ADD CONSTRAINT `donor_login_ibfk_1` FOREIGN KEY (`id`) REFERENCES `donor` (`D_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `donor_medical_history`
--
ALTER TABLE `donor_medical_history`
  ADD CONSTRAINT `donor_medical_history_ibfk_1` FOREIGN KEY (`donor_id`) REFERENCES `donor` (`D_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `donor_status`
--
ALTER TABLE `donor_status`
  ADD CONSTRAINT `donor_status_ibfk_1` FOREIGN KEY (`D_ID`) REFERENCES `donor` (`D_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
