-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2020 at 06:18 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name_lastname` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `message` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `view` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_code` varchar(200) NOT NULL,
  `course_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_code`, `course_name`) VALUES
(7, '๑๐๒๕๒๐๓', 'การพัฒนาหลักสูตร'),
(8, '๑๐๔๕๓๐๒', 'สถิติเพื่อการวิจัยทางการศึกษา  '),
(9, '๑๐๑๕๑๐๒', 'ปรัชญาการศึกษาและความเป็นครู*(แผนการเรียน๒)'),
(10, '๑๐๕๕๔๐๒', 'จิตวิทยาเพื่อการเรียนการสอน*(แผนการเรียน๒)'),
(11, '๑๕๕๕๑๐๑', 'ภาษาอังกฤษสำหรับนักศึกษาบัณฑิตศึกษา (สำหรับผู้ที่สอบไม่ผ่าน)'),
(12, '๔๑๒๕๑๐๑', 'คอมพิวเตอร์สำหรับบัณฑิตศึกษา(สำหรับผู้สอบไม่ผ่าน)'),
(13, '๑๐๓๕๓๐๒', 'การออกแบบการเรียนการสอน'),
(15, '๑๐๔๕๑๐๒', 'การวัดและประเมินผลการเรียนรู้ '),
(16, '๑๐๔๕๔๐๒', 'การวิจัยเพื่อพัฒนาการเรียนรู้และการประกันคุณภาพในสถานศึกษา'),
(17, '๑๐๒๖๑๐๔', 'วิชาเลือก สารัตถะและวิทยวิธีทางภาษาอังกฤษ'),
(18, '๑๐๐๕๑๐๒', 'ภาษาและวัฒนธรรมสำหรับครู *(แผนการเรียน๒)'),
(19, '๑๐๓๕๗๐๒', 'นวัตกรรมและเทคโนโลยีสารสนเทศเพื่อการศึกษา *(แผนการเรียน๒)'),
(20, '๑๐๐๕๘๑๐', 'การฝึกปฏิบัติวิชาชีพครูระหว่างเรียน *(แผนการเรียน๒)'),
(21, '๑๐๒๕๕๐๑', 'การจัดการหลักสูตรและการเรียนการสอน'),
(22, '๑๐๒๕๙๓๒', 'สัมมนาการพัฒนาหลักสูตรและการเรียนการสอน '),
(23, '๑๐๒๖๙๓๕', 'วิทยานิพนธ์ '),
(24, '๑๐๐๖๘๐๑', 'การปฏิบัติการสอนในสถานศึกษา ๑*(แผนการเรียน๒)'),
(26, '๑๐๐๖๘๐๒', 'การปฏิบัติการสอนในสถานศึกษา ๒*(แผนการเรียน๒)');

-- --------------------------------------------------------

--
-- Table structure for table `file_download`
--

