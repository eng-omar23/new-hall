-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2023 at 06:28 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bid` int(11) NOT NULL,
  `hall_id` int(11) DEFAULT NULL,
  `custid` int(11) DEFAULT NULL,
  `Status` varchar(35) DEFAULT NULL,
  `attendee_no` int(11) DEFAULT NULL,
  `Start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bid`, `hall_id`, `custid`, `Status`, `attendee_no`, `Start_date`, `end_date`) VALUES
(2, 7, 2, 'inctive', 346, '2023-01-10', '2023-01-10'),
(3, 7, 2, 'inctive', 346, '2023-01-10', '2023-01-10'),
(4, 7, 2, 'inctive', 346, '2023-01-10', '2023-01-10'),
(5, 7, 2, 'inctive', 346, '2023-01-10', '2023-01-10');

-- --------------------------------------------------------

--
-- Table structure for table `company_reg`
--

CREATE TABLE `company_reg` (
  `id` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Address` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `company_logo` varchar(85) DEFAULT NULL,
  `Description` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company_reg`
--

INSERT INTO `company_reg` (`id`, `Name`, `Address`, `phone`, `email`, `company_logo`, `Description`) VALUES
(9, 'Shaamow', 'Hodan', '+252615146766', 'Shaamow@gmail.com', 'image/haal1.jpg', 'we are welcoming to the best hall provider please feel to hit the link below and find out the available hotels'),
(10, 'walalow Halls', 'Kaaraan', '+252615666766', 'suvcvhdjjm@gmail.com', 'image/hall2.jpg', 'we are welcoming to the best hall provider please feel to hit the link below and find out the available hotels'),
(11, 'Royal', 'Kaaraan', '+252615666766', 'Royal@gmail.com', 'image/hall4.jpg', 'we are welcoming to the best hall provider please feel to hit the link below and find out the available hotels'),
(12, 'Amaano', 'Hodan', '+252615146766', 'Summer@gmail.com', 'image/hotel logo.webp', 'gezeha4yhwe are welcoming to the best hall provider please feel to hit the link below and find out the available hotels'),
(13, 'somali', 'Hodan', '+252615146766', 'somali@gnail.com', 'image/hall2.jpg', 'we are welcoming to the best hall provider please feel to hit the link below and find out the available hotels'),
(14, 'Amaano', 'Kaaraan', '+252615146766', 'Summer@gmail.com', 'image/4.jpg', 'this is beutifull hall provider please watch out'),
(15, 'Liido Halls', 'Hodan', '+252615146766', 'Liido@gmail.com', 'image/istockphoto-584573082-612x612.jpg', 'liido halls provides the best halls in town ...feel free to check them and book it before its too late');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `custid` int(11) NOT NULL,
  `firstname` varchar(35) DEFAULT NULL,
  `phone` varchar(35) DEFAULT NULL,
  `email` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`custid`, `firstname`, `phone`, `email`) VALUES
(1, 'omar', 'omarmohamud531@gmail.com', 'Hodan'),
(2, 'ali', 'alijav@gmail.com', '43636');

-- --------------------------------------------------------

--
-- Table structure for table `facility`
--

CREATE TABLE `facility` (
  `facility_id` int(11) NOT NULL,
  `facility_name` varchar(35) DEFAULT NULL,
  `Price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facility`
--

INSERT INTO `facility` (`facility_id`, `facility_name`, `Price`) VALUES
(1, 'AIrconditionar', 12),
(2, 'AIrconditionar', 12);

-- --------------------------------------------------------

--
-- Table structure for table `halls`
--

CREATE TABLE `halls` (
  `hall_id` int(11) NOT NULL,
  `Company_id` int(11) DEFAULT NULL,
  `facility_id` int(11) NOT NULL,
  `hall_type` varchar(35) DEFAULT NULL,
  `location` varchar(35) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `charge_perhead` double DEFAULT NULL,
  `hall_photo` varchar(55) DEFAULT NULL,
  `hall_desc` varchar(355) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `halls`
--

INSERT INTO `halls` (`hall_id`, `Company_id`, `facility_id`, `hall_type`, `location`, `capacity`, `charge_perhead`, `hall_photo`, `hall_desc`, `date`) VALUES
(1, 11, 0, 'Wedding', 'Zoobe', 5555, 19, 'image/WhatsApp Image 2022-11-13 at 09.41.29.jpeg', '', '2022-12-25'),
(2, 11, 2, 'Wedding', 'Zoobe', 5555, 19, 'image/WhatsApp Image 2022-11-13 at 09.41.29.jpeg', '', '2022-12-25'),
(3, 11, 2, 'Wedding', 'Zoobe', 5555, 19, 'image/WhatsApp Image 2022-11-13 at 09.41.29.jpeg', '', '2022-12-25'),
(4, 9, 1, 'Wedding', 'benadir', 555, 15, 'image/aliyale.jpg', '', '2022-12-27'),
(5, 9, 2, 'sparkling water', 'benadir', 555, 45, 'image/andrew tate.jpg', '', '2022-12-27'),
(6, 9, 2, 'sparkling water', 'benadir', 555, 45, 'image/andrew tate.jpg', '', '2022-12-27'),
(7, 9, 1, 'conference', 'Xamar bile', 55, 11, 'image/3.jpg', '', '2023-01-05'),
(8, 11, 1, 'conference', 'Xamar bile', 55, 11, 'image/3.jpg', '', '2023-01-05'),
(9, 11, 0, 'Wedding', 'Zoobe', 5555, 11, 'image/lg3.jpg', '', '2023-01-05'),
(10, 9, 0, 'Conference', 'Zoobe', 555, 45, 'image/haal1.jpg', '', '2023-01-09'),
(11, 11, 1, 'family bills', 'Zoobe', 5555, 45, 'image/andrew tate.jpg', '', '2023-01-09'),
(12, 9, 1, 'Wedding', 'benadir', 5555, 15, 'image/aliyale.jpg', '', '2023-01-09'),
(13, 9, 2, 'family bills', 'benadir', 555, 15, 'image/PHOTO.jpg', 'this hall comes with one meal of your choice ,air conditioner ,speakers .to find out more contact us at ', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pid` int(11) NOT NULL,
  `hall_id` int(11) DEFAULT NULL,
  `cust_id` int(11) NOT NULL,
  `amountdue` double DEFAULT NULL,
  `amountpaid` double DEFAULT NULL,
  `balance` double DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `username` varchar(35) DEFAULT NULL,
  `password` varchar(35) DEFAULT NULL,
  `email` varchar(35) DEFAULT NULL,
  `type` varchar(35) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `company_id`, `username`, `password`, `email`, `type`, `date`, `status`) VALUES
