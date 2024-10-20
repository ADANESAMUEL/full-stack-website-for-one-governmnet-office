<?php
// Process submitted quiz answers
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve grade, section, and subject from the form
    $grade = $_POST['grade'];
    $subject = $_POST['subject'];

    // Fetch quiz questions based on grade, section, and subject
    $sql = "SELECT * FROM quiz WHERE grade='$grade' AND subject='$subject'";
    $result = $conn->query($sql);
    

    if ($result->num_rows > 0) {
        // Output each question with options as radio buttons
        echo "<h2>Quiz</h2>";
        echo "<form action='submit_answers.php' method='POST'>";
        while ($row = $result->fetch_assoc()) {
            echo "<p>" . $row['question'] . "</p>";
            echo "<input type='radio' name='q" . $row['id'] . "' value='a'>" . $row['option_a'] . "<br>";
            echo "<input type='radio' name='q" . $row['id'] . "' value='b'>" . $row['option_b'] . "<br>";
            echo "<input type='radio' name='q" . $row['id'] . "' value='c'>" . $row['option_c'] . "<br>";
            echo "<input type='radio' name='q" . $row['id'] . "' value='d'>" . $row['option_d'] . "<br><br>";
        }
        // Include hidden input fields for grade, section, and subject
        echo "<input type='hidden' name='grade' value='$grade'>";
        
        echo "<input type='hidden' name='subject' value='$subject'>";
        echo "<button type='submit' name='submit'>Submit Quiz</button>";
        echo "</form>";
    } else {
        echo "No quiz questions available for the provided grade, section, and subject.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Take Quiz</title>
    <style>
  body {
            font-family: Arial, sans-serif;
            background-color: #95b0db;
            margin: 0;
            padding: 0;
        }
        .container {
    width: 60%; /* Set the width of the container */
    margin: 50px auto; /* Center the container horizontally */
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

        h2 {
            text-align: center;
            margin-top: 50px;
        }

        form {
            width: 300px;
            margin: 0 auto;
            background-color: #ccc;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"] {
            width: calc(100% - 22px);
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #45a049;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #45a049;
        }


    </style>
</head>
<body>
    <h2>Quiz</h2>
    <form action="" method="POST">
        <label for="grade">Grade:</label>
        <input type="text" id="grade" name="grade" required><br><br>
        
       
        
        <label for="subject">Subject:</label>
        <input type="text" id="subject" name="subject" required><br><br>
        
        <button type="submit" name="submit">Start Quiz</button>
    </form>
</body>
</html>
