-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 01, 2026 at 12:54 AM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mcq_questions`
--
ALTER TABLE `mcq_questions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mcq_questions`
--
ALTER TABLE `mcq_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
