-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2024 at 02:13 AM
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
-- Database: `topscorer_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` longtext NOT NULL,
  `status` enum('0','1') NOT NULL,
  `createdate` datetime NOT NULL,
  `updatedate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `assignment_name` varchar(255) NOT NULL,
  `due_date` date NOT NULL,
  `rubrics` longtext NOT NULL,
  `assignment_folder` longtext NOT NULL,
  `status` enum('0','1') NOT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `sub_id`, `assignment_name`, `due_date`, `rubrics`, `assignment_folder`, `status`, `create_date`) VALUES
(1, 1, 'Assessment Demo 1', '2024-04-30', 'uploads/assignments/Assessment 1testing.pdf', 'uploads/assignments/Assessment 1testing.pdf', '1', '2024-03-31'),
(2, 1, 'Assingment Demo 2', '2024-04-30', 'uploads/assignments/Assingment Demo 2testing.pdf', 'uploads/assignments/Assingment Demo 2TopScorer.pdf', '1', '2024-04-04'),
(3, 1, 'Assingment Demo 3', '2024-04-29', 'uploads/assignments/Assingment Demo 3testing.pdf', 'uploads/assignments/Assingment Demo 3TopScorer.pdf', '1', '2024-04-04'),
(4, 1, 'Assingment Demo 4', '2024-04-28', 'uploads/assignments/Assingment Demo 4testing.pdf', 'uploads/assignments/Assingment Demo 4TopScorer.pdf', '1', '2024-04-04'),
(5, 2, 'Assingment Demo 11\r\n', '2024-05-31', 'uploads/assignments/Assingment Demo 1testing.pdf', 'uploads/assignments/Assingment Demo 1TopScorer.pdf', '1', '2024-04-04'),
(6, 3, '2d Graphic Assignment', '2024-05-31', 'uploads/assignments/2d Graphic AssignmentAssessment 1testing.pdf', 'uploads/assignments/2d Graphic AssignmentAssingment Demo 1testing.pdf', '1', '2024-04-09'),
(7, 4, 'assignment1', '2024-04-30', 'uploads/assignments/assignment1Summary.pdf', 'uploads/assignments/assignment1Summary.pdf', '1', '2024-04-14'),
(8, 4, 'assignment2', '2024-04-30', 'uploads/assignments/assignment2form_signed.pdf', 'uploads/assignments/assignment2form_signed.pdf', '1', '2024-04-14'),
(9, 4, 'assignment3', '2024-04-24', 'uploads/assignments/assignment3form_signed.pdf', 'uploads/assignments/assignment3form_signed.pdf', '1', '2024-04-14'),
(10, 4, 'assignment4', '2024-05-15', 'uploads/assignments/assignment42 side_signed.pdf', 'uploads/assignments/assignment4form_signed.pdf', '1', '2024-04-14'),
(11, 4, 'assignment5', '2024-04-30', 'uploads/assignments/assignment4form_signed.pdf', 'uploads/assignments/assignment4form_signed.pdf', '1', '2024-04-15');

-- --------------------------------------------------------

--
-- Table structure for table `assignments_student`
--

CREATE TABLE `assignments_student` (
  `id` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `assignments_id` int(11) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `submission_folder` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assignments_student`
--

INSERT INTO `assignments_student` (`id`, `stud_id`, `assignments_id`, `comment`, `submission_folder`) VALUES
(1, 30, 1, 'This is testing upload', 'uploads/assignmentsSubmit/30_TopScorer.pdf'),
(2, 30, 2, 's', 'uploads/assignmentsSubmit/30_2_TopScorer.pdf'),
(3, 30, 3, 'This is tesing assessment upload', 'uploads/assignmentsSubmit/30_3_TopScorer.pdf'),
(4, 30, 4, 'This is tesing assessment upload', 'uploads/assignmentsSubmit/30_4_TopScorer.pdf'),
(5, 30, 5, 'This is tesing assessment upload', 'uploads/assignmentsSubmit/30_5_TopScorer.pdf'),
(7, 37, 6, 'ggg', 'uploads/assignmentsSubmit/37_6_34_1_Super Magnet.pdf'),
(8, 38, 7, 'done', 'uploads/assignmentsSubmit/38_7_Summary.pdf'),
(9, 38, 8, 'done', 'uploads/assignmentsSubmit/38_8_form_signed.pdf'),
(10, 38, 9, 'done', 'uploads/assignmentsSubmit/38_9_form_signed.pdf'),
(11, 38, 10, 'done', 'uploads/assignmentsSubmit/38_10_form_signed.pdf'),
(12, 38, 11, 'done', 'uploads/assignmentsSubmit/38_11_form_signed.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `enrollment_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `attendance_date` date NOT NULL,
  `status` enum('present','absent') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `enrollment_id`, `course_id`, `attendance_date`, `status`) VALUES
