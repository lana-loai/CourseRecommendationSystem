-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2022 at 06:57 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recommend`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` varchar(20) NOT NULL,
  `admin_password` varchar(20) DEFAULT NULL,
  `admin_backup` varchar(40) DEFAULT NULL,
  `admin_name` char(30) DEFAULT NULL,
  `tempCode` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_password`, `admin_backup`, `admin_name`, `tempCode`) VALUES
('dana-admin@yu.jo', '12345', 'Danaaomari@gmail.com', 'Dana Al-Omari', NULL),
('dema-admin@yu.jo', '12345', 'Dema.yj85@gmail.com', 'Dema Tayem', NULL),
('lina-admin@yu.jo', '12345', 'lanaloaigharaibeh20002000@gmail.com', 'Lina Malkawai', NULL),
('rahaf-admin@yu.jo', '12345', 'rahafamjad98@gmail.com', 'Rahaf Serese', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `batch_plan`
--

CREATE TABLE `batch_plan` (
  `plan_id` int(11) NOT NULL,
  `plan_year` text DEFAULT NULL,
  `dept_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `batch_plan`
--

INSERT INTO `batch_plan` (`plan_id`, `plan_year`, `dept_id`) VALUES
(202102, '2021', 2);

-- --------------------------------------------------------

--
-- Table structure for table `counselor`
--

CREATE TABLE `counselor` (
  `gc_id` varchar(20) NOT NULL,
  `gc_password` varchar(20) DEFAULT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `gc_name` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `counselor`
--

INSERT INTO `counselor` (`gc_id`, `gc_password`, `dept_id`, `gc_name`) VALUES
('it2021011', '12345', 1, 'Tala Al-Toulish'),
('it2021022', '12345', 2, 'Ahmad Kelani'),
('it2021036', '12345', 3, 'Batool Amer'),
('it2021047', '12345', 4, 'Jana Telfah');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `crs_code` varchar(20) NOT NULL,
  `crs_credit` int(11) DEFAULT NULL,
  `crs_tag` text DEFAULT NULL,
  `crs_level` int(11) DEFAULT NULL,
  `crs_difficulty` int(11) DEFAULT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `crs_name` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`crs_code`, `crs_credit`, `crs_tag`, `crs_level`, `crs_difficulty`, `dept_id`, `crs_name`) VALUES
