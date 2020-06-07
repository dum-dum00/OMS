-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2020 at 05:13 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `usth_diplomedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tab_bachelor`
--

CREATE TABLE `tab_bachelor` (
  `student_id` varchar(15) NOT NULL,
  `v_spec` varchar(1000) NOT NULL,
  `e_spec` varchar(1000) NOT NULL,
  `v_grade` varchar(50) NOT NULL,
  `e_grade` varchar(50) NOT NULL,
  `v_fullname` varchar(200) NOT NULL,
  `e_fullname` varchar(200) NOT NULL,
  `v_bdate` varchar(100) NOT NULL,
  `e_bdate` varchar(100) NOT NULL,
  `v_bplace` varchar(100) NOT NULL,
  `e_bplace` varchar(100) NOT NULL,
  `graduation` int(11) NOT NULL,
  `diplome_id` varchar(25) NOT NULL,
  `document_id` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tab_bachelor`
--

INSERT INTO `tab_bachelor` (`student_id`, `v_spec`, `e_spec`, `v_grade`, `e_grade`, `v_fullname`, `e_fullname`, `v_bdate`, `e_bdate`, `v_bplace`, `e_bplace`, `graduation`, `diplome_id`, `document_id`) VALUES
('USTHBI7-001', 'Công nghệ Sinh học nông, y, dược', 'Pharmacological, Medical and Agronomical Biotechnology', 'Khá', 'Good', 'Bùi Ngân An', 'Bui Ngan An', '15/03/1998', 'March 15, 1998', 'Hà Nội, Việt Nam', 'Hanoi', 0, '101001201600001', '001/2019/ĐHKHCN-VB-CN'),
('USTHBI7-009', 'Công nghệ Sinh học nông, y, dược', 'Pharmacological, Medical and Agronomical Biotechnology', 'Trung bình Khá', 'Average Good', 'Mai Nguyễn Tuấn Anh', 'Mai Nguyen Tuan Anh', '05/10/1998', 'October 5, 1998', 'Nam Định, Việt Nam', 'Nam Dinh', 0, '101001201600009', '002/2019/ĐHKHCN-VB-CN'),
('USTHBI7-050', 'Công nghệ Sinh học nông, y, dược', 'Pharmacological, Medical and Agronomical Biotechnology', 'Khá', 'Good', 'Nguyễn Thùy Dương', 'Nguyen Thuy Duong', '11/05/1998', 'May 11, 1998', 'Hà Nội, Việt Nam', 'Hanoi', 0, '101001201600050', '003/2019/ĐHKHCN-VB-CN'),
('USTHBI7-080', 'Công nghệ Sinh học nông, y, dược', 'Pharmacological, Medical and Agronomical Biotechnology', 'Khá', 'Good', 'Ngô Thị Linh Hương', 'Ngo Thi Linh Huong', '28/08/1997', 'August 28, 1997', 'Hà Nội, Việt Nam', 'Hanoi', 0, '101001201600080', '004/2019/ĐHKHCN-VB-CN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tab_bachelor`
--
ALTER TABLE `tab_bachelor`
  ADD PRIMARY KEY (`student_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
