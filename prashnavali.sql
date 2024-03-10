-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2024 at 06:36 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prashnavali`
--

-- --------------------------------------------------------

--
-- Table structure for table `6144_answers`
--

CREATE TABLE `6144_answers` (
  `srno` int(11) NOT NULL,
  `ano` int(11) NOT NULL,
  `answer` text NOT NULL,
  `que_no` int(11) NOT NULL,
  `gamepin` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `6144_answers`
--

INSERT INTO `6144_answers` (`srno`, `ano`, `answer`, `que_no`, `gamepin`) VALUES
(1, 1, 'Hard Disk Drive (HDD)', 1, 6144),
(2, 2, 'Random Access Memory (RAM)', 1, 6144),
(3, 3, 'Solid State Drive (SSD)', 1, 6144),
(4, 4, 'Central Processing Unit (CPU)', 1, 6144),
(5, 5, '1100', 2, 6144),
(6, 6, '1110', 2, 6144),
(7, 7, '1010', 2, 6144),
(8, 8, '1111', 2, 6144),
(9, 9, ' Touchpad', 3, 6144),
(10, 10, 'Keyboard', 3, 6144),
(11, 11, 'Joystick', 3, 6144),
(12, 12, 'Microphone', 3, 6144),
(13, 13, ' Interpretation', 4, 6144),
(14, 14, 'Compilation', 4, 6144),
(15, 15, 'Linking', 4, 6144),
(16, 16, 'Debugging', 4, 6144),
(17, 17, ' Local Area Network (LAN)', 5, 6144),
(18, 18, 'World Wide Web (WWW)', 5, 6144),
(19, 19, 'Internet', 5, 6144),
(20, 20, 'Intranet', 5, 6144),
(21, 21, ' Function', 6, 6144),
(22, 22, 'Script', 6, 6144),
(23, 23, 'Algorithm', 6, 6144),
(24, 24, 'Macro', 6, 6144),
(25, 25, ' Graphics Processing Unit (GPU)', 7, 6144),
(26, 26, 'Network Interface Card (NIC)', 7, 6144),
(27, 27, 'Central Processing Unit (CPU)', 7, 6144),
(28, 28, 'Sound Card', 7, 6144),
(29, 29, ' Operating System (OS)', 8, 6144),
(30, 30, 'Word Processor', 8, 6144),
(31, 31, 'Database Management System (DBMS)', 8, 6144),
(32, 32, 'Web browser', 8, 6144),
(33, 33, ' Bug', 9, 6144),
(34, 34, 'Patch', 9, 6144),
(35, 35, 'Update', 9, 6144),
(36, 36, 'Malware', 9, 6144),
(37, 37, ' Ethernet cable', 10, 6144),
(38, 38, 'USB cable', 10, 6144),
(39, 39, 'Modem', 10, 6144),
(40, 40, 'Wireless adapter', 10, 6144);

-- --------------------------------------------------------

--
-- Table structure for table `6144_question`
--

CREATE TABLE `6144_question` (
  `srno` int(11) NOT NULL,
  `qno` int(11) NOT NULL,
  `question` text NOT NULL,
  `correct` int(11) NOT NULL,
  `gamepin` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `6144_question`
--

INSERT INTO `6144_question` (`srno`, `qno`, `question`, `correct`, `gamepin`) VALUES
(1, 1, 'What is the most common type of computer memory used to store data temporarily?', 2, 6144),
(2, 2, 'What is the binary code equivalent of the number 10?', 7, 6144),
(3, 3, 'What input device allows you to type text and commands into a computer?', 10, 6144),
(4, 4, 'What is the process of converting a high-level programming language into machine code called?', 14, 6144),
(5, 5, 'What is the name of the global network of interconnected computers?', 19, 6144),
(6, 6, 'What is the term for a computer program that can perform a specific task without human intervention?', 22, 6144),
(7, 7, 'What is the name of the part of the computer that performs calculations and processing tasks?', 27, 6144),
(8, 8, 'What type of software allows you to browse the internet?', 32, 6144),
(9, 9, 'What is the term for a program designed to harm a computer system?', 36, 6144),
(10, 10, 'What device allows you to connect to a network without using wires?', 40, 6144);

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `srno` int(11) NOT NULL,
  `ano` int(11) NOT NULL,
  `answer` text NOT NULL,
  `que_no` int(11) NOT NULL,
  `gamepin` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`srno`, `ano`, `answer`, `que_no`, `gamepin`) VALUES
(1, 1, 'Hard Disk Drive (HDD)', 1, 6144),
(2, 2, 'Random Access Memory (RAM)', 1, 6144),
(3, 3, 'Solid State Drive (SSD)', 1, 6144),
(4, 4, 'Central Processing Unit (CPU)', 1, 6144),
(5, 5, '1100', 2, 6144),
(6, 6, '1110', 2, 6144),
(7, 7, '1010', 2, 6144),
(8, 8, '1111', 2, 6144),
(9, 9, ' Touchpad', 3, 6144),
(10, 10, 'Keyboard', 3, 6144),
(11, 11, 'Joystick', 3, 6144),
(12, 12, 'Microphone', 3, 6144),
(13, 13, ' Interpretation', 4, 6144),
(14, 14, 'Compilation', 4, 6144),
(15, 15, 'Linking', 4, 6144),
(16, 16, 'Debugging', 4, 6144),
(17, 17, ' Local Area Network (LAN)', 5, 6144),
(18, 18, 'World Wide Web (WWW)', 5, 6144),
(19, 19, 'Internet', 5, 6144),
(20, 20, 'Intranet', 5, 6144),
(21, 21, ' Function', 6, 6144),
(22, 22, 'Script', 6, 6144),
(23, 23, 'Algorithm', 6, 6144),
(24, 24, 'Macro', 6, 6144),
(25, 25, ' Graphics Processing Unit (GPU)', 7, 6144),
(26, 26, 'Network Interface Card (NIC)', 7, 6144),
(27, 27, 'Central Processing Unit (CPU)', 7, 6144),
(28, 28, 'Sound Card', 7, 6144),
(29, 29, ' Operating System (OS)', 8, 6144),
(30, 30, 'Word Processor', 8, 6144),
(31, 31, 'Database Management System (DBMS)', 8, 6144),
(32, 32, 'Web browser', 8, 6144),
(33, 33, ' Bug', 9, 6144),
(34, 34, 'Patch', 9, 6144),
(35, 35, 'Update', 9, 6144),
(36, 36, 'Malware', 9, 6144),
(37, 37, ' Ethernet cable', 10, 6144),
(38, 38, 'USB cable', 10, 6144),
(39, 39, 'Modem', 10, 6144),
(40, 40, 'Wireless adapter', 10, 6144);

-- --------------------------------------------------------

--
-- Table structure for table `gamepins`
--

CREATE TABLE `gamepins` (
  `gpin` int(11) NOT NULL,
  `title` text NOT NULL,
  `total` int(11) NOT NULL,
  `access` int(10) DEFAULT NULL,
  `active` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gamepins`
