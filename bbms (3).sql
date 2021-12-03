-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2021 at 12:41 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bbms`
--

-- --------------------------------------------------------

--
-- Table structure for table `bloodtbl`
--

CREATE TABLE `bloodtbl` (
  `invoiceNO` int(11) NOT NULL,
  `BloodGroup` varchar(11) NOT NULL,
  `amount` int(255) NOT NULL,
  `Date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bloodtbl`
--

INSERT INTO `bloodtbl` (`invoiceNO`, `BloodGroup`, `amount`, `Date`) VALUES
(1, 'AB+', 450, '08/08/2021'),
(2, 'B+', 450, '08/08/2021'),
(7, 'B+', 450, '08/08/2021'),
(8, 'B+', 450, '08/08/2021'),
(9, 'B+', 450, '08/08/2021'),
(11, 'A+', 450, '08/08/2021'),
(12, 'O+', 600, '08/08/2021'),
(13, 'O+', 600, '08/08/2021'),
(15, 'B+', -500, '08/09/2021'),
(16, 'B+', 450, '08/09/2021'),
(17, 'A+', -300, '08/09/2021'),
(20, 'B-', 450, '08/09/2021'),
(21, 'AB-', 450, '08/09/2021'),
(22, 'A-', 450, '11/11/2021'),
(23, 'B+', -500, '2021/12/01'),
(24, 'AB+', -450, '2021/12/01'),
(25, 'O-', 500, '2021-12-02'),
(26, 'AB+', 650, '2021-12-02');

-- --------------------------------------------------------

--
-- Table structure for table `campreg`
--

CREATE TABLE `campreg` (
  `Name` varchar(25) NOT NULL,
  `NIC` varchar(13) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `ContactNo` varchar(50) NOT NULL,
  `Date` int(11) NOT NULL,
  `Month` int(11) NOT NULL,
  `Year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `campreg`
--

INSERT INTO `campreg` (`Name`, `NIC`, `Address`, `ContactNo`, `Date`, `Month`, `Year`) VALUES
('chandra', '789654123v', 'kalutara', '0724185963', 2, 12, 21),
('Thushan', '908989096v', 'galle', '0767922531', 21, 12, 21),
('Kavindu', '908989096v', 'galle                                 \r\n                                      ', '0767922531', 29, 11, 21),
('Thushani', '908989096v', ' Mathale                                     \r\n                                      ', '0767922531', 30, 11, 21),
('kavinda', '909989878v', ' yakkala                                     \r\n                                      ', '0771234567', 27, 11, 21),
('sadalatha', '936352417v', 'alpitiya', '0112458796', 4, 11, 2021),
('Thilini wijesooriya', '968596745v', 'kadawatha', '0717290489', 4, 8, 2021),
('Dilini', '978263925v', 'panadura', '0716613876', 21, 11, 2021),
('Sidath Karunarathne', '993290998v', 'kuliyapitiya', '0767922531', 31, 8, 21),
('saduni', '997845963v', 'ragama', '(072) 729-0489', 9, 8, 2021),
('malinda', '997852412v', 'panadura', '(071) 789-6524', 2, 3, 2021);

-- --------------------------------------------------------

--
-- Table structure for table `donar_donation`
--

CREATE TABLE `donar_donation` (
  `NIC` varchar(20) NOT NULL,
  `LastDonationDate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donar_donation`
--

INSERT INTO `donar_donation` (`NIC`, `LastDonationDate`) VALUES
('679987687v', '08/08/2021'),
('856670270v', '08/09/2021'),
('858757546v', '2021-12-02'),
('877857856v', '2021-12-02'),
('964352100v', '08/08/2021'),
('978263925v', '08/08/2021'),
('984598675v', '08/08/2021'),
('988263925v', '08/09/2021'),
('990042292v', '08/08/2021'),
('992581280v', '08/08/2021'),
('993290998v', '06/08/2021'),
('993290998v', '07/08/2021'),
('993290998v', '08/08/2021'),
('993290998v', '08/09/2021'),
('993290998v', '2021-08-22'),
('994394597v', '08/08/2021');

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `BarcodeNO` int(11) NOT NULL,
  `NIC` varchar(20) NOT NULL,
  `BloodGroup` varchar(10) NOT NULL,
  `Units` int(11) NOT NULL,
  `Date` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`BarcodeNO`, `NIC`, `BloodGroup`, `Units`, `Date`) VALUES
