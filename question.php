<?php
include 'db.php';

// function to get mark per question
function get_question_mark($qid)
{
    if ($qid >= 1 && $qid <= 10) return 2;
    if ($qid >= 11 && $qid <= 22) return 5;
    if ($qid >= 23 && $qid <= 35) return 10;
    return 0;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Questions Practice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            padding: 40px;
            font-size: 22px;
        }

        h1 {
            text-align: center;
            margin-bottom: 40px;
            font-size: 40px;
        }
        .table-structure {
            background: #fff; padding: 25px; margin-bottom: 20px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); font-size: 24px;
        }
        .question {
            background: #fff;
            padding: 25px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            font-size: 24px;

            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
        }

        details {
            margin-top: 10px;
            background: #eef2ff;
            padding: 10px;
            border-radius: 6px;
        }

        summary {
            cursor: pointer;
            font-weight: bold;
            font-size: 22px;
        }

        code {
            background: #111;
            color: #00ff88;
            padding: 18px;
            display: block;
            margin-top: 12px;
            border-radius: 8px;
            overflow-x: auto;
            white-space: pre-wrap;
            font-size: 22px;
            line-height: 1.6;
        }

        .mark {
            background: linear-gradient(135deg, #28a745, #20c997);
            color: #fff;
            padding: 10px 18px;
            border-radius: 30px;
            font-size: 20px;
            font-weight: bold;
            min-width: 80px;
            text-align: center;
            height: fit-content;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="#">📊 Mark Management</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="index.php">🏠 Marks Entry</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="question.php">📘 Questions</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="students.php">👨‍🎓 Students</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="report.php">📈 Report</a>
                </li>

            </ul>
        </div>
    </div>
</nav>
<h1>SQL 34 Practice Questions with Dropdown Answers</h1>

<h2>📘 Database Table Structure & Sample Data (10 Records)</h2>

<div class="table-structure">
    <p><strong>Students Table Structure</strong></p>
    <details>
        <summary>Show Table Structure</summary>
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

    <details>
        <summary>Show 10 Sample Records</summary>
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
<hr style="margin:20px 0;">

<?php
$sql = "SELECT * FROM sql_questions ORDER BY id ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $counter = 1;
    while ($row = $result->fetch_assoc()) {
        $qid = $row['id'];
        $q_mark = get_question_mark($qid); // get mark dynamically
        echo '<div class="question">';
        echo '<div style="flex:1;">';
        echo '<p><strong>' . $counter . '.</strong> ' . $row['question'] . '</p>';
        echo '<details><summary>Show Answer</summary>';
        echo '<code>' . $row['answer'] . '</code>';
        echo '</details>';
        echo '</div>';
        echo '<div class="mark">' . $q_mark . ' Mark</div>';
        echo '</div>';
        $counter++;
    }
} else {
    echo "<p>No questions found in the database.</p>";
}
?>

</body>
</html>