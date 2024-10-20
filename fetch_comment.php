
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Comments</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
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

        p {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!--<h2>family Comments</h2>-->
        <?php
// Include the database configuration file
include 'config.php';

// Fetch comments from the database
$sql = "SELECT * FROM comments";
$result = mysqli_query($conn, $sql);

// Check if there are any comments
if (mysqli_num_rows($result) > 0) {
    // Output comments
    echo "<h2>Family Comments</h2>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<label style='display: block; background-color: #e9e9e9; padding: 40px; border-radius: 8px;'>
        <p align='center'>{$row['comment']}</p> 
      </label>
      <br/>";

    }
} else {
    echo "No comments available.";
}

// Close database connection
mysqli_close($conn);
?>

    </div>
</body>
</html>
