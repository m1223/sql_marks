-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 25, 2026 at 10:00 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sql_attendance_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `sql_questions`
--

CREATE TABLE `sql_questions` (
  `id` int NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sql_questions`
--

INSERT INTO `sql_questions` (`id`, `question`, `answer`) VALUES
(1, 'সব student দেখান', 'SELECT * FROM students;'),
(2, 'শুধু name ও email দেখান', 'SELECT name, email FROM students;'),
(3, 'যাদের বয়স 20 এর বেশি', 'SELECT * FROM students WHERE age > 20;'),
(4, 'যাদের city = Dhaka', 'SELECT * FROM students WHERE city = \'Dhaka\';'),
(5, 'যাদের marks 80 এর বেশি', 'SELECT * FROM students WHERE marks > 80;'),
(6, 'যাদের department = CSE', 'SELECT * FROM students WHERE department = \'CSE\';'),
(7, 'যাদের বয়স 18 থেকে 25 এর মধ্যে', 'SELECT * FROM students WHERE age BETWEEN 18 AND 25;'),
(8, 'যাদের marks 60 থেকে 80 এর মধ্যে', 'SELECT * FROM students WHERE marks BETWEEN 60 AND 80;'),
(9, 'যাদের city Dhaka অথবা Chittagong', 'SELECT * FROM students WHERE city IN (\'Dhaka\',\'Chittagong\');'),
(10, 'যাদের department CSE না', 'SELECT * FROM students WHERE department != \'CSE\';'),
(11, 'marks অনুযায়ী descending order', 'SELECT * FROM students ORDER BY marks DESC;'),
(12, 'বয়স অনুযায়ী ascending order', 'SELECT * FROM students ORDER BY age ASC;'),
(13, 'সর্বোচ্চ marks পাওয়া 5 জন student', 'SELECT * FROM students ORDER BY marks DESC LIMIT 5;'),
(14, 'সর্বনিম্ন বয়সের 3 জন', 'SELECT * FROM students ORDER BY age ASC LIMIT 3;'),
(15, 'মোট কয়জন student আছে', 'SELECT COUNT(*) FROM students;'),
(16, 'গড় marks কত', 'SELECT AVG(marks) FROM students;'),
(17, 'সর্বোচ্চ marks', 'SELECT MAX(marks) FROM students;'),
(18, 'সর্বনিম্ন marks', 'SELECT MIN(marks) FROM students;'),
(19, 'মোট marks এর যোগফল', 'SELECT SUM(marks) FROM students;'),
(20, 'প্রত্যেক city তে কয়জন student', 'SELECT city, COUNT(*) FROM students GROUP BY city;'),
(21, 'প্রত্যেক department এ কয়জন student', 'SELECT department, COUNT(*) FROM students GROUP BY department;'),
(22, 'প্রত্যেক department এর গড় marks', 'SELECT department, AVG(marks) FROM students GROUP BY department;'),
(23, 'যে city তে average marks 70 এর বেশি', 'SELECT city, AVG(marks) FROM students GROUP BY city HAVING AVG(marks) > 70;'),
(24, 'যে department এ student সংখ্যা 5 এর বেশি', 'SELECT department, COUNT(*) FROM students GROUP BY department HAVING COUNT(*) > 5;'),
(25, 'যে city তে average marks 75 এর বেশি', 'SELECT city, AVG(marks) FROM students GROUP BY city HAVING AVG(marks) > 75;'),
(26, 'student name ও তার course নাম দেখান', 'SELECT students.name, courses.course_name FROM enrollments JOIN students ON students.id = enrollments.student_id JOIN courses ON courses.id = enrollments.course_id;'),
(27, 'কোন student কোন department এর course নিচ্ছে', 'SELECT students.name, courses.department FROM enrollments JOIN students ON students.id = enrollments.student_id JOIN courses ON courses.id = enrollments.course_id;'),
(28, 'এমন student দেখান যাদের কোনো enrollment নেই', 'SELECT students.name FROM students LEFT JOIN enrollments ON students.id = enrollments.student_id WHERE enrollments.id IS NULL;'),
(29, 'কোন course এ কয়জন student', 'SELECT courses.course_name, COUNT(enrollments.student_id) FROM courses LEFT JOIN enrollments ON courses.id = enrollments.course_id GROUP BY courses.course_name;'),
(30, 'সর্বোচ্চ marks পাওয়া student এর নাম', 'SELECT name FROM students WHERE marks = (SELECT MAX(marks) FROM students);'),
(31, 'দ্বিতীয় সর্বোচ্চ marks পাওয়া student', 'SELECT name FROM students ORDER BY marks DESC LIMIT 1 OFFSET 1;'),
(32, 'প্রত্যেক department এর top scorer', 'SELECT s.name, s.department, s.marks FROM students s WHERE s.marks = (SELECT MAX(marks) FROM students WHERE department = s.department);'),
(33, 'যে student গড় marks এর চেয়ে বেশি পেয়েছে', 'SELECT name FROM students WHERE marks > (SELECT AVG(marks) FROM students);'),
(34, 'একই city তে একাধিক student আছে এমন city', 'SELECT city, COUNT(*) FROM students GROUP BY city HAVING COUNT(*) > 1;'),
(35, 'Student with highest marks (name সহ দেখান)', 'SELECT name, marks\r\nFROM students\r\nWHERE marks = (SELECT MAX(marks) FROM students);');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int NOT NULL,
  `roll` int DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `roll`, `name`) VALUES
(1, 1, 'Rahim'),
(2, 2, 'Karim'),
(3, 3, 'Sakib'),
(4, 4, 'Nusrat'),
(5, 5, 'Mitu'),
(6, 6, 'Tanvir'),
(7, 7, 'Lima'),
(8, 8, 'Hasan'),
(9, 9, 'Ritu'),
(10, 10, 'Arif');

-- --------------------------------------------------------

--
-- Table structure for table `student_question_marks`
--

CREATE TABLE `student_question_marks` (
  `id` int NOT NULL,
  `student_id` int NOT NULL,
  `question_id` int NOT NULL,
  `marks` int DEFAULT '0',
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_question_marks`
--

INSERT INTO `student_question_marks` (`id`, `student_id`, `question_id`, `marks`, `date`) VALUES
(9, 1, 2, 2, '2026-02-25 08:47:23'),
(10, 1, 3, 2, '2026-02-25 09:19:58'),
(11, 2, 3, 2, '2026-02-25 09:19:58'),
(15, 5, 1, 2, '2026-02-25 09:20:23'),
(16, 6, 1, 2, '2026-02-25 09:20:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sql_questions`
--
ALTER TABLE `sql_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roll` (`roll`);

--
-- Indexes for table `student_question_marks`
--
ALTER TABLE `student_question_marks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `question_id` (`question_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sql_questions`
--
ALTER TABLE `sql_questions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student_question_marks`
--
ALTER TABLE `student_question_marks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student_question_marks`
--
ALTER TABLE `student_question_marks`
  ADD CONSTRAINT `student_question_marks_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `student_question_marks_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `sql_questions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
