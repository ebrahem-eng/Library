-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2022 at 09:37 PM
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
  `id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `AdminEmail` varchar(120) DEFAULT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `groupID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `FullName`, `AdminEmail`, `UserName`, `Password`, `updationDate`, `groupID`) VALUES
(1, 'Anuj Kumar', 'admin@gmail.com', 'admin', '25d55ad283aa400af464c76d713c07ad', '2022-06-23 03:39:24', 1),
(2, 'mhd hh', 'admin2@gmail.com', 'admin2', '25d55ad283aa400af464c76d713c07ad', '2022-06-20 18:36:00', 0),
(4, 'nnnn nnnnn', 'admin3@gmail.com', 'admin3', '202cb962ac59075b964b07152d234b70', '2022-06-22 13:04:42', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `notes` text CHARACTER SET utf8 NOT NULL,
  `student_id` varchar(255) CHARACTER SET utf8 NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `notes`, `student_id`, `date`, `status`) VALUES
(1, 'كتاب برمجة 1 غير متوفر', 'SID009', '2022-07-01 14:34:01', 1),
(2, 'hhhhhhhhhhhhhhhhhhh hj;lkljbjhghkgdc  uiuhnjjhhghjgh', 'SID009', '2022-07-01 09:03:18', 1),
(3, 'vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv nnnnnnnnnnnnnnnnnnnnnnnnn', 'SID009', '2022-07-01 09:03:23', 1),
(4, ',,,,,,,,mmmmov  ihjgbjhgjhjgjgjhgjhgjhgj ghghjghjgjhgjgjhgjhgjhh', 'SID009', '2022-07-01 09:03:27', 1),
(5, 'bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb bbbbbbbbbbbbbbbbbbbbbbb bbbbbbbbbbbbbbbbbbbb', 'SID009', '2022-07-01 09:03:31', 1),
(6, '12 jkdbjhvhku9lio jjikjkujhktyft jiuytgewdfvghjewdcbf', 'SID009', '2022-07-01 09:03:35', 1),
(7, 'nmbjhhilhknmnkjjilkjmlk jkhnhlkmk;l,/.', 'SID009', '2022-07-01 09:03:42', 1),
(8, 'nmnbmnbmnbnm nmnbmnbmnbnm  nmnbmnbmnbnm  nmnbmnbmnbnm  nmnbmnbmnbnm  nmnbmnbmnbnm  nmnbmnbmnbnm  nmnbmnbmnbnm  nmnbmnbmnbnm  nmnbmnbmnbnm  nmnbmnbmnbnm  nmnbmnbmnbnm  nmnbmnbmnbnm ', 'SID009', '2022-07-01 09:03:46', 1),
(9, 'vvvvvvvvvvvvvvvvvvvvvvvvvvvvv vvvvvvvvvvvvvvvvvvvvvvvvvvvv vbbbbbbbbbbbbbbbbbbbb bbbbbbbbbbbbbbbbbbbbbbb bbbbbbbbbbbbbbbbbb\r\n                                    ', 'SID009', '2022-07-01 09:03:50', 1),
(10, 'nmnmnmn\r\n                                    ', 'SID009', '2022-07-01 09:03:54', 1),
(11, '  b bmnbmnnnnnnnnnnnnnnnnnnnnnnnnnnnn nmmmmmmmmmmmmmmmmmmmm n,mmmmmmmmmmmmmmmmmmmmmmmmmm,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,\r\n                                    ', 'SID009', '2022-07-01 09:03:59', 1),
(12, 'jikjkjkjkjkjkjkj jkjlok;\r\nnjmnmnnnnnn lkjkkkkkkkkkkbhjg ,nkjhkyujg                  ', 'SID009', '2022-07-01 09:04:05', 1),
(13, 'cvvvvvvvvvvvvvvvvvvvvvvvv \r\njjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj\r\nkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk\r\nkkkkkkkkkkkkkkkkkkkkkkkkkkkkk\r\n                                    ', 'SID009', '2022-06-26 14:39:08', 0),
(14, 'bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb\r\nmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm\r\n                                    ', 'SID009', '2022-06-26 14:46:06', 0),
(15, 'fffffffffffffffffffffffffffffffffffffffffffffffff gggggggggggggggggggggggggggg hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh kkkkkkkkkkkk nkjlk\r\n                                    ', 'SID009', '2022-06-26 05:14:44', 0),
(16, '\r\n                           xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx         ', 'SID009', '2022-06-26 05:20:15', 0),
(17, 'jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj nnnnnnnnnnnnnnnnnnnn\r\n                                    ', 'SID009', '2022-07-01 08:54:13', 0),
(18, '\r\n                                    mmmmmmmmmmmmmmmmmmmmmmmmmmmm', 'SID009', '2022-07-01 08:56:15', 0),
(19, 'hello world\r\n                                    ', 'SID009', '2022-07-01 01:35:56', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory1`
--

CREATE TABLE `subcategory1` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `number` varchar(255) CHARACTER SET utf8 NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategory1`
--

INSERT INTO `subcategory1` (`id`, `name`, `number`, `cat_id`) VALUES
(1, 'الصحافة والنشر', '090', 8),
(2, 'المجموعات العامة', '080', 8),
(3, 'الفلسفة الحديثة', '190', 4),
(4, 'الفلسفة القديمة والاسلامية', '180', 4);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory2`
--

CREATE TABLE `subcategory2` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `number` varchar(255) CHARACTER SET utf8 NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategory2`
--

INSERT INTO `subcategory2` (`id`, `name`, `number`, `cat_id`) VALUES
(1, 'قسم1', '1009', 1),
(2, 'قسم2', '1010', 1),
(3, 'قسم3', '1011', 3),
(4, 'قسم4', '1012', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tblauthors`
--

CREATE TABLE `tblauthors` (
  `id` int(11) NOT NULL,
  `AuthorName` varchar(159) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblauthors`
--

INSERT INTO `tblauthors` (`id`, `AuthorName`, `creationDate`, `UpdationDate`) VALUES
(1, 'Anuj kumar', '2022-01-22 07:23:03', '2022-01-22 07:23:03'),
(2, 'Chetan Bhagatt', '2022-01-22 07:23:03', '2022-01-22 07:23:03'),
(3, 'Anita Desai', '2022-01-22 07:23:03', '2022-01-22 16:23:41'),
(4, 'HC Verma', '2022-01-22 07:23:03', '2022-01-22 16:23:45'),
(5, 'R.D. Sharma ', '2022-01-22 07:23:03', '2022-01-22 16:23:47'),
(9, 'fwdfrwer', '2022-01-22 07:23:03', '2022-01-22 16:23:55'),
(10, 'Dr. Andy Williams', '2022-01-22 07:15:32', NULL),
(11, 'Kyle Hill', '2022-01-22 07:16:34', NULL),
(12, 'Robert T. Kiyosak', '2022-01-22 07:18:38', NULL),
(13, 'Kelly Barnhill', '2022-01-22 07:21:54', NULL),
(14, 'Herbert Schildt', '2022-01-22 07:23:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblbooks`
--

CREATE TABLE `tblbooks` (
  `id` int(11) NOT NULL,
  `BookName` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `CatId` int(11) DEFAULT NULL,
  `AuthorId` int(11) DEFAULT NULL,
  `ISBNNumber` varchar(25) DEFAULT NULL,
  `BookPrice` decimal(10,2) DEFAULT NULL,
  `bookImage` varchar(250) NOT NULL,
  `count` int(11) NOT NULL,
  `issued_count` int(11) NOT NULL,
  `isIssued` int(1) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `cat1` int(11) NOT NULL,
  `cat2` int(11) NOT NULL,
  `publishing_house` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbooks`
--

INSERT INTO `tblbooks` (`id`, `BookName`, `CatId`, `AuthorId`, `ISBNNumber`, `BookPrice`, `bookImage`, `count`, `issued_count`, `isIssued`, `RegDate`, `UpdationDate`, `cat1`, `cat2`, `publishing_house`) VALUES
(1, 'PHP And MySql programming', 5, 1, '222333', '20.00', '1efecc0ca822e40b7b673c0d79ae943f.jpg', 4, 4, 0, '2022-01-22 07:23:03', '2022-06-28 18:27:15', 0, 0, ''),
(3, 'physics', 6, 4, '1111', '15.00', 'dd8267b57e0e4feee5911cb1e1a03a79.jpg', 1, 1, 1, '2022-01-22 07:23:03', '2022-06-28 18:22:54', 0, 0, ''),
(5, 'Murach\'s MySQL', 5, 1, '9350237695', '455.00', '5939d64655b4d2ae443830d73abc35b6.jpg', 3, 2, 1, '2022-01-21 16:42:11', '2022-06-28 18:23:02', 0, 0, ''),
(6, 'WordPress for Beginners 2022: A Visual Step-by-Step Guide to Mastering WordPress', 5, 10, 'B019MO3WCM', '100.00', '144ab706ba1cb9f6c23fd6ae9c0502b3.jpg', 0, 0, 1, '2022-01-22 07:16:07', '2022-06-25 06:40:10', 0, 0, ''),
(7, 'WordPress Mastery Guide:', 5, 11, 'B09NKWH7NP', '53.00', '90083a56014186e88ffca10286172e64.jpg', 0, 0, 1, '2022-01-22 07:18:03', '2022-06-25 06:41:43', 0, 0, ''),
(8, 'Rich Dad Poor Dad: What the Rich Teach Their Kids About Money That the Poor and Middle Class Do Not', 8, 12, 'B07C7M8SX9', '120.00', '52411b2bd2a6b2e0df3eb10943a5b640.jpg', 0, 0, 1, '2022-01-22 07:20:39', '2022-06-25 06:44:01', 0, 0, ''),
(9, 'The Girl Who Drank the Moon', 8, 13, '1848126476', '200.00', 'f05cd198ac9335245e1fdffa793207a7.jpg', 0, 0, NULL, '2022-01-22 07:22:33', NULL, 0, 0, ''),
(10, 'C++: The Complete Reference, 4th Edition', 5, 14, '007053246X', '142.00', '36af5de9012bf8c804e499dc3c3b33a5.jpg', 0, 0, 1, '2022-01-22 07:23:36', '2022-06-25 06:47:29', 0, 0, ''),
(11, 'ASP.NET Core 5 for Beginners', 9, 11, 'GBSJ36344563', '422.00', 'b1b6788016bbfab12cfd2722604badc9.jpg', 0, 0, 0, '2022-01-22 08:14:21', '2022-01-22 08:15:23', 0, 0, ''),
(12, 'كتاب فلسفة', 8, 3, '1234', NULL, '03a4b2b1e2f801d09b52411d255a512b.jpg', 0, 0, NULL, '2022-06-20 07:31:28', '2022-06-20 09:48:24', 1, 1, 'دار نشر'),
(13, 'كتاب برمجة', 8, 4, '123456', NULL, 'c627cae7e55c46b68956d2a934dccc62.jpg', 0, 0, NULL, '2022-06-20 09:23:57', NULL, 1, 1, 'دار نشر'),
(14, 'كتاب برمجة2', 4, 3, '12345678', NULL, 'd8c8af5a4370287a78bb33d2dc4223b4.jpg', 3, 0, NULL, '2022-06-26 13:28:51', '2022-06-29 09:12:50', 3, 3, 'دار نشر ');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(150) DEFAULT NULL,
  `Status` int(1) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `CategoryName`, `Status`, `CreationDate`, `UpdationDate`) VALUES
(4, 'Romantic', 1, '2022-01-22 07:23:03', '2022-01-22 07:23:03'),
(5, 'Technology', 1, '2022-01-22 07:23:03', '2022-01-22 07:23:03'),
(6, 'Science', 1, '2022-01-22 07:23:03', '2022-01-22 16:24:37'),
(7, 'Management', 1, '2022-01-22 07:23:03', '2022-01-22 16:24:35'),
(8, 'General', 1, '2022-01-22 07:23:03', '2022-01-22 16:24:40'),
(9, 'Programming', 1, '2022-01-22 07:23:03', '2022-01-22 16:24:42');

-- --------------------------------------------------------

--
-- Table structure for table `tblissuedbookdetails`
--

CREATE TABLE `tblissuedbookdetails` (
  `id` int(11) NOT NULL,
  `BookId` int(11) DEFAULT NULL,
  `StudentID` varchar(150) DEFAULT NULL,
  `IssuesDate` timestamp NULL DEFAULT current_timestamp(),
  `due_date` timestamp NULL DEFAULT NULL,
  `ReturnDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `RetrunStatus` int(1) DEFAULT NULL,
  `fine` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblissuedbookdetails`
--

INSERT INTO `tblissuedbookdetails` (`id`, `BookId`, `StudentID`, `IssuesDate`, `due_date`, `ReturnDate`, `RetrunStatus`, `fine`) VALUES
(7, 5, 'SID011', '2022-01-22 05:45:57', '2022-02-02 17:56:50', '2022-06-25 16:57:02', NULL, NULL),
(8, 1, 'SID002', '2022-01-22 05:59:17', '2022-02-02 17:57:08', '2022-06-25 16:57:18', 1, 0),
(9, 10, 'SID009', '2022-01-22 07:38:09', '2022-02-02 17:47:13', NULL, NULL, 0),
(10, 11, 'SID009', '2022-01-22 08:15:02', '2022-02-02 17:57:28', NULL, 0, 0),
(11, 1, 'SID012', '2022-01-22 08:17:15', NULL, '2022-06-26 13:56:29', 1, 1),
(12, 10, 'SID012', '2022-01-22 08:18:08', NULL, '2022-01-22 08:18:22', 1, 5),
(13, 6, 'SID011', '2022-06-23 17:05:14', NULL, '2022-06-23 17:12:29', NULL, 0),
(14, 3, 'SID011', '2022-06-25 06:38:29', '0000-00-00 00:00:00', NULL, NULL, NULL),
(16, 7, 'SID014', '2022-06-25 06:41:43', '2022-07-04 21:00:00', NULL, NULL, NULL),
(17, 8, 'TTT4', '2022-06-25 06:44:01', '2022-07-05 16:57:48', NULL, NULL, NULL),
(18, 10, 'SID002', '2022-06-25 06:47:29', '2022-07-05 05:47:29', NULL, NULL, NULL),
(22, 1, 'SID009', '2022-06-26 13:19:04', '2022-07-06 00:19:04', '2022-06-26 13:53:42', 1, 1),
(23, 1, 'SID002', '2022-06-26 13:21:05', '2022-07-06 00:21:05', '2022-06-26 13:51:47', 1, 1),
(24, 1, 'SID012', '2022-06-26 13:21:28', '2022-07-06 00:21:28', '2022-06-26 13:37:51', 1, 1),
(25, 1, 'SID009', '2022-06-26 13:21:51', '2022-07-06 00:21:51', '2022-06-26 13:57:53', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudents`
--

CREATE TABLE `tblstudents` (
  `id` int(11) NOT NULL,
  `StudentId` varchar(100) DEFAULT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `MobileNumber` char(11) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `Status` int(1) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudents`
--

INSERT INTO `tblstudents` (`id`, `StudentId`, `FullName`, `EmailId`, `MobileNumber`, `Password`, `Status`, `RegDate`, `UpdationDate`) VALUES
(1, 'SID002', 'Anuj kumar', 'salam@gmail.com', '9865472555', 'f925916e2754e5e03f75dd58a5733251', 1, '2022-01-02 07:23:03', '2022-06-23 17:40:44'),
(4, 'SID005', 'sdfsd', 'csfsd@dfsfks.com', '8569710025', '92228410fc8b872914e023160cf4ae8f', 1, '2022-01-02 07:23:03', '2022-06-23 17:41:34'),
(8, 'SID009', 'test', 'test@gmail.com', '2359874527', 'f925916e2754e5e03f75dd58a5733251', 1, '2022-01-02 07:23:03', '2022-01-22 16:25:58'),
(9, 'SID010', 'Amit', 'amit@gmail.com', '8585856224', 'f925916e2754e5e03f75dd58a5733251', 1, '2022-01-02 07:23:03', '2022-01-22 16:26:02'),
(10, 'SID011', 'Sarita Pandey', 'sarita@gmail.com', '4672423754', 'f925916e2754e5e03f75dd58a5733251', 1, '2022-01-02 07:23:03', '2022-01-22 16:26:04'),
(11, 'SID012', 'John Doe', 'john@test.com', '1234569870', 'f925916e2754e5e03f75dd58a5733251', 1, '2022-01-22 08:16:18', NULL),
(17, 'SID013', 'ttt hhh', 'tt@gmail.com', '09876553', 'e10adc3949ba59abbe56e057f20f883e', 1, '2022-06-19 11:11:56', '2022-06-19 11:15:26'),
(18, 'SID014', 'fff', 'ffff@gmail.com', '0987654321', '25d55ad283aa400af464c76d713c07ad', 1, '2022-06-19 11:14:04', NULL),
(19, 'ttt4', 'rrr tttt', 'rrr@gmail.com', '0987654321', '25d55ad283aa400af464c76d713c07ad', 1, '2022-06-21 06:42:19', NULL),
(30, 'm9munh', ',,mmsb', NULL, '098765421', '202cb962ac59075b964b07152d234b70', 1, '2022-06-22 12:47:32', NULL),
(31, '987', 'jjjjjjjjjjjj', 'lkjjgh@nbv.com', '0987642', '202cb962ac59075b964b07152d234b70', 1, '2022-06-22 12:50:37', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `AdminEmail` (`AdminEmail`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory1`
--
ALTER TABLE `subcategory1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `subcategory2`
--
ALTER TABLE `subcategory2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategory2_ibfk_1` (`cat_id`);

--
-- Indexes for table `tblauthors`
--
ALTER TABLE `tblauthors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbooks`
--
ALTER TABLE `tblbooks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `CatId` (`CatId`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblissuedbookdetails`
--
ALTER TABLE `tblissuedbookdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstudents`
--
ALTER TABLE `tblstudents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `StudentId` (`StudentId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `subcategory1`
--
ALTER TABLE `subcategory1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subcategory2`
--
ALTER TABLE `subcategory2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblauthors`
--
ALTER TABLE `tblauthors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tblbooks`
--
ALTER TABLE `tblbooks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblissuedbookdetails`
--
ALTER TABLE `tblissuedbookdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tblstudents`
--
ALTER TABLE `tblstudents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `subcategory1`
--
ALTER TABLE `subcategory1`
  ADD CONSTRAINT `subcategory1_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `tblcategory` (`id`);

--
-- Constraints for table `subcategory2`
--
ALTER TABLE `subcategory2`
  ADD CONSTRAINT `subcategory2_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `subcategory1` (`id`);

--
-- Constraints for table `tblbooks`
--
ALTER TABLE `tblbooks`
  ADD CONSTRAINT `tblbooks_ibfk_1` FOREIGN KEY (`CatId`) REFERENCES `tblcategory` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
