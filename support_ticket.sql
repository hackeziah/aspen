-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2019 at 05:12 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `support_ticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `activation`
--

CREATE TABLE `activation` (
  `Activation_Id` bigint(20) NOT NULL,
  `Verification_Code` varchar(15) NOT NULL,
  `Is_Activated` char(1) NOT NULL DEFAULT '0',
  `User_Id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `Category_Id` bigint(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Description` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Category_Id`, `Name`, `Description`) VALUES
(13, 'Hardware', 'Hardware category'),
(14, 'Software', 'Software Category'),
(20, 'Network', 'Network Category');

-- --------------------------------------------------------

--
-- Table structure for table `configurations`
--

CREATE TABLE `configurations` (
  `Id` bigint(20) NOT NULL,
  `Event_Name` varchar(400) NOT NULL,
  `Value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `configurations`
--

INSERT INTO `configurations` (`Id`, `Event_Name`, `Value`) VALUES
(4, 'registerType', '20');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `Department_Id` bigint(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Description` varchar(80) NOT NULL DEFAULT ' '
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`Department_Id`, `Name`, `Description`) VALUES
(0, 'Admin', 'Available for only admins of the system'),
(1, 'IT', 'Information Technology Department'),
(60, 'Sales', 'Sales Department'),
(64, 'Marketing', ' Marketing Department'),
(65, 'HR', ' Human Resources'),
(66, 'Accounting', ' Accounting Department'),
(67, 'Finance', ' Finance Department'),
(68, 'Procurement', ' Procurement Department'),
(69, 'Export', ' Export Department'),
(70, 'Buying', ' Buying Department'),
(71, 'R and D', ' R & D Department'),
(73, 'Production', ' Production Department'),
(74, 'Logistics', ' Logistics Department');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `Position_Id` bigint(20) NOT NULL,
  `Position_Name` varchar(50) NOT NULL,
  `Position_Desc` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`Position_Id`, `Position_Name`, `Position_Desc`) VALUES
(0, 'Administrator', 'This position is for only the adminstrators of the system'),
(1, 'IT Manager', 'Manager'),
(4, 'Mid Programmer', 'With 2 yrs experience'),
(5, 'Team Leader', 'Leads a group of people'),
(6, 'Operations Manager', 'leader for operation '),
(7, 'Quality Control Manager', 'Deals in food products'),
(8, 'Accountant', 'Responsible for monthly income statements and balance'),
(9, 'Office Manager', 'Oversee everything not involved in production '),
(10, 'Receptionist', 'Handles phone calls, greet visitors, handles mail'),
(11, 'Marketing Manager', 'Handle all aspects related to promoting and selling the product'),
(12, 'Purchasing Manager', 'Duties of this position may be filled by either or both the general manager'),
(13, 'Professional Staff', 'Firm''s professional staff resources');

-- --------------------------------------------------------

--
-- Table structure for table `priorities`
--

