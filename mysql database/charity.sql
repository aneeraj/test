-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2021 at 10:27 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `charity`
--

-- --------------------------------------------------------

--
-- Table structure for table `alerts`
--

CREATE TABLE `alerts` (
  `email` varchar(200) NOT NULL,
  `alert` varchar(2000) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alerts`
--

INSERT INTO `alerts` (`email`, `alert`, `date_time`) VALUES
('yolo@gmail.com', 'You have recieved Rs.1,000 from Shrikanth Mallesh Basa', '2021-05-26 17:17:18'),
('shrikanthbasa35@gmail.com', 'You Donated Rs.1,000 to yolo foundation', '2021-05-26 17:17:18'),
('yolo@gmail.com', 'You have recieved Rs.1,000 from Shrikanth Mallesh Basa', '2021-05-26 17:45:00'),
('shrikanthbasa35@gmail.com', 'You Donated Rs.1,000 to yolo foundation', '2021-05-26 17:45:00'),
('yolo@gmail.com', 'You have recieved Rs.2,000 from Shrikanth Mallesh Basa', '2021-05-29 09:50:25'),
('shrikanthbasa35@gmail.com', 'You Donated Rs.2,000 to yolo foundation', '2021-05-29 09:50:25'),
('shrikanthbasa35@gmail.com', 'You have recieved Rs.10,000 from yolo foundation', '2021-05-29 10:13:51'),
('yolo@gmail.com', 'You Donated Rs.10,000 to Shrikanth Mallesh Basa', '2021-05-29 10:13:51'),
('yolo@gmail.com', 'You have recieved Rs.2,000 from Shrikanth Mallesh Basa', '2021-05-29 13:23:49'),
('shrikanthbasa35@gmail.com', 'You Donated Rs.2,000 to yolo foundation', '2021-05-29 13:23:49');

-- --------------------------------------------------------

--
-- Table structure for table `beneficiary_details`
--

CREATE TABLE `beneficiary_details` (
  `ben_id` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(500) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beneficiary_details`
--

INSERT INTO `beneficiary_details` (`ben_id`, `name`, `address`, `email`, `phone`) VALUES
('shrikanthbasa35@gmail.com*#26/May/2021 05:12:37', 'Shrikanth Mallesh Basa', 'Room No 2, Jagan Ranga patil chawl house, govind mali road, gaothan, Dahisar(West))', 'shrikanthbasa35@gmail.com', 8898072782),
('rushabh@gmail.com*#29/May/2021 10:12:06', 'Rushabh Shah', 'Mumbai', 'rushabh@gmail.com', 9898983898),
('shrikanthbasa35@student.sfit.ac.in*#29/May/2021 01:18:27', 'shrikanth basa', 'Room No 2, Jagan Ranga patil chawl house, govind mali road, gaothan, Dahisar(West))', 'shrikanthbasa35@student.sfit.ac.in', 8898072782);

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `d_ID` int(11) NOT NULL,
  `fk_listing` int(11) NOT NULL,
  `from_email` varchar(200) NOT NULL,
  `to_email` varchar(200) NOT NULL,
  `amount` float NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dhash` varchar(200) NOT NULL,
  `success` varchar(3) NOT NULL DEFAULT 'NO',
  `otp` bigint(20) DEFAULT NULL,
  `dat_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`d_ID`, `fk_listing`, `from_email`, `to_email`, `amount`, `date_time`, `dhash`, `success`, `otp`, `dat_time`) VALUES
(1, 1, 'shrikanthbasa35@gmail.com', 'yolo@gmail.com', 1000, '2021-05-26 05:17:18', '0x9b33fcb1eedac31cee2d4db338dd3af3a4f6d2620580f24c15a3905608ba9546', 'YES', 462363, '2021-05-26 17:17:18'),
(2, 1, 'shrikanthbasa35@gmail.com', 'yolo@gmail.com', 1000, '2021-05-26 05:45:00', '0xd7bffcb09ee9fce46114e774c088680905ac730860cca40fd6c7bda36b419185', 'NO', 133550, '2021-05-26 17:45:00'),
(3, 1, 'shrikanthbasa35@gmail.com', 'yolo@gmail.com', 2000, '2021-05-29 09:50:25', '0xa4332e230f0ca1bf4caa68a26b1cd9490bd13b60a449e892e67508ed7cb8cfdd', 'NO', 406043, '2021-05-29 09:50:25'),
(4, 3, 'yolo@gmail.com', 'shrikanthbasa35@gmail.com', 10000, '2021-05-29 10:13:51', '0x8617218c2d9678aa4e0a92a993a190c390bdaa654fdf7df074e27a42f24e715b', 'YES', NULL, '2021-05-29 10:13:51'),
(5, 5, 'shrikanthbasa35@gmail.com', 'yolo@gmail.com', 2000, '2021-05-29 01:23:49', '0x9d918ea2ced924779b421d88dbc43f469d8a7fc7b5619009bc114f77889101c1', 'NO', 101107, '2021-05-29 13:23:49');

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

