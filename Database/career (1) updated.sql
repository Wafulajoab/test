-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2024 at 08:12 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `career`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `fullname`, `email`, `password`) VALUES
(4, 'benson', 'bensonwambuadavid@gmail.com', '$2y$10$q1nkvSKw5U90vW18mX/G2ebWxfbIXrndJEPBRxJylrxMaG.euUPfO'),
(5, 'Benson David', 'benson@gmail.com', '$2y$10$rPeqB8b/e0hmXaqHWgtAJuR4pyM4QbWvQdJXQ4EzdbH522j9ULBmG'),
(6, 'Daniel Mwenda', 'mwenda@gmail.com', '$2y$10$ttlqD14LGjEivdRqFIJ37uqiJTXbqoNV89fO4A7V84ENGpGnuS4Su'),
(7, 'joabjob', 'a@gmail.com', '$2y$10$cxuTYJhLi4YM.0polD4n../eSezgs3zxjdHxetN45OptqOqr3o13u'),
(10, 'benson', 'ben@12gmail.com', '$2y$10$f81n/e8gOtl4vEvQLTnL8.mTOUBcy/0368E6UVx9Kwys36lS2yzZi'),
(11, 'slyvester', 'slyvester@gmail.com', '$2y$10$LARCJAhQSCzEiaN7rprWkOkfpPAKnHjtfD8EQ/WVixcHdP1y3jqWy'),
(12, 'Joab Wafula', 'joabfx22@gmail.com', '$2y$10$bJPFDZRl46zMexYQhVxfyuqN2xfx0zqciid9jRnh3QoVqh2aTYg82'),
(13, 'Joab wafula', 'joab@gmail.com', '$2y$10$ir.4vl8pqv70QstYa1JLsOLdHaLPobRvL7ZjtuVhVxo8RdX3dvy5C'),
(14, 'Joab', 'wafula@gmail.com', '$2y$10$Q/RjcgIoeati5zqU/qoClu6Wp0l7hzc.KDelTsD4xtBAdE2sY.xWe'),
(16, 'Joabfx', 'j@gmail.com', '$2y$10$YxuRy8EyzP1BF085ZQk8gu.3N71IZTURxiHYzy63MgIl0pdiLqixu'),
(17, 'Domie', 'domie@gmail.com', '$2y$10$FjUMqQ2ThDYS13yZ9Z9xq.lw4dF1FslCSVK9/egPvo4UXvtkm0RVi'),
(26, 'jeab', 'jeab@gmail.com', '$2y$10$DFpgUP24QFI3GFClFilc3O6D/6xvmfPB7O05ShYdiBmWLhGUAm1Tq'),
(27, 'Jooo', 'jo@gmail.com', '$2y$10$lAZJa.9NEBQ7PcXHt0Niz.d8wvcYxL0yEJ5pb/XeLhYDlUoCvCUGq'),
(28, 'jane', 'jane@gmail.com', '$2y$10$s.wcmb6VGfBmI/CSa7uUG.IWvsYWRkdTLsS1w2DW4JqsE8LpK5akC'),
(30, 'Waff', 'waff@gmail.com', '$2y$10$NrMIXw77uIN3Ix92XmqJSeZf8TyIoYv7utjwGQGgJM2erKK0qu4c.'),
(31, 'Jeff', 'jeff@gmail.com', '$2y$10$tB2A1pS6ddHXSKLwquTuGuR4sqNLxamWvEC8z2lRZeNNImzuFKWf2'),
(32, 'Faith', 'faith@gmail.com', '$2y$10$qx7c/E6l88MGQidvFrOy7.SRPU3DnZGt62JBuZWUJjlSCUEF6aW6O'),
(34, 'Josh', 'jos@gmail.com', '$2y$10$Sta25LTvoEfd15nfSxdBoejjBKYPtsfdoNp2Sgp3VbKav0HKxMPQS');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `announcement_content` text NOT NULL,
  `announcement_date` datetime DEFAULT current_timestamp(),
  `file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `announcement_content`, `announcement_date`, `file`) VALUES
(1, 'hello', '2024-04-22 17:40:37', '');

-- --------------------------------------------------------

--
-- Table structure for table `announcement_replies`
--

CREATE TABLE `announcement_replies` (
  `id` int(11) NOT NULL,
  `announcement_id` int(11) NOT NULL,
  `reply_content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcement_replies`
--

INSERT INTO `announcement_replies` (`id`, `announcement_id`, `reply_content`, `created_at`) VALUES
(1, 1, 'yes', '2024-04-17 23:56:01'),
(2, 1, 'thanks', '2024-04-18 00:26:33'),
(3, 1, 'thanks', '2024-04-18 09:01:07'),
(4, 1, 'very soon will be updated', '2024-04-18 09:01:39');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `applied_position` varchar(255) NOT NULL,
  `date_applied` date NOT NULL,
  `certificates` text DEFAULT NULL,
  `resume` varchar(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `user_name`, `email`, `phone`, `applied_position`, `date_applied`, `certificates`, `resume`, `status`) VALUES
(1, 'Benson', 'bensonwambuadavid@gmail.com', '0712456290', 'graphic designer', '2024-03-21', 'uploads/certificates/PROPOSAL PRESENTATION.pptx', 'uploads/resumes/CASSANDRA.pptx', 'approved'),
(2, 'Benson', 'bensonwambuadavid@gmail.com', '0712456290', 'graphic designer', '2024-03-21', '', '', 'Approved'),
(3, 'Benson', 'bensonwambuadavid@gmail.com', '0712456290', 'graphic designer', '2024-03-21', '', '', 'rejected'),
(4, 'ben', 'ben@gmail.com', '0712456290', 'network administrator', '2024-03-21', '', '', 'approved'),
(5, 'slyvester ', 'muasya@gmail.com', '0712345678', 'graphic desiger', '2024-03-23', '', '', 'rejected'),
(6, 'slyvester ', 'muasya@gmail.com', '0712345678', 'graphic desiger', '2024-03-23', '', '', 'approved'),
(7, 'slyvester ', 'muasya@gmail.com', '0712345678', 'graphic desiger', '2024-03-23', '', '', 'rejected'),
(8, 'Daniel', 'danielmwenda@gmail.com', '0712456290', 'Motion Graphics', '2024-04-04', '', '', 'approved'),
(9, 'Daniel', 'danielmwenda@gmail.com', '0712456290', 'Motion Graphics', '2024-04-04', '', '', 'approved'),
(10, 'Caroline ', 'caroline@gmail.com', '0712345678', 'Motion Graphics', '2024-04-04', '', '', 'approved'),
(11, 'Caroline ', 'caroline@gmail.com', '0712345678', 'Motion Graphics', '2024-04-04', '', '', 'rejected'),
(12, 'Caroline ', 'caroline@gmail.com', '0712345678', 'Motion Graphics', '2024-04-04', '', '', 'approved'),
(13, 'Esther', 'esther@gmail.com', '0789563421', 'graphic designer', '2024-04-04', '', '', 'approved'),
(14, 'Esther', 'esther@gmail.com', '0712456290', 'Motion Graphics', '2024-04-02', NULL, 'uploads/CHAPTER TWO.docx', 'approved'),
(15, 'Abel', 'abel@gmail.com', '0712456290', 'network administrator', '2024-04-03', NULL, 'uploads/CHAPTER TWO.docx', 'approved'),
(16, 'Lisper', 'lisper@gmail.com', '0712456290', 'Motion Graphics', '2024-04-03', NULL, 'uploads/Apology letter.docx', 'rejected'),
(17, 'Daniel Mwenda', 'danielmwenda@gmail.com', '0712345678', 'Motion Graphics', '2024-04-03', NULL, 'uploads/my proposal.docx', 'approved'),
(18, 'Albanus Kioko', 'kioko@gmail.com', '0712456290', 'Motion Graphics', '2024-04-03', NULL, 'uploads/BENPROJECT.docx', 'approved'),
(19, 'slyvester mwendwa muasya', 'slyvestermuasya71@gmail.com', '0712456290', 'graphic designer', '2024-04-23', NULL, 'uploads/my restaurantpdf.pdf', 'approved'),
(20, 'benson david', 'wbenson681@gmail.com', '0712456290', 'web designer', '2024-04-23', NULL, 'uploads/menu restrot.pdf', 'approved'),
(21, 'benson david', 'wbenson681@gmail.com', '0712456290', 'IT CONSULTANT', '2024-04-23', NULL, 'uploads/Untitled-3.pdf', 'approved'),
(22, 'slyvester mwendwa muasya', 'slyvestermuasya71@gmail.com', '0712345678', 'IT CONSULTANT', '2024-04-23', NULL, 'uploads/my restaurantpdf.pdf', 'approved'),
(23, 'benson david', 'wbenson681@gmail.com', '0712456290', 'IT CONSULTANT', '2024-04-23', NULL, 'uploads/menu restrot.pdf', 'approved'),
(24, 'Faith Joab', 'wafulajoab98@gmail.com', '0791302603', 'Accountant', '2024-06-12', NULL, 'uploads/joabofficialletter.pdf', 'rejected'),
(25, 'Joan Wanjiru', 'joabfx22@gmail.com', '0753652098', 'attachment', '2024-09-25', NULL, 'uploads/attachment report.docx', 'approved'),
(26, 'Joan Wanjiru', 'joabfx22@gmail.com', '0753652098', 'Job', '2024-09-26', NULL, 'uploads/attachment report.docx', 'rejected'),
(27, 'jeff', 'jeff@gmail.com', '079466226474', 'Database Admin', '2024-09-26', NULL, 'uploads/Nalo MKU.pdf', 'approved'),
(28, 'jeff', 'wafulajoab98@gmail.com', '0753652098', 'attachment', '2024-09-26', NULL, 'uploads/Joab letter official.pdf', 'approved'),
(29, 'Joan Wanjiru', 'joabfx22@gmail.com', '0753652098', 'Job', '2024-09-26', NULL, 'uploads/med.pdf', 'approved'),
(30, 'Joan Wanjiru', 'joabfx22@gmail.com', '0753652098', 'attachment', '2024-09-05', NULL, 'uploads/Nalo MKU.pdf', 'approved'),
(31, 'Josh', 'jo@gmail.com', '0765434435', 'Software Engineer', '2024-09-27', NULL, 'uploads/Sample Industrial attachment report.pdf', 'approved'),
(32, 'Josh', 'joabfx22@gmail.com', '0753652098', 'IT expert', '2000-09-11', NULL, 'uploads/Project-Joab.docx', 'approved'),
(33, 'Josh', 'joabfx22@gmail.com', '0753652098', 'Doctor', '2024-09-27', NULL, 'uploads/Nalo MKU.pdf', 'rejected');

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `organization` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `duration` varchar(100) NOT NULL,
  `application_deadline` date NOT NULL,
  `attachment_limit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`id`, `title`, `organization`, `description`, `duration`, `application_deadline`, `attachment_limit`) VALUES