('BA101', 3, 'Management', 3, 2, 12, 'Management Principles'),
('BIT106', 3, 'IT', 1, 5, 3, 'Communication Skills for Information Technology'),
('BIT221', 3, 'Business', 3, 2, 3, 'Legal Issues in Information Technology'),
('BIT222', 3, 'Business', 3, 3, 3, 'Entrepnuership in IT'),
('BIT241', 3, 'Business', NULL, NULL, 3, 'Operations Research'),
('BIT250', 3, 'Commerce', NULL, NULL, 3, 'E-Commerce'),
('BIT270', 3, 'Marketing', NULL, NULL, 3, 'Digital Marketing'),
('BIT332', 3, 'Resources', NULL, NULL, 3, 'Resources Management'),
('BIT364', 3, 'Management', NULL, NULL, 3, 'Systems and Projects Management'),
('BIT370', 3, 'Resources', NULL, NULL, 3, 'Enterprise Resource Planning'),
('BIT381', 3, 'Web Development', 3, 4, 3, 'Web Applications Development (1)'),
('BIT382', 3, 'Management', NULL, NULL, 3, 'Knowledge Management'),
('BIT385', 3, 'Applications & New Technologies', NULL, NULL, 3, 'Data Visualization'),
('BIT386', 3, 'Web Development', NULL, NULL, 3, 'Web Technology'),
('BIT461', 3, 'Quality Assurance', NULL, NULL, 3, 'Quality Management & Control'),
('BIT480', 3, 'Applications & New Technologies', NULL, NULL, 3, 'Decision Support Systems'),
('BIT480L', 1, 'Applications & New Technologies', NULL, NULL, 3, 'Decision Support Systems Lab'),
('BIT481', 3, 'Web Development', 3, 3, 3, 'Web Applications Development (2)'),
('BIT483', 3, 'Business', NULL, NULL, 3, 'Business Intelligence'),
('BIT492', 3, 'Applications & New Technologies', 5, NULL, 3, 'Special Topics'),
('BIT498', 3, 'Practical', 5, 1, 3, 'Practical Training'),
('BIT499', 3, 'Project', 5, 1, 3, 'Graduation Project'),
('CIS101', 3, 'IT', 1, 4, 2, 'Introduction to Information Systems'),
('CIS214', 3, 'UI/UX design', 2, 4, 2, 'Visual Programming'),
('CIS227', 3, 'UI/UX design', 1, 3, 2, 'Human Computer Interaction'),
('CIS240', 3, 'Software Engineering', 1, 3, 2, 'Introduction to Software Engineering'),
('CIS241', 3, 'Software Engineering', 2, 3, 2, 'Software Documentation'),
('CIS256', 3, 'Data & File Structures', 4, 1, 2, 'Files Structures'),
('CIS260', 3, 'Database', 3, 2, 2, 'Database Systems'),
('CIS260L', 1, 'Database', 2, 2, 2, 'Database Systems Lab'),
('CIS265', 3, 'Database', 3, 3, 2, 'Database Management System'),
('CIS340', 3, 'Software Engineering', 3, 3, 2, 'Object Oriented Analysis & Design'),
('CIS340L', 1, 'Software Engineering', 3, 3, 2, 'Object Oriented Analysis & Design Lab'),
('CIS342', 3, 'Software Engineering', 3, 3, 2, 'System Analysis & Design'),
('CIS360', 3, 'Database', 4, 2, 2, 'Developing Database Applications'),
('CIS367', 3, 'Database', 3, 3, 2, 'Data Warehousing'),
('CIS370', 3, 'Internet of Things', 4, 2, 2, 'Intelligent Systems & Internet Of Things'),
('CIS380', 3, 'Applications & New Technology', 4, 1, 2, 'Information System Applications'),
('CIS382', 3, 'Cloud Computing', 4, 1, 2, 'Cloud Computing'),
('CIS431', 3, 'Networks', 3, 4, 2, 'Internet Services'),
('CIS433', 3, 'Networks', 4, 3, 2, 'Data & Communication Networks'),
('CIS440', 3, 'Quality Assurance', 3, 3, 2, 'Software Testing & Validation'),
('CIS464', 3, 'Data Science', 4, 2, 2, 'Information Retrieval Systems'),
('CIS467A', 3, 'Data Science', 4, 2, 2, 'Data Mining'),
('CIS467L', 1, 'Data Science', 5, 3, 2, 'Information Retrieval & Data Mining Lab'),
('CIS468', 3, 'Data Science', 5, 2, 2, 'Big Data Management'),
('CIS472', 3, 'Artificial Intelligence', 5, 2, 2, 'Applied Data Mining'),
('CIS480', 3, 'Distributed Systems', 5, 3, 2, 'Distributed Systems Applications'),
('CIS492', 3, 'Applications & New Technology', 5, 2, 2, 'Special Topics'),
('CIS497', 3, 'Practical', 5, 1, 2, 'Training Certificate'),
('CIS498', 3, 'Practical', 5, 1, 2, 'Practical Training'),
('CIS499', 3, 'Project', 5, 1, 2, 'Graduation Project'),
('crs_code', 0, 'crs_tag', 0, 0, 0, 'crs_name'),
('CS111', 3, 'Programming', 1, 5, 1, 'Programming in a Selected Language'),
('CS111L', 1, 'Programming', 2, 3, 1, 'Programming in a Selected Language Lab'),
('CS130', 3, 'System Fundementals', 1, 5, 1, 'Operating Systems Fundamentals'),
('CS142', 3, 'Logic', 3, 3, 1, 'Discrete Structures'),
('CS210', 3, 'Programming', 2, 3, 1, 'Object-Oriented Programming'),
('CS210L', 1, 'Programming', 2, 3, 1, 'Object-Oriented Programming Lab'),
('CS220', 3, 'Logic', 2, 3, 1, 'Logic Design'),
('CS225', 1, 'Logic', 3, 4, 1, 'Computer Organization Lab'),
('CS250', 3, 'Data & File Structures', 4, 2, 1, 'Data Structures'),
('CS281', 3, 'Multimedia', 2, 3, 1, 'Multimedia Systems'),
('CS310', 3, 'Programming', 4, 2, 1, '4 Programming'),
('CS331', 3, 'System Fundementals', 4, 3, 1, 'Operating Systems (2)'),
('CS332', 3, 'Networks', 3, 3, 1, 'Data Communications and Networks'),
('CS332L', 1, 'Networks', 3, 3, 1, 'Data Communications and Networks Lab'),
('CS342', 3, 'Logic', 3, 3, 1, 'Theroy of Computation'),
('CS351', 3, 'Data & File Structures', 4, 3, 1, 'Analysis and Design of Algorithms'),
('CS360', 3, 'Networks', 4, 4, 1, 'Wireless Networks'),
('CS367', 3, 'Artificial Intelligence', 4, 3, 1, 'Artifical Intelligence'),
('CS380', 3, 'Graphics and Image Processing', 3, 2, 1, 'Computer Graphics'),
('CS411', 3, 'Applications & New Technology', 5, 3, 1, 'Smart Phones Applications Development'),
('CS432', 3, 'Logic', 5, 3, 1, 'Computer Architecture'),
('CS470', 3, 'Software Engineering', 4, 4, 1, 'Expert Systems'),
('CS480', 3, 'Graphics and Image Processing', 4, 3, 1, 'Image Processing'),
('CS492', 3, 'Applications & New Technology', 5, 4, 1, 'Special Topics'),
('CS497', 3, 'Practical', 5, 1, 1, 'Training Certificate'),
('CS498', 3, 'Practical', 5, 1, 1, 'Practical Training'),
('CS499A', 3, 'Project', 5, 1, 1, 'Gradutaion Project A'),
('CS499B', 3, 'Project', 5, 1, 1, 'Gradutaion Project B'),
('CYS230', 3, 'IT', 1, 2, 4, 'Cyber Security Principles'),
('CYS232', 3, 'Cryptography', 1, 3, 4, 'Introduction to Cryptography'),
('CYS321', 3, 'Networks', NULL, NULL, 4, 'Network Operating Systems'),
('CYS331', 3, 'Security', NULL, NULL, 4, 'Risk Assessment and Management'),
('CYS332', 3, 'Security', NULL, NULL, 4, 'Security of Software Systems'),
('CYS333', 3, 'Hacking', NULL, NULL, 4, 'Ethical Hacking'),
('CYS333L', 1, 'Hacking', NULL, NULL, 4, 'Ethical Hacking Lab'),
('CYS334', 3, 'Networks', NULL, NULL, 4, 'Network Security'),
('CYS335', 3, 'Internet of Things', NULL, NULL, 4, 'Security of Internet of Things'),
('CYS370', 3, 'Networks', NULL, NULL, 4, 'Network Programming and Monitering'),
('CYS436', 3, 'Distributed Systems', NULL, NULL, 4, 'Distributed Computing Security'),
('CYS437', 3, 'Privacy', NULL, NULL, 4, 'Data Privacy and Confidentiality'),
('CYS438', 3, 'Cloud Computing', NULL, NULL, 4, 'Cloud Computing Security'),
('CYS440', 3, 'Security', NULL, NULL, 4, 'Information Security Prototcols'),
('CYS461', 3, 'Security', NULL, NULL, 4, 'Digital Forensics'),
('CYS462', 3, 'Networks', NULL, NULL, 4, 'Defense Networking Systems'),
('CYS492', 3, 'Applications & New Technologies', 5, NULL, 4, 'Special Topics'),
('CYS498', 3, 'Practical', 5, NULL, 4, 'Practical Training'),
('CYS499', 3, 'Project', 5, NULL, 4, 'Graduation Project'),
('HUM117', 1, 'University', 2, 5, 0, 'Pioneering and Creativity'),
('HUM118', 1, 'University', 2, 5, 0, 'Leadership and Society'),
('HUM119', 1, 'University', 2, 5, 0, 'Life Skills'),
('HUM120', 3, 'University', 2, 5, 0, 'Communication Skills (English Language)'),
('HUM121', 3, 'University', 2, 5, 0, 'Communicaation Skills (Arabic Language)'),
('MATH101', 3, 'Mathimatics', 2, 2, 10, 'Calculus (1)'),
('MATH241', 3, 'Mathematics', 3, 2, 10, 'Linear Algebra (1)'),
('MATH332', 3, 'Mathematics', 3, 4, 10, 'Numerical Analysis (1) (for IT Students)'),
('MILT100A', 3, 'University', 2, 5, 0, 'Military Sciences and Citizenship'),
('PS102', 3, 'University', 2, 5, 0, 'Civil Education'),
('STAT101', 3, 'Statistics', 2, 5, 11, 'Introduction to Statistics (1)'),
('STAT111', 3, 'Probability', 3, 2, 11, 'Introduction to Probability (1)');