CREATE TABLE `priorities` (
  `Priority_Id` bigint(20) NOT NULL,
  `Level` varchar(5) NOT NULL,
  `Days` varchar(5) NOT NULL,
  `Hours` varchar(5) DEFAULT NULL,
  `Minutes` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `priorities`
--

INSERT INTO `priorities` (`Priority_Id`, `Level`, `Days`, `Hours`, `Minutes`) VALUES
(1, '4', '4', '4', '4'),
(2, '2', '0', '1', '30'),
(3, '6', '6', '6', '6');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `Ticket_Id` bigint(20) NOT NULL,
  `Subject` varchar(200) NOT NULL,
  `Category_Id` bigint(20) NOT NULL,
  `Priority_Id` bigint(20) NOT NULL,
  `Description` text NOT NULL,
  `CreatedBy` bigint(20) NOT NULL,
  `SupportedBy` bigint(20) DEFAULT NULL,
  `DateCreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DateClosed` datetime DEFAULT NULL,
  `DateModified` datetime DEFAULT NULL,
  `Status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`Ticket_Id`, `Subject`, `Category_Id`, `Priority_Id`, `Description`, `CreatedBy`, `SupportedBy`, `DateCreated`, `DateClosed`, `DateModified`, `Status`) VALUES
(5, 'Sample 1', 13, 1, 'Sample 1', 18, NULL, '2019-07-22 13:00:59', NULL, NULL, 'For Approval'),
(6, 'Sample 2', 14, 3, 'sample', 17, 18, '2019-07-22 13:01:26', NULL, NULL, 'For Approval');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_Id` bigint(20) NOT NULL,
  `Employee_Id` varchar(30) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `Firstname` varchar(50) DEFAULT NULL,
  `Middlename` varchar(50) NOT NULL,
  `Department_Id` bigint(20) NOT NULL,
  `Position_Id` bigint(20) NOT NULL,
  `Username` varchar(40) NOT NULL,
  `Pwd` varchar(30) NOT NULL,
  `User_Type_Id` bigint(20) DEFAULT NULL,
  `Is_Support` char(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_Id`, `Employee_Id`, `Lastname`, `Firstname`, `Middlename`, `Department_Id`, `Position_Id`, `Username`, `Pwd`, `User_Type_Id`, `Is_Support`) VALUES
(17, '796-432-97', 'Bongosia', 'Morris Franz', 'P', 64, 11, 'franz.bongosia', 'franz123', 4, '1'),
(18, '000-000-000', ' Admin', ' ', ' ', 0, 0, 'admin', 'admin', 10, '1'),
(19, '123-431-496', 'Lamadrid', 'Kevin', 'D', 60, 7, 'kevin.lamadrid', 'w', 4, '1'),
(20, '832-183-841', 'Nacianceno', 'Princess Nicole', 'D', 65, 1, 'adminsample', 'adminsample', 2, '1'),
(21, '785-274-824', 'Manzano', 'Rainen Scheenler', 'D', 1, 4, 'Rainen ScheenlerManzano', 'Rainen ScheenlerManzano', NULL, '0'),
(27, '123-216-232', 'Clacevillas', 'Kim Bryan', 'C', 66, 8, 'Kim BryanClacevillas', 'Kim BryanClacevillas', 4, '1'),
(28, '785-213-862', 'Hernandez', 'Justine', 'B', 1, 4, 'JustineHernandez', 'JustineHernandez', NULL, '0'),
(29, '843-128-184', 'Datu', 'Abigail', 'V', 1, 4, 'AbigailDatu', 'AbigailDatu', NULL, '0'),
(30, '212-431-853', 'Zamora', 'John Cedric', 'null', 1, 4, 'John CedricZamora', 'John CedricZamora', NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `User_Type_Id` bigint(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Description` varchar(80) DEFAULT NULL,
  `Scope` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`User_Type_Id`, `Name`, `Description`, `Scope`) VALUES
(2, 'IT Head', 'Includes reports', '{"createTicket":1,"viewAllTickets":0,"viewCurrentUserTickets":1,"viewSupportedTickets":1,"approvalTicket":1,"userManagement":0,"reports":1,"websiteSettings":0,"maintenance":0}'),
(3, 'IT Staff', 'staff', '{"createTicket":1,"viewAllTickets":0,"viewCurrentUserTickets":1,"viewSupportedTickets":1,"deleteTicket":0,"updateTicket":0,"approvalTicket":0,"userManagement":0,"reports":0,"websiteSettings":0,"maintenance":0}'),
(4, 'Employee', 'Creation of tickets', '{"createTicket":1,"viewAllTickets":0,"viewCurrentUserTickets":1,"viewSupportedTickets":0,"deleteTicket":0,"updateTicket":0,"approvalTicket":0,"userManagement":0,"reports":0,"websiteSettings":0,"maintenance":0}'),
(10, 'Admin', 'Include all scopes', '{"createTicket":1,"viewAllTickets":1,"viewCurrentUserTickets":1,"viewSupportedTickets":1,"deleteTicket":1,"updateTicket":1,"approvalTicket":1,"userManagement":1,"reports":1,"websiteSettings":1,"maintenance":1}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activation`
--
ALTER TABLE `activation`
  ADD PRIMARY KEY (`Activation_Id`),
  ADD KEY `fk_activation` (`User_Id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Category_Id`);

--
-- Indexes for table `configurations`
--
ALTER TABLE `configurations`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`Department_Id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`Position_Id`);

--
-- Indexes for table `priorities`
--
ALTER TABLE `priorities`
  ADD PRIMARY KEY (`Priority_Id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`Ticket_Id`),
  ADD KEY `fk_issuecat` (`Category_Id`),
  ADD KEY `fk_issueprio` (`Priority_Id`),
  ADD KEY `fk_createdBy` (`CreatedBy`),
  ADD KEY `fk_supportedBy` (`SupportedBy`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_Id`),
  ADD KEY `fk_departments` (`Department_Id`),
  ADD KEY `fk_position` (`Position_Id`),
  ADD KEY `fk_usertype` (`User_Type_Id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`User_Type_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activation`
--
ALTER TABLE `activation`
  MODIFY `Activation_Id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `Category_Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `configurations`
--
ALTER TABLE `configurations`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `Department_Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `Position_Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `priorities`
--
ALTER TABLE `priorities`
  MODIFY `Priority_Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `Ticket_Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `User_Type_Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `activation`
--
ALTER TABLE `activation`
  ADD CONSTRAINT `fk_activation` FOREIGN KEY (`User_Id`) REFERENCES `users` (`User_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `fk_createdBy` FOREIGN KEY (`CreatedBy`) REFERENCES `users` (`User_Id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_issuecat` FOREIGN KEY (`Category_Id`) REFERENCES `categories` (`Category_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_issueprio` FOREIGN KEY (`Priority_Id`) REFERENCES `priorities` (`Priority_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_supportedBy` FOREIGN KEY (`SupportedBy`) REFERENCES `users` (`User_Id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_departments` FOREIGN KEY (`Department_Id`) REFERENCES `departments` (`Department_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_position` FOREIGN KEY (`Position_Id`) REFERENCES `positions` (`Position_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usertype` FOREIGN KEY (`User_Type_Id`) REFERENCES `user_types` (`User_Type_Id`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