(1, 'internship available', 'Mabati Rolling MIlls', 'provide your resumes for the attachments', '3 months ', '0000-00-00', 10),
(2, 'Attachment', 'Imarika, mariakani', 'students from following fields: IT,Accounts, Computer sicience', '3 months ', '2024-04-04', NULL),
(3, 'Internship', 'Imarika, mariakani', 'students from IT Field,Data SCience, computer science', '3 months ', '2024-05-08', NULL),
(4, 'ICT', 'KVM', 'degree, Diploma', '3 months', '2024-06-20', 50),
(5, 'IT Expert', 'Kenya Metodist University', 'Cabling management\r\nDb management\r\nWIFI configurations', '3 months', '2026-05-23', 10),
(6, 'Catering', 'Marinetime Hotel', 'diploma in catering', '3 months', '2024-10-05', 20),
(7, 'Catering', 'Marinetime Hotel', 'diploma in catering', '3 months', '2024-10-05', 20),
(8, 'Engineering', 'Kenya Vehicle Manufacturing', 'Degree, insurance ', '3 months', '2024-10-12', 10);

-- --------------------------------------------------------

--
-- Table structure for table `attachment_applications`
--

CREATE TABLE `attachment_applications` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `date_of_birth` date NOT NULL,
  `id_number` varchar(20) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `county` varchar(100) NOT NULL,
  `education_qualifications` text NOT NULL,
  `application_letter` varchar(255) NOT NULL,
  `introduction_letter` varchar(255) NOT NULL,
  `resume` varchar(255) NOT NULL,
  `insurance_cover` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attachment_applications`
--

INSERT INTO `attachment_applications` (`id`, `full_name`, `date_of_birth`, `id_number`, `gender`, `email`, `mobile_number`, `county`, `education_qualifications`, `application_letter`, `introduction_letter`, `resume`, `insurance_cover`, `status`) VALUES
(1, 'James David', '2024-04-03', '40123456', 'Male', 'james@gmail.com', '0712456290', 'Meru', 'Degree in Information Technology', 'uploads/Apology letter.docx', 'uploads/Apology letter.docx', 'uploads/Apology letter.docx', 'uploads/Apology letter.docx', 'rejected'),
(2, 'Judith Savali', '2000-05-25', '40123456', 'Female', 'judith@gmail.com', '0712456290', 'Meru', 'Degree in Education maths/chem', 'uploads/CHAPTER TWO.docx', 'uploads/Apology letter.docx', 'uploads/BENPROJECT.docx', 'uploads/Apology letter.docx', 'approved'),
(3, 'Judith Savali', '2000-05-25', '40123456', 'Female', 'judith@gmail.com', '0712456290', 'Meru', 'Degree in Education maths/chem', 'uploads/CHAPTER TWO.docx', 'uploads/Apology letter.docx', 'uploads/BENPROJECT.docx', 'uploads/Apology letter.docx', 'approved'),
(4, 'David Wambua', '2018-02-07', '40123456', 'Male', 'david@gmail.com', '0712456290', 'Meru', 'Degree in Data Science', 'uploads/CHAPTER TWO.docx', 'uploads/Apology letter.docx', 'uploads/Apology letter.docx', 'uploads/Apology letter.docx', 'rejected'),
(5, 'David Wambua', '2019-02-06', '40123456', 'Male', 'david@gmail.com', '0712456290', 'Meru', 'Degree in Data Science', 'uploads/CHAPTER TWO.docx', 'uploads/Apology letter.docx', 'uploads/BENPROJECT.docx', 'uploads/my proposal.docx', 'approved'),
(6, 'Albanus Kioko', '2005-06-08', '40123456', 'Male', 'kioko@gmail.com', '0712456290', 'Meru', 'Degree in Computer Science', 'uploads/Apology letter.docx', 'uploads/BENPROJECT.docx', 'uploads/my proposal.docx', 'uploads/BENSON WAMBUA DAVID.docx', 'approved'),
(7, 'JOAB WAFULA MONGOMA', '2024-09-26', '38813973', 'Male', 'joabfx22@gmail.com', '0793594656', 'Nyerii', 'degree', 'uploads/Gretsa letter.pdf', 'uploads/joabofficialletter.pdf', 'uploads/Gretsa letter.pdf', 'uploads/KMTC.pdf', 'pending'),
(8, 'JOAB WAFULA MONGOMA', '2024-09-26', '38813973', 'Male', 'joabfx22@gmail.com', '0793594656', 'Nyerii', 'degree', 'uploads/Joab letter official.pdf', 'uploads/joabofficialletter.pdf', 'uploads/KMTC.pdf', 'uploads/MKU letter.pdf', 'approved'),
(9, 'JOAB WAFULA MONGOMA', '1998-06-03', '38813973', 'Male', 'joabfx22@gmail.com', '0793594656', 'Nyerii', 'degree', 'uploads/OFFICIAL Joab ATTACHMENT REPORT.pdf', 'uploads/MKU letter.pdf', 'uploads/Thika Technical Training Institute.pdf', 'uploads/QUOTATION Official.pdf', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat_messages`
--

