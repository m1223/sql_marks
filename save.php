<?php
include 'db.php';

// fetch all students and questions
$students = $conn->query("SELECT id FROM students");
$questions = $conn->query("SELECT id FROM sql_questions");

// prepare an array of all student-question combinations
$all_combinations = [];
while ($student = $students->fetch_assoc()) {
    $questions->data_seek(0); // reset pointer for each student
    while ($q = $questions->fetch_assoc()) {
        $all_combinations[] = ['student_id' => $student['id'], 'question_id' => $q['id']];
    }
}
$questions->data_seek(0);

// function to calculate marks based on question id
function get_question_mark($qid)
{
    if ($qid >= 1 && $qid <= 10) return 2;
    if ($qid >= 11 && $qid <= 22) return 5;
    if ($qid >= 23 && $qid <= 35) return 10;
    return 0;
}

// process form submission
if (isset($_POST['marks'])) {
    foreach ($all_combinations as $combo) {
        $student_id = $combo['student_id'];
        $question_id = $combo['question_id'];

        // checkbox checked?
        $checked = $_POST['marks'][$student_id][$question_id] ?? 0;
        $mark_value = $checked ? get_question_mark($question_id) : 0;

        // check if record exists
        $res = $conn->query("SELECT id FROM student_question_marks WHERE student_id=$student_id AND question_id=$question_id");
        if ($res->num_rows > 0) {
            if ($mark_value == 0) {
                // unchecked → delete
                $conn->query("DELETE FROM student_question_marks WHERE student_id=$student_id AND question_id=$question_id");
            } else {
                // update mark
                $conn->query("UPDATE student_question_marks SET marks=$mark_value WHERE student_id=$student_id AND question_id=$question_id");
            }
        } else {
            if ($mark_value != 0) {
                // insert
                $conn->query("INSERT INTO student_question_marks (student_id, question_id, marks) VALUES ($student_id, $question_id, $mark_value)");
            }
        }
    }

    header("Location: index.php");
    exit;
}
?>