<?php
include 'db.php';

// function to get mark per question
function get_question_mark($qid){
    if($qid >=1 && $qid <=10) return 2;
    if($qid >=11 && $qid <=22) return 5;
    if($qid >=23 && $qid <=35) return 10;
    return 0;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SQL Questions Practice</title>
<style>
        body { font-family: Arial, sans-serif; background:#f4f6f9; padding:40px; font-size:22px; }
        h1 { text-align:center; margin-bottom:40px; font-size:40px; }
        .question { background:#fff; padding:25px; margin-bottom:20px; border-radius:10px; box-shadow:0 4px 10px rgba(0,0,0,0.1); font-size:24px; }
        details { margin-top:10px; background:#eef2ff; padding:10px; border-radius:6px; }
        summary { cursor:pointer; font-weight:bold; font-size:22px; }
        code { background:#111; color:#00ff88; padding:18px; display:block; margin-top:12px; border-radius:8px; overflow-x:auto; white-space:pre-wrap; font-size:22px; line-height:1.6; }
        .mark { font-size:22px; font-weight:bold; color:#28a745; min-width:60px; text-align:center; }
    </style>
</head>
<body>

<h1>SQL 34 Practice Questions with Dropdown Answers</h1>

<h2>📘 Database Table Structure & Sample Data (10 Records)</h2>

<div class="question">
<p><strong>Students Table Structure</strong></p>
<details><summary>Show Table Structure</summary>
<code>CREATE TABLE students (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100),
    email VARCHAR(100),
    age INT,
    city VARCHAR(50),
    department VARCHAR(50),
    marks INT
);</code>
</details>

<details><summary>Show 10 Sample Records</summary>
<code>INSERT INTO students (name, email, age, city, department, marks) VALUES
('Rahim', 'rahim@mail.com', 20, 'Dhaka', 'CSE', 85),
('Karim', 'karim@mail.com', 22, 'Chittagong', 'EEE', 78),
('Sakib', 'sakib@mail.com', 19, 'Dhaka', 'CSE', 92),
('Nusrat', 'nusrat@mail.com', 21, 'Khulna', 'BBA', 74),
('Mitu', 'mitu@mail.com', 23, 'Rajshahi', 'CSE', 88),
('Tanvir', 'tanvir@mail.com', 24, 'Dhaka', 'EEE', 67),
('Lima', 'lima@mail.com', 20, 'Sylhet', 'BBA', 81),
('Hasan', 'hasan@mail.com', 22, 'Chittagong', 'CSE', 59),
('Ritu', 'ritu@mail.com', 18, 'Dhaka', 'BBA', 73),
('Arif', 'arif@mail.com', 25, 'Khulna', 'EEE', 90);</code>
</details>
</div>

<div class="question">
<p><strong>Courses Table Structure</strong></p>
<details><summary>Show Table Structure</summary>
<code>CREATE TABLE courses (
    id INT PRIMARY KEY AUTO_INCREMENT,
    course_name VARCHAR(100),
    department VARCHAR(50)
);</code>
</details>

<details><summary>Show Sample Records</summary>
<code>INSERT INTO courses (course_name, department) VALUES
('Database', 'CSE'),
('Networking', 'CSE'),
('Circuit Analysis', 'EEE'),
('Marketing', 'BBA');</code>
</details>
</div>

<div class="question">
<p><strong>Enrollments Table Structure</strong></p>
<details><summary>Show Table Structure</summary>
<code>CREATE TABLE enrollments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    student_id INT,
    course_id INT,
    FOREIGN KEY (student_id) REFERENCES students(id),
    FOREIGN KEY (course_id) REFERENCES courses(id)
);</code>
</details>

<details><summary>Show Sample Records</summary>
<code>INSERT INTO enrollments (student_id, course_id) VALUES
(1,1),
(2,3),
(3,1),
(4,4),
(5,2),
(6,3),
(7,4),
(8,1),
(9,4),
(10,3);</code>
</details>
</div>
<hr style="margin:20px 0;">

<?php
$sql = "SELECT * FROM sql_questions ORDER BY id ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $counter = 1;
    while($row = $result->fetch_assoc()) {
        $qid = $row['id'];
        $q_mark = get_question_mark($qid); // get mark dynamically
        echo '<div class="question">';
        echo '<div class="details-container">';
        echo '<p><strong>'.$counter.'.</strong> '.$row['question'].'</p>';
        echo '<details><summary>Show Answer</summary>';
        echo '<code>'.$row['answer'].'</code>';
        echo '</details>';
        echo '</div>';
        echo '<div class="mark">'.$q_mark.' ⭐</div>'; // display dynamic mark
        echo '</div>';
        $counter++;
    }
} else {
    echo "<p>No questions found in the database.</p>";
}
?>

</body>
</html>