-- --------------------------------------------------------

--
-- Table structure for table `course_groups`
--

CREATE TABLE `course_groups` (
  `name_abrev` varchar(20) NOT NULL,
  `name_full` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_groups`
--

INSERT INTO `course_groups` (`name_abrev`, `name_full`) VALUES
('Dept.Comp', 'Department Compulsory'),
('Dept.Elect1', 'Department Elective Group 1'),
('Dept.Elect2', 'Department Elective Group 2'),
('Dept.Elect3', 'Department Elective Group 3'),
('Fac.Comp', 'Faculty Compulsory'),
('Uni.Comp', 'University Compulsory');

-- --------------------------------------------------------

--
-- Table structure for table `course_requirements`
--

CREATE TABLE `course_requirements` (
  `crs_code` varchar(20) NOT NULL,
  `req_code` varchar(20) NOT NULL,
  `plan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_requirements`
--

INSERT INTO `course_requirements` (`crs_code`, `req_code`, `plan_id`) VALUES
('BIT221', 'CYS230', 202102),
('BIT222', 'CIS101', 202102),
('BIT381', 'CIS260', 202102),
('BIT481', 'BIT381', 202102),
('CIS214', 'CIS101', 202102),
('CIS214', 'CS210', 202102),
('CIS227', 'CS210L', 202102),
('CIS240', 'CIS101', 202102),
('CIS240', 'CS210', 202102),
('CIS241', 'CIS240', 202102),
('CIS256', 'CS250', 202102),
('CIS260', 'CIS101', 202102),
('CIS260', 'CS210', 202102),
('CIS260L', 'CIS260', 202102),
('CIS265', 'CIS260', 202102),
('CIS340', 'CIS240', 202102),
('CIS340L', 'CIS340', 202102),
('CIS342', 'CIS240', 202102),
('CIS342', 'CIS260', 202102),
('CIS360', 'CIS260', 202102),
('CIS367', 'CIS260', 202102),
('CIS370', 'CS210', 202102),
('CIS370', 'CS332', 202102),
('CIS380', 'CIS360', 202102),
('CIS382', 'CIS260', 202102),
('CIS382', 'CS332', 202102),
('CIS440', 'CIS340L', 202102),
('CIS480', 'BIT381', 202102),
('CIS480', 'CS332', 202102),
('CIS492', 'CIS360', 202102),
('CS111L', 'CS111', 202102),
('CS281', 'CIS101', 202102),
('CS281', 'CS210', 202102),
('MATH241', 'MATH101', 202102);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `dept_name` text DEFAULT NULL,
  `dept_desc` text DEFAULT NULL,
  `dept_name_full` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`, `dept_desc`, `dept_name_full`) VALUES
