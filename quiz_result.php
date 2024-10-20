<?php
include 'config.php';

$score = 0;
$totalQuestions = 0;

foreach ($_POST as $question_id => $answer) {
    if (strpos($question_id, 'q') !== false) {
        // Extract question ID
        $question_id = substr($question_id, 1);
        // Check answer against correct answer in database
        $sql = "SELECT correct_answer FROM quiz WHERE id='$question_id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $correct_answer = $row['correct_answer'];
            if ($answer === $correct_answer) {
                $score++; // Increment score for correct answer
            }
            $totalQuestions++; // Increment total questions
        }
    }
}

$percentage = ($score / $totalQuestions) * 100; // Calculate percentage score
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Result</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 400px;
    margin: 100px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

p {
    margin-bottom: 10px;
}

.result {
    font-weight: bold;
}

.percentage {
    color: #4CAF50;
}

    </style>
</head>
<body>
    <div class="container">
    <h2>Quiz Result</h2>
    <p class="result">Score: <?php echo $score; ?> / <?php echo $totalQuestions; ?></p>
    <p class="percentage">Percentage: <?php echo $percentage; ?>%</p>
    </div>
</body>
</html>
