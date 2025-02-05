-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2022 at 04:05 PM
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
-- Database: `real_estate`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'subhash', 'admin@gmail.com', 'admin'),
(3, 'MUSA SANI', 'isa@yahoo.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image1` text NOT NULL,
  `image2` text NOT NULL,
  `image3` text NOT NULL,
  `image4` text NOT NULL,
  `property_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image1`, `image2`, `image3`, `image4`, `property_id`) VALUES
(1, '6.jpg', '1.jpg', '1.jpg', '1.jpg', 2),
(7, 'blog-2.jpg', 'blog-3.jpg', 'blog-5.jpg', 'blog-6.jpg', 5),
(9, 'blog-6.jpg', 'blog-7.jpg', 'blog-7.jpg', 'blog-6.jpg', 9);

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `email` text NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`id`, `name`, `subject`, `email`, `mobile`, `message`, `date`, `time`) VALUES
(3, 'Ibrahim Mohammed Aji', 'Subscription payment', 'ibmuhd557@gmail.com', '090456778', 'thhxhxhhc', '2021-12-21', '07:33:39'),
(4, 'Ibrahim Mohammed Aji', 'Subscription payment', 'ibmuhd557@gmail.com', '090456778', 'thhxhxhhc', '2021-12-21', '07:49:49'),
(5, 'Ibrahim Mohammed Aji', 'Subscription payment', 'ibmuhd557@gmail.com', '090456778', 'thhxhxhhc', '2021-12-21', '07:56:36'),
(6, 'Isa Musa', 'Subscription payment', 'isa@yahoo.com', '0909978654', 'Best regards.', '2024-12-21', '10:39:08'),
(7, 'Isa Musa', 'Subscription payment', 'isa@yahoo.com', '0909978654', 'Best regards.', '2024-12-21', '10:43:44'),
(8, 'Ibrahim Mohammed', 'Addition of new functionality', 'ibmu22@gmail.com', '908756727662', 'gmfbbvvbv', '2001-01-22', '01:42:46'),
(9, 'Ibrahim Mohammed', 'Subscription payment', 'ibmuhd557@gmail.com', '09056789', 'hhhhhhhchhhhhhhhcc', '2004-01-22', '04:53:42'),
(12, 'Ibrahim Mohammed', 'NEw', 'admin@gmail.com', '09056789445', 'nncncnncbcncb', '2021-01-22', '03:35:55');

-- --------------------------------------------------------

--
-- Table structure for table `propertiescontact`
--

CREATE TABLE `propertiescontact` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phonenumber` varchar(255) NOT NULL,
  `Message` text NOT NULL,
  `PropertyName` varchar(255) NOT NULL,
  `PropertyAddress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `propertiescontact`
--

INSERT INTO `propertiescontact` (`Id`, `Name`, `Email`, `Phonenumber`, `Message`, `PropertyName`, `PropertyAddress`) VALUES
(28, 'Ibrahim Mohammed', 'admin@gmail.com', '0907889900', 'ggshggggcgcgcg', 'Compeleted Flat', 'Naibawa Kwanar Dan Hassan'),
(29, 'Ibrahim Mohammed', 'ibmuhd557@gmail.com', '08108101246', 'dddddd', 'Delux room', 'ghaziabad uttarpradesh'),
(30, 'Ibrahim Mohammed', 'ibmuhd557@gmail.com', '08108101246', 'Im happy.', 'Beautiful House', ''),
(31, 'Ibrahim Mohammed', 'ibmuhd557@gmail.com', '090567898888', 'nnncnncncnc', 'Beautiful House', 'Danbare Quaters'),
(32, 'Ibrahim', 'hassan@gmail.com', '0907889900', 'vbbbbcbcb', 'Beautiful House', ''),
(33, 'Ibrahim Mohammed', 'ibmuhd557@gmail.com', '09056789', 'bbxbxvvvv', 'Delux room', 'ghaziabad uttarpradesh'),
(34, 'MUSA SANI', 'admin@gmail.com', '08108101246', 'dhhdhhfhdhd', 'Delux room', '');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `bedroom` int(11) NOT NULL,
  `hall` int(11) NOT NULL,
  `kichan` int(11) NOT NULL,
  `bathroom` int(11) NOT NULL,
  `parking_space` int(11) NOT NULL,
  `price` varchar(11) NOT NULL,
  `address` text NOT NULL,
  `image` text NOT NULL,
  `description` varchar(300) NOT NULL,
  `property_type` varchar(50) NOT NULL,
  `sold` varchar(12) NOT NULL,
  `land_area` varchar(20) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`id`, `title`, `bedroom`, `hall`, `kichan`, `bathroom`, `parking_space`, `price`, `address`, `image`, `description`, `property_type`, `sold`, `land_area`, `date`) VALUES
(2, 'Delux room', 1, 1, 1, 1, 1, '2000', 'ghaziabad uttarpradesh', '6.jpg', 'Did you play off any hot home styles this year to improve your listingâ€™s appearance? These were some of the top home design fads.', 'house', 'yes', '200', '2019-01-12 12:10:13'),
(5, 'Beautiful House', 5, 10, 3, 7, 2, '590000', 'Danbare Quaters ', 'blog.jpg', 'Nice house for your family.', 'Flat ', 'no', '67', '2022-01-14 19:16:40'),
(9, 'Housing', 5, 3, 4, 5, 0, '567899', '', 'blog-3.jpg', 'Good house in Naibawa', 'House ', 'No', '45', '2022-01-21 15:50:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `propertiescontact`
--
ALTER TABLE `propertiescontact`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `propertiescontact`
--
ALTER TABLE `propertiescontact`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