--

INSERT INTO `gamepins` (`gpin`, `title`, `total`, `access`, `active`) VALUES
(6144, 'Quiz', 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `sno` int(20) NOT NULL,
  `name` text NOT NULL,
  `username` varchar(500) NOT NULL,
  `gamepin` int(20) DEFAULT NULL,
  `class` text DEFAULT NULL,
  `classNumber` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`sno`, `name`, `username`, `gamepin`, `class`, `classNumber`) VALUES
(1, 'GADKARI SRUSHTI KIRAN', '2373001', 6144, 'FY CO-A', 1),
(2, 'PHALLE PRATHMESH PRADIPKUMAR', '2373002', 6144, 'FY CO-A', 1),
(3, 'KAMBLE PRANITA NAMDEV', '2373003', 6144, 'FY CO-A', 1),
(4, 'CHAVAN PRACHITI SHAM', '2373004', 6144, 'FY CO-A', 1),
(5, 'AMANE JIDNYA RAVIKANT', '2373005', 6144, 'FY CO-A', 1),
(6, 'MALI VAISHNAVI AMOL', '2373006', 6144, 'FY CO-A', 1),
(7, 'SALUNKHE SHRIHARI LALASO', '2373007', 6144, 'FY CO-A', 1),
(8, 'KAMBLE SHRAVANEE SANJAY', '2373008', 6144, 'FY CO-A', 1),
(9, 'KOLI SANCHITA PRAVIN', '2373009', 6144, 'FY CO-A', 1),
(10, 'PATIL VRUSHALI AMOLKUMAR', '2373010', 6144, 'FY CO-A', 1),
(11, 'JADHAV NIKHIL VIJAYKUMAR', '2373011', 6144, 'FY CO-A', 1),
(12, 'SALUNKHE TANISHKA UDAY', '2373012', 6144, 'FY CO-A', 1),
(13, 'PATIL SHATAKSHI SACHIN', '2373013', 6144, 'FY CO-A', 1),
(14, 'LAD AISHWARYA PRADEEP', '2373014', 6144, 'FY CO-A', 1),
(15, 'SHINDE ANJALI ABHIJIT', '2373015', 6144, 'FY CO-A', 1),
(16, 'CHAVAN UPASANA SUDHIR', '2373016', 6144, 'FY CO-A', 1),
(17, 'SUTAR KOUSTUBH BHALCHANDRA', '2373017', 6144, 'FY CO-A', 1),
(18, 'MADANE SNEHAL VIJAY', '2373018', 6144, 'FY CO-A', 1),
(19, 'CHOPADE YASH RAJENDRA', '2373019', 6144, 'FY CO-A', 1),
(20, 'MADANE SHRUTI ARJUN', '2373020', 6144, 'FY CO-A', 1),
(21, 'SARNOBAT ATHARV VIKRAMSINGH', '2373021', 6144, 'FY CO-A', 1),
(22, 'SURYAWANSHI PIYUSH VIJAY', '2373022', 6144, 'FY CO-A', 1),
(23, 'SHETE SAMRADNYI SANJAY', '2373023', 6144, 'FY CO-A', 1),
(24, 'PATIL RAJWARDHAN HANMANT', '2373024', 6144, 'FY CO-A', 1),
(25, 'CHAVAN SHREYASH SHRIKANT', '2373025', 6144, 'FY CO-A', 1),
(26, 'LOHAR ANURAG RAMCHANDRA', '2373026', 6144, 'FY CO-A', 1),
(27, 'KURANE UTKARSHA BHIMRAO', '2373027', 6144, 'FY CO-A', 1),
(28, 'TODKAR SHRAVAN SANDESH', '2373028', 6144, 'FY CO-A', 1),
(29, 'PATIL ATHARV MANIK', '2373029', 6144, 'FY CO-A', 1),
(30, 'SURYAWANSHI MANALI SUBHASH', '2373030', 6144, 'FY CO-A', 1),
(31, 'PATIL SHREYA JAYKAR', '2373031', 6144, 'FY CO-A', 1),
(32, 'MAHIND OM RAVINDRA', '2373032', 6144, 'FY CO-A', 1),
(33, 'PATIL SAMIKSHA SACHIN', '2373033', 6144, 'FY CO-A', 1),
(34, 'DIWAN SIMRA RAHIL', '2373034', 6144, 'FY CO-A', 1),
(35, 'PAWAR YASH HARSHAL', '2373035', 6144, 'FY CO-A', 1),
(36, 'PATIL PRANJALI DHANANJAY', '2373036', 6144, 'FY CO-A', 1),
(37, 'SHINDE SAKSHI YUVRAJ', '2373037', 6144, 'FY CO-A', 1),
(38, 'KOLEKAR SWAPNALI SUKHDEV', '2373038', 6144, 'FY CO-A', 1),
(39, 'PATIL SHIVRAJ JAYAWANT', '2373039', 6144, 'FY CO-A', 1),
(40, 'KULKARNI SHREYAS PRASHANT', '2373040', 6144, 'FY CO-A', 1),
(41, 'LONDHE ANURADHA RAHUL', '2373041', 6144, 'FY CO-A', 1),
(42, 'MANE VAISHNAVI JAGANNATH', '2373042', 6144, 'FY CO-A', 1),
(43, 'SHINDE SIDDHESH SUNIL', '2373043', 6144, 'FY CO-A', 1),
(44, 'MANE SAMRUDDHI VAISHNAV', '2373044', 6144, 'FY CO-A', 1),
(45, 'JAGTAP SOHAM NITIN', '2373045', 6144, 'FY CO-A', 1),
(46, 'PAWAR SNEHA DHANAJI', '2373046', 6144, 'FY CO-A', 1),
(47, 'SHINDE SANSKAR SANTOSH', '2373047', 6144, 'FY CO-A', 1),
(48, 'MANE VISHWAJEET DATTATRAY', '2373048', 6144, 'FY CO-A', 1),
(49, 'KAMBLE VEDIKA NILESH', '2373049', 6144, 'FY CO-A', 1),
(50, 'ZENDE SIDDHI RAMCHANDRA', '2373050', 6144, 'FY CO-A', 1),
(51, 'LATANE OM VIJAY', '2373051', 6144, 'FY CO-A', 1),
(52, 'MITHARE AMEY SANTOSH', '2373052', 6144, 'FY CO-A', 1),
(53, 'PATIL UTKARSHA SATISH', '2373053', 6144, 'FY CO-A', 1),
(54, 'TARLEKAR ADITYA DATTATRAY', '2373054', 6144, 'FY CO-A', 1),
(55, 'PATIL VISHWJEET ANNASO', '2373055', 6144, 'FY CO-A', 1),
(56, 'PISAL RUPESH RAJARAM', '2373056', 6144, 'FY CO-A', 1),
(57, 'KOLI AVADHUT SAMBHAJI', '2373057', 6144, 'FY CO-A', 1),
(58, 'PAWAR SHRAVANI AVINASH', '2373058', 6144, 'FY CO-A', 1),
(59, 'SHINDE SAKSHI AMAR', '2373059', 6144, 'FY CO-A', 1),
(60, 'MANE SIDDHESH DATTATRAY', '2373060', 6144, 'FY CO-A', 1),
(61, 'PATIL SUJAY ANIL', '2373061', 6144, 'FY CO-A', 1),
(62, 'PATIL RAJNANDAN SURYAKANT', '2373062', 6144, 'FY CO-A', 1),
(63, 'PATIL RAJVARDHAN TUKARAM', '2373063', 6144, 'FY CO-A', 1),
(64, 'PATIL RITESHKUMAR ANANDRAO', '2373064', 6144, 'FY CO-A', 1),
(65, 'DAINGADE KETAKI BABASO', '2373065', 6144, 'FY CO-A', 1),
(66, 'PATIL ARJUN ABHAYKUMAR', '2373066', 6144, 'FY CO-A', 1),
(67, 'PAWAR NIKITA KISAN', '2373067', 6144, 'FY CO-A', 1),
(68, 'WATEGAONKAR DEVRAJ SUHAS', '2373068', 6144, 'FY CO-A', 1),
(69, 'SHEWALE ATHARV HANMANT', '2373069', 6144, 'FY CO-A', 1),
(70, 'SURYAWANSHI DIKSHA SANTOSH', '2373070', 6144, 'FY CO-B', 2),
(71, 'GAIKWAD NALINI MANOHAR', '2373071', 6144, 'FY CO-B', 2),
(72, 'PATIL SATEJ TANAJI', '2373072', 6144, 'FY CO-B', 2),
(73, 'PHARNE SHRADDHA SATISH', '2373073', 6144, 'FY CO-B', 2),
(74, 'KOLEKAR SANCHITA MAHADEV', '2373074', 6144, 'FY CO-B', 2),
(75, 'GAIKWAD RENUKA SANTOSH', '2373075', 6144, 'FY CO-B', 2),
(76, 'MOHITE SUJAL MACHHINDRA', '2373076', 6144, 'FY CO-B', 2),
(77, 'PATIL SANJANA SHIVAJI', '2373077', 6144, 'FY CO-B', 2),
(78, 'SALUNKHE OMKAR NITIN', '2373078', 6144, 'FY CO-B', 2),
(79, 'PARDESHI JUI CHETANSING', '2373079', 6144, 'FY CO-B', 2),
(80, 'PATIL VEDIKA PRAKASH', '2373080', 6144, 'FY CO-B', 2),
(81, 'PATIL SANYOGITA HEMANT', '2373081', 6144, 'FY CO-B', 2),
(82, 'SHINDE NIKHIL ANKUSH', '2373082', 6144, 'FY CO-B', 2),
(83, 'MANE TANISHKA VIKAS', '2373083', 6144, 'FY CO-B', 2),
(84, 'POL SHWETA SHIVAJI', '2373084', 6144, 'FY CO-B', 2),
(85, 'PAWAR SHIVRAJ ASHOK', '2373085', 6144, 'FY CO-B', 2),
(86, 'SHINDE PRACHI ADHIK', '2373086', 6144, 'FY CO-B', 2),
(87, 'JADHAV JOTIKA ABHIJEET', '2373087', 6144, 'FY CO-B', 2),
(88, 'PATIL SWARALI SUNIL', '2373088', 6144, 'FY CO-B', 2),
(89, 'PATIL SHANTANU HAUSERAO', '2373089', 6144, 'FY CO-B', 2),
(90, 'PATIL PARTH ARVIND', '2373090', 6144, 'FY CO-B', 2),
(91, 'MORE SAMRUDDHI SUNIL', '2373091', 6144, 'FY CO-B', 2),
(92, 'RAJMANE VEDIKA SURESH', '2373092', 6144, 'FY CO-B', 2),
(93, 'RAUT SAKSHI DINKAR', '2373093', 6144, 'FY CO-B', 2),
(94, 'PAWAR HARSH DIPAK', '2373094', 6144, 'FY CO-B', 2),
(95, 'DESHMUKH ATHARV SATISH', '2373095', 6144, 'FY CO-B', 2),
(96, 'PATIL HARSHAL BAJARANG', '2373096', 6144, 'FY CO-B', 2),
(97, 'JADHAV ATHARV SURESH', '2373097', 6144, 'FY CO-B', 2),
(98, 'WAGHMARE SAURABH RAVSO', '2373098', 6144, 'FY CO-B', 2),
(99, 'DHON SALONI DATTATRY', '2373099', 6144, 'FY CO-B', 2),
(100, 'SHAIKH JUVERIYA ANIS', '2373100', 6144, 'FY CO-B', 2),
(101, 'PATIL SANCHITA SACHINRAO', '2373101', 6144, 'FY CO-B', 2),
(102, 'KORE KRUTIKA SUNIL', '2373102', 6144, 'FY CO-B', 2),
(103, 'KADAM ATHARV VILAS', '2373103', 6144, 'FY CO-B', 2),
(104, 'MELAVANE SHREYASH ADHINATH', '2373104', 6144, 'FY CO-B', 2),
(105, 'NAIK ANUSHKA BHARAT', '2373105', 6144, 'FY CO-B', 2),
(106, 'PATIL YASH AJITKUMAR', '2373106', 6144, 'FY CO-B', 2),
(107, 'NALAWADE RUTUJA RAHUL', '2373107', 6144, 'FY CO-B', 2),
(108, 'DESHPANDE PRITI JAYANT', '2373108', 6144, 'FY CO-B', 2),
(109, 'LOHAR KARUNA KRISHNAT', '2373109', 6144, 'FY CO-B', 2),
(110, 'KHANDEKAR SHUBHAM SHIVAJI', '2373110', 6144, 'FY CO-B', 2),
(111, 'RASKAR DHANASHREE PRASHANT', '2373111', 6144, 'FY CO-B', 2),
(112, 'PAWAR YASH ANANDA', '2373112', 6144, 'FY CO-B', 2),
(113, 'PATIL PRATIBHA HOUSERAO', '2373113', 6144, 'FY CO-B', 2),
(114, 'PATIL VEERDHAVAL DILIP', '2373114', 6144, 'FY CO-B', 2),
(115, 'SUTAR SANKITA SHASHIKANT', '2373115', 6144, 'FY CO-B', 2),
(116, 'JADHAV SHRUTIKA SUNIL', '2373116', 6144, 'FY CO-B', 2),
(117, 'AUTE ASMITA SANDIP', '2373117', 6144, 'FY CO-B', 2),
(118, 'PATIL JAYRAJ VIJAYKUMAR', '2373118', 6144, 'FY CO-B', 2),
(119, 'NIMBALKAR SHREYA SUNIL', '2373119', 6144, 'FY CO-B', 2),
(120, 'KOSHTI TEJAS MARUTI', '2373120', 6144, 'FY CO-B', 2),
(121, 'KSHIRSAGAR SHUBHAM SHARAD', '2373121', 6144, 'FY CO-B', 2),
(122, 'PATIL AMRUTA JAYKAR', '2373122', 6144, 'FY CO-B', 2),
(123, 'SHINDE UDAYSINH RAJENDRA', '2373123', 6144, 'FY CO-B', 2),
(124, 'PATIL UTKARSHA UDDHAV', '2373124', 6144, 'FY CO-B', 2),
(125, 'DONGARE SANIKA ASHOK', '2373125', 6144, 'FY CO-B', 2),
(126, 'PATIL PRIYANKA SANTOSH', '2373126', 6144, 'FY CO-B', 2),
(127, 'PATIL RAJVARDHAN SUNIL', '2373127', 6144, 'FY CO-B', 2),
(128, 'MASUNGA PRIVILEGE', '2373128', 6144, 'FY CO-B', 2),
(129, 'ARUFANETI KUDZAI J', '2373129', 6144, 'FY CO-B', 2),
(130, 'GAIKWAD AVIRAJ VITTHAL', '2373130', 6144, 'FY CO-B', 2),
(131, 'PATIL RIYA RAJENDRA', '2373131', 6144, 'FY CO-B', 2),
(132, 'MAHADIK SANIKA JAYWANT', '2373132', 6144, 'FY CO-B', 2),
(133, 'MALI PRANJALI VITTHAL', '2373133', 6144, 'FY CO-B', 2),
(134, 'KOLAP ABHINANDAN PANDURANG', '2373134', 6144, 'FY CO-B', 2),
(135, 'SHINGE SAYALI DHANAJI', '2373135', 6144, 'FY CO-B', 2),
(136, 'GHADAGE VEDANT KAKASO', '2373136', 6144, 'FY CO-B', 2),
(137, 'PAUDEL KRISHNA', '2373137', 6144, 'FY CO-B', 2),
(138, 'LAD VISHWAJEET ANIL', '2373138', 6144, 'FY CO-B', 2),
(139, 'SURYWANSHI SAKET KUNDLIK', '2373139', 6144, 'FY CO-B', 2),
(140, 'PATIL SAKSHI HRUDAYNATH', '2373140', 6144, 'FY CO-B', 2),
(141, 'Omkar Mahesh Kulkarni', '3174', 6144, 'FY CO-B', 3);

