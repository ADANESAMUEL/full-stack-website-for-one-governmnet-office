<?php

include 'config.php';


$sql = "SELECT * FROM announcements WHERE authority = 'workstuff'";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
    
    $announcements = [];
    
    
    while ($row = mysqli_fetch_assoc($result)) {
        $announcements[] = $row['announcement'];
    }
} else {
    
    $announcements = [];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>workstuff Announcements</title>
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

ul {
    list-style-type: none;
    padding: 0;
}

li {
    margin-bottom: 10px;
    padding: 10px;
    background-color: #f9f9f9;
    border-radius: 4px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

p {
    text-align: center;
    margin-top: 20px;
}

    </style>
</head>
<body>
    <div class="container">
        <h2>workstuff Announcements</h2>
        <?php if (!empty($announcements)): ?>
            <ul>
                <?php foreach ($announcements as $announcement): ?>
                    <li><?php echo $announcement; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No announcements available for the wereda.</p>
        <?php endif; ?>
    </div>
</body>
</html>