(1, '993290998v', 'B+', 450, '8/7/2021'),
(2, '993290998v', 'B+', 450, '08/08/2021'),
(3, '990042292v', 'A+', 450, '08/08/2021'),
(4, '679987687v', 'AB+', 450, '08/08/2021'),
(5, '993290998v', 'B+', 450, '08/08/2021'),
(6, '964352100v', 'A+', 500, '08/08/2021'),
(7, '984598675v', 'B-', 500, '08/08/2021'),
(8, '992581280v', 'B+', 500, '08/08/2021'),
(9, '992581280v', 'B+', 500, '08/08/2021'),
(10, '993290998v', 'B+', 450, '08/08/2021'),
(11, '992581280v', 'B+', 450, '08/08/2021'),
(12, '992581280v', 'B+', 450, '08/08/2021'),
(13, '990042292v', 'A+', 300, '08/08/2021'),
(14, '990042292v', 'A+', 450, '08/08/2021'),
(15, '994394597v', 'O+', 600, '08/08/2021'),
(16, '994394597v', 'O+', 600, '08/08/2021'),
(17, '978263925v', 'A-', 500, '08/08/2021'),
(18, '993290998v', 'B+', 450, '08/09/2021'),
(19, '988263925v', 'B-', 450, '08/09/2021'),
(20, '856670270v', 'AB-', 450, '08/09/2021'),
(36, '976358964v', 'O-', 450, '2021-12-10'),
(59, '993290998v', 'B+', 500, '2021-08-22'),
(66, '979263925v', 'A-', 450, '2021-12-2'),
(72, '679987687v', 'AB-', 450, '2021.12.2'),
(78, '897852697v', 'O-', 450, '2021/1/2'),
(85, '985896452v', 'O-', 450, '2021-12-02'),
(86, '858757546v', 'O-', 500, '2021-12-02'),
(87, '858757546v', 'O-', 500, '2021-12-02'),
(88, '858757546v', 'O-', 500, '2021-12-02');

-- --------------------------------------------------------

--
-- Table structure for table `donortbl`
--

