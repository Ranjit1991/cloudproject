

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";



use `cmsdb`;

-- Database: `CMSDB`


-- --------------------------------------------------------

-- Table structure for table `container_detail`
CREATE TABLE `container_detail` (
  `Container_ID` int(11) NOT NULL,
  `Container_Model` varchar(26) NOT NULL,
  `Container_Description` varchar(200) NOT NULL,
  `Container_Status` varchar(26) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `container_detail` (`Container_ID`, `Container_Model`,`Container_Description`, `Container_Status`) VALUES
(1, 'C01', 'maximum load is 1000kg','Available'),
(2, 'C02', 'maximum load is 1200kg','Available'),
(3, 'C03', 'maximum load is 1500kg','Available');


-- Indexes for table `container_detail`
ALTER TABLE `container_detail`
  ADD PRIMARY KEY (`Container_ID`),
  ADD UNIQUE KEY `Container_Model` (`Container_Model`);
  
-- --------------------------------------------------------

-- AUTO_INCREMENT for table `container_detail`
ALTER TABLE `container_detail`
  MODIFY `Container_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


-- Table structure for table `cargo_orders`
CREATE TABLE `cargo_orders` (
  `Order_ID` int(11) NOT NULL,
  `Departure_Name` varchar(30) NOT NULL,
  `Arrival_Name` varchar(30) NOT NULL,
  `Sender_Name` varchar(30) NOT NULL,
  `Sender_Phone` varchar(20) NOT NULL,
  `Receiver_Name` varchar(30) NOT NULL,
  `Receiver_Phone` varchar(20) NOT NULL,
  `Container_Model` varchar(30) NOT NULL,
  `Order_Status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Indexes for table `cargo_orders`
ALTER TABLE `cargo_orders`
  ADD PRIMARY KEY (`Order_ID`);

-- inserting data for table `cargo_orders`

INSERT INTO `cargo_orders` (`Order_ID`, `Departure_Name`, `Arrival_Name`, `Sender_Name`, `Sender_Phone`, `Receiver_Name`, `Receiver_Phone`, `Container_Model`, `Order_Status`) VALUES
(1, 'Asia', 'Europe', 'Ranjit', '9815339431', 'uday', '9813151323', 'C01', 'Loaded'),
(2, 'Europe', 'America', 'Abhushan', '9801561497', 'Shalinee', '9845761497', 'C02', 'Loaded'),
(3, 'Europe', 'Asia', 'Amar', '9854264860', 'Sunny', '9806704726', 'C03', 'Loaded');

-- --------------------------------------------------------
-- AUTO_INCREMENT for table `cargo_orders`

ALTER TABLE `cargo_orders`
  MODIFY `Order_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

-- Table structure for table `schedule_detail`
CREATE TABLE `schedule_detail` (
  `Schedule_ID` int(11) NOT NULL,
  `Departure_Name` varchar(30) NOT NULL,
  `Departure_Time` time NOT NULL,
  `Arrival_Name` varchar(30) NOT NULL,
  `Arrival_Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Indexes for table `schedule_detail`

ALTER TABLE `schedule_detail`
  ADD PRIMARY KEY (`Schedule_ID`);

-- Dumping data for table `schedule_detail`

INSERT INTO `schedule_detail` (`Schedule_ID`, `Departure_Name`, `Departure_Time`, `Arrival_Name`, `Arrival_Time`) VALUES
(1, 'America', '11:00:00', 'Europe', '10:30'),
(2, 'Asia', '11:00:00', 'Europe', '05:15'),
(3, 'Europe', '11:00:00', 'America', '01:30'),
(4, 'Asia', '05:00:00', 'Europe', '06:00');

-- --------------------------------------------------------

-- AUTO_INCREMENT for table `schedule_detail`

ALTER TABLE `schedule_detail`
  MODIFY `Schedule_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


-- Table structure for table `users_account`
CREATE TABLE `users_account` (
  `User_ID` int(11) NOT NULL,
  `Fullname` varchar(50) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Actor` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Indexes for table `users_account`
ALTER TABLE `users_account`
  ADD PRIMARY KEY (`User_ID`);


-- insert into data for table `users_account`

INSERT INTO `users_account` (`User_ID`,`Fullname`, `Username`, `Password`, `Email`, `Actor`) VALUES
(1, 'ranjit shrestha', 'ranjit', 'ranjit123', 'ranjit.shrestha74@gmail.com', '1'),
(2, 'hari maharjan','hari', 'hari123', 'hari_rai@gmail.com', '2'),
(3, 'anil shrestha','anil', 'anil23', 'anil.shrestha90@gmail.com', '2');


-- AUTO_INCREMENT for table `users_account`

ALTER TABLE `users_account`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

