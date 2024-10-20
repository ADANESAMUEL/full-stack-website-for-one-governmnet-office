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
        echo "<h2 align='center'>Your Exam Scores</h2>";
        echo "<table>";
        echo "<tr><th>Subject</th><th>mid</th><th>assignment</th><th>final</th><th>total</th></tr>";
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