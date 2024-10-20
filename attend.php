<?php
include 'config.php'; 


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['grade']) && isset($_POST['section'])) {
    
    $grade =( $_POST['grade']);
    $section =( $_POST['section']);

   
    $sql = "SELECT * FROM attendance WHERE grade='$grade' AND section='$section'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        echo '<h2>Attendance for Grade ' . $grade . ', Section ' . $section . '</h2>';
        echo '<table>';
        echo '<tr><th>Name</th><th>UID</th><th>Date</th><th>Status</th></tr>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['uid'] . '</td>';
            echo '<td>' . $row['date'] . '</td>';
            echo '<td>' . $row['status'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo 'No attendance records found for Grade ' . $grade . ' and Section ' . $section;
    }
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        h2 {
            margin-bottom: 20px;
            text-align: center;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: bisque;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"], input[type="date"] {
            width: 90%;
            padding: 8px;
            margin-bottom: 30px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #62c994;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #acb7ae;

        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 80%;
            border-collapse: collapse;
            margin: auto;
            background-color: #6B7A8F;
            
        }
        th, td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fetch Attendance</title>
</head>
<body>
    <h2>Fetch Attendance</h2>
    <form action="" method="POST">
        <label for="grade">Grade:</label>
        <input type="text" id="grade" name="grade" required><br><br>

        <label for="section">Section:</label>
        <input type="text" id="section" name="section" required><br><br>

        <button type="submit">Fetch Attendance</button>
    </form>
</body>
</html>
