-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 01, 2026 at 01:07 AM
-- Server version: 10.3.35-MariaDB-log
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
-- Table structure for table `mcq_questions`
--

CREATE TABLE `mcq_questions` (
  `id` int(11) NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_a` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_b` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_c` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_d` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correct_option` enum('A','B','C','D') COLLATE utf8mb4_unicode_ci NOT NULL,
  `marks` int(11) DEFAULT 1,
  `category` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mcq_questions`
--

INSERT INTO `mcq_questions` (`id`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_option`, `marks`, `category`, `created_at`) VALUES
(1, 'SQL এর পূর্ণরূপ কী?', 'Structured Query Language', 'Simple Query Language', 'Standard Question Language', 'System Query List', 'A', 1, 'Basic', '2026-03-01 00:02:03'),
(2, 'সব student দেখাতে কোন query ব্যবহার হবে?', 'SHOW students;', 'SELECT * FROM students;', 'GET students;', 'DISPLAY students;', 'B', 1, 'Basic', '2026-03-01 00:02:03'),
(3, 'Aggregate function কোনটি?', 'COUNT()', 'SELECT', 'DELETE', 'ORDER BY', 'A', 2, 'Aggregate', '2026-03-01 00:02:03'),
(4, 'INNER JOIN কী করে?', 'সব row দেখায়', 'শুধু matching row দেখায়', 'Left table সব দেখায়', 'Right table সব দেখায়', 'B', 3, 'Join', '2026-03-01 00:02:03'),
(5, 'Primary Key কী?', 'Duplicate value', 'Unique + Not Null', 'Null allowed', 'Random column', 'B', 2, 'Database', '2026-03-01 00:02:03'),
(6, 'SQL এ কোন clause result set filter করার জন্য ব্যবহার হয়?', 'WHERE', 'HAVING', 'GROUP BY', 'ORDER BY', 'B', 2, 'Medium', '2026-03-01 00:02:03'),
(7, 'LEFT JOIN কী করে?', 'সব row দেখায়', 'শুধু matching row দেখায়', 'Left table সব দেখায় + matching Right table', 'Right table সব দেখায়', 'C', 3, 'Join', '2026-03-01 00:02:03'),
(8, 'কোনটি SQL এর aggregate function নয়?', 'SUM()', 'AVG()', 'MIN()', 'SELECT()', 'D', 2, 'Aggregate', '2026-03-01 00:02:03'),
(9, 'DISTINCT keyword এর কাজ কী?', 'সব row দেখায়', 'Duplicate row remove করে unique row দেখায়', 'Rows sort করে', 'Row group করে', 'B', 2, 'Medium', '2026-03-01 00:02:03'),
(10, 'Subquery কি?', 'Query যা table তৈরি করে', 'Query ভিতরে আরেকটি query', 'Query যা index তৈরি করে', 'Query যা backup করে', 'B', 3, 'Advanced', '2026-03-01 00:02:03'),
(11, 'CTE (Common Table Expression) কী জন্য ব্যবহার হয়?', 'Permanent table তৈরির জন্য', 'Temporary result set query এর মধ্যে', 'Index তৈরির জন্য', 'Trigger তৈরির জন্য', 'B', 3, 'Advanced', '2026-03-01 00:02:03'),
(12, 'Window Function এর কাজ কী?', 'Row group করে aggregate বের করা', 'Row partition করে aggregate বের করা কিন্তু row collapse হয় না', 'Duplicate remove করা', 'Table drop করা', 'B', 3, 'Advanced', '2026-03-01 00:02:03'),
(13, 'TRUNCATE TABLE কি করে?', 'Table drop করে', 'সব row delete করে structure রাখে', 'কেবল first row delete করে', 'Index remove করে', 'B', 2, 'Database', '2026-03-01 00:02:03'),
(14, 'কোনটি SQL এর UNION এর বৈশিষ্ট্য?', 'Result combine করে duplicates remove করে', 'Result combine করে duplicates রাখে', 'Left table সব দেখায়', 'Right table সব দেখায়', 'A', 2, 'Medium', '2026-03-01 00:02:03'),
(15, 'Foreign Key কী?', 'Unique + Not Null', 'Table link করার জন্য', 'Row delete করার জন্য', 'Index তৈরির জন্য', 'B', 2, 'Database', '2026-03-01 00:02:03'),
(16, 'RIGHT JOIN কী করে?', 'Right table সব দেখায় + matching Left table', 'Left table সব দেখায়', 'শুধু matching row দেখায়', 'সব row দেখায়', 'A', 3, 'Join', '2026-03-01 00:02:03'),
(17, 'SELF JOIN কোন ক্ষেত্রে ব্যবহার হয়?', 'Table join করার জন্য অন্য table এর সাথে', 'একই table এর row join করার জন্য', 'Index তৈরির জন্য', 'Row delete করার জন্য', 'B', 3, 'Join', '2026-03-01 00:02:03'),
(18, 'GROUP BY কী কাজে আসে?', 'Row filter করার জন্য', 'Row aggregate করার জন্য', 'Row sort করার জন্য', 'Duplicate remove করার জন্য', 'B', 2, 'Aggregate', '2026-03-01 00:02:03'),
(19, 'HAVING clause কখন ব্যবহার হয়?', 'WHERE এর সাথে', 'GROUP BY এর সাথে', 'JOIN এর সাথে', 'INSERT এর সাথে', 'B', 2, 'Medium', '2026-03-01 00:02:03'),
(20, 'NULL value কোনটি নির্দেশ করে?', 'Empty string', 'Unknown or missing value', 'Zero', 'False', 'B', 1, 'Basic', '2026-03-01 00:02:03'),
(21, 'Auto Increment কোন ক্ষেত্রের জন্য ব্যবহৃত হয়?', 'Primary Key', 'Foreign Key', 'Normal column', 'Aggregate column', 'A', 2, 'Database', '2026-03-01 00:02:03'),
(22, 'Order By clause কী করে?', 'Row filter করে', 'Row sort করে', 'Duplicate remove করে', 'Join করে', 'B', 1, 'Basic', '2026-03-01 00:02:03'),
(23, 'SELECT DISTINCT salary FROM employees; কোন কাজ করে?', 'সব salary দেখায়', 'Unique salary দেখায়', 'Salary group করে', 'Aggregate salary বের করে', 'B', 2, 'Aggregate', '2026-03-01 00:02:03'),
(24, 'EXISTS keyword ব্যবহার হয়?', 'Subquery validation জন্য', 'Row delete করার জন্য', 'Index তৈরির জন্য', 'Table drop করার জন্য', 'A', 3, 'Advanced', '2026-03-01 00:02:03'),
(25, 'DROP TABLE কি করে?', 'Row delete করে', 'Table structure drop করে', 'Index delete করে', 'Temporary table তৈরি করে', 'B', 2, 'Database', '2026-03-01 00:02:03'),
(26, 'ALTER TABLE কি কাজ করে?', 'Table create করে', 'Table modify করে', 'Row delete করে', 'Index remove করে', 'B', 2, 'Database', '2026-03-01 00:02:03'),
(27, 'INNER JOIN vs LEFT JOIN পার্থক্য কী?', 'LEFT সব দেখায়, INNER matching only', 'INNER সব দেখায়, LEFT matching only', 'উভয়ই matching only', 'উভয়ই সব দেখায়', 'A', 3, 'Join', '2026-03-01 00:02:03'),
(28, 'RIGHT JOIN vs FULL OUTER JOIN পার্থক্য কী?', 'RIGHT শুধু right, FULL উভয়', 'RIGHT সব দেখায়, FULL matching only', 'FULL শুধু left, RIGHT সব', 'RIGHT matching only, FULL কিছুই না', 'A', 3, 'Join', '2026-03-01 00:02:03'),
(29, 'Aggregate function MIN() কোন কাজ করে?', 'Lowest value বের করে', 'Highest value বের করে', 'Row count করে', 'Duplicate remove করে', 'A', 2, 'Aggregate', '2026-03-01 00:02:03'),
(30, 'Aggregate function MAX() কোন কাজ করে?', 'Lowest value বের করে', 'Highest value বের করে', 'Row count করে', 'Duplicate remove করে', 'B', 2, 'Aggregate', '2026-03-01 00:02:03'),
(31, 'COUNT(*) কোন কাজ করে?', 'All rows count করে', 'Unique rows count করে', 'Null row count করে', 'Duplicate remove করে', 'A', 2, 'Aggregate', '2026-03-01 00:02:03'),
(32, 'AVG(salary) কোন কাজ করে?', 'Average salary বের করে', 'Maximum salary বের করে', 'Minimum salary বের করে', 'Row count করে', 'A', 2, 'Aggregate', '2026-03-01 00:02:03'),
(33, 'SUM(column_name) কোন কাজ করে?', 'Column যোগফল বের করে', 'Row count করে', 'Duplicate remove করে', 'Average বের করে', 'A', 2, 'Aggregate', '2026-03-01 00:02:03'),
(34, 'LIKE keyword কোন কাজে আসে?', 'Pattern matching', 'Row delete', 'Aggregate function', 'Index create', 'A', 2, 'Medium', '2026-03-01 00:02:03'),
(35, 'BETWEEN keyword কোন কাজে আসে?', 'Range filter', 'Row group', 'Join table', 'Aggregate function', 'A', 2, 'Medium', '2026-03-01 00:02:03'),
(36, 'IN keyword কোন কাজে আসে?', 'Multiple values filter', 'Row sort', 'Index create', 'Aggregate function', 'A', 2, 'Medium', '2026-03-01 00:02:03'),
(37, 'NOT IN keyword কোন কাজে আসে?', 'Exclude multiple values', 'Include values', 'Join rows', 'Aggregate function', 'A', 2, 'Medium', '2026-03-01 00:02:03'),
(38, 'CASE WHEN ব্যবহার হয়?', 'Conditional logic', 'Join table', 'Row group', 'Index create', 'A', 3, 'Advanced', '2026-03-01 00:02:03'),
(39, 'ROW_NUMBER() কোন কাজ করে?', 'Rows কে sequential number দেয়', 'Aggregate function', 'Row delete', 'Index create', 'A', 3, 'Advanced', '2026-03-01 00:02:03'),
(40, 'RANK() vs DENSE_RANK() পার্থক্য কী?', 'RANK gap দিবে, DENSE_RANK gap দেবে না', 'উভয়ই gap দিবে', 'RANK gap দিবে না, DENSE_RANK gap দিবে', 'উভয়ই gap দেবে না', 'A', 3, 'Advanced', '2026-03-01 00:02:03'),
(41, 'Partition by clause কোন context এ ব্যবহৃত হয়?', 'Window function', 'Join', 'Group by', 'Aggregate function', 'A', 3, 'Advanced', '2026-03-01 00:02:03'),
(42, 'Transaction এর কাজ কী?', 'Multiple queries একসাথে manage করা', 'Row delete', 'Index create', 'Table drop', 'A', 3, 'Advanced', '2026-03-01 00:02:03'),
(43, 'COMMIT vs ROLLBACK পার্থক্য কী?', 'COMMIT changes save করে, ROLLBACK undo করে', 'COMMIT undo করে, ROLLBACK save করে', 'উভয় save করে', 'উভয় undo করে', 'A', 3, 'Advanced', '2026-03-01 00:02:03'),
(44, 'Index কেন ব্যবহার হয়?', 'Query speed improve করার জন্য', 'Row delete করার জন্য', 'Table drop করার জন্য', 'Duplicate remove করার জন্য', 'A', 2, 'Database', '2026-03-01 00:02:03'),
(45, 'Unique Index কোন কাজ করে?', 'Duplicate value prevent করে', 'Row delete করে', 'Table drop করে', 'Aggregate function হিসেবে কাজ করে', 'A', 2, 'Database', '2026-03-01 00:02:03'),
(46, 'Full-Text Index কোন কাজে লাগে?', 'Text search optimize করার জন্য', 'Numeric range filter', 'Join table', 'Aggregate function', 'A', 3, 'Advanced', '2026-03-01 00:02:03'),
(47, 'Hash Index কোন ক্ষেত্রে ব্যবহার হয়?', 'Exact match search', 'Range query', 'Join operation', 'Text search', 'A', 3, 'Advanced', '2026-03-01 00:02:03'),
(48, 'Composite Key কী?', 'Multiple columns combined unique', 'Single column primary key', 'Foreign key only', 'Index only', 'A', 2, 'Database', '2026-03-01 00:02:03'),
(49, 'Normalization কোন কাজে আসে?', 'Data redundancy কমাতে', 'Row delete', 'Index create', 'Table drop', 'A', 2, 'Database', '2026-03-01 00:02:03'),
(50, 'Denormalization কোন কাজে আসে?', 'Query performance improve করার জন্য', 'Row delete', 'Index create', 'Table drop', 'A', 2, 'Database', '2026-03-01 00:02:03'),
(51, 'ACID principle কোন বিষয়ে?', 'Transaction management', 'Join', 'Aggregate', 'Index', 'A', 3, 'Advanced', '2026-03-01 00:02:03'),
(52, 'ROLLUP vs CUBE পার্থক্য কী?', 'ROLLUP partial subtotal, CUBE all subtotal', 'ROLLUP all subtotal, CUBE partial subtotal', 'উভয় same', 'উভয় subtotal দেয় না', 'A', 3, 'Advanced', '2026-03-01 00:02:03'),
(53, 'JSON data type কোন SQL version এ এসেছে?', 'SQL 2011', 'MySQL 5.7+', 'SQL 2008', 'PostgreSQL 8.4', 'B', 3, 'Advanced', '2026-03-01 00:02:03'),
(54, 'EXPLAIN keyword কোন কাজে আসে?', 'Query execution plan দেখাতে', 'Row delete', 'Index create', 'Aggregate function', 'A', 3, 'Advanced', '2026-03-01 00:02:03');

-- --------------------------------------------------------

--
-- Table structure for table `sql_questions`
--

CREATE TABLE `sql_questions` (
  `id` int(11) NOT NULL,
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
(35, 'Student with highest marks (name সহ দেখান)', 'SELECT name, marks\r\nFROM students\r\nWHERE marks = (SELECT MAX(marks) FROM students);'),
(36, 'সব student ও তার department নাম দেখান', 'SELECT s.name, d.department_name \r\n FROM students s\r\n JOIN departments d ON s.department_id = d.id;'),
(37, 'সব student ও তার enrolled course দেখান', 'SELECT s.name, c.course_name\r\n FROM enrollments e\r\n JOIN students s ON s.id = e.student_id\r\n JOIN courses c ON c.id = e.course_id;'),
(38, 'যে student কোনো course নেয়নি', 'SELECT s.name\r\n FROM students s\r\n LEFT JOIN enrollments e ON s.id = e.student_id\r\n WHERE e.student_id IS NULL;'),
(39, 'প্রত্যেক course এ কয়জন student আছে', 'SELECT c.course_name, COUNT(e.student_id)\r\n FROM courses c\r\n LEFT JOIN enrollments e ON c.id = e.course_id\r\n GROUP BY c.course_name;'),
(40, 'সব student ও তাদের course count দেখান', 'SELECT s.name, COUNT(e.course_id) AS total_courses\r\n FROM students s\r\n LEFT JOIN enrollments e ON s.id = e.student_id\r\n GROUP BY s.id;'),
(41, 'যে department এ student সংখ্যা 5 এর বেশি', 'SELECT d.department_name, COUNT(s.id)\r\n FROM departments d\r\n JOIN students s ON s.department_id = d.id\r\n GROUP BY d.department_name\r\n HAVING COUNT(s.id) > 5;'),
(42, 'সব course ও তাদের department দেখান', 'SELECT c.course_name, d.department_name\r\n FROM courses c\r\n JOIN departments d ON c.department_id = d.id;'),
(43, 'যে student ২টির বেশি course নিয়েছে', 'SELECT s.name, COUNT(e.course_id) AS total_courses\r\n FROM students s\r\n JOIN enrollments e ON s.id = e.student_id\r\n GROUP BY s.id\r\n HAVING COUNT(e.course_id) > 2;'),
(44, 'প্রত্যেক department এর average marks', 'SELECT d.department_name, AVG(s.marks)\r\n FROM departments d\r\n JOIN students s ON s.department_id = d.id\r\n GROUP BY d.department_name;'),
(45, 'যে course এ সর্বোচ্চ student আছে', 'SELECT c.course_name, COUNT(e.student_id) AS total_students\r\n FROM courses c\r\n JOIN enrollments e ON c.id = e.course_id\r\n GROUP BY c.id\r\n ORDER BY total_students DESC\r\n LIMIT 1;'),
(46, 'সব student ও তাদের department ও course দেখান', 'SELECT s.name, d.department_name, c.course_name\r\n FROM enrollments e\r\n JOIN students s ON s.id = e.student_id\r\n JOIN courses c ON c.id = e.course_id\r\n JOIN departments d ON s.department_id = d.id;'),
(47, 'যে department এর কোনো course নেই', 'SELECT d.department_name\r\n FROM departments d\r\n LEFT JOIN courses c ON d.id = c.department_id\r\n WHERE c.id IS NULL;'),
(48, 'যে course কোনো student নেয়নি', 'SELECT c.course_name\r\n FROM courses c\r\n LEFT JOIN enrollments e ON c.id = e.course_id\r\n WHERE e.course_id IS NULL;'),
(49, 'প্রত্যেক department এর total enrolled student', 'SELECT d.department_name, COUNT(e.student_id)\r\n FROM departments d\r\n JOIN courses c ON d.id = c.department_id\r\n JOIN enrollments e ON c.id = e.course_id\r\n GROUP BY d.department_name;'),
(50, 'যে student নিজের department ছাড়া অন্য department এর course নিয়েছে', 'SELECT s.name, c.course_name\r\n FROM enrollments e\r\n JOIN students s ON s.id = e.student_id\r\n JOIN courses c ON c.id = e.course_id\r\n WHERE s.department_id != c.department_id;');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `roll` int(11) DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `roll`, `name`) VALUES
(1, 1, 'Rahim1'),
(2, 2, 'Karim'),
(3, 3, 'Sakib'),
(4, 4, 'Nusrat'),
(5, 5, 'Mitu'),
(6, 6, 'Tanvir'),
(7, 7, 'Lima'),
(8, 8, 'Hasan'),
(9, 9, 'Ritu'),
(10, 10, 'Arif'),
(11, 11, 'Sami'),
(12, 12, 'Rana'),
(13, 13, 'Tania'),
(14, 14, 'Fahim'),
(15, 15, 'Nabila'),
(16, 16, 'Shahin'),
(17, 17, 'Mousumi'),
(18, 18, 'Rakib'),
(19, 19, 'Jannat'),
(20, 20, 'Sabbir'),
(21, 21, 'Parvez'),
(22, 22, 'Laila'),
(23, 23, 'Shakil'),
(24, 24, 'Anika'),
(25, 25, 'Farhan'),
(26, 26, 'Raisa'),
(27, 27, 'Imran'),
(28, 28, 'Samira'),
(29, 29, 'Monir'),
(30, 30, 'Taslima');

-- --------------------------------------------------------

--
-- Table structure for table `student_question_marks`
--

CREATE TABLE `student_question_marks` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `marks` int(11) DEFAULT 0,
  `date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_question_marks`
--

INSERT INTO `student_question_marks` (`id`, `student_id`, `question_id`, `marks`, `date`) VALUES
(9, 1, 2, 2, '2026-02-25 08:47:23'),
(10, 1, 3, 2, '2026-02-25 09:19:58'),
(11, 2, 3, 2, '2026-02-25 09:19:58'),
(15, 5, 1, 2, '2026-02-25 09:20:23'),
(16, 6, 1, 2, '2026-02-25 09:20:23'),
(18, 3, 12, 5, '2026-02-26 00:58:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mcq_questions`
--
ALTER TABLE `mcq_questions`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `mcq_questions`
--
ALTER TABLE `mcq_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `sql_questions`
--
ALTER TABLE `sql_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `student_question_marks`
--
ALTER TABLE `student_question_marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
