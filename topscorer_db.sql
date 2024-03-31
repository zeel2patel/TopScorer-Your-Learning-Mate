-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2024 at 05:34 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `course_id`, `faculty_id`, `title`, `description`, `status`, `createdate`, `updatedate`) VALUES
(6, 1, 32, 'Testing Announcements', 'Hi this is testing Announcement so ignore this data', '1', '2024-03-31 09:49:00', '2024-03-31 09:49:00');

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
(1, 1, 'Assessment Demo 1', '2024-04-30', 'uploads/assignments/Assessment 1testing.pdf', 'uploads/assignments/Assessment 1testing.pdf', '1', '2024-03-31');

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
(1, 30, 1, 'This is testing upload', 'uploads/assignmentsSubmit/30_TopScorer.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `enrollment_id` int(11) NOT NULL,
  `attendance_date` date NOT NULL,
  `status` enum('present','absent') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(2, ' 2D Computer Animation', '2D Co', '2024-03-26', '2025-03-26', '0', 1),
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
(1, 30, 1, '2024-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `grade_id` int(11) NOT NULL,
  `enrollment_id` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL,
  `grade` decimal(5,2) NOT NULL,
  `grade_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 'Anatomy and Life Drawing', 'Description:\r\nThis course will enhance the student’s awareness of the relationships between human and character development, with specific focus on refinement of life-drawing skills. Emphasis on structural drawing techniques and sequential figure drawing will contribute towards an understanding of human/skeletal anatomy and how movement and animation of characters evolve. Students will design and create a unique character that will be utilized in concurrent and future animation projects.\r\n\r\nHours: 42\r\nCredits: 3\r\nPre-Requisites:\r\nCoRequisites:', 'uploads/subject/Anatomy and Life Drawing1.png', 1, 32),
(2, 'Story Development I', 'Description: Students will research, create and develop stories that will form the basis of their personal e-portfolio production toolkit. These stories will be integrated in concurrent and future courses and become the scripting component of storyboarding for shot selection and composition.\r\nHours: 56\r\nCredits: 4\r\nPre-Requisites:\r\nCoRequisites:', 'uploads/subject/Story Development I1.png', 1, 32);

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
(30, 'Student1', '9999009090', 'std1@gmail.com', '$2y$10$OcsWNI0fNEHQrAPbTJN/hefJ2Mz5o8eVA/IAN0RXu0Bj2aQY2Jqxe', 'student', '1', '2024-03-31', '2024-03-31'),
(32, 'faculty1', '9090909090', 'f1@gmail.com', '$2y$10$fjTV9kHlmOOSpIQZV2IyhuLTyVU9DFaONaA9W8sugWP4dizLntaby', 'faculty', '1', '2024-03-31', '2024-03-31');

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
  ADD PRIMARY KEY (`grade_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assignments_student`
--
ALTER TABLE `assignments_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `semester_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
