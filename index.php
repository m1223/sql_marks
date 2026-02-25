<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Class Test Marks - Checkbox System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { padding:40px; font-family: Arial; }
        table { width:100%; margin:auto; }
        th, td { text-align:center; padding:10px; }
        .progress { height:25px; }
        .progress-bar { font-weight:bold; }
        input[type=checkbox] { width:20px; height:20px; }
    </style>
</head>
<body>

<h2 class="text-center mb-4">Class Test Marks - Checkbox System</h2>

<form action="save.php" method="POST">
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Roll</th>
            <th>Student Name</th>
            <?php
            // fetch all questions
            $questions = $conn->query("SELECT * FROM sql_questions ORDER BY id ASC");
            $q_array = [];
            while($q = $questions->fetch_assoc()){
                $q_array[] = $q;
                echo "<th>Q{$q['id']} ✅</th>";
            }
            ?>
            <th>Total (%)</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // function to get mark based on question id
        function get_question_mark($qid){
            if($qid >=1 && $qid <=10) return 2;
            if($qid >=11 && $qid <=22) return 5;
            if($qid >=23 && $qid <=35) return 10;
            return 0;
        }

        $students = $conn->query("SELECT * FROM students ORDER BY roll ASC");
        while($student = $students->fetch_assoc()):
            $student_id = $student['id'];
            $student_total = 0;
        ?>
        <tr>
            <td><?= $student['roll'] ?></td>
            <td><?= $student['name'] ?></td>
            <?php foreach($q_array as $q): 
                $mark_res = $conn->query("SELECT marks FROM student_question_marks WHERE student_id=$student_id AND question_id={$q['id']} ORDER BY id DESC LIMIT 1");
                $mark_row = $mark_res->fetch_assoc();
                $existing_mark = $mark_row['marks'] ?? 0;
                $checked = $existing_mark > 0 ? 'checked' : '';
                $student_total += $existing_mark;
            ?>
            <td>
                <input type="checkbox" name="marks[<?= $student_id ?>][<?= $q['id'] ?>]" value="<?= get_question_mark($q['id']) ?>" <?= $checked ?>>
            </td>
            <?php endforeach; ?>
            <td>
                <?php 
                    $max_total = 0;
                    foreach($q_array as $q2) $max_total += get_question_mark($q2['id']);
                    $percent = $max_total > 0 ? ($student_total/$max_total)*100 : 0;
                ?>
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: <?= $percent ?>%;">
                        <?= round($percent) ?>%
                    </div>
                </div>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<div class="text-center mt-4">
    <button type="submit" class="btn btn-primary btn-lg">Save Marks</button>
</div>
</form>

</body>
</html>