(0, 'OTHER', NULL, 'University Courses'),
(1, 'CS', 'The Department of Computer Sciences was established in 1978 and started offering a B.Sc. degree in Computer Sciences in 1980. At the beginning of the academic year 2002/2003 the Faculty of Information Technology and Computer Sciences was established, and the Department of Computer Sciences was moved to this new faculty. The curriculum has been modified accordingly to keep pace with changes and developments taking place locally and internationally in order to raise the level of academic graduate and to provide him with the skills and techniques that qualify him to be competitive in the market. year 2000/2001 the Master’s program in Computer Sciences and Information Systems was established. The curriculum was modified in 2003 and the new curriculum was adopted at the beginning of the academic year 2003/2004. The name of the program becomes Master’s in Computer Sciences.', 'Computer Science'),
(2, 'CIS', 'The Department of Information Systems (IS) was established in the academic year 2002/2003 as part of the Faculty of Information Technology and Computer Sciences. The department offers a bachelor degree in CIS which provides promising employment opportunities in business, industry and the area of Information Technology. Recently in 2008, the department has reviewed the curriculum for the bachelor degree and a new comprehensive and emergent curriculum has been approved. As for higher education, the department offers a Master degree in CIS (comprehensive Exam track) as well as a joint diploma degree in ICT with the University of InHolland, the first to be offered program in the Middle East. This Diploma integrates the usage of ICT technologies into education. In the 2008, the department established a new special Master track to suite employed students, where the lectures are held on Thursday evenings and Saturdays. Several well equipped labs are set up to serve students which include some specialized labs such as Multimedia labs, Software Engineering Labs, and Database labs. The department provides the academic requirements for the use of computer skills for various colleges and disciplines at the university. The main objective of the Department is to improve the quality of teaching by concentrating on the practical part of the classes that needs practical training in addition to the theoretical classes.', 'Computer Information Systems'),
(3, 'BIT', ' The department of Information Technology ( previously ) Management Information Systems (MIS) was established along with the Faculty of Information Technology and Computer Sciences at the beginning of the 2002/2003 academic year. The department offers a bachelor’s degree in Business Information Technology program and in Cybersecurity program. These programs was designed carefully to provide the graduates with the technical and managerial skills and knowledge needed to analyze, design, develop, put into practice, and manage information and information systems in organizations. The department has various advanced computer labs that being used in teaching programming languages, project management related to MIS, decision support systems, and electronic commerce. In addition, the department has a research lab dedicated to graduate student. At the beginning of 2007/2008, the Master program was established and offers a Master degree in Management Information Systems, this program was recognized as the only of its kind in Jordanian universities', 'Business Information Technology '),
(4, 'CYS', 'Deliver leading and entrepreneur educational program in Cybersecurity on the local, regional, and global level. Our Mission is providing students with the necessary skills, knowledge, and competences to solve complex problems in different areas of cybersecurity by using distinguished teaching and learning process.', 'Cyber Security'),
(10, 'MATHS', NULL, 'Mathematics '),
(11, 'STAT', NULL, 'Statistics'),
(12, 'BA', NULL, 'Business Administration');

