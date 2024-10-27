-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2024 at 04:40 AM
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
(34, 'Josh', 'jos@gmail.com', '$2y$10$Sta25LTvoEfd15nfSxdBoejjBKYPtsfdoNp2Sgp3VbKav0HKxMPQS'),
(35, 'Naloj', 'na@gmail.com', '$2y$10$8d19bRo8CncN1Prauoxb0e4tireGEkr2kTkpJy1j2HkAdSYePjWzW');

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
(7, 'JOAB WAFULA MONGOMA', '2024-09-26', '38813973', 'Male', 'joabfx22@gmail.com', '0793594656', 'Nyerii', 'degree', 'uploads/Gretsa letter.pdf', 'uploads/joabofficialletter.pdf', 'uploads/Gretsa letter.pdf', 'uploads/KMTC.pdf', 'approved'),
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
(6, 'JoabWaff', 'joabfx22@gmail.com', 'hello', NULL, '2024-09-27 08:46:05'),
(7, 'JoabNalo', 'jo@gmail.com', 'hello sir is there any vacant job i can do', 'yes there is an opportunity', '2024-09-29 14:17:39');

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
(6, 'android developers', '2024-09-26', '13:10:00'),
(7, 'web designers', '2024-10-03', '19:18:00');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) UNSIGNED NOT NULL,
  `org_id` int(6) UNSIGNED NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `job_description` text NOT NULL,
  `job_requirements` text NOT NULL,
  `job_location` varchar(255) NOT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `job_type` enum('full-time','part-time','internship') NOT NULL,
  `application_deadline` date DEFAULT NULL,
  `job_limit` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `org_id`, `job_title`, `job_description`, `job_requirements`, `job_location`, `salary`, `job_type`, `application_deadline`, `job_limit`, `created_at`, `title`) VALUES
(3, 21, 'web designers', 'full stack developer', 'degree', 'thika', 1000000.00, 'part-time', NULL, NULL, '2024-10-24 07:07:50', NULL),
(4, 21, 'Engineers', 'degree\r\ndiploma', 'good appetite', 'nairobi', 4000.00, 'full-time', NULL, NULL, '2024-10-24 07:10:35', NULL),
(6, 21, 'catering', 'food cooking', 'diploma', 'nairobi', 30000.00, 'full-time', NULL, NULL, '2024-10-27 03:28:40', NULL);

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
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `id` int(6) UNSIGNED NOT NULL,
  `org_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `industry` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `subscription_status` enum('pending','approved','not_paid','activated') DEFAULT 'not_paid',
  `subscription_payment_date` datetime DEFAULT NULL,
  `receipt_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `org_name`, `email`, `industry`, `password`, `description`, `reg_date`, `subscription_status`, `subscription_payment_date`, `receipt_path`) VALUES