INSERT INTO `chat_messages` (`id`, `sender_id`, `receiver_id`, `message`, `timestamp`) VALUES
(1, 1, 2, 'hello', '2024-04-18 10:08:09'),
(2, 1, 2, 'hello', '2024-04-18 10:08:10'),
(3, 1, 2, 'hello', '2024-04-18 10:08:11'),
(4, 1, 2, 'hello', '2024-04-18 10:08:11'),
(5, 1, 2, 'hello', '2024-04-18 10:08:11'),
(6, 1, 2, 'hello', '2024-04-18 10:08:11'),
(7, 1, 2, 'hello', '2024-04-18 10:08:12'),
(8, 1, 2, 'hello', '2024-04-18 10:08:12'),
(9, 1, 2, 'hello', '2024-04-18 10:08:12'),
(10, 1, 2, 'hello', '2024-04-18 10:08:13'),
(11, 1, 2, 'hello', '2024-04-18 10:08:13'),
(12, 1, 2, 'hello', '2024-04-18 10:08:13'),
(13, 1, 2, 'hello', '2024-04-18 10:08:14'),
(14, 1, 2, 'hello', '2024-04-18 10:08:14'),
(15, 1, 2, 'hello', '2024-04-18 10:08:15'),
(16, 1, 2, 'hello', '2024-04-18 10:08:16'),
(17, 1, 2, 'hello', '2024-04-18 10:08:19'),
(18, 1, 2, 'hello', '2024-04-18 10:08:20'),
(19, 1, 2, 'hello', '2024-04-18 10:08:20'),
(20, 1, 2, 'hello', '2024-04-18 10:08:21'),
(21, 1, 2, 'hello', '2024-04-18 10:08:21'),
(22, 1, 2, 'hello', '2024-04-18 10:08:21'),
(23, 1, 2, 'hello', '2024-04-19 22:08:21'),
(24, 1, 2, 'hello', '2024-04-19 22:08:21'),
(25, 1, 2, 'hello', '2024-04-19 22:08:22'),
(26, 1, 2, 'hello', '2024-04-19 22:08:22'),
(27, 2, 1, 'yes', '2024-04-19 22:08:35');

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE `contact_form` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `reply` varchar(255) DEFAULT NULL,
  `submission_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_form`
