-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2019 at 08:43 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(20) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Doctor'),
(2, 'Nurse'),
(3, 'Receptionist'),
(4, 'Attender'),
(5, 'Cleaner');

-- --------------------------------------------------------

--
-- Table structure for table `consults`
--

CREATE TABLE `consults` (
  `e_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consults`
--

INSERT INTO `consults` (`e_id`, `p_id`) VALUES
(3, 15),
(3, 17);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `name` varchar(255) NOT NULL,
  `emailid` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`name`, `emailid`, `phone`, `description`) VALUES
('kalpaj', 'kjl@fk.cm', '5999999999', 'sdeAFDSFS'),
('kalpaj', 'kjl@fk.cm', '5999999999', 'sdeAFDSFS'),
('Mohana Priya', 'mp.23aug@gmail.com', '9036832287', 'Im Blac'),
('Mohana Priya', 'csc@gmail.com', '5999999999', 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `e_id` int(50) NOT NULL,
  `e_name` varchar(255) NOT NULL,
  `e_gender` varchar(255) NOT NULL,
  `e_email` varchar(255) NOT NULL,
  `e_phone` varchar(10) NOT NULL,
  `c_id` int(10) NOT NULL,
  `e_dob` date NOT NULL,
  `e_address` varchar(255) NOT NULL,
  `e_salary` varchar(255) NOT NULL,
  `mask_del_emp` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`e_id`, `e_name`, `e_gender`, `e_email`, `e_phone`, `c_id`, `e_dob`, `e_address`, `e_salary`, `mask_del_emp`) VALUES
(3, 'kalpaj p', 'Male', 'kalpaj12@gmail.com', '8197988998', 1, '2019-10-10', 'Salman Building , Channasandra,Bangalore, Karnataka, India.', '123000', 0),
(4, 'Aditya k', 'Male', 'adityakousik326@gmail.com', '8792808526', 2, '2019-10-15', 'Salman Building , Channasandra,Bangalore, Karnataka, India.', '12', 0),
(5, 'Adith r', 'Female', 'adithsucks@gmail.com', '8197888797', 1, '2019-11-30', 'Red Light area', '0.123', 0),
(6, 'Amey Aditya', 'Male', 'arabichinda@yk20.com', '05456646', 3, '2015-12-30', 'Salman Building , Channasandra,Bangalore, Karnataka, Country.', '2456', 0);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `l_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `l_type` varchar(255) NOT NULL,
  `e_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`l_id`, `username`, `password`, `l_type`, `e_id`) VALUES
(1, 'admin', 'admin1234', 'admin', 3),
(2, 'receptionist', '12345678', 'receptionist', 5),
(3, 'doc', '123', 'doctor', 3);

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `m_id` int(11) NOT NULL,
  `m_name` varchar(255) NOT NULL,
  `m_contain` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`m_id`, `m_name`, `m_contain`) VALUES
(1, 'Crocin', 'Paracetamol'),
(2, 'Dolo 600', 'Paracetamol'),
(3, 'Moxi Kind CV', 'Antibotics '),
(4, 'Neprus', 'Vitamin C');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_gender` varchar(255) NOT NULL,
  `p_dob` date NOT NULL,
  `p_email` varchar(255) NOT NULL,
  `p_phone` varchar(255) NOT NULL,
  `p_address` varchar(255) NOT NULL,
  `d_o_admission` varchar(255) DEFAULT NULL,
  `mask_del_pat` int(11) NOT NULL DEFAULT '0',
  `amt` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`p_id`, `p_name`, `p_gender`, `p_dob`, `p_email`, `p_phone`, `p_address`, `d_o_admission`, `mask_del_pat`, `amt`) VALUES
(15, 'Abhisar gupta', 'Male', '2019-11-03', 'arabichinda@yk20.com', '8197988998', 'Salman Building , Channasandra,Bangalore, Karnataka, India.', '04-11-2019 01:49:50am', 0, 0),
(17, 'baibhav v', 'Male', '2036-01-31', 'artisedt@yk20.com', '697949', 'asdfsadf, Channasandra,Bangalore, Karnataka, India.', '04-11-2019 04:38:20am', 0, 100);

-- --------------------------------------------------------

--
-- Table structure for table `prescibe`
--

CREATE TABLE `prescibe` (
  `pes_id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prescribtion`
--

CREATE TABLE `prescribtion` (
  `pes_id` int(11) NOT NULL,
  `e_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescribtion`
--

INSERT INTO `prescribtion` (`pes_id`, `e_id`, `p_id`) VALUES
(2, 3, 15),
(3, 3, 17);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `r_id` int(11) NOT NULL,
  `r_name` varchar(255) NOT NULL,
  `e_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`r_id`, `r_name`, `e_id`) VALUES