(1, 11, 'Makaraan', '1212', 'SHaamow@gmal.com', 'business', NULL, 'inActive'),
(4, 9, 'ali java', '111', 'alijav@gmail.com', 'business', NULL, 'inActive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bid`),
  ADD KEY `hall_id` (`hall_id`),
  ADD KEY `booking_ibfk_1` (`custid`);

--
-- Indexes for table `company_reg`
--
ALTER TABLE `company_reg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`custid`);

--
-- Indexes for table `facility`
--
ALTER TABLE `facility`
  ADD PRIMARY KEY (`facility_id`);

--
-- Indexes for table `halls`
--
ALTER TABLE `halls`
  ADD PRIMARY KEY (`hall_id`),
  ADD KEY `facility_id` (`facility_id`),
  ADD KEY `halls_ibfk_1` (`Company_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `hall_id` (`hall_id`),
  ADD KEY `cust_id` (`cust_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `company_reg`
--
ALTER TABLE `company_reg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `custid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `facility`
--
ALTER TABLE `facility`
  MODIFY `facility_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `halls`
--
ALTER TABLE `halls`
  MODIFY `hall_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`custid`) REFERENCES `customers` (`custid`);

--
-- Constraints for table `halls`
--
ALTER TABLE `halls`
  ADD CONSTRAINT `halls_ibfk_1` FOREIGN KEY (`Company_id`) REFERENCES `company_reg` (`id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`hall_id`) REFERENCES `halls` (`hall_id`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`cust_id`) REFERENCES `customers` (`custid`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company_reg` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