CREATE TABLE `donortbl` (
  `NICdonor` varchar(20) NOT NULL,
  `Dfname` varchar(50) NOT NULL,
  `Dlname` varchar(50) NOT NULL,
  `DDob` varchar(15) NOT NULL,
  `Dage` int(4) NOT NULL,
  `DPhone` varchar(20) NOT NULL,
  `DGender` varchar(10) NOT NULL,
  `DBgroup` varchar(5) NOT NULL,
  `Line1` varchar(50) DEFAULT NULL,
  `line2` varchar(255) DEFAULT NULL,
  `Street` varchar(255) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donortbl`
--

INSERT INTO `donortbl` (`NICdonor`, `Dfname`, `Dlname`, `DDob`, `Dage`, `DPhone`, `DGender`, `DBgroup`, `Line1`, `line2`, `Street`, `City`) VALUES
('345645678v', 'Sidath', 'Karunrathna', '1999-11-24', 21, '0767922531', 'male', 'A+', 'bulugahwaththa', 'bowaththa', 'yakwila', 'pannala'),
('578596412v', 'sunil', 'perera', '1962/1/2', 58, '0968574123', 'male', 'O+', '78/4', 'hjn', 'vhgbjncm ', 'kadana'),
('679987687v', 'Amal', 'perera', '8/17/1967', 54, '(076) 123-4567', 'Male', 'AB+', '23/1', 'suhada niwasa', 'udawaththa road', 'yakkala'),
('785412369v', 'bimal', 'jayakodi', '1978/10/15', 48, '0147852369', 'male', 'O-', '85/s', 'yakkala', 'maradana', 'kotuwa'),
('798574236v', 'sujani', 'menaka', '1979/4/2', 46, '0258963214', 'female', 'AB-', '85/s', 'yakkala', 'marnada', 'kotuwa'),
('856670270v', 'thisara', 'silva', '12/25/1988', 33, '(047) 852-3985', 'Male', 'AB-', '114', 'gampaha', 'Street', 'City'),
('858757546v', 'Amal', 'Perera', '1985-06-11', 36, '0771234567', 'male', 'O-', 'Bulugahawaththa Road', 'Bowaththa', '', 'Yakwila'),
('874596321v', 'tharu', 'mini', '1987-10-4', 37, '0147856329', 'female', 'O-', '7/w', 'fdbgf', 'rtgtd', 'kotte'),
('877857856v', 'kamal ', 'gunarathna', '1987-11-18', 34, '0771234567', 'male', 'AB+', '', '', '', 'kuliyaitiya'),
('897852697v', 'lakni', 'nawanjana', '1989/5/24', 32, '0717290489', 'Female', 'O-', '12/A', 'shnajn', 'bhjcc', 'panadura'),
('938263987v', 'thilini', 'jayasiri', '1/15/1993', 29, '(071) 668-9452', 'Female', 'B+', '11/a\r\n11/a', 'samagi road\r\nsamagi road', 'galthude', 'panadura'),
('964352100v', 'nimal', 'sirisena', '6/11/1996', 25, '(077) 257-6232', 'Male', 'A+', '23/1', 'Address Line 2', 'dewala paara', 'matale'),
('976358964v', 'Kasuri', 'Nandadewa', '1997-3-18', 24, '0723698542', 'Female', 'AB+', '42', 'Durga town', 'new road', 'aluthgama'),
('978263925v', 'Dilini', 'Jayasiri', '11/21/1997', 24, '(075) 123-4567', 'Female', 'A-', '115/1', 'lake teras', 'ganthure', 'pandura'),
('979263925v', 'Dilini', 'Jayasiri', '1997-11-21', 24, '0716613876', 'Female', 'A-', '115/1', 'Lake terrace', 'Galthude', 'Panadura'),
('984598675v', 'dilini', 'jayasiri', '7/16/1998', 23, '(071) 235-6789', 'Male', 'B-', '93/1', 'Address Line 2', 'panadura road', 'panadura'),
('985896452v', 'Mahela', 'Siriwardhana', '1998-03-02', 23, '0717289635', 'Male', 'AB-', '114/a', 'Bodhi rd', 'Bodiya', 'Kalutara'),
('988263925v', 'chathurangi', 'jayasiri', '10/10/1989', 32, '(072) 528-9632', 'Female', 'B-', '45/a', 'panadura', 'Street', 'City'),
('990041192v', 'Thushan', 'Dodanwela', '1998-06-09', 23, '0771234567', 'male', 'A+', '', '', '', 'matale'),
('990042292v', 'Thushan', 'Dodanwela', '1/4/1999', 23, '(077) 528-4749', 'Male', 'A+', '24/43', 'Address Line 2', 'kachcheriya road', 'mathale'),
('992581280v', 'Kavindu', 'Karunasena', '9/14/1999', 22, '(076) 976-6824', 'Male', 'B+', '188/24A', 'jayamawatha', 'mampitiya', 'galla'),
('993290998v', 'Sidath', 'Karunarathna', '11/24/1999', 22, '(076) 792-2531', 'Male', 'B+', '274/1', 'Address Line 2', 'bulugahawaththa road', 'Yakwila'),
('994394597v', 'Kavinda', 'Gayashan', '6/15/1999', 22, '(075) 123-4456', 'Male', 'O+', '23/1', 'Address Line 2', 'sumudu mawatha', 'bandarawela');

-- --------------------------------------------------------

--
-- Table structure for table `emptbl`
--

CREATE TABLE `emptbl` (
  `EmpNIC` varchar(20) NOT NULL,
  `EmpName` varchar(255) NOT NULL,
  `EmpUserName` varchar(255) NOT NULL,
  `EmpPw` varchar(255) NOT NULL,
  `Register as` varchar(20) NOT NULL,
  `Staff ID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emptbl`
--

INSERT INTO `emptbl` (`EmpNIC`, `EmpName`, `EmpUserName`, `EmpPw`, `Register as`, `Staff ID`) VALUES
('993290997v', 'Kandy Hospital', 'Kandy', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'KA007'),
('993290998v', 'Sidath Karunarathna', 'Sidath', 'e10adc3949ba59abbe56e057f20f883e', 'Admin', 'KA005');

-- --------------------------------------------------------

--
-- Table structure for table `plasma`
--

CREATE TABLE `plasma` (
  `invoice_no` int(11) NOT NULL,
  `Amount` int(50) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plasma`
--

INSERT INTO `plasma` (`invoice_no`, `Amount`, `date`) VALUES
(1, 300, '08/08/2021'),
(2, 400, '08/09/2021'),
(3, 450, '08/09/2021'),
(4, 500, '08/09/2021'),
(11, 200, '2021-08-22'),
(12, 200, '2021-12-02'),
(13, 200, '2021-12-02'),
(14, 200, '2021-12-02'),
(15, 200, '2021-12-02'),
(16, 200, '2021-12-02');

-- --------------------------------------------------------

--
-- Table structure for table `platelet`
--

CREATE TABLE `platelet` (
  `invoice_no` int(11) NOT NULL,
  `nic` varchar(255) DEFAULT NULL,
  `BloodGroup` varchar(20) NOT NULL,
  `Amount` int(50) NOT NULL,
  `date` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `platelet`
--

INSERT INTO `platelet` (`invoice_no`, `nic`, `BloodGroup`, `Amount`, `date`) VALUES
(1, NULL, 'B+', 300, '08/09/2021'),
(2, NULL, 'B-', 300, '08/09/2021'),
(3, NULL, 'AB-', 450, '08/09/2021'),
(9, '993290998v', 'B+', 300, '2021-08-22'),
(10, '858757546v', 'O-', 300, '2021-12-02'),
(11, '858757546v', 'O-', 300, '2021-12-02'),
(12, '858757546v', 'O-', 300, '2021-12-02'),
(13, '858757546v', 'O-', 300, '2021-12-02'),
(14, '877857856v', 'AB+', 300, '2021-12-02');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `Request_ID` int(11) NOT NULL,
  `Patient_name` varchar(50) DEFAULT NULL,
  `Ward_No` int(11) NOT NULL,
  `Blood_Group` varchar(50) NOT NULL,
  `NoOfUnits` int(11) NOT NULL,
  `StaffID` varchar(20) NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`Request_ID`, `Patient_name`, `Ward_No`, `Blood_Group`, `NoOfUnits`, `StaffID`, `Status`) VALUES
(1, 'gotabhaya', 5, 'B+', 500, '3355', 'Approved'),
(2, 'amal', 4, 'A+', 300, '4455', 'Approved'),
(3, 'samadhi', 2, 'AB+', 450, '12347', 'Approved'),
(4, 'galpatha', 3, 'A+', 500, '15897', 'pending'),
(5, 'wimalaweera', 5, 'A-', 500, '12369', 'pending'),
(6, 'sadalatha', 2, 'B+', 500, '78965', 'pending'),
(7, 'thmara', 4, 'B-', 500, '56987', 'pending'),
(8, 'disna', 5, 'AB+', 500, '74588', 'pending'),
(9, 'ranaweera', 3, 'AB-', 500, '45698', 'pending'),
(10, 'mala', 2, 'O+', 500, '85697', 'pending'),
(11, 'kamala', 8, 'O+', 500, '78965', 'pending'),
(12, 'janu', 5, 'O-', 500, '96325', 'pending'),
(13, 'nalinda', 5, 'A+', 500, '36985', 'pending'),
(14, 'somasiri', 12, 'A-', 500, '12345', 'pending'),
(15, 'some', 5, 'B+', 500, '14785', 'pending'),
(16, 'sadasiri', 8, 'B+', 500, '25896', 'pending'),
(17, 'qwerd', 9, 'AB+', 500, '78965', 'pending'),
(18, 'malaka', 8, 'O+', 500, '78965', 'pending'),
(19, 'Dinuka', 69, 'B+', 450, 'KA005', 'Pending'),
(20, 'Dilini', 10, 'A-', 450, '5', 'pending'),
(21, 'thivanka', 41, 'AB-', 450, '1254', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `transfertbl`
--

CREATE TABLE `transfertbl` (
  `requestID` varchar(10) NOT NULL,
  `BloodGroup` varchar(5) NOT NULL,
  `requestDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bloodtbl`
--
ALTER TABLE `bloodtbl`
  ADD PRIMARY KEY (`invoiceNO`);

--
-- Indexes for table `campreg`
--
ALTER TABLE `campreg`
  ADD PRIMARY KEY (`NIC`,`Date`,`Month`,`Year`);

--
-- Indexes for table `donar_donation`
--
ALTER TABLE `donar_donation`
  ADD PRIMARY KEY (`NIC`,`LastDonationDate`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`BarcodeNO`),
  ADD KEY `Foreign key` (`NIC`);

--
-- Indexes for table `donortbl`
--
ALTER TABLE `donortbl`
  ADD PRIMARY KEY (`NICdonor`);

--
-- Indexes for table `emptbl`
--
ALTER TABLE `emptbl`
  ADD PRIMARY KEY (`EmpNIC`);

--
-- Indexes for table `plasma`
--
ALTER TABLE `plasma`
  ADD PRIMARY KEY (`invoice_no`);

--
-- Indexes for table `platelet`
--
ALTER TABLE `platelet`
  ADD PRIMARY KEY (`invoice_no`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`Request_ID`);

--
-- Indexes for table `transfertbl`
--
ALTER TABLE `transfertbl`
  ADD PRIMARY KEY (`requestID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bloodtbl`
--
ALTER TABLE `bloodtbl`
  MODIFY `invoiceNO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `BarcodeNO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `plasma`
--
ALTER TABLE `plasma`
  MODIFY `invoice_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `platelet`
--
ALTER TABLE `platelet`
  MODIFY `invoice_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `Request_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donar_donation`
--
ALTER TABLE `donar_donation`
  ADD CONSTRAINT `Foreign key2` FOREIGN KEY (`NIC`) REFERENCES `donortbl` (`NICdonor`);

--
-- Constraints for table `donation`
--
ALTER TABLE `donation`
  ADD CONSTRAINT `Foreign key` FOREIGN KEY (`NIC`) REFERENCES `donortbl` (`NICdonor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