(1, 1, 1, '2024-04-11', 'present'),
(2, 1, 1, '2024-04-12', 'absent'),
(3, 4, 1, '2024-04-15', 'present');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_description` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` enum('0','1') NOT NULL,
  `semester_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `course_description`, `start_date`, `end_date`, `status`, `semester_id`) VALUES
(1, '3D Computer Animation', 'Computer animation has evolved to become a major component in the field of animation production and contributes towards shaping content for film, television, games and online applications. As such, students must be actively engaged in all aspects of the production process and understand the requirements associated with the production pipeline. Traditional design, drawing and storytelling skills are enhanced via the latest computer (software/hardware), combined with 3D animation skills and the creation of characters and customized environments contribute towards the creation of unique content that graduates will utilize in their e-portfolio of project work. \r\n', '2024-03-26', '2024-06-30', '1', 1),
(2, ' 2D Computer Animation', '2D Co', '2024-03-19', '2025-03-31', '1', 1),
(5, 'Administrative Business Management', 'Senior management require strong administrative and analytical support, relying on assistants, business, and office managers with technical competency, superior organizational skills, the ability to manage conflicting demands and a variety of responsibilities. Graduates will be able to coordinate activities on the executive\'s behalf and ensure the executive successfully navigates through a multitude of functions and responsibilities. Students will complete courses designed to develop proficiency in the use of integrated software and financial processes, apply managerial principles and processes, strengthen verbal and written communication, and develop expertise in administrative procedures and processes. Graduates of this program will be ready to become integral parts of the leadership team in any business by providing support for the activity of the senior executive group. Interested in taking this program on a part-time basis? It\'s possible to complete this program while still working full-time and fulfilling your other commitments. For more information, please visit our Continuing Education Administrative Business Management program.', '2024-03-30', '2025-03-31', '0', 3);

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `id` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `enrollment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`id`, `stud_id`, `course_id`, `enrollment_date`) VALUES
(1, 30, 1, '2024-03-31'),
(3, 37, 2, '2024-04-09'),
(4, 38, 1, '2024-04-14'),
(5, 39, 2, '2024-04-14');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `enrollment_id` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL,
  `grade` decimal(5,2) NOT NULL,
  `grade_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `enrollment_id`, `assignment_id`, `grade`, `grade_date`) VALUES
(1, 1, 1, 20.00, '2024-04-05'),
(2, 1, 2, 19.00, '2024-04-05'),
(3, 1, 3, 18.00, '2024-04-05'),
(4, 1, 4, 10.00, '2024-04-05'),
(5, 1, 5, 20.00, '2024-04-05'),
(6, 3, 6, 20.00, '2024-04-09'),
(7, 4, 7, 20.00, '2024-04-14'),
(8, 4, 8, 20.00, '2024-04-15'),
(9, 4, 9, 20.00, '2024-04-15'),
(10, 4, 10, 20.00, '2024-04-15'),
(11, 4, 11, 15.00, '2024-04-15');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `semester_id` int(11) NOT NULL,
  `semester_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`semester_id`, `semester_name`) VALUES
(1, 'May 2024'),
(3, 'September 2024'),
(4, 'Octobar 2024');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sub_id` int(11) NOT NULL,
  `sub_name` varchar(255) NOT NULL,
  `sub_description` text NOT NULL,
  `sub_img` varchar(200) NOT NULL,
  `course_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sub_id`, `sub_name`, `sub_description`, `sub_img`, `course_id`, `faculty_id`) VALUES
(4, 'Animation', 'Animation', 'uploads/subject/AnimationScreenshot 2024-04-10 180603.png', 1, 40),
(6, 'story development', 'story', 'uploads/subject/story developmenthm6.png', 1, 41);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(500) NOT NULL,
  `user_type` enum('admin','faculty','student') NOT NULL,
  `status` enum('0','1') NOT NULL,
  `createdate` date NOT NULL,
  `updatedate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mobile`, `email`, `password`, `user_type`, `status`, `createdate`, `updatedate`) VALUES
(1, 'admin', '', 'admin@gmail.com', '$2y$10$InIGG7Hhvaxf4IDVfY.YC.8mSJA3m.xvHc.XiZALUJEyUNXAZ4Vgi', 'admin', '1', '2020-06-12', '2024-03-20'),
(40, 'vinay', '741852963', 'vinay@gmail.com', '$2y$10$f3yyAfBj5B8FPmlNf6glXu/hEscS.m01INDFC8ry9P2JrbDsSNgHS', 'faculty', '1', '2024-04-14', '2024-04-14'),
(41, 'Abhi', '1425369870', 'abhi@gmail.com', '$2y$10$AjGTGHxm4g8Bj572axFrlO2Fj/OwKNHzeCkroaHBsbXuPu494nfkO', 'faculty', '1', '2024-04-14', '2024-04-14'),
(39, 'pooja', '1425369870', 'pooja@gmail.com', '$2y$10$mratkPrUQh6mbfKty/O.3u/wIfVCYe.XpmDDjxkzoMn1zfyjL4R0e', 'student', '0', '2024-04-14', '2024-04-14'),
(38, 'Zeel', '1425369870', 'zeel@gmail.com', '$2y$10$WOfALtu2WBahSUlYpBGBYumeWnlPhj.QoHKssEI7jDszH30HW2kY2', 'student', '1', '2024-04-14', '2024-04-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignments_student`
--
ALTER TABLE `assignments_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`semester_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `assignments_student`
--
ALTER TABLE `assignments_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `semester_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