--

INSERT INTO `contact_form` (`id`, `name`, `email`, `message`, `reply`, `submission_time`) VALUES
(1, 'benson david', 'tomnoezra@gmail.com', 'hello', '1234rtyuiopkjhgfdsdfghj,m', '2024-04-21 10:07:29'),
(2, 'benson david', 'bensonwambuadavid@gmail.com', 'hello', '678', '2024-04-21 10:08:42'),
(3, 'BEN', 'wbenson681@gmail.com', 'hello', 'hello,, you good?', '2024-04-21 11:43:16'),
(4, 'Joab Wafula', 'joabfx22@gmail.com', 'hello', 'yooh', '2024-06-09 04:09:02'),
(5, 'JoabWaff', 'joabfx22@gmail.com', 'hello sir', 'hello too', '2024-09-26 10:24:56'),
(6, 'JoabWaff', 'joabfx22@gmail.com', 'hello', NULL, '2024-09-27 08:46:05');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `feedback` text NOT NULL,
  `submitted_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `feedback`, `submitted_at`) VALUES
(1, 'benson david', 'bensonwambuadavid@gmail.com', 'hello the system well designed', '2024-04-07 16:18:05'),
(2, 'benson david', 'bensonwambuadavid@gmail.com', 'hello very nice', '2024-04-21 03:12:43'),
(3, 'Joab Wafula', 'joabfx22@gmail.com', 'thanks', '2024-06-09 07:09:35');

-- --------------------------------------------------------

--
-- Table structure for table `interviews`
--

CREATE TABLE `interviews` (
  `id` int(11) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `interview_date` date NOT NULL,
  `interview_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `interviews`
--

