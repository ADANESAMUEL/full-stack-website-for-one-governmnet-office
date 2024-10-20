<!-- insert_quiz.php -->
<?php
// Include database connection
include 'config.php';

// Get form data
if(isset($_POST['submit'])){
$grade  = $_POST['grade'];   
$subject  = $_POST['subject'];
$question = $_POST['question'];
$option_a = $_POST['option_a'];
$option_b = $_POST['option_b'];
$option_c = $_POST['option_c'];
$option_d = $_POST['option_d'];
$correct_answer = $_POST['correct_answer'];

// Insert into database
$sql = "INSERT INTO quiz (subject,question, option_a, option_b, option_c,option_d, correct_answer) VALUES ('$subject','$question', '$option_a', '$option_b', '$option_c','$option_d', '$correct_answer')";
$result = $conn->query($sql);

if ($result === TRUE) {
    echo "Question inserted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
// Close database connection
$conn->close();
?>

<!-- teacher_insert_quiz.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Quiz Questions</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 20px;
    background-color: #f2f2f2;
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

form {
    max-width: 600px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 10px;
    font-weight: bold;
    width: 100%;
}

input[type="text"], input[type="select"] {
    width: calc(100% - 22px);
    padding: 8px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    
}

button[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
}

button[type="submit"]:hover {
    background-color: #45a049;
}

    </style>
</head>
<body>
    <h2>Insert Quiz Questions</h2>
    <form  method="POST">
        <label for="grade">Grade:</label>
        <input type="text" id="grade" name="grade" required><br><br>

        <label for="subject">subject:</label>
        <input type="text" id="subject" name="subject" required><br><br>

        <label for="question">Question:</label>
        <input type="text" id="question" name="question" required><br><br>

        <label for="option_a">Option A:</label>
        <input type="text" id="option_a" name="option_a" required><br><br>

        <label for="option_b">Option B:</label>
        <input type="text" id="option_b" name="option_b" required><br><br>

        <label for="option_c">Option C:</label>
        <input type="text" id="option_c" name="option_c" required><br><br>

        <label for="option_d">Option D:</label>
        <input type="text" id="option_d" name="option_d" required><br><br>

        <label for="correct_answer">Correct Answer:</label>
        <select id="correct_answer" name="correct_answer" required>
            <option value="a">Option A</option>
            <option value="b">Option B</option>
            <option value="c">Option C</option>
            <option value="d">Option D</option>
        </select><br><br>

        <button type="submit" name="submit">Insert Question</button>
    </form>
</body>
</html>