(1, 'Kenya Vehicle Manufacturing company', 'waf@mail.com', 'Healthcare', '$2y$10$4E8bIFzrO9UHzbY7xa37R.OHmcmXU2ZVu8uHkIIui8ek8bQ8JcPju', 'deals with vehicle Manufacturing Industry', '2024-10-14 20:19:29', 'not_paid', NULL, NULL),
(2, 'Kenya Vehicle Manufacturing company', 'waf@mail.com', 'Healthcare', '$2y$10$NLC4db/lkbWkS9zFOVovOObpRy6ZUi0Yr8ceXR0Gplq2YCjyjqv7W', 'deals with vehicle Manufacturing Industry', '2024-10-14 20:25:23', 'not_paid', NULL, NULL),
(3, 'Kenya Vehicle Manufacturing company', 'waf@mail.com', 'Healthcare', '$2y$10$TqNXdRq.9T2D49bek8QOWe3BIkBaAM1S/jZbfXmfE9DOaBw.4o68e', 'deals with vehicle Manufacturing Industry', '2024-10-14 20:25:32', 'not_paid', NULL, NULL),
(4, 'Kenya Vehicle Manufacturing company', 'waf@mail.com', 'Healthcare', '$2y$10$ZI7Ry1yBXSWEEEuT.SPIGu.mS7ZzQ2DYbX2vkIPrsRIXC3wSg4TBC', 'deals with vehicle Manufacturing Industry', '2024-10-14 20:28:26', '', '2024-10-15 01:40:30', NULL),
(5, 'Kenya Vehicle Manufacturing company', 'waf@mail.com', 'Healthcare', '$2y$10$.8c/4IMip8dNtw54Gn/Lse3GJEF4D/y509hq8s7K/ecnotMFIbDWO', 'deals with vehicle Manufacturing Industry', '2024-10-14 20:31:37', 'not_paid', NULL, NULL),
(6, 'Kenya Vehicle Manufacturing company', 'waf@mail.com', 'Healthcare', '$2y$10$L35fFyQw5EOGn2l8udNVgOPXdf.okpWo5p819CPZiGSfaC7RbsJhS', 'deals with vehicle Manufacturing Industry', '2024-10-14 20:34:32', 'not_paid', NULL, NULL),
(7, 'Kenya Vehicle Manufacturing company', 'waf@mail.com', 'Healthcare', '$2y$10$s4COb0ZVC5B1M4Dj/JVlkOb1/iEgFN47YNoYO6lSh/VJm2NaDeiti', 'deals with vehicle Manufacturing Industry', '2024-10-14 20:38:36', 'not_paid', NULL, NULL),
(8, 'Kenya Vehicle Manufacturing company', 'waf@mail.com', 'Healthcare', '$2y$10$6sPY.ieLhD5MyQ3HbjxMOuN44CsaH3eQrCIQKmAkKFT8BvLYW5ede', 'deals with vehicle Manufacturing Industry', '2024-10-14 20:41:41', 'not_paid', NULL, NULL),
(9, 'Kenya Vehicle Manufacturing company', 'waf@mail.com', 'Healthcare', '$2y$10$wJ2GyRlOwLdUCrSFlOfPE.JshgY3Demf0ghjTiahUstCXNW/.3IjK', 'deals with vehicle Manufacturing Industry', '2024-10-14 21:36:40', 'not_paid', NULL, NULL),
(10, 'Kenya Vehicle Manufacturing company', 'waf@mail.com', 'Healthcare', '$2y$10$mLmGDwwLNJeOAa5f2MM4zOaMfBWRhFtc1VuqOdIzVbClj7ADZvY4i', 'deals with vehicle Manufacturing Industry', '2024-10-14 21:59:24', 'not_paid', NULL, NULL),
(11, 'Kenya Vehicle Manufacturing company', 'waf@mail.com', 'Healthcare', '$2y$10$8J1GaUFTRKVBJZ22XAx2beLjOuVRwvsohmHTZ.L1JfyXdpwJfpYCC', 'deals with vehicle Manufacturing Industry', '2024-10-14 22:17:36', '', '2024-10-15 01:25:58', NULL),
(12, 'Kenya Vehicle Manufacturing company', 'waf@mail.com', 'Healthcare', '$2y$10$PhAnliE2ehUAHWv2uwsyw.N4wjadIsgt2AiORCwBvDtUAPhuYfFfK', 'deals with vehicle Manufacturing Industry', '2024-10-14 22:28:50', '', '2024-10-15 01:28:54', NULL),
(13, 'Kenya Vehicle Manufacturing company', 'waf@mail.com', 'Healthcare', '$2y$10$Qh6mLseuHpT1oebaVQY8Z..gJFY1i61R3uawHQkk3KO9I7Cx20Jvi', 'deals with vehicle Manufacturing Industry', '2024-10-17 05:00:33', '', '2024-10-17 08:00:41', NULL),
(14, 'Kenya Vehicle Manufacturing company', 'waf@mail.com', 'Healthcare', '$2y$10$lPzwVU3G3OZkdtz/4abw.e4ofJLB56Keqcomc4JSVBTDCfpr.4OjW', 'deals with vehicle Manufacturing Industry', '2024-10-17 05:14:22', '', '2024-10-17 08:14:34', NULL),
(15, 'Kenya Vehicle Manufacturing company', 'waf@mail.com', 'Healthcare', '$2y$10$cvuESCWrIP.ZyywlJT7wLebFaivEpo7chdW5skoZMdEEErfpnaOJu', 'deals with vehicle Manufacturing Industry', '2024-10-17 05:26:49', '', '2024-10-17 08:26:51', NULL),
(16, 'Kenya Vehicle Manufacturing company', 'waf@mail.com', 'Healthcare', '$2y$10$fZVYoXc5zPZiyHEUnbT9SuhTpJKdNFy0dIsYqO3peR70cWx6yoGnu', 'deals with vehicle Manufacturing Industry', '2024-10-17 07:34:28', '', '2024-10-17 10:34:30', NULL),
(17, 'Citizen Tv Company', 'citizen@gmail.com', 'Healthcare', '$2y$10$tcmVmDbJ2dLM5.QbrW3/G.OLdDSJMSVIybGc/1eNUkDSshMkEt72q', 'Jounalists required\\r\\nboth diploma and degree students', '2024-10-22 16:57:31', '', '2024-10-22 19:57:35', NULL),
(18, 'NALO COMPANY', 'naloo@gmail.com', 'Healthcare', '$2y$10$TlGEM4t0Ny6CVBvC803/veKkaNuQqq0kLErDj4s0v/zrqHpxGJjj2', 'health students\\r\\ndiploma and degree students', '2024-10-22 16:59:50', '', '2024-10-22 19:59:53', NULL),
(19, 'KTN News', 'ktn@gmail.com', 'Technology', '$2y$10$5mPvPEUwihlrpAgACvi8i.YLs.0rO0KZzDQpESctgPce3/uVSWu9e', 'tech students\\r\\njournalists', '2024-10-22 17:02:26', '', '2024-10-22 20:02:28', NULL),
(20, 'NTV ', 'ntv@gmail.com', 'Education', '$2y$10$x51fyU.iV05tmN5OyxpUDuEbXF1noRylLK.y/4cKrrEcDndDTcqlq', 'broadcasting\\r\\nlivestreaming', '2024-10-22 20:02:21', '', '2024-10-22 23:02:24', NULL),
(21, 'Delmoteh Industry', 'joabfx22@gmail.com', 'Healthcare', '$2y$10$2.fvKeQFwukF7vR6nOHAWeyw2fNiAo..YB.RWqLvcw2LOn95kJbyi', 'health status', '2024-10-23 11:45:38', '', '2024-10-24 06:55:20', 'uploads/Screenshot (1).png'),
(22, 'Delmoteh Industry', 'joabfx22@gmail.com', 'Healthcare', '$2y$10$Q6MM/gl8yaNRaCR4gV7h6.aNo9Y6KrHg9R5pl0zHZq355MyUkdtlO', 'health status', '2024-10-23 11:46:12', '', NULL, NULL),
(23, 'Maziwa Company', 'maziwa@gmail.com', 'Technology', '$2y$10$ehOxxFizk2ORO2g3gRUGqeeco.59KDvcTa5x1nHMFNb9r3WhpnCZe', 'Maziwa production', '2024-10-23 12:20:17', '', '2024-10-23 15:31:12', 'uploads/pic1.jpg'),
(24, 'Mano Industry', 'fai@gmail.com', 'Education', '$2y$10$4SL9CKHrBGRTGUYmlZoxQOPXPIo2XHj.W/JDP6eD8.dMyQyJCPWxK', 'hello', '2024-10-23 14:38:42', '', '2024-10-23 17:39:12', 'uploads/pic2.jpg'),
(25, 'Citizen Tv Co', 'ci@gmail.com', 'Education', '$2y$10$RL9ET8ts73X2ZEPiJqDffujvimcUQCE5CdiqC4ECLCbDZud0lcvEO', 'education students', '2024-10-23 15:11:16', '', '2024-10-23 18:12:46', 'uploads/pic1.jpg'),
(26, 'TV47', 'tv@gmail.com', 'Finance', '$2y$10$kk6gIrf8Dnp5ZFk/umZBfuRxFwmLk0QiKOW/woaA7SJAFJrsveIgm', 'tv presenters', '2024-10-23 15:53:48', '', '2024-10-23 18:54:02', 'uploads/pic1.jpg'),
(27, 'TV477', 'tv7@gmail.com', 'Finance', '$2y$10$36mzC2oYLryl3USmejNlV.xtNWpSnUNwsUSI3rJbJfZRBm2MRsKji', 'tv presenters', '2024-10-23 16:14:46', '', '2024-10-23 19:15:06', 'uploads/pic6.jpg'),
(28, 'TV4770', 'tv7@gmail.com', 'Finance', '$2y$10$aBnLuiDN7um8QrgZ6dYtf.Y0YB4l4B.7qNfVaDdU2fQrKIpFyZS.q', 'tv presenters', '2024-10-23 16:16:39', '', '2024-10-23 19:16:57', 'uploads/Screenshot (1).png'),
(29, 'Delmoteh Industry', 'joabfx22@gmail.com', 'Healthcare', '$2y$10$FmjKgeQyteVy1dFtLw9ZAeoon2Yuy74jVy13IelaMrA3LDcAV0RQK', 'health status', '2024-10-23 16:22:54', '', '2024-10-23 19:23:15', 'uploads/pic1.jpg'),
(30, 'Kenya Vehicle Manufacturing company', 'wafulajoab98@gmail.com', 'Healthcare', '$2y$10$jeoAGjepKe9rqiyhre6yF.DRaHgpYQIoyIqd9mfoYZnXfl1n7yfKK', 'hello', '2024-10-23 16:27:52', '', '2024-10-23 19:28:06', 'uploads/pic1.jpg'),
(31, 'Mano Industry', 'joabfx22@gmail.com', 'Education', '$2y$10$/a.h6lhQpB7sc0vZu80wh.nsW612TzUQCteMN6K1iX6d0bwu/6VuW', 'organizations best quality', '2024-10-24 02:20:17', '', '2024-10-24 05:33:43', 'uploads/Screenshot (6).png'),
(32, 'Mano Industry', 'joabfx22@gmail.com', 'Education', '$2y$10$YtqtC/haOzV5B131mDYvE.ZGpus8u14ZD2lL.TzFAPMHxv0idE77C', 'organizations best quality', '2024-10-24 02:44:33', '', '2024-10-24 05:46:23', 'uploads/Screenshot (3).png'),
(33, 'Mano Industry', 'joabfx22@gmail.com', 'Education', '$2y$10$b8qk9LzN.2sSB08XlvpS9O1jBoIcl1YdY038eG31mmxzFslCju4dK', 'organizations best quality', '2024-10-24 02:51:48', '', '2024-10-24 05:52:09', 'uploads/Screenshot (6).png'),
(34, 'Freddy', 'fred@gmail.com', 'Healthcare', '$2y$10$ijPj.dUO/rJQSHgAFj6MFeyXirSsx5ELUsIG.igaX6vaDcehvQ3Ja', 'good company', '2024-10-24 02:55:44', '', '2024-10-24 05:56:21', 'uploads/Screenshot (3).png'),
(35, 'Brenda Company', 'brenda@gmail.com', 'Healthcare', '$2y$10$DrSDfz5eTsYaZwhXIZ/ms.6oNy8cXAhPTPaYa/cWZHS0AA/gtm9dK', 'beauty', '2024-10-24 03:07:46', '', '2024-10-24 06:08:25', 'uploads/Screenshot (1).png'),
(36, 'nalo', 'naloo@gmail.com', 'Healthcare', '$2y$10$6bND23N6Lvp.x6ga8FMK.eLnJLFeyORiMtdH2HRnMsRBu7d2jftEG', 'nalo company', '2024-10-24 03:12:05', '', '2024-10-24 06:12:17', 'uploads/Screenshot (1).png'),
(37, 'Kenya Beans Company', 'kenya@gmail.com', 'Finance', '$2y$10$NwGSGDanVeP5Lt7NbY0wiOwNHNiB573wYmWAOSETmX4o./luJj2U6', 'well organised', '2024-10-24 03:25:37', '', '2024-10-24 06:25:48', 'uploads/Screenshot (6).png'),
(38, 'Kenya Youths forum', 'ken@gmail.com', 'Education', '$2y$10$ehJz8eStyDS2p61/T63VXOZG6Z5Ojed40YlEiGQYdxqoaIdf1qJtK', 'hello', '2024-10-24 03:30:17', '', '2024-10-24 06:30:30', 'uploads/Screenshot (9).png'),
(39, 'WIMA PLAZA', 'wima@gmail.com', 'Technology', '$2y$10$gwaO0a7svgTMem.MthOxyOR/Qkel9VIKjX5iVDmQnboTyfLOy6laG', 'wima notes', '2024-10-24 03:35:07', '', NULL, NULL),
(40, 'WIMA PLAZA', 'wima@gmail.com', 'Technology', '$2y$10$zZooQwVr43/SbQ6bfxDSsu.jXfH9wenSNH9jpERuaPa5ggDWSjgNK', 'wima notes', '2024-10-24 03:37:26', '', '2024-10-24 06:38:58', 'uploads/Screenshot (1).png'),
(41, 'WIMA PLAZAa', 'wima@gmail.com', 'Technology', '$2y$10$4h9SE5WWGjdTJ1AYrgVX1uy2PkgXEfqHkSKFeHNJkgbNQhmMGF9Im', 'wima notes', '2024-10-24 03:43:48', '', '2024-10-24 06:44:06', 'uploads/Screenshot (1).png'),
(42, 'Umoja Estate', 'umoja@gmail.com', 'Education', '$2y$10$gqS3U1UXQShKW/x/jZIcPeE0NW5OV00RSzAAad1Xlosyp8z5y82Ny', 'umoja ni nguvu', '2024-10-24 04:06:59', '', '2024-10-24 07:07:17', 'uploads/Screenshot (1).png');

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
(37, 'Faith Naliaka', 'C:\\xampp\\htdocs\\test/receipts/joab cv official.pdf', 'Pending', '2024-09-28 18:07:32', '22WEDSADWQ', '', 'No', 'Yes'),
(38, 'Faith Naliaka', 'C:\\xampp\\htdocs\\test/receipts/doris.jpeg', 'Pending', '2024-09-29 05:02:30', 'KLUKYJ7654', 'Approved', 'Yes', 'No'),
(39, 'Faith Naliaka', 'C:\\xampp\\htdocs\\test/receipts/2024-05-30.png', 'Pending', '2024-09-29 06:15:30', '9876TYRDGF', 'Approved', 'Yes', 'No'),
(40, 'JoabNalo', 'C:\\xampp\\htdocs\\test/receipts/2024-05-30.png', 'Pending', '2024-09-29 14:14:03', 'JGSHJGKA09', 'Approved', 'Yes', 'No'),
(41, 'Faith Naliaka', 'C:\\xampp\\htdocs\\test/receipts/2024-05-30.png', 'Pending', '2024-09-30 14:01:16', '67TYHGWJDH', NULL, 'No', 'No'),
(42, 'Faith Naliaka', 'C:\\xampp\\htdocs\\test/receipts/2024-05-30.png', 'Pending', '2024-09-30 14:20:59', '67TYHGWJDH', NULL, 'No', 'No'),
(43, 'Faith Naliaka', 'C:\\xampp\\htdocs\\test/receipts/2024-05-30.png', 'Pending', '2024-09-30 14:22:55', '987TYFYGUH', NULL, 'No', 'No'),
(44, 'Faith Naliaka', 'C:\\xampp\\htdocs\\test/receipts/2024-05-30.png', 'Pending', '2024-09-30 14:23:46', '9897UTYFHG', NULL, 'No', 'No');

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
(31, 'Faith Naliaka', 'fai@gmail.com', '$2y$10$zgNqG5FieKVQcrmjl5F5tOUqfXjhIdavCM9I7Zz4a9oWIWpZQmQAq', '2024-09-28 15:33:36', '0765432345', '987654', 'male', '2000-09-09', 'Nakuru', 'kenyan', 2, 0, 'Pending'),
(32, 'JoabNalo', 'jo@gmail.com', '$2y$10$zMV0im.kB0nKvZ8220M3NeHOliSAJa6h.O9dGP0e6WpIGwN/E4kmO', '2024-09-29 14:07:26', '0756532435', '756335', 'male', '2000-02-02', 'Nairobi', 'Kenyan', 2, 0, 'Pending'),
(33, 'kanyambuu', 'nyambu@gmail.com', '$2y$10$0QLPEMAMA8vd0mXh4eFox.7L.6uE1nFm/M1agQauyme9jeOX0wy9q', '2024-10-22 08:47:14', '0765434356', '986543', 'male', '2000-09-09', 'keenya', 'kenya', 0, 0, 'Active');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `org_id` (`org_id`);

--
-- Indexes for table `normal_announcements`
--
ALTER TABLE `normal_announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `interviews`
--
ALTER TABLE `interviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `normal_announcements`
--
ALTER TABLE `normal_announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcement_replies`
--
ALTER TABLE `announcement_replies`
  ADD CONSTRAINT `announcement_replies_ibfk_1` FOREIGN KEY (`announcement_id`) REFERENCES `normal_announcements` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`org_id`) REFERENCES `organizations` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
