<?php
include 'db.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>MCQ Practice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
            padding: 40px;
            font-size: 20px;
        }

        .question {
            background: #fff;
            padding: 25px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }

        .options p {
            margin: 5px 0;
        }

        .correct {
            color: #28a745;
            font-weight: bold;
        }

        .mark {
            background: linear-gradient(135deg, #28a745, #20c997);
            color: #fff;
            padding: 8px 15px;
            border-radius: 30px;
            font-weight: bold;
            height: fit-content;
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
        }
    </style>
</head>
<body>

<h1 class="text-center mb-4">📘 MCQ Practice Questions</h1>

<?php
$sql = "SELECT * FROM mcq_questions ORDER BY id ASC";
$result = $conn->query($sql);

$counter = 1;

while ($row = $result->fetch_assoc()) {

    echo '<div class="question">';
    echo '<div style="flex:1;">';

    echo '<p><strong>'.$counter.'.</strong> '.$row['question'].'</p>';

    echo '<div class="options">';
    echo '<p>A) '.$row['option_a'].'</p>';
    echo '<p>B) '.$row['option_b'].'</p>';
    echo '<p>C) '.$row['option_c'].'</p>';
    echo '<p>D) '.$row['option_d'].'</p>';
    echo '</div>';

    echo '<details>';
    echo '<summary>Show Correct Answer</summary>';

    // Show correct option dynamically
    $correct = $row['correct_option'];

    if ($correct == 'A') $answer = $row['option_a'];
    if ($correct == 'B') $answer = $row['option_b'];
    if ($correct == 'C') $answer = $row['option_c'];
    if ($correct == 'D') $answer = $row['option_d'];

    echo '<p class="correct">Correct Answer: '.$correct.') '.$answer.'</p>';

    echo '</details>';

    echo '</div>';

    echo '<div class="mark">'.$row['marks'].' Mark</div>';

    echo '</div>';

    $counter++;
}
?>

</body>
</html>