-- --------------------------------------------------------

--
-- Table structure for table `dept_schedule`
--

CREATE TABLE `dept_schedule` (
  `crs_code` varchar(20) NOT NULL,
  `term_id` int(11) NOT NULL,
  `crs_section` int(11) NOT NULL,
  `crs_day` int(10) DEFAULT NULL,
  `crs_time` time DEFAULT NULL,
  `dept_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dept_schedule`
--

INSERT INTO `dept_schedule` (`crs_code`, `term_id`, `crs_section`, `crs_day`, `crs_time`, `dept_id`) VALUES
('CIS101', 202102, 1, 24, '16:00:00', 2),
('CIS101', 202102, 2, 24, '18:00:00', 2),
('CIS214', 202102, 1, 135, '10:00:00', 2),
('CIS214', 202102, 2, 135, '13:00:00', 2),
('CIS214', 202102, 3, 135, '08:00:00', 2),
('CIS227', 202102, 1, 24, '10:00:00', 2),
('CIS240', 202102, 1, 24, '10:00:00', 2),
('CIS240', 202102, 2, 135, '08:00:00', 2),
('CIS240', 202102, 3, 135, '11:00:00', 2),
('CIS256', 202102, 1, 135, '09:00:00', 2),
('CIS260', 202102, 1, 135, '11:00:00', 2),
('CIS260', 202102, 2, 135, '12:00:00', 2),
('CIS260', 202102, 3, 135, '09:00:00', 2),
('CIS260L', 202102, 1, 135, '11:00:00', 2),
('CIS260L', 202102, 2, 135, '12:00:00', 2),
('CIS265', 202102, 1, 135, '08:00:00', 2),
('CIS265', 202102, 2, 24, '09:00:00', 2),
('CIS265', 202102, 3, 24, '11:00:00', 2),
('CIS340', 202102, 1, 24, '17:00:00', 2),
('CIS340L', 202102, 1, 24, '08:00:00', 2),
('CIS342', 202102, 1, 135, '08:00:00', 2),
('CIS342', 202102, 2, 135, '10:00:00', 2),
('CIS360', 202102, 1, 24, '10:00:00', 2),
('CIS360', 202102, 2, 24, '12:00:00', 2),
('CIS367', 202102, 1, 135, '09:00:00', 2),
('CIS380', 202102, 1, 135, '08:00:00', 2),
('CIS382', 202102, 1, 135, '08:00:00', 2),
('CIS492', 202102, 1, 135, '09:00:00', 2),
('CIS498', 202102, 1, 135, '08:00:00', 2),
('CIS499', 202102, 1, 24, '12:00:00', 2),
('CIS499', 202102, 2, 24, '12:00:00', 2),
('CS111', 202102, 2, 135, '10:00:00', 1),
('CS111L', 202102, 1, 135, '11:00:00', 1),
('CS111L', 202102, 2, 135, '13:00:00', 1),
('CS130', 202102, 1, 135, '08:00:00', 1),
('CS142', 202102, 1, 135, '08:00:00', 1),
('CS142', 202102, 2, 135, '11:00:00', 1),
('CS210', 202102, 1, 135, '11:00:00', 1),
('CS210', 202102, 2, 135, '09:00:00', 1),
('CS210L', 202102, 1, 24, '08:00:00', 1),
('CS210L', 202102, 2, 24, '09:00:00', 1),
('CS220', 202102, 1, 24, '11:00:00', 1),
('CS225', 202102, 1, 24, '11:00:00', 1),
('CS225', 202102, 2, 24, '12:00:00', 1),
('CS250', 202102, 1, 24, '17:00:00', 1),
('CS250', 202102, 2, 24, '16:00:00', 1),
('CS281', 202102, 1, 135, '12:00:00', 1),
('CS281', 202102, 2, 135, '13:00:00', 1),
('CS310', 202102, 1, 24, '10:00:00', 1),
('CS310', 202102, 2, 24, '12:00:00', 1),
('CS332', 202102, 1, 24, '13:00:00', 1),
('CS332', 202102, 2, 24, '10:00:00', 1),
('CS332L', 202102, 1, 24, '08:00:00', 1),
('CS332L', 202102, 2, 24, '11:00:00', 1),
('CS342', 202102, 1, 24, '12:00:00', 1),
('CS351', 202102, 1, 135, '09:00:00', 1),
('CS351', 202102, 2, 135, '12:00:00', 1),
('CS360', 202102, 1, 135, '10:00:00', 1),
('CS411', 202102, 1, 24, '11:00:00', 1),
('CS411', 202102, 2, 24, '13:00:00', 1),
('CS432', 202102, 1, 24, '17:00:00', 1),
('CS480', 202102, 1, 135, '09:00:00', 1),
('CS480', 202102, 2, 24, '08:00:00', 1),
('CS498', 202102, 1, 24, '08:00:00', 1),
('CS499A', 202102, 1, 0, '00:00:00', 1),
('CS499B', 202102, 1, 0, '14:00:00', 1),
('CS499B', 202102, 2, 0, '14:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `plan_course`
--

CREATE TABLE `plan_course` (
  `plan_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `crs_code` varchar(20) NOT NULL,
  `req_code` varchar(20) DEFAULT NULL,
  `crs_group` text DEFAULT NULL,
  `group_num` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plan_course`
--

INSERT INTO `plan_course` (`plan_id`, `dept_id`, `crs_code`, `req_code`, `crs_group`, `group_num`) VALUES
(202102, 0, 'HUM117', 'null', 'Uni.Comp', 1),
(202102, 0, 'HUM118', 'null', 'Uni.Comp', 1),
(202102, 0, 'HUM119', 'null', 'Uni.Comp', 1),
(202102, 0, 'HUM120', 'null', 'Uni.Comp', 1),
(202102, 0, 'HUM121', 'null', 'Uni.Comp', 1),
(202102, 0, 'MILT100A', 'null', 'Uni.Comp', 1),
(202102, 0, 'PS102', 'null', 'Uni.Comp', 1),
(202102, 1, 'CS111', 'null', 'Fac.Comp', 2),
(202102, 1, 'CS111L', 'CS111L', 'Fac.Comp', 2),
(202102, 1, 'CS281', 'CS101, CS210', 'Dept.Elect2', 5),
(202102, 1, 'CS367', 'CS351', 'Dept.Elect2', 5),
(202102, 2, 'CIS101', 'null', 'Fac.Comp', 2),
(202102, 2, 'CIS214', 'CS210 ,CIS101', 'Dept.Comp', 3),
(202102, 2, 'CIS227', 'CS210L', 'Dept.Elect1', 4),
(202102, 2, 'CIS240', 'CS210 ,CIS102', 'Dept.Comp', 3),
(202102, 2, 'CIS241', 'CIS240', 'Dept.Elect1', 4),
(202102, 2, 'CIS256', 'CS250', 'Dept.Elect1', 4),
(202102, 2, 'CIS260', 'CS210,CIS101', 'Fac.Comp', 2),
(202102, 2, 'CIS260L', 'CIS260', 'Dept.Comp', 3),
(202102, 2, 'CIS265', 'CIS260', 'Dept.Comp', 3),
(202102, 2, 'CIS340', 'CIS240', 'Dept.Comp', 3),
(202102, 2, 'CIS340L', 'CIS340', 'Dept.Comp', 3),
(202102, 2, 'CIS342', 'CIS240 ,CIS260', 'Dept.Comp', 3),
(202102, 2, 'CIS360', 'CIS260', 'Dept.Comp', 3),
(202102, 2, 'CIS367', 'CIS260', 'Dept.Comp', 3),
(202102, 2, 'CIS370', 'CS210, CS332', 'Dept.Elect1', 4),
(202102, 2, 'CIS380', 'CS360', 'Dept.Elect1', 4),
(202102, 2, 'CIS382', 'CIS260, CS332', 'Dept.Comp', 3),
(202102, 2, 'CIS440', 'CIS340L', 'Dept.Comp', 3),
(202102, 2, 'CIS464', 'CIS260', 'Dept.Comp', 3),
(202102, 2, 'CIS467A', 'CIS260', 'Dept.Comp', 3),
(202102, 2, 'CIS468', 'CIS467A , CIS360', 'Dept.Comp', 3),
(202102, 2, 'CIS472', 'CIS467A', 'Dept.Elect1', 4),
(202102, 2, 'CIS480', 'CS332, BIT381', 'Dept.Elect1', 4),
(202102, 2, 'CIS492', 'CIS360', 'Dept.Elect1', 4),
(202102, 2, 'CIS497', 'null', 'Dept.Elect1', 4),
(202102, 2, 'CIS498', '98', 'Dept.Elect1', 4),
(202102, 2, 'CIS499', 'Complete 98 CHs', 'Dept.Comp', 3),
(202102, 3, 'BIT221', 'CYS230', 'Fac.Comp', 2),
(202102, 3, 'BIT222', 'CS101', 'Dept.Elect2', 5),
(202102, 3, 'BIT381', 'CIS260', 'Fac.Comp', 2),
(202102, 3, 'BIT481', 'BIT381', 'Dept.Elect2', 5),
(202102, 10, 'MATH101', 'null', 'Fac.Comp', 2),
(202102, 10, 'MATH241', 'MATH101', 'Dept.Elect3', 6),
(202102, 11, 'STAT101', 'null', 'Dept.Elect3', 6),
(202102, 11, 'STAT111', 'null', 'Fac.Comp', 2),
(202102, 12, 'BA101', 'null', 'Dept.Elect3', 6);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `std_id` int(11) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `std_password` varchar(20) DEFAULT NULL,
  `first_name` text DEFAULT NULL,
  `last_name` text DEFAULT NULL,
  `std_gpa` float DEFAULT NULL,
  `is_graduate` tinyint(1) DEFAULT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `plan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`std_id`, `email`, `std_password`, `first_name`, `last_name`, `std_gpa`, `is_graduate`, `dept_id`, `plan_id`) VALUES
(2018902186, '2018902186@ses.yu.edu.jo', '12345', 'Lina', 'Ghraibeh', 78.95, 0, 2, 202102),
(2021901170, '2021901170@ses.yu.edu.jo', '12345', 'Rima', 'Smadi', 82, 0, 1, 202102),
(2021903145, '2021903145@ses.yu.edu.jo', '12345', 'Sara', 'Bani Hani', 83, 0, 3, 202102),
(2021904065, '2021904065@ses.yu.edu.jo', '12345', 'Yasmin', 'Zoubi', 86, 1, 4, 202102);

-- --------------------------------------------------------

--
-- Table structure for table `suggested`
--

CREATE TABLE `suggested` (
  `std_id` int(11) NOT NULL,
  `term_id` int(11) DEFAULT NULL,
  `crs_code` varchar(20) NOT NULL,
  `crs_section` int(11) NOT NULL,
  `wanted_credit` int(11) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `difficulty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suggested`
--

INSERT INTO `suggested` (`std_id`, `term_id`, `crs_code`, `crs_section`, `wanted_credit`, `priority`, `difficulty`) VALUES
(2018902186, 202102, 'CIS260L', 1, 1, 1, 1),
(2018902186, 202102, 'CIS260L', 2, 1, 1, 1),
(2018902186, 202102, 'CIS265', 1, 1, 1, 1),
(2018902186, 202102, 'CIS265', 2, 1, 1, 1),
(2018902186, 202102, 'CIS265', 3, 1, 1, 1),
(2018902186, 202102, 'CIS340', 1, 1, 1, 1),
(2018902186, 202102, 'CIS340L', 1, 1, 1, 1),
(2018902186, 202102, 'CIS360', 1, 1, 1, 1),
(2018902186, 202102, 'CIS360', 2, 1, 1, 1),
(2018902186, 202102, 'CIS367', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transcript`
--

CREATE TABLE `transcript` (
  `std_id` int(20) NOT NULL,
  `crs_code` varchar(20) NOT NULL,
  `term_id` int(10) NOT NULL,
  `std_mark` float DEFAULT NULL,
  `mark_status` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transcript`
--

INSERT INTO `transcript` (`std_id`, `crs_code`, `term_id`, `std_mark`, `mark_status`) VALUES
(2018902186, 'BA101', 202101, 91, 'PASS'),
(2018902186, 'CIS101', 202001, 83, 'PASS'),
(2018902186, 'CIS214', 202003, 72, 'PASS'),
(2018902186, 'CIS240', 202003, 83, 'PASS'),
(2018902186, 'CS111', 202002, 90, 'PASS'),
(2018902186, 'CS111L', 202002, 98, 'PASS'),
(2018902186, 'CS130', 202002, 76, 'PASS'),
(2018902186, 'CS142', 202101, 62, 'PASS'),
(2018902186, 'CS210', 202101, 97, 'PASS'),
(2018902186, 'CS210L', 202101, 95, 'PASS'),
(2018902186, 'HUM117', 202002, 90, 'PASS'),
(2018902186, 'HUM118', 202002, 85, 'PASS'),
(2018902186, 'HUM119', 202002, 91, 'PASS'),
(2018902186, 'HUM120', 202003, 91, 'PASS'),
(2018902186, 'HUM121', 202101, 92, 'PASS'),
(2018902186, 'MATH101', 202001, 50, 'PASS'),
(2018902186, 'MILT100A', 202001, 0, 'PASS'),
(2018902186, 'PS102', 202001, 60, 'PASS'),
(2018902186, 'STAT111', 202002, 58, 'PASS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `batch_plan`
--
ALTER TABLE `batch_plan`
  ADD PRIMARY KEY (`plan_id`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `counselor`
--
ALTER TABLE `counselor`
  ADD PRIMARY KEY (`gc_id`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`crs_code`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `course_groups`
--
ALTER TABLE `course_groups`
  ADD PRIMARY KEY (`name_abrev`);

--
-- Indexes for table `course_requirements`
--
ALTER TABLE `course_requirements`
  ADD PRIMARY KEY (`crs_code`,`req_code`),
  ADD KEY `req_code` (`req_code`),
  ADD KEY `plan_id` (`plan_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `dept_schedule`
--
ALTER TABLE `dept_schedule`
  ADD PRIMARY KEY (`crs_code`,`term_id`,`crs_section`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `plan_course`
--
ALTER TABLE `plan_course`
  ADD PRIMARY KEY (`plan_id`,`dept_id`,`crs_code`),
  ADD KEY `dept_id` (`dept_id`),
  ADD KEY `crs_code` (`crs_code`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`std_id`),
  ADD KEY `dept_id` (`dept_id`),
  ADD KEY `plan_id` (`plan_id`);

--
-- Indexes for table `suggested`
--
ALTER TABLE `suggested`
  ADD PRIMARY KEY (`std_id`,`crs_code`,`crs_section`),
  ADD KEY `crs_code` (`crs_code`,`term_id`,`crs_section`);

--
-- Indexes for table `transcript`
--
ALTER TABLE `transcript`
  ADD PRIMARY KEY (`std_id`,`crs_code`,`term_id`),
  ADD KEY `crs_code` (`crs_code`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `batch_plan`
--
ALTER TABLE `batch_plan`
  ADD CONSTRAINT `batch_plan_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `counselor`
--
ALTER TABLE `counselor`
  ADD CONSTRAINT `counselor_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_requirements`
--
ALTER TABLE `course_requirements`
  ADD CONSTRAINT `course_requirements_ibfk_1` FOREIGN KEY (`crs_code`) REFERENCES `plan_course` (`crs_code`),
  ADD CONSTRAINT `course_requirements_ibfk_2` FOREIGN KEY (`req_code`) REFERENCES `course` (`crs_code`),
  ADD CONSTRAINT `course_requirements_ibfk_3` FOREIGN KEY (`plan_id`) REFERENCES `batch_plan` (`plan_id`);

--
-- Constraints for table `dept_schedule`
--
ALTER TABLE `dept_schedule`
  ADD CONSTRAINT `dept_schedule_ibfk_1` FOREIGN KEY (`crs_code`) REFERENCES `course` (`crs_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dept_schedule_ibfk_2` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plan_course`
--
ALTER TABLE `plan_course`
  ADD CONSTRAINT `plan_course_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `plan_course_ibfk_2` FOREIGN KEY (`plan_id`) REFERENCES `batch_plan` (`plan_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `plan_course_ibfk_3` FOREIGN KEY (`crs_code`) REFERENCES `course` (`crs_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`plan_id`) REFERENCES `batch_plan` (`plan_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `suggested`
--
ALTER TABLE `suggested`
  ADD CONSTRAINT `suggested_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `student` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `suggested_ibfk_2` FOREIGN KEY (`crs_code`,`term_id`,`crs_section`) REFERENCES `dept_schedule` (`crs_code`, `term_id`, `crs_section`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transcript`
--
ALTER TABLE `transcript`
  ADD CONSTRAINT `transcript_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `student` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transcript_ibfk_2` FOREIGN KEY (`crs_code`) REFERENCES `course` (`crs_code`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
