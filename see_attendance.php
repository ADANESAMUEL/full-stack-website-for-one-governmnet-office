<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Student Attendance</title>
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
</head>
<body>
    <h2>View Student Attendance</h2>
    <?php
    // Include the database configuration file
    include 'config.php';

    // Query to fetch attendance data from the database
    $sql = "SELECT * FROM attendance";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>number</th><th>Student Name</th><th>UID</th><th>grade</th><th>section</th><th>Attendance Date</th><th>Status</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['uid'] . "</td>";
            echo "<td>" . $row['grade'] . "</td>";
            echo "<td>" . $row['section'] . "</td>";
            echo "<td>" . $row['date'] . "</td>";
            echo "<td>" . $row['status'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No attendance records found.";
    }

    // Close the database connection
    $conn->close();
    ?>
</body>
</html>
