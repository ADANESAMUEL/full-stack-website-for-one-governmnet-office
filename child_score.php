<?php
// Include the database configuration file
include 'config.php';

// Check if the form is submitted
if(isset($_POST['submit'])) {
    // Get the username and ID number from the form
    $name = $_POST['name'];
    $uid = $_POST['uid'];

    // Query the database to fetch the student's scores
    $sql = "SELECT * FROM mark WHERE name = '$name' AND uid = '$uid'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Student found, display the scores
        echo "<h2 align='center'>Your child Scores</h2>";
        echo "<table>";
        echo "<tr><th>Subject</th><th>Mid-Term</th><th>Assignment</th><th>Final Exam</th><th>Total</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['subject'] . "</td>";
            echo "<td>" . $row['mid'] . "</td>";
            echo "<td>" . $row['assignment'] . "</td>";
            echo "<td>" . $row['final'] . "</td>";
            echo "<td>" . $row['total'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        // Student not found or no scores available
        echo "<p>No exam scores found for the provided username and ID number.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Exam Scores</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #95b0db;
            margin: 0;
            padding: 0;
        }

        h1 {
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

        table {
            width: 50%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        p {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Check Your child Scores</h1>
    <form method="POST" >
        <label for="name">childname:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="uid">uid Number:</label>
        <input type="text" id="uid" name="uid" required><br><br>
        <button type="submit" name="submit">CHECK SCORE</button>
    </form>
</body>
</html>
