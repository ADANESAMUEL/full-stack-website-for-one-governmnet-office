<?php
include 'config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $uid = $_POST['uid'];
    $grade = $_POST['grade'];
    $sql = "INSERT INTO registration (first_name,last_name, uid,grade) VALUES ('$first_name','$last_name', '$uid','$grade')";

if ($conn->query($sql) === TRUE) {
    echo "registered successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #848d9c;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
    background-color: #a5c9b9;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    margin-bottom: 20px;
    text-decoration: #45a049;
    
}

.form-group {
    margin-bottom: 20px;
}

label {
    font-weight: bold;
}

input[type="text"] {
    width: 90%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}


button {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width: 50%;
    margin: auto;
    display: block;
}

button:hover {
    background-color: #45a049;
}

    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Registration Form</h2>
        <form  method="POST">
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" required>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" required>
            </div>
            <div class="form-group">
                <label for="uid">UID:</label>
                <input type="text" id="uid" name="uid" required>
            </div>
            <div class="form-group">
                <label for="grade">Grade:</label>
                <input type="text" id="grade" name="grade" required>
            </div>
            <button type="submit" name="submit">REGISTER</button>
        </form>
    </div>
</body>
</html>