INSERT INTO `interviews` (`id`, `job_title`, `interview_date`, `interview_time`) VALUES
(1, 'web designer', '2024-05-07', '08:00:00'),
(2, 'web designers', '2024-10-10', '17:00:00'),
(3, 'web designers', '2024-10-10', '17:00:00'),
(4, 'web designers', '2024-10-10', '17:00:00'),
(5, 'web designers', '2024-10-10', '17:00:00'),
(6, 'android developers', '2024-09-26', '13:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `requirements` text DEFAULT NULL,
  `application_deadline` date DEFAULT NULL,
  `job_limit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `description`, `requirements`, `application_deadline`, `job_limit`) VALUES
(2, 'network admistrator ', 'good in cisco,CNN, COMPUTERNETWORKS', 'BEGREE IN INFORMATION TECHNOLOGY OR RELATED FIELD', '2024-03-28', NULL),
(6, 'network admin', 'good in cisco', 'degree/diploma in networking', '2024-04-06', NULL),
(7, 'Software Engineering', 'Computer literate', 'masters and any other relevant certificate ', '2024-03-31', NULL),
(8, 'network administrator', 'individual with skills in networking', 'degree in networking or other related field', '2024-04-23', NULL),
(9, 'Web designer', 'person with skills in developing website', 'degree/diploma', '2024-05-28', NULL),
(10, 'graphic design', 'skills in adobe photoshop,adobe illustration,after effect', 'diploma/degree/', '2024-04-30', NULL),
(11, 'graphic design', 'skills in adobe photoshop,adobe illustration,after effect', 'diploma/degree/', '2024-04-30', NULL),
(12, 'Web designer', 'person with skills in developing website', 'degree/diploma', '2024-05-28', NULL),
(13, 'IT CONSULTANT', 'IT skills', 'DEGREE', '2024-04-30', 10),
(19, '0', 'Know how to do programs', 'degree in computer science\r\ndiploma in IT', '2025-02-02', 5),
(20, '0', 'Know how to do programs', 'degree in computer science\r\ndiploma in IT', '2025-02-02', 5),
(21, '0', 'electrical engineer', 'degree\r\ndiploma', '2024-10-04', 10),
(22, '0', 'electrical engineer', 'degree\r\ndiploma', '2024-10-04', 10),
(23, '0', 'electrical engineer', 'degree\r\ndiploma', '2024-10-04', 10),
(24, '0', 'developer \r\nandroider', 'Degree\r\ndiploma', '2024-10-11', 5),
(25, '0', 'Developer\r\nandroider', 'Degree\r\ndiploma', '2024-09-28', 10);

-- --------------------------------------------------------

--
-- Table structure for table `normal_announcements`
--

CREATE TABLE `normal_announcements` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `normal_announcements`
--

INSERT INTO `normal_announcements` (`id`, `title`, `content`, `created_at`) VALUES
(1, 'New jobs', 'any vacancies available now?', '2024-04-17 23:41:48');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `receipt_file` varchar(255) DEFAULT NULL,
  `status` enum('Pending','Approved','Rejected') DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `mpesa_code` varchar(10) DEFAULT NULL,
  `approval_status` enum('Approved','Denied') DEFAULT NULL,
  `allowed` enum('Yes','No') DEFAULT 'No',
  `denied` enum('Yes','No') DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `fullname`, `receipt_file`, `status`, `created_at`, `mpesa_code`, `approval_status`, `allowed`, `denied`) VALUES
(1, 'Josh', 'C:\\xampp\\htdocs\\test/receipts/2024-05-30.png', 'Rejected', '2024-09-27 19:27:53', NULL, NULL, 'No', 'Yes'),
(2, 'Josh', 'C:\\xampp\\htdocs\\test/receipts/2024-05-30.png', 'Approved', '2024-09-27 19:28:11', NULL, NULL, 'No', 'No'),
(3, 'Josh', 'C:\\xampp\\htdocs\\test/receipts/2024-05-30.png', 'Approved', '2024-09-28 06:19:22', NULL, NULL, 'No', 'No'),
(4, 'Josh', 'C:\\xampp\\htdocs\\test/receipts/2024-05-30.png', 'Approved', '2024-09-28 06:30:15', NULL, NULL, 'No', 'No'),
(5, 'Josh', 'C:\\xampp\\htdocs\\test/receipts/2024-05-30.png', 'Approved', '2024-09-28 06:32:07', NULL, NULL, 'Yes', 'No'),
(6, 'Josh', 'C:\\xampp\\htdocs\\test/receipts/2024-06-04.png', 'Approved', '2024-09-28 07:46:23', 'UIYUTYR762', NULL, 'Yes', 'No'),
(7, 'Josh', 'C:\\xampp\\htdocs\\test/receipts/2024-06-04.png', 'Approved', '2024-09-28 07:54:56', 'UIYUTYR762', NULL, 'Yes', 'No'),
(8, 'Josh', 'C:\\xampp\\htdocs\\test/receipts/2024-06-04.png', 'Approved', '2024-09-28 07:55:27', '9876TYRDGF', NULL, 'Yes', 'No'),
(9, 'Josh', 'C:\\xampp\\htdocs\\test/receipts/2024-06-04.png', 'Rejected', '2024-09-28 07:59:19', '9876TYRDGF', NULL, 'No', 'Yes'),
(10, 'Josh', 'C:\\xampp\\htdocs\\test/receipts/2024-06-04.png', 'Approved', '2024-09-28 08:03:16', '9876TYRDGF', NULL, 'Yes', 'No'),
(11, 'Josh', 'C:\\xampp\\htdocs\\test/receipts/2024-05-30.png', 'Approved', '2024-09-28 08:35:15', 'KLUKYJ7654', NULL, 'No', 'No'),
(12, 'Josh', 'C:\\xampp\\htdocs\\test/receipts/2024-06-04.png', 'Approved', '2024-09-28 08:36:13', 'KLUKYJ7654', NULL, 'No', 'No'),
(13, 'Josh', 'C:\\xampp\\htdocs\\test/receipts/2024-06-07 (1).png', 'Approved', '2024-09-28 08:36:40', 'OIUTRE5UTH', NULL, 'No', 'No'),
(14, 'Josh', 'C:\\xampp\\htdocs\\test/receipts/2024-05-30.png', 'Approved', '2024-09-28 10:56:45', '98TYHGJKHG', NULL, 'No', 'No'),
(15, 'Josh', 'C:\\xampp\\htdocs\\test/receipts/2024-05-30.png', 'Rejected', '2024-09-28 11:19:29', '98TYHGJKHG', NULL, 'No', 'No'),
(16, 'Josh', 'C:\\xampp\\htdocs\\test/receipts/2024-05-30.png', 'Pending', '2024-09-28 11:20:04', '3EWRETGHHF', 'Approved', 'Yes', 'No'),
(17, 'Josh', 'C:\\xampp\\htdocs\\test/receipts/2024-06-07 (1).png', 'Pending', '2024-09-28 11:20:33', '8UTYRDGFHG', 'Approved', 'Yes', 'No'),
(18, 'Josh', 'C:\\xampp\\htdocs\\test/receipts/2024-06-07 (1).png', 'Approved', '2024-09-28 11:27:10', '8UTYRDGFHG', NULL, 'No', 'No'),
(19, 'Josh', 'C:\\xampp\\htdocs\\test/receipts/2024-05-30.png', 'Pending', '2024-09-28 11:29:25', '9876TYRDGF', 'Approved', 'Yes', 'No'),
(20, 'Josh', 'C:\\xampp\\htdocs\\test/receipts/2024-05-30.png', 'Pending', '2024-09-28 12:14:39', 'LJKHGHFG65', 'Approved', 'Yes', 'No'),
(21, 'Josh', 'C:\\xampp\\htdocs\\test/receipts/2024-05-30.png', 'Pending', '2024-09-28 12:25:55', 'KLUKYJ7654', '', 'No', 'Yes'),
(22, 'Josh', 'C:\\xampp\\htdocs\\test/receipts/2024-06-07 (1).png', 'Pending', '2024-09-28 12:44:34', 'LKJGH678TY', 'Approved', 'Yes', 'No'),
(23, 'Josh', 'C:\\xampp\\htdocs\\test/receipts/2024-06-04.png', 'Pending', '2024-09-28 13:12:56', 'NBJVHJHK78', '', 'No', 'Yes'),
(24, 'Josh', 'C:\\xampp\\htdocs\\test/receipts/2024-06-04.png', 'Pending', '2024-09-28 13:31:38', 'NBJVHJHK78', 'Approved', 'Yes', 'No'),
(25, 'Josh', 'C:\\xampp\\htdocs\\test/receipts/2024-06-04.png', 'Pending', '2024-09-28 13:32:00', 'UITUGIUHO8', 'Approved', 'Yes', 'No'),
(26, 'Josh', 'C:\\xampp\\htdocs\\test/receipts/2024-05-30.png', 'Pending', '2024-09-28 13:33:02', '87TUGHJHKJ', 'Approved', 'Yes', 'No'),
(27, 'Josh', 'C:\\xampp\\htdocs\\test/receipts/2024-05-30.png', 'Pending', '2024-09-28 13:33:26', 'GHJHJKHB98', 'Approved', 'Yes', 'No'),
(28, 'Josh', 'C:\\xampp\\htdocs\\test/receipts/2024-05-30.png', 'Pending', '2024-09-28 13:34:43', '98UTGJHKJL', '', 'No', 'Yes'),
(29, 'Josh', 'C:\\xampp\\htdocs\\test/receipts/2024-06-07.png', 'Pending', '2024-09-28 13:38:16', 'KLUKYJ7654', 'Approved', 'Yes', 'No'),
(30, 'Josh', 'C:\\xampp\\htdocs\\test/receipts/2024-06-07.png', 'Pending', '2024-09-28 13:50:28', 'KLUKYJ7654', '', 'No', 'Yes'),
(31, 'Josh', 'C:\\xampp\\htdocs\\test/receipts/2024-05-30.png', 'Pending', '2024-09-28 13:50:55', '9IYUTRDFSG', 'Approved', 'Yes', 'No'),
(32, 'Josh', 'C:\\xampp\\htdocs\\test/receipts/2024-05-30.png', 'Pending', '2024-09-28 13:54:51', '9IYUTRDFSG', 'Approved', 'Yes', 'No'),
(33, 'Josh', 'C:\\xampp\\htdocs\\test/receipts/2024-06-07.png', 'Pending', '2024-09-28 13:55:06', 'KLUKYJ7654', 'Approved', 'Yes', 'No'),
(34, 'Josh', 'C:\\xampp\\htdocs\\test/receipts/2024-06-04.png', 'Pending', '2024-09-28 13:55:28', 'KLUKYJ7654', 'Approved', 'Yes', 'No'),
(35, 'Josh', 'C:\\xampp\\htdocs\\test/receipts/2024-05-30.png', 'Pending', '2024-09-28 14:46:46', 'KJHGFHGS98', 'Approved', 'Yes', 'No'),
(36, 'Faith Naliaka', 'C:\\xampp\\htdocs\\test/receipts/Gretsa letter.pdf', 'Pending', '2024-09-28 18:01:25', 'UIYUTYR762', 'Approved', 'Yes', 'No'),
(37, 'Faith Naliaka', 'C:\\xampp\\htdocs\\test/receipts/joab cv official.pdf', 'Pending', '2024-09-28 18:07:32', '22WEDSADWQ', '', 'No', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_id` int(20) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `phone` varchar(15) DEFAULT NULL,
  `id_no` varchar(20) DEFAULT NULL,
  `gender` enum('male','female','other') DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `county` varchar(50) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `application_count` int(11) DEFAULT 0,
  `is_premium` tinyint(1) DEFAULT 0,
  `account_status` varchar(50) DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_id`, `fullname`, `email`, `password`, `registration_date`, `phone`, `id_no`, `gender`, `dob`, `county`, `nationality`, `application_count`, `is_premium`, `account_status`) VALUES
(1, 'Joab job', 'wambua@gmail.com', '$2y$10$ZfSDdP4HUCXKksE4En/Pqeng3psswgA.V8Dv4nI2x/jPDx8t50ZMW', '2024-02-24 13:18:49', '0712345678', '12345', 'male', '2000-07-12', 'Nyerii', 'kenya', 0, 0, 'Active'),
(2, 'Joab job', 'sly@gmail.com', '$2y$10$tFxnT9BE7SqK0VDI1Kd/bevBowLuYr2Ej7bxNRRNEPEHxmpxdAaGu', '2024-02-24 21:54:55', '0798765432', '12345', 'male', '2000-07-12', 'Nyeri', 'kenya', 0, 0, 'Active'),
(3, 'Joab job', 'faith@gmail.com', '$2y$10$obAWOaNizxQD2cjwGC4D9OSE69UQ8izIJAm/q4jiVzjp71smX5zLe', '2024-02-25 22:34:45', '0712345678', '12345', 'male', '2000-07-12', 'Nyeri', 'kenya', 0, 0, 'Active'),
(4, 'Joab job', 'teddymkiai@gmail.com', '$2y$10$Lj4FN6dLllUd.9KIHSA.b.lSeudQCJDpnAzMieGZ1aF4ZkFa4mX3K', '2024-03-11 09:37:57', NULL, '12345', 'male', '2000-07-12', 'Nyeri', 'kenya', 0, 0, 'Active'),
(8, 'Joab job', 'danielmwenda@gmail.com', '$2y$10$kTSyJVhz3viL7lXpuTBbauc3R0Er8zho2WhlaCw.hN7QBBmqFCYYe', '2024-03-24 18:36:32', '0712456290', '12345', 'male', '2000-07-12', 'Nyeri', 'kenya', 0, 0, 'Active'),
(9, 'Joab job', 'kioko@gmail.com', '$2y$10$2sHjr8BlorQsN96/qZ9Y7u0WDx7wOb5A0mbsmnH4.bVc1r2ayfk76', '2024-03-24 18:40:26', '0112345678', '12345', 'male', '2000-07-12', 'Nyeri', 'kenya', 0, 0, 'Active'),
(10, 'Joab job', 'munene@gmail.com', '$2y$10$DmxrXF162UtzwMOeYpIHpei.pqnzCZtmc6AGs.6Qsvi4YxU2GgzR2', '2024-04-04 03:01:36', '0712456290', '12345', 'male', '2000-07-12', 'Nyeri', 'kenya', 0, 0, 'Active'),
(11, 'Joab job', 'w@gmail.com', '$2y$10$0Wl5eRv5MLCdCX8emJx6Eu5F7LCFW/Wm.NynjuQin1cOoY3mWCr2e', '2024-04-16 16:54:00', '0712456290', '12345', 'male', '2000-07-12', 'Nyeri', 'kenya', 0, 0, 'Active'),
(12, 'slyvester mwendwa muasya', 'slyvestermuasya71@gmail.com', '$2y$10$ChB4YCmBq5bqlECbXuCYRuxdPW7ccEWG.0RkA/0vW6PuvUV3iUr6S', '2024-04-21 01:47:50', '0712456290', '38923456', 'male', '2001-02-07', 'Kitui', 'Kenyan', 0, 0, 'Active'),
(13, 'Faith Mutua', 'faith@gmail.com', '$2y$10$O1ibGAFqkq5Gi.CogGi8yeMXmj/xwYwDsIGJWIV0tJFB9.D0h/4GG', '2024-04-22 10:54:30', '0712456290', '406745', 'female', '2005-05-04', 'mombasa', 'KENYAN', 0, 0, 'Active'),
(15, 'david benson', 'wbenson681@gmail.com', '$2y$10$P5Xq.fTk/c40QbekFvzGBupPEzUFzW.A6l7yOqvsp.Dw/ssoqu6EO', '2024-04-23 13:50:21', '0712456290', '406745', 'male', '2000-05-09', 'Meru', 'KENYAN', 0, 0, 'Active'),
(16, 'Joab Wafula', 'joabfx22@gmail.com', '$2y$10$pFHRWXcjmatwVewAWH1DluqOTucw3Tq/PvEV.oMRMCHHxmnXFFZEa', '2024-06-09 04:03:08', '0793594637', '38813873', 'female', '2024-06-12', 'laikipia', 'kenya', 0, 0, 'Active'),
(17, 'Joab ', 'j@gmail.com', '$2y$10$M0CNgw/DjtPoumAn1yiFZubr9KOl.oXHQLI6YU6z03sD7cZWpjz9O', '2024-06-09 04:14:47', '0792543345', '38813973', 'female', '2024-06-27', 'Makueni', 'Kenya', 0, 0, 'Active'),
(18, 'Nalo jj', 'wa@gmail.com', '$2y$10$HnE5hHWZ7eDhRFAZcamV3uirUqBDWFWQk2G8ewnYfYrCtzukaWhv2', '2024-09-18 16:55:59', '071235678988', '23333323', 'female', '2002-07-02', 'meru', 'kenyan', 0, 0, 'Active'),
(19, 'Joab wafula', 'waff@gmail.com', '$2y$10$2jlpY0kYxjOKXv6LpreGeeK.WA8m9nj2NLbQTDWSpHY.CvCH8sLZK', '2024-09-19 04:48:01', '0764553665', '2356374', 'female', '2024-09-19', 'kiambu', 'kenyan', 0, 0, 'Active'),
(20, 'Caro', 'waf@gmail.com', '$2y$10$9IlWnd3DfoblP1vf/Br6DOA1KHZzPg2GkznVIK9rrZ1tyKm5IOmIq', '2024-09-19 04:50:57', '0793456765', '123456', 'male', '1996-12-04', 'kitui', 'Kenya', 0, 0, 'Active'),
(21, 'soyo', 'soyo@gmail.com', '$2y$10$HHBk7jnZ2M4Km8H6mJ1TJeaj8z3NN9qRGthyuh64D0hhTzvl3Nlqq', '2024-09-20 07:15:14', '0793594637', '8765354657', 'male', '2000-03-04', 'kitui', 'kenyan', 0, 0, 'Active'),
(22, 'Johnny', 'john@gmail.com', '$2y$10$XJ.0ErKqWOFGy8llVEBr/OHNx1twifmwnYhkR3IXQWutrSR/lMD9.', '2024-09-23 10:01:44', '0733332333', '987655678', 'male', '2000-02-09', 'kilifi', 'kenyan', 0, 0, 'Active'),
(23, 'Johnny', 'john@gmail.com', '$2y$10$ELZ58hMip7alBMgs4GGqM.2DlbQrMwhe4n0uf0arSqEcG1Bm40eOO', '2024-09-23 10:01:47', '0733332333', '987655678', 'male', '2000-02-09', 'kilifi', 'kenyan', 0, 0, 'Active'),
(24, 'Joabjob', 'joab@gmail.com', '$2y$10$nz0lg/Aohmnf/6ryO3jrKuQujhFs/YVvZ30vI1fAi5FZLTb6eKszK', '2024-09-23 10:40:45', '076465327', '2132233', 'male', '2000-09-02', 'Kiambu', 'Kenyan', 0, 0, 'Active'),
(25, 'Domie', 'domie@gmail.com', '$2y$10$GrKSUy/UDmMNhoGsZ9EtxO/9M6mkKZ9Ny3ME3URGgyNFXtF1cx2PK', '2024-09-25 19:11:10', '079846535', '38813978', 'male', '2000-05-09', 'Laikipia', 'Kenyan', 0, 0, 'Active'),
(26, 'Jeff', 'j@gmail.com', '$2y$10$BGrlCxKGJnSp/kN.YyJvv.6UI1NwFRhNZnaSdqLGTVY6l6JHGhvAu', '2024-09-26 09:41:39', '0764535662', '38813973', 'male', '2024-09-26', 'Nairobi', 'Kenyan', 0, 0, 'Active'),
(27, 'Joabjob', 'jo@gmail.com', '$2y$10$NN8uj/.5T373EStAdWKgwO.Z/IGAgeSps0HtjLqhVaomz4l4atuIq', '2024-09-26 11:34:44', '0765433553224', '2345678', 'male', '2005-11-26', 'nairobi', 'kenya', 0, 0, 'Active'),
(28, 'job', 'j@gmail.com', '$2y$10$TiiAV92SSVQcIskDwkv38uMzbe8DCB885zuAuJV3ovSpuwF3MXOzu', '2024-09-26 11:35:45', '0765434567', '876545678', 'male', '2000-09-07', 'nakuru', 'kenya', 0, 0, 'Active'),
(29, 'Josh', 'jo@gmail.com', '$2y$10$3tacdwVMogjNdweUEw7CoeGYoz.WlGuKDQFZYGw/3iG1p6TMlZ6qe', '2024-09-27 08:08:50', '0765435467', '765344', 'male', '2000-11-11', 'Nairobi', 'kenya', 2, 0, 'Pending'),
(30, 'Caro', 'car@gmail.com', '$2y$10$EW0h8lnNr4tLLmGhOQNJCOHHBIuAu/ngARCmvDmizMI76DHebZbVm', '2024-09-28 15:31:27', '0734765643', '987626', 'male', '2000-02-02', 'Nakuru', 'Kenyan', 0, 0, 'Active'),
(31, 'Faith Naliaka', 'fai@gmail.com', '$2y$10$zgNqG5FieKVQcrmjl5F5tOUqfXjhIdavCM9I7Zz4a9oWIWpZQmQAq', '2024-09-28 15:33:36', '0765432345', '987654', 'male', '2000-09-09', 'Nakuru', 'kenyan', 2, 0, 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcement_replies`
--
ALTER TABLE `announcement_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `announcement_id` (`announcement_id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attachment_applications`
--
ALTER TABLE `attachment_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interviews`
--
ALTER TABLE `interviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `normal_announcements`
--
ALTER TABLE `normal_announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `announcement_replies`
--
ALTER TABLE `announcement_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `attachment_applications`
--
ALTER TABLE `attachment_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `interviews`
--
ALTER TABLE `interviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `normal_announcements`
--
ALTER TABLE `normal_announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcement_replies`
--
ALTER TABLE `announcement_replies`
  ADD CONSTRAINT `announcement_replies_ibfk_1` FOREIGN KEY (`announcement_id`) REFERENCES `normal_announcements` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