(1, 'Consultation ', 3),
(3, 'ICU', 4),
(4, 'Emergency Ward ', 3);

-- --------------------------------------------------------

--
-- Table structure for table `room_patient`
--

CREATE TABLE `room_patient` (
  `r_id` int(11) NOT NULL DEFAULT '1',
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_patient`
--

INSERT INTO `room_patient` (`r_id`, `p_id`) VALUES
(1, 15),
(1, 17);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `consults`
--
ALTER TABLE `consults`
  ADD UNIQUE KEY `p_id` (`p_id`),
  ADD KEY `con_fk_emp` (`e_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`e_id`),
  ADD KEY `fk_emp_cat` (`c_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`l_id`),
  ADD KEY `login_fk_emp` (`e_id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `prescibe`
--
ALTER TABLE `prescibe`
  ADD UNIQUE KEY `med_id` (`m_id`),
  ADD KEY `pre_fk_presc` (`pes_id`);

--
-- Indexes for table `prescribtion`
--
ALTER TABLE `prescribtion`
  ADD PRIMARY KEY (`pes_id`),
  ADD KEY `pre_fk_pat` (`p_id`),
  ADD KEY `pre_fk_emp` (`e_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`r_id`) USING BTREE,
  ADD KEY `room_fk_eid` (`e_id`);

--
-- Indexes for table `room_patient`
--
ALTER TABLE `room_patient`
  ADD UNIQUE KEY `p_id` (`p_id`),
  ADD KEY `rid_fk_room` (`r_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `e_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `prescribtion`
--
ALTER TABLE `prescribtion`
  MODIFY `pes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `consults`
--
ALTER TABLE `consults`
  ADD CONSTRAINT `con_fk_emp` FOREIGN KEY (`e_id`) REFERENCES `employee` (`e_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cons_fk_pid` FOREIGN KEY (`p_id`) REFERENCES `patient` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `fk_emp_cat` FOREIGN KEY (`c_id`) REFERENCES `categories` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_fk_emp` FOREIGN KEY (`e_id`) REFERENCES `employee` (`e_id`) ON UPDATE CASCADE;

--
-- Constraints for table `prescibe`
--
ALTER TABLE `prescibe`
  ADD CONSTRAINT `pre_fk_med` FOREIGN KEY (`m_id`) REFERENCES `medicine` (`m_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pre_fk_presc` FOREIGN KEY (`pes_id`) REFERENCES `prescribtion` (`pes_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prescribtion`
--
ALTER TABLE `prescribtion`
  ADD CONSTRAINT `pre_fk_emp` FOREIGN KEY (`e_id`) REFERENCES `employee` (`e_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pre_fk_pat` FOREIGN KEY (`p_id`) REFERENCES `patient` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_fk_eid` FOREIGN KEY (`e_id`) REFERENCES `employee` (`e_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room_patient`
--
ALTER TABLE `room_patient`
  ADD CONSTRAINT `rid_fk_room` FOREIGN KEY (`r_id`) REFERENCES `room` (`r_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `roomp_fk_pat` FOREIGN KEY (`p_id`) REFERENCES `patient` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