CREATE TABLE `listings` (
  `listing_ID` int(11) NOT NULL,
  `fk_email` varchar(200) DEFAULT NULL,
  `title` varchar(400) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `category` varchar(200) NOT NULL,
  `fromNGO` varchar(200) DEFAULT NULL,
  `beneficiary_id` varchar(200) NOT NULL,
  `hash` varchar(200) NOT NULL,
  `target` float NOT NULL,
  `reached` varchar(3) NOT NULL DEFAULT 'NO',
  `doclinks` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `listings`
--

INSERT INTO `listings` (`listing_ID`, `fk_email`, `title`, `description`, `category`, `fromNGO`, `beneficiary_id`, `hash`, `target`, `reached`, `doclinks`) VALUES
(1, 'yolo@gmail.com', 'Donation for education', 'Donation for education Donation for education Donation for educationDonation for educationDonation for educationDonation for educationDonation for education', 'Education', 'yolo@gmail.com', 'shrikanthbasa35@gmail.com*#26/May/2021 05:12:37', '0xf50ec73dd0bb8c629066c1c7da83e5813a208ba80b2ffc07cd6103da0578857b', 50000, 'NO', 'school.jpg*document 2.jpg*document.png*'),
(2, 'shrikanthbasa35@gmail.com', 'Some request', 'dessd', 'Human services', NULL, '', '0x40129a558911b486464915448a93780577ccbc4d80e17cadc7b8a03439fb7ede', 23232, 'NO', 'covid.jpg*'),
(3, 'shrikanthbasa35@gmail.com', 'Need money for fees', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and', 'Education', NULL, '', '0xbec60a4e695706f4c5fe1e87253092b7e3da0bed9a9069c4660b37b141f3f15e', 15000, 'NO', 'hunger.jpg*document.png*'),
(4, 'yolo@gmail.com', 'Need assistance for studies', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut mi sem. Fusce ipsum urna, mollis quis augue eget, varius consequat magna. Ut erat leo, tempor non odio non, tristique fermentum mauris. Nulla a eros nec lorem placerat ullamcorper. Curabitur turpis lorem, convallis porta finibus a, luctus et dui. Fusce non est ut ligula fringilla posuere.', 'Education', 'yolo@gmail.com', 'rushabh@gmail.com*#29/May/2021 10:12:06', '0xffaabe5dee054e49c32c36ab5539cafc266d302bdd0f10bbc4f64018fc63f7c4', 200000, 'NO', 'education.jpg*document 2.jpg*'),
(5, 'yolo@gmail.com', 'Need donation for eye surgery', 'Need donation for eye surgery Need donation for eye surgery Need donation for eye surgery Need donation for eye surgery', 'Health & medical', 'yolo@gmail.com', 'shrikanthbasa35@student.sfit.ac.in*#29/May/2021 01:18:27', '0x4604bbc33ec266b5fc7be2443604ab8f1bb8041b718f593fb7a6bf5f98c832a4', 150000, 'NO', 'document.png*education.jpg*hunger.jpg*');

-- --------------------------------------------------------

--
-- Table structure for table `remixaccounts`
--

CREATE TABLE `remixaccounts` (
  `serial_no` int(11) NOT NULL,
  `type` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(2000) NOT NULL,
  `dob` date NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `ngo` int(11) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `AC_hash` varchar(200) DEFAULT NULL,
  `balance` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `name`, `address`, `dob`, `mobile`, `ngo`, `pass`, `AC_hash`, `balance`) VALUES
('shrikanthbasa35@gmail.com', 'Shrikanth Mallesh Basa', 'Room No 2, Jagan Ranga patil chawl house, govind mali road, gaothan, Dahisar(West))', '2018-02-07', 8898072782, 0, '3b8a7eef6bc30e740e09b3d54a43cf37b7a491ae', '0x2fe013891c1b057a410f6a2a115b6a2cd8e740b5548e4adeece010a9ee66f54a', 0),
('yolo@gmail.com', 'yolo foundation', 'Room No 2, Jagan Ranga patil chawl house, govind mali road, gaothan, Dahisar(West))', '2021-01-09', 8898072782, 1, '308e7248f9ed61028240d51be33d67b6d8e4482d', '0x7f981ae43a4190b10d11c63c2f9f0582d6ee86e639025c40429e1f505fd964a1', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alerts`
--
ALTER TABLE `alerts`
  ADD KEY `email` (`email`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`d_ID`),
  ADD KEY `fk_listing` (`fk_listing`),
  ADD KEY `from_email` (`from_email`),
  ADD KEY `to_email` (`to_email`);

--
-- Indexes for table `listings`
--
ALTER TABLE `listings`
  ADD PRIMARY KEY (`listing_ID`),
  ADD KEY `fk_email` (`fk_email`),
  ADD KEY `fromNGO` (`fromNGO`);

--
-- Indexes for table `remixaccounts`
--
ALTER TABLE `remixaccounts`
  ADD PRIMARY KEY (`serial_no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `d_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `listings`
--
ALTER TABLE `listings`
  MODIFY `listing_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `remixaccounts`
--
ALTER TABLE `remixaccounts`
  MODIFY `serial_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alerts`
--
ALTER TABLE `alerts`
  ADD CONSTRAINT `alerts_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`email`);

--
-- Constraints for table `donations`
--
ALTER TABLE `donations`
  ADD CONSTRAINT `donations_ibfk_1` FOREIGN KEY (`fk_listing`) REFERENCES `listings` (`listing_ID`),
  ADD CONSTRAINT `donations_ibfk_2` FOREIGN KEY (`from_email`) REFERENCES `user` (`email`),
  ADD CONSTRAINT `donations_ibfk_3` FOREIGN KEY (`to_email`) REFERENCES `user` (`email`);

--
-- Constraints for table `listings`
--
ALTER TABLE `listings`
  ADD CONSTRAINT `listings_ibfk_1` FOREIGN KEY (`fk_email`) REFERENCES `user` (`email`),
  ADD CONSTRAINT `listings_ibfk_2` FOREIGN KEY (`fk_email`) REFERENCES `user` (`email`),
  ADD CONSTRAINT `listings_ibfk_3` FOREIGN KEY (`fromNGO`) REFERENCES `user` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
