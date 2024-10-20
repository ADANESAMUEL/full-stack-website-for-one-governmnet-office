<?php
// Include the database configuration file
include 'config.php';

// Get the attendance data from the form
if(isset ($_POST['submit'])){
    $name = $_POST['name'];
    $uid = $_POST['uid'];
    $grade = $_POST['grade'];
    $section = $_POST['section'];
    $date = $_POST['date'];
    $status = $_POST['status'];

    // Insert the attendance data into the database
    $sql = "INSERT INTO attendance (name,uid,grade,section, date, status) VALUES ('$name','$uid','$grade','$section', '$date', '$status')";

    if ($conn->query($sql) === TRUE) {
        echo "Attendance recorded successfully!";
    } else {
        echo "Error: ". $sql. "<br>". $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>