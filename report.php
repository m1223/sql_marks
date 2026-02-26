<?php
include 'db.php';

function get_question_mark($qid){
    if ($qid >= 1 && $qid <= 10) return 2;
    if ($qid >= 11 && $qid <= 22) return 5;
    if ($qid >= 23 && $qid <= 35) return 10;
    return 0;
}

// Calculate max total
$q = $conn->query("SELECT id FROM sql_questions");
$max_total = 0;
while($row = $q->fetch_assoc()){
    $max_total += get_question_mark($row['id']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
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
                    <a class="nav-link" href="question.php">📘 Questions</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="students.php">👨‍🎓 Students</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="report.php">📈 Report</a>
                </li>

            </ul>
        </div>
    </div>
</nav>
<h2 class="mb-4">📊 Student Marks Report</h2>

<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>Roll</th>
        <th>Name</th>
        <th>Total Marks</th>
        <th>Percentage</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $students = $conn->query("SELECT * FROM students ORDER BY roll ASC");

    while($student = $students->fetch_assoc()){

        $total_res = $conn->query("SELECT SUM(marks) as total 
                                       FROM student_question_marks 
                                       WHERE student_id={$student['id']}");

        $total_row = $total_res->fetch_assoc();
        $total = $total_row['total'] ?? 0;

        $percent = $max_total > 0 ? ($total / $max_total) * 100 : 0;
        ?>
        <tr>
            <td><?= $student['roll'] ?></td>
            <td><?= $student['name'] ?></td>
            <td><?= $total ?></td>
            <td><?= round($percent) ?>%</td>
        </tr>
    <?php } ?>
    </tbody>
</table>

</body>
</html>