-- --------------------------------------------------------

--
-- Table structure for table `present_tables`
--

CREATE TABLE `present_tables` (
  `table_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `present_tables`
--

INSERT INTO `present_tables` (`table_name`) VALUES
('answers'),
('login'),
('question'),
('users');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `srno` int(11) NOT NULL,
  `qno` int(11) NOT NULL,
  `question` text NOT NULL,
  `correct` int(11) NOT NULL,
  `gamepin` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`srno`, `qno`, `question`, `correct`, `gamepin`) VALUES
(1, 1, 'What is the most common type of computer memory used to store data temporarily?', 2, 6144),
(2, 2, 'What is the binary code equivalent of the number 10?', 7, 6144),
(3, 3, 'What input device allows you to type text and commands into a computer?', 10, 6144),
(4, 4, 'What is the process of converting a high-level programming language into machine code called?', 14, 6144),
(5, 5, 'What is the name of the global network of interconnected computers?', 19, 6144),
(6, 6, 'What is the term for a computer program that can perform a specific task without human intervention?', 22, 6144),
(7, 7, 'What is the name of the part of the computer that performs calculations and processing tasks?', 27, 6144),
(8, 8, 'What type of software allows you to browse the internet?', 32, 6144),
(9, 9, 'What is the term for a program designed to harm a computer system?', 36, 6144),
(10, 10, 'What device allows you to connect to a network without using wires?', 40, 6144);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `class` text DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `marks` int(11) DEFAULT NULL,
  `loginTime` double DEFAULT NULL,
  `submitTime` double DEFAULT NULL,
  `gamepin` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `class`, `username`, `marks`, `loginTime`, `submitTime`, `gamepin`) VALUES
(1, 'GADKARI SRUSHTI KIRAN', NULL, '2373001', 3, 1709917654.4014, 1709917674.4252, 6144),
(2, 'PHALLE PRATHMESH PRADIPKUMAR', NULL, '2373002', 1, 1709917691.0876, 1709917695.4701, 6144),
(4, 'SHINDE ANJALI ABHIJIT', NULL, '2373015', 0, 1709919241.0422, 1709919527.2405, 6144),
(5, 'KAMBLE PRANITA NAMDEV', NULL, '2373003', 1, 1709919545.9953, 1709919551.4521, 6144),
(6, 'CHAVAN PRACHITI SHAM', NULL, '2373004', 0, 1709919697.3985, 1709919708.6482, 6144),
(9, 'AMANE JIDNYA RAVIKANT', NULL, '2373005', 0, 1709920278.5854, 1709920283.5258, 6144),
(10, 'MALI VAISHNAVI AMOL', NULL, '2373006', 0, 1709920301.3464, 1709920305.8122, 6144),
(11, 'KAMBLE SHRAVANEE SANJAY', NULL, '2373008', 0, 1709920340.8214, 1709920344.2792, 6144),
(12, 'PATIL VRUSHALI AMOLKUMAR', NULL, '2373010', 0, 1709920373.0666, 1709920375.3722, 6144),
(13, 'PISAL RUPESH RAJARAM', NULL, '2373056', 0, 1709920408.1589, 1709920411.3764, 6144),
(15, 'LATANE OM VIJAY', NULL, '2373051', 1, 1709920586.4363, 1709920603.0882, 6144);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`srno`);

--
-- Indexes for table `gamepins`
--
ALTER TABLE `gamepins`
  ADD UNIQUE KEY `gpin` (`gpin`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`srno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `rollno` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `sno` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
