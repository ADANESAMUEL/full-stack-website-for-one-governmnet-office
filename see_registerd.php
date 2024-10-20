<?php
include 'config.php';

// Fetch registered students from the database
$sql = "SELECT * FROM registration";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        /* Your existing CSS styles */
        body{
            background-color: #d5e8e0;
        }
h2{
    text-align: center;
    padding: 10px 20px;
        }
table {
  border-collapse: collapse;
  width: 90%;
}

th, td {
  border: 1px solid black;
  padding: 8px;
  text-align: left;
}

th {
  background-color: #f2f2f2;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Students</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Registered Students</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>UID</th>
                <th>Grade</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row["id"]."</td>";
                    echo "<td>".$row["first_name"]."</td>";
                    echo "<td>".$row["last_name"]."</td>";
                    echo "<td>".$row["uid"]."</td>";
                    echo "<td>".$row["grade"]."</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No registered students found.</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