CREATE TABLE `file_download` (
  `file_id` int(11) NOT NULL,
  `file_display_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `file_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `file_date` datetime NOT NULL,
  `file_download_count` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file_download`
--

INSERT INTO `file_download` (`file_id`, `file_display_name`, `file_name`, `file_date`, `file_download_count`) VALUES
(8, 'ปฏิทินวิชาการ ปีการศึกษา1/2561', 'jpg-201809101523148687.jpg', '0000-00-00 00:00:00', 0),
(9, 'ตารางสอนปีการศึกษา1/2561', 'pdf-201812221602548167.pdf', '0000-00-00 00:00:00', 0),
(10, 'ตารางสอนปีการศึกษา2/2561', 'pdf-2018122216003612236.pdf', '0000-00-00 00:00:00', 0),
(11, 'ปฏิทินวิชาการ2/2561', 'pdf-2018122216020412556.pdf', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `room_id` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `room_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price_rate` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `numberofguests` int(2) NOT NULL,
  `more_detail` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `room_pic` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`room_id`, `room_name`, `price_rate`, `numberofguests`, `more_detail`, `room_pic`) VALUES
('5d7fa50d403dd', 'Standard Fan Room', '350', 2, '<p>asdxx</p>\r\n', '5d7fb3bc0310093894.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_gallery`
--

CREATE TABLE `hotel_gallery` (
  `hotel_gallery_id` int(11) NOT NULL,
  `hotel_id` varchar(20) NOT NULL,
  `image_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel_gallery`
--

INSERT INTO `hotel_gallery` (`hotel_gallery_id`, `hotel_id`, `image_name`) VALUES
(1, '5d7fa4a098b78', '5d7fa4a09f22a88679jpg'),
(2, '5d7fa4a098b78', '5d7fa4a0ac66558868jpg'),
(3, '5d7fa4a098b78', '5d7fa4a0d31416906jpg'),
(4, '5d7fa4b358a66', '5d7fa4b35f35451584jpg'),
(5, '5d7fa4b358a66', '5d7fa4b3680c583818jpg'),
(6, '5d7fa4b358a66', '5d7fa4b38359e75047jpg'),
(10, '', '5d7faf120b0b210770.jpg'),
(11, '', '5d7faf1215b1085458.jpg'),
(12, '', '5d7faf122f88745037.jpg'),
(13, '', '5d7faf4521a8e40801.png'),
(14, '5d7fa50d403dd', '5d7faf66acd2011414.jpg'),
(15, '5d7fa50d403dd', '5d7faf66b656636493.jpg'),
(16, '5d7fa50d403dd', '5d7faf66dbe4239904.jpg'),
(17, '5d8cbf7d4889f', '5d8cbf7d5818252599.png'),
(18, '5d8cbf7d4889f', '5d8cbf7d5dfbb70718.png'),
(19, '5d8cbfc1d0a4a', '5d8cbfc1df95665446.png'),
(20, '5d8cbfc1d0a4a', '5d8cbfc1e5e1291153.png'),
(27, '5d8cc19fba2a6', '5d9757109364d8087.jpg'),
(28, '5d8cc19fba2a6', '5d975710ae36c77651.jpg'),
(29, '5d8cc19fba2a6', '5d975710c09cc23212.jpg'),
(30, '5d8cc19fba2a6', '5d975710e4a7c95797.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mitting`
--

CREATE TABLE `mitting` (
  `room_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `room_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `room_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `numberofguests` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `building` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `more_detail` text COLLATE utf8_unicode_ci NOT NULL,
  `room_pic` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mitting`
--

INSERT INTO `mitting` (`room_id`, `room_name`, `room_code`, `numberofguests`, `building`, `more_detail`, `room_pic`) VALUES
('5d8cc19fba2a6', 'ห้องประชุมสลุมคำ', '490201', '300', 'ศุนย์คอมพิวเตอร์', '<p>ศูนย์เทคโนโลยีสารสนเทศและการสื่อสาร (ICT) ชั้นนำของจังหวัดลำปาง</p>\r\n\r\n<p>ศูนย์คอมพิวเตอร์มหาวิทยาลัยราชภัฏลำปางตั้งอยู่ที่อาคาร 39 โดยเปิดให้บริการ ด้านการสืบค้นข้อมูล ทางอินเทอร์เน็ต การฝึกทักษะโปรแกรม คอมพิวเตอร์ และเป็นสถานที่ ในการฝึกอบรมคอมพิวเตอร์แก่นักศึกษาคณาจารย์และบุคลากรภายนอก</p>\r\n', '5d9756c80d8ba33571.jpg'),
('5da87f412c57a', 'ห้องประชุม กาแล', '39512', '100', 'ศูนย์คอมพิวเตอร์', '<p>ศูนย์คอมพิวเตอร์</p>\r\n', '5da87f412c6bd49913.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `news_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `news_title` text COLLATE utf8_unicode_ci NOT NULL,
  `news_detail` text COLLATE utf8_unicode_ci NOT NULL,
  `news_images` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `news_type` enum('news','event') COLLATE utf8_unicode_ci NOT NULL,
  `news_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `news_status` int(11) NOT NULL,
  `news_view` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_name`, `news_title`, `news_detail`, `news_images`, `news_type`, `news_date`, `news_status`, `news_view`) VALUES
(3, 'กิจกรรมเเลกของขวัญปีใหม่ ของนักศึกษารหัส 60', '', '', '234661515993684.jpg', 'event', '2018-01-15 05:21:24', 0, 24),
(4, 'นิเทศ นักศึกษาปริญญาโท รหัส 59 พัชรี', '', '<p>นิเทศ นักศึกษาปริญญาโท รหัส 59</p>\r\n', '2709831516602440.jpg', 'event', '2018-01-22 06:27:19', 0, 8),
(5, 'นิเทศ นักศึกษาปริญญาโท รหัส 59 กนกรัชต์', '', '<p>นิเทศ นักศึกษาปริญญาโท รหัส 59 กนกรัชต์</p>\r\n', '1593771516602556.jpg', 'event', '2018-01-22 06:29:16', 0, 6),
(6, 'นิเทศ นักศึกษาปริญญาโท รหัส 59 พระมหาภานุวัฒน์', '', '<p>นิเทศ นักศึกษาปริญญาโท รหัส 59 พระมหาภานุวัฒน์</p>\r\n', '3636581516602602.jpg', 'event', '2018-01-22 06:30:02', 0, 8),
(7, 'โครงการเข้าค่ายเพื่อการทำวิทยานิพนธ์', '', '<p><span style=\"font-family:Lucida Sans Unicode,Lucida Grande,sans-serif\"><span style=\"font-size:14px\">หลักสูตรครุศาสตรมหาบัณฑิต สาขาหลักสูตรและการสอน คณะครุศาสตร์ มหาวิทยาลัยราชภัฏลำปาง ได้จัดโครงการเข้าค่ายเพื่อการทำวิทยานิพนธ์ ในวันที่ 17 &ndash; 18 กุมภาพันธ์ 2561&nbsp;ณ ห้องประชุมบีบคำ JJ Park Lampan&nbsp;ให้แก่นักศึกษาในหลักสูตรฯ จำนวน 11&nbsp;คน นักศึกษาชั้นปีที่ 1 รหัส 59&nbsp;โดยมีวัตถุประสงค์เพื่อให้นักศึกษามีความรู้ ความสามารถในการจัดทำโครงร่างวิทยานิพนธ์ เเละเพื่อให้นักศึกษามีโครงร่างวิทยานิพนธ์ที่สอดคล้องกับศาสตร์ในสาขาวิชา</span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n', '8894731528770987.jpg', 'event', '2018-06-12 02:36:26', 0, 9),
(8, 'โครงการเข้าค่ายประชุมปฏิบัติการเพื่อบ่มเพาะจิตวิญญาณความเป็นครูและจิตอาสา ', '', '<p><span style=\"font-family:Trebuchet MS,Helvetica,sans-serif\"><span style=\"font-size:16px\">หลักสูตรครุศาสตรมหาบัณฑิต สาขาหลักสูตรและการสอน คณะครุศาสตร์ มหาวิทยาลัยราชภัฏลำปาง ได้จัดโครงการเข้าค่ายประชุมปฏิบัติการเพื่อบ่มเพาะจิตวิญญาณความเป็นครูและจิตอาสา ในวันที่&nbsp;20 &ndash; 21 เมษายน 2561&nbsp;ณ ห้องประชุมโอฬารรัตน์ อาคารโอฬารโรจน์ มหาวิทยาลัยราชภัฏลำปาง&nbsp;ให้แก่นักศึกษาในหลักสูตรฯ จำนวน 26 ประกอบด้วยนักศึกษาชั้นปีที่ 1 และนักศึกษาชั้นปีที่ 2 ทั้งนี้ทางหลักสูตรฯได้จัดเป็นบริการวิชาการให้แก่บุคลากรโรงเรียนสาธิต มหาวิทยาลัยราชภัฏลำปาง โดยทางหลักสูตรฯ มีความประสงค์เพื่อให้ผู้เข้าร่วมโครงการมีความรู้ความเข้าใจเกี่ยวกับจิตวิญญาณความเป็นครูและมีจิตอาสา&nbsp;</span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '4011201528771027.jpg', 'event', '2018-06-12 02:37:06', 0, 50),
(9, 'โครงการพัฒนานักศึกษาเพื่อเป็นครูมืออาชีพและพี่เลี้ยงทางวิชาการ', '', '<p><span style=\"font-size:16.0pt\">หลักสูตรครุศาสตรมหาบัณฑิต สาขาหลักสูตรและการสอน คณะครุศาสตร์ มหาวิทยาลัยราชภัฏลำปาง ได้จัดโครงการพัฒนานักศึกษาเพื่อเป็นครูมืออาชีพและพี่เลี้ยงทางวิชาการ ในวันที่&nbsp;</span><span style=\"font-size:12pt\"><span style=\"font-family:\'Times New Roman\',serif\"><span style=\"font-size:16.0pt\">18 &ndash; 19 สิงหาคม 2561 ณ ห้องประชุมโอฬารรัตน์ อาคารโอฬารโรจน์หิรัญ&nbsp;มหาวิทยาลัยราชภัฎลำปาง&nbsp;</span></span></span><span style=\"font-size:16.0pt\">ให้แก่นักศึกษาในหลักสูตรฯ จำนวน 40 คน โดยมีวัตถุประสงค์เพื่อส่งเสริมให้นักศึกษามีคุณลักษณะเป็นครูมืออาชีพและมีความรู้ในการเป็นพี่เลี้ยงทางวิชาการ โดยทางหลักสูตรได้รับเกียรติจาก&nbsp;</span><span style=\"font-size:12pt\"><span style=\"font-family:\'Times New Roman\',serif\"><span style=\"font-size:16.0pt\">รองศาสตราจารย์ ดร.บังอร เสรีรัตน์ และ อาจารย์เกษตร วงศ์อุปราช ให้เกียรติเป็นวิทยากรในการโครงการฯ&nbsp;</span></span></span></p>\r\n', '844361536555198.jpg', 'news', '2018-09-01 03:28:09', 0, 50),
(10, 'นิเทศ นักศึกษาปริญญาโท รหัส 60', '', '', '3793211536555335.JPG', 'event', '2018-09-10 04:55:35', 0, 12),
(11, 'กิจกรรมการเรียนการสอน นักศึกษา ป.โท วันเสาร์ที่ 23 กุมภาพันธ์ 2562', '', '<h1><strong><span style=\"font-size:20px\"><span style=\"color:#c0392b\">[Clip]</span></span></strong><span style=\"font-size:18px\"><strong>&nbsp;</strong> <a href=\"https://www.youtube.com/watch?v=Ja9GXtRTe9o\">กิจกรรมการเรียนการสอน นักศึกษา ป.โท วันเสาร์ที่ 23 กุมภาพันธ์ 2562</a></span></h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>&nbsp;</h2>\r\n', '561091550897795.JPG', 'event', '2019-02-23 04:56:35', 0, 107),
(13, 'พิธีรดน้ำดำหัว หลักสูตรครุศาสตรมหาบัณฑิต สาขาหลักสูตรและการสอน นักศึกษารหัส 60', '', '<p>นักศึกษาหลักสูตรครุศาสตรมหาบัณฑิต สาขาวิชาหลักสูตรและการสอน (รหัส 60) จัดพิธีรดน้ำดำหัวแด่ผู้บริหาร คณาจารย์ประจำหลักสูตร เพื่อความเป็นสิริมงคล ณ ห้องประชุมกาซะลอง คณะครุศาสตร์ เมื่อวันที่ 10 เมษายน 2562</p>\r\n', '4501301555508751.jpg', 'event', '2019-04-17 13:45:51', 0, 20),
(14, 'ประชาสัมพันธ์หลักสูตรครุศาสตรมหาบัณฑิต สาขาวิชาหลักสูตรและการสอน', '', '', '5590491558434630.jpg', 'event', '2019-05-05 07:14:26', 0, 45);

-- --------------------------------------------------------

--
-- Table structure for table `news_image_gallery`
--

CREATE TABLE `news_image_gallery` (
  `nig_id` int(11) NOT NULL,
  `file_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `news_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news_image_gallery`
--

INSERT INTO `news_image_gallery` (`nig_id`, `file_name`, `news_id`) VALUES
(20, '6989771515993685.jpg', 3),
(21, '2192301515993685.jpg', 3),
(22, '9062761515993685.jpg', 3),
(23, '8464331515993685.jpg', 3),
(24, '2716771515993685.jpg', 3),
(25, '6238401515993686.jpg', 3),
(26, '5032531515993687.jpg', 3),
(27, '2186971515993688.jpg', 3),
(28, '8941941515993688.jpg', 3),
(29, '1179241516602440.jpg', 4),
(30, '898631516602440.jpg', 4),
(31, '2065771516602440.jpg', 4),
(32, '389961516602440.jpg', 4),
(33, '4273441516602441.jpg', 4),
(34, '7554981516602441.jpg', 4),
(35, '7054341516602441.jpg', 4),
(36, '6011981516602441.jpg', 4),
(37, '6571011516602441.jpg', 4),
(38, '2969131516602441.jpg', 4),
(39, '4693191516602556.jpg', 5),
(40, '2712421516602556.jpg', 5),
(41, '999431516602556.jpg', 5),
(42, '2274481516602557.jpg', 5),
(43, '1095081516602557.jpg', 5),
(44, '4924491516602557.jpg', 5),
(45, '3724491516602557.jpg', 5),
(46, '7445751516602602.jpg', 6),
(47, '4098751516602603.jpg', 6),
(48, '4750831516602603.jpg', 6),
(49, '9253821516602603.jpg', 6),
(50, '2561401516602603.jpg', 6),
(51, '8891691516602603.jpg', 6),
(52, '8271371516602603.jpg', 6),
(53, '5228851516602603.jpg', 6),
(54, '9810551528770987.jpg', 7),
(55, '132861528770987.jpg', 7),
(56, '5743051528770987.jpg', 7),
(57, '2385371528770987.jpg', 7),
(58, '7558221528770987.jpg', 7),
(59, '8802791528770988.jpg', 7),
(60, '6388791528770988.jpg', 7),
(61, '1686271528770988.jpg', 7),
(62, '1781981528770988.jpg', 7),
(63, '2222611528770988.jpg', 7),
(64, '9898411528770988.jpg', 7),
(65, '7867531528770989.jpg', 7),
(66, '6626801528771027.jpg', 8),
(67, '9393571528771027.jpg', 8),
(68, '6707951528771027.jpg', 8),
(69, '8793051528771027.jpg', 8),
(70, '101521528771028.jpg', 8),
(71, '470191528771028.jpg', 8),
(72, '4253811528771028.jpg', 8),
(73, '4671861528771028.jpg', 8),
(74, '9120081528771028.jpg', 8),
(75, '3983551528771028.jpg', 8),
(76, '4193611528771029.jpg', 8),
(77, '5056691528771029.jpg', 8),
(78, '2811521528771029.jpg', 8),
(80, '352571535772968.jpg', 9),
(81, '7113311535772982.jpg', 9),
(82, '3301241535773007.jpg', 9),
(83, '356471535773030.jpg', 9),
(84, '3012291535773049.jpg', 9),
(85, '701271535773070.jpg', 9),
(86, '5061201535773102.jpg', 9),
(87, '4614381535773103.jpg', 9),
(88, '3263631535773144.jpg', 9),
(89, '8361491535773145.jpg', 9),
(90, '8169681535773146.jpg', 9),
(91, '6240591535773147.jpg', 9),
(92, '7029201535773203.jpg', 9),
(93, '2996991535773204.jpg', 9),
(94, '7900851535773205.jpg', 9),
(95, '6014211535773205.jpg', 9),
(96, '3180941535773206.jpg', 9),
(97, '874361535773247.jpg', 9),
(98, '8475941535773248.jpg', 9),
(99, '6236831535773249.jpg', 9),
(100, '1107711535773249.jpg', 9),
(101, '9762761535773339.jpg', 9),
(102, '6910571535773340.jpg', 9),
(103, '4863291535773340.jpg', 9),
(104, '3581061535773341.jpg', 9),
(105, '4428641535773342.jpg', 9),
(106, '5019391535773343.jpg', 9),
(107, '8755171535773343.jpg', 9),
(108, '2743091536555124.jpg', 9),
(109, '9936071536555142.jpg', 9),
(110, '548471536555152.jpg', 9),
(111, '6972291536555163.jpg', 9),
(112, '4279111536555382.JPG', 10),
(113, '6150341536555382.JPG', 10),
(114, '5718991536555383.JPG', 10),
(115, '8174541536555384.JPG', 10),
(116, '8649901536555648.JPG', 10),
(117, '9508581536555649.JPG', 10),
(118, '3993281536555650.JPG', 10),
(119, '3693951536555650.JPG', 10),
(120, '4263771536555651.JPG', 10),
(121, '1632991536555652.JPG', 10),
(122, '447851536555652.JPG', 10),
(123, '6102911536555747.JPG', 10),
(124, '50911536555748.JPG', 10),
(125, '1213011536555749.JPG', 10),
(126, '7544681536555749.JPG', 10),
(127, '167021536555844.JPG', 10),
(128, '2896601536555845.JPG', 10),
(129, '7877351536555846.JPG', 10),
(130, '857371536555847.JPG', 10),
(131, '621351536555847.JPG', 10),
(132, '8588951536555848.JPG', 10),
(133, '3902251536555849.JPG', 10),
(134, '1782471550897796.JPG', 11),
(135, '3033301550897796.JPG', 11),
(136, '9109341550897796.JPG', 11),
(137, '880631550897797.JPG', 11),
(138, '8982181550897797.JPG', 11),
(139, '7061291550897797.JPG', 11),
(140, '5794481550897797.JPG', 11),
(141, '4083781550897798.JPG', 11),
(142, '3294891550897798.JPG', 11),
(143, '3820831550908177.JPG', 11),
(144, '4117231550908178.JPG', 11),
(145, '7914021550908178.JPG', 11),
(146, '105181550908178.JPG', 11),
(147, '4569651550908179.JPG', 11),
(171, '5648801555508752.jpg', 13),
(172, '1606461555508752.jpg', 13),
(173, '6899111555508752.jpg', 13),
(174, '2812711555508753.jpg', 13),
(175, '6382651555508753.jpg', 13),
(176, '279851555508753.jpg', 13),
(177, '3299681555508754.jpg', 13),
(178, '8711231555508754.jpg', 13),
(179, '1242121555508754.jpg', 13),
(180, '1239061555508755.jpg', 13),
(181, '2736211555508755.jpg', 13),
(182, '6308711555508755.jpg', 13),
(183, '9600941555508755.jpg', 13),
(184, '3892401555508755.jpg', 13),
(185, '3844841555508755.jpg', 13),
(186, '5177291555508755.jpg', 13),
(187, '5440091555508756.jpg', 13),
(188, '9076561555508756.jpg', 13),
(189, '9672671555508756.jpg', 13),
(201, '993261558434698.jpg', 14),
(202, '7950351558434705.jpg', 14),
(203, '9294451558434712.jpg', 14),
(204, '5846501558434720.jpg', 14),
(205, '7933661558434726.jpg', 14),
(206, '1904091558434730.jpg', 14);

-- --------------------------------------------------------

--
-- Table structure for table `publicnews`
--

CREATE TABLE `publicnews` (
  `news_id` int(11) NOT NULL,
  `news_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `news_detail` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `news_date` date NOT NULL,
  `view` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publicnews`
--

INSERT INTO `publicnews` (`news_id`, `news_title`, `news_detail`, `news_date`, `view`) VALUES
(16, 'ม.ราชภัฏลำปาง ประกาศรับสมัครนักศึกษาเข้าศึกษา ระดับบัณฑิตศึกษา ประจำปีการศึกษา 2562', '<p>ม.ราชภัฏลำปาง ประกาศรับสมัครนักศึกษาเข้าศึกษา ระดับบัณฑิตศึกษา ประจำปีการศึกษา 2562</p>\r\n\r\n<p>เปิดรับสมัครตั่งแต่วันที่ 22 กุมภาพันธ์ ถึง 16&nbsp;พฤษภาคม 2562</p>\r\n\r\n<p>สามารเข้าไปดูได้<a href=\"https://www.lpru.ac.th/news_lpru/?p=19815\">ที่นี่...</a></p>\r\n', '2019-02-23', 26),
(17, 'ประกาศรายชื่อผู้ผ่านการคัดเลือกเข้าศึกษาต่อ ระดับบัณฑิตศึกษา 2562', '<p><a href=\"https://www.lpru.ac.th/news_lpru/?p=20145\">https://www.lpru.ac.th/news_lpru/?p=20145</a></p>\r\n', '2019-05-31', 131);

-- --------------------------------------------------------

--
-- Table structure for table `publicnews_file`
--

CREATE TABLE `publicnews_file` (
  `file_id` int(11) NOT NULL,
  `filename` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `filename_path` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `news_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `research`
--

CREATE TABLE `research` (
  `research_id` int(11) NOT NULL,
  `research_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `student_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `research_year` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `research`
--

INSERT INTO `research` (`research_id`, `research_name`, `student_name`, `file`, `research_year`) VALUES
(2, 'การลดการใช้สารเคมีเพื่อป้องกันกำจัดศัตรูพืชหลังการเก็บเกี่ยว', 'รังสิมา เก่งการพานิช, พรทิพย์ วิสารทานนท์, อมรา ชินภูติ', 'pdf-2018011216294913878.pdf', 2558),
(3, 'การวิจัยภาวะการณ์เปลี่ยนแปลงภูมิอากาศกับระบบการผลิตภาคเกษตร', 'สมชาย บุญประดับ\r\n', 'pdf-2018011216313913648.pdf', 2558);

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `img_id` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `link` varchar(100) NOT NULL,
  `number` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`img_id`, `file`, `link`, `number`) VALUES
(32, '1074351516335061.jpg', '0', 0),
(36, '1846221557043689.jpg', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `sy_id` int(11) NOT NULL,
  `student_code` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(30) NOT NULL,
  `student_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `student_degree` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `student_work` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `student_university` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `student_year` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `student_position` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `student_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `sy_id`, `student_code`, `password`, `student_name`, `student_degree`, `student_work`, `student_university`, `student_year`, `student_position`, `student_image`) VALUES
(9, 1, '60851070101', '0101', 'น.ส.กชกร   จินะโสต', 'วทบ.สังคมวิทยยาและมนุษย์วิทยา', 'โรงเรียนบ้านน้ำชำ', '', '', 'ครู', '58691515992778.jpg'),
(10, 1, '60851070102', '0102', 'น.ส.มณีรัตน์  แก้วสุก', 'ศศบ. ภาษาไทย', 'โรงเรียนสารสาสนีวิเทศเชียงใหม่', 'มหาวิทยาลัยราชภัฏเชียงใหม่', '', 'ครู', '4375891515992909.jpg'),
(11, 1, '60851070103', '0103', 'น.ส.ขนิษฐา  ติ๊บแสน', 'ศศบ. ภาษาไทย', 'โรงเรียนแม่มอกวิทยา', 'มหาวิทยาลัยราชภัฏลำปาง', '', 'ครู', '4371921515993494.jpg'),
(12, 1, '60851070104', '', 'น.ส.ขวัญฤทัย  สูตรเลข', 'คบ.ภาษาไทย', 'โรงเรียนบ้านดงลาน', '', '', 'ครู', '6525011516000325.jpg'),
(13, 1, '60851070105', '0105', 'นางธัญญาศิริ  วงค์ปวง', 'วทบ.สถิติศาสตร์', 'โรงเรียนบ้านแป้น', '', '', 'ข้าราชการครู', '5255151516000837.jpg'),
(14, 1, '60851070106', '0106', 'น.ส.ธิดารัตน์  ชัชวาลพงศ์', 'ศศบ. ภาษาไทย', 'โรงเรียนพินิจวิทยา', 'มหาวิทยาลัยราชภัฏลำปาง', '', 'ครู', '5286021516001081.jpg'),
(15, 1, '60851070107', '0107', 'น.ส.ปจรีย์นัฐ   ท่าจันทร์', 'วทบ.สถิติศาสตร์', 'โรงเรียนสบต๋ำวิทยา', '', '', 'ข้าราชการครู', '4901431516001135.jpg'),
(16, 1, '60851070108', '0108', 'นายพงษ์ประพันธ์  ตุ่นแจ้', 'วบ.บ วิทยาการคอมพิวเตอร์', 'โรงเรียนด่านเเม่ละเมา', '', '', 'ครู', '7236811516001203.jpg'),
(17, 1, '60851070109', '0109', 'น.ส.ภัคมน  รัตนากรานต์', 'ศศบ. ภาษาไทย', 'โรงเรียนสาธิตแห่งมหาวิทยาลัยรังสิตเชียงใหม่', '', '', 'ครู', '8561871516001289.jpg'),
(18, 1, '60851070110', '0110', 'น.ส.รัติกาล  สำเนียง', 'ศศบ. ภาษาไทย', 'โรงเรียนพินิจวิทยา', '', '', 'ครู', '8444491516001460.jpg'),
(19, 1, '60851070111', '0111', 'น.ส.ลำดวน  สาระวงศ์', 'คบ.สังคมศึกษา', 'โรงเรียนประชาวิทย์', '', '', 'ครู', '5568591516001508.jpg'),
(20, 1, '60851070112', '0112', 'น.ส.สุพรรษา  ดัดงอน', 'วทบ.เทคโนโลยีการพัฒนาผลิตภัณฑ์', 'โรงเรียนแจ้ห่มวิทยา', '', '', 'ครู', '9701531516001552.jpg'),
(21, 1, '60851070115', '0115', 'น.ส.เกศดา  โปทา', 'ศศบ. ทัศนศิลป์', 'โรงเรียนพินิจวิทยา', '', '', 'ครู', '2167391516001661.jpg'),
(22, 1, '60851070116', '0116', 'นายกิติภพ   ปินทิโย', 'วท.บ. เทคโนโลยีสารสนเทศ', 'โรงเรียนวชิราลัย เชียงใหม่', '', '', 'ครู', '1962151516001718.jpg'),
(23, 1, '60851070117', '0117', 'นายณัฎฐโภคิณ  ภูริวัฒนภูวดล', 'ศศบ. จิตวิทยาการแนะแนว', 'โรงเรียน', '', '', 'โรงเรียนสารสาสนวิเทศร่มเกล้า', '7979621516001769.jpg'),
(25, 2, '61851070101', '0101', 'น.ส.อภิชญาดา บุญวิรัตน์ ', '', '', '', '', '', '4938971536554879.JPG'),
(26, 2, '61851070102', '0102', 'นายจักรพันธ์ สิงห์บี้', '', '', '', '', '', ''),
(27, 2, '61851070103', '0103', 'น.ส.จุไรรัตน์ ชิตทะวงศ์', '', '', '', '', '', ''),
(28, 2, '61851070104', '0104', 'น.ส.ชนกพร มัดทุ', '', '', '', '', '', '927881536554926.JPG'),
(29, 2, '61851070105', '0105', 'น.ส.ชฎารัตน์ พงษ์ปรีชา', '', '', '', '', '', ''),
(30, 2, '61851070106', '0106', 'นายฎิชมากรณ์ ยศวงค์เรือน', '', '', '', '', '', '7365411536554371.JPG'),
(31, 2, '61851070107', '0107', 'น.ส.ณัฏฐ์กานต์ อินทจันทร์', '', '', '', '', '', '6761741536554845.JPG'),
(32, 2, '61851070108', '0108', 'น.ส.เปรมฤดี กองคำ', '', '', '', '', '', '4535381536554431.JPG'),
(33, 2, '61851070109', '0109', 'นายพัชรพงศ์ ศรีวิชัย', '', '', '', '', '', '1907401536554468.JPG'),
(34, 2, '61851070110', '0110', 'น.ส.พัชรินทร์ สิทธิตัน', '', '', '', '', '', ''),
(35, 2, '61851070111', '0111', 'นายพาณิชย์ อินทร์จันทร์', '', '', '', '', '', '443231536554519.JPG'),
(36, 2, '61851070113', '0113', 'น.ส.วราภรณ์ บุญทอง', '', '', '', '', '', '5313471536554564.JPG'),
(37, 2, '61851070114', '0114', 'น.ส.วิชุดา มาแก้ว', '', '', '', '', '', '4990061536554595.JPG'),
(38, 2, '61851070115', '0115', 'Mr.ZHIXIANG HUANG', '', '', '', '', '', ''),
(39, 3, '59851070101', '0101', 'นางกชพรรณ   เขมเกื้อกูล', '', '', '', '', '', ''),
(40, 3, '59851070104', '0104', 'น.ส.ทรรศนีย์   บุญตันบุตร', '', '', '', '', '', ''),
(41, 3, '59851070106', '0106', 'นางนงพงา  ศรีปินตา', '', '', '', '', '', ''),
(42, 3, '59851070107', '0107', 'น.ส.พจมาน   จงไกรจักร์', '', '', '', '', '', ''),
(43, 3, '59851070113', '0113', 'นางอรอนงค์  ตุ้มนาค', '', '', '', '', '', ''),
(44, 3, '59851070114', '0114', 'น.ส.อัจฉรา  ใจสุต๊ะ', '', '', '', '', '', ''),
(45, 3, '59851070102', '0102', 'น.ส.กนกรัชต์  นันตาวัง', '', '', '', '', '', ''),
(46, 3, '59851070108', '0108', 'น.ส.พรรณทิพย์ภา  ปาลวัฒน์', '', '', '', '', '', ''),
(47, 3, '59851070109', '0109', 'น.ส.พัชรี  อุ่นหะวงค์', '', '', '', '', '', ''),
(48, 3, '59851070110', '0110', 'พระมหาภานุวัฒน์  ลุใจคำ', '', '', '', '', '', ''),
(49, 3, '59851070112', '0112', 'น.ส.หทัยทิพย์  รินศรี', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `student_year`
--

CREATE TABLE `student_year` (
  `sy_id` int(11) NOT NULL,
  `sy_year` varchar(10) NOT NULL,
  `sy_code` varchar(10) NOT NULL,
  `sy_gen` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_year`
--

INSERT INTO `student_year` (`sy_id`, `sy_year`, `sy_code`, `sy_gen`) VALUES
(1, '2560', '60122660', '2'),
(2, '2561', '61122660', '3'),
(3, '2559', '59122660', '1');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `teacher_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `teacher_image` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `teacher_position` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `order_num` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `teacher_name`, `teacher_image`, `teacher_position`, `order_num`) VALUES
(3, 'ผศ.ดร.จรีรัตน์   สุวรรณ์', '4738601515984865.jpg', 'อาจารย์ประจำหลักสูตร', 1),
(4, 'ผศ.ดร.ดวงจันทร์   เดี่ยววิไล', '3402321515984506.jpg', 'หัวหน้าหลักสูตร', 0),
(5, 'อาจารย์ปริตต์  สายสี', '4478741515984923.jpg', 'อาจารย์ประจำหลักสูตร', 1),
(6, 'อาจารย์สุภาภรณ์  มาชัยวงศ์', '8628591515984952.jpg', 'อาจารย์ประจำหลักสูตร', 1),
(7, 'อาจารย์ ดร. ปริญญาภาษ  สีทอง', '6837531515984996.jpg', 'อาจารย์ประจำหลักสูตร', 2),
(8, 'อาจารย์ ดร. เกษทิพย์  ศิริชัยศิลป์', '7201971515985032.jpg', 'อาจารย์ประจำหลักสูตร', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dateadd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `dateadd`) VALUES
(3, 'wit00685', '000685', 'Prawit Yancharoenkit', '2018-01-04 03:06:19'),
(4, 'admin', '1234', 'admin', '2018-01-08 09:22:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `file_download`
--
ALTER TABLE `file_download`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `hotel_gallery`
--
ALTER TABLE `hotel_gallery`
  ADD PRIMARY KEY (`hotel_gallery_id`);

--
-- Indexes for table `mitting`
--
ALTER TABLE `mitting`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `news_image_gallery`
--
ALTER TABLE `news_image_gallery`
  ADD PRIMARY KEY (`nig_id`);

--
-- Indexes for table `publicnews`
--
ALTER TABLE `publicnews`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `publicnews_file`
--
ALTER TABLE `publicnews_file`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `research`
--
ALTER TABLE `research`
  ADD PRIMARY KEY (`research_id`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_year`
--
ALTER TABLE `student_year`
  ADD PRIMARY KEY (`sy_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `file_download`
--
ALTER TABLE `file_download`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `hotel_gallery`
--
ALTER TABLE `hotel_gallery`
  MODIFY `hotel_gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `news_image_gallery`
--
ALTER TABLE `news_image_gallery`
  MODIFY `nig_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- AUTO_INCREMENT for table `publicnews`
--
ALTER TABLE `publicnews`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `publicnews_file`
--
ALTER TABLE `publicnews_file`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `research`
--
ALTER TABLE `research`
  MODIFY `research_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `student_year`
--
ALTER TABLE `student_year`
  MODIFY `sy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
