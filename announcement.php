<?php
// Include the database configuration file
include 'config.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve announcement, audience, and user ID from the form
    $announcement = $_POST['announcement'];
    $authority = $_POST['authority'];
     // Assuming you have a way to get the user ID, like session or authentication

    // Store the announcement in the database (assuming you have a table named 'announcements')
    $sql = "INSERT INTO announcements (announcement, authority ) VALUES ('$announcement', '$authority')";
    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Announcement posted successfully.");</script>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Announcement</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    font-weight: bold;
    margin-bottom: 5px;
}

select, textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    background-color: #3d52a0;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #0fa4af;
}

    </style>
</head>
<body>
    <div class="container">
        <h2>Post Announcement</h2>
        <form action="" method="post">
            <label for="authority">Select authority:</label><br>
            <select id="authority" name="authority" required>
                <option value="teacher">workstuff</option>
                <option value="student">wereda</option>
            </select><br><br>
            <label for="announcement">Announcement:</label><br>
            <textarea id="announcement" name="announcement" rows="6" required></textarea><br>
           
            <button type="submit">Post Announcement</button>
        </form>
    </div>
</body>
</html>
