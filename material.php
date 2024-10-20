<?php
// Check if the form is submitted
if (isset($_POST["submit"])) {
    // Check if file was uploaded without errors
    if (isset($_FILES["pdfFile"]) && $_FILES["pdfFile"]["error"] == 0) {
        // Include the database configuration file
        include("config.php");

        // Prepare and bind the parameters for the SQL statement
        $sql = "INSERT INTO material (filename, filedata) VALUES (?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $fileName, $fileData);

        // Get the file details
        $fileName = $_FILES["pdfFile"]["name"];
        $tempName = $_FILES["pdfFile"]["tmp_name"];

        // Read the file contents
        $fileData = file_get_contents($tempName);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            echo "The file $fileName has been uploaded successfully.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }

        // Close the statement and connection
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    } else {
        echo "No file was uploaded.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload PDF Files</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 100px auto;
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
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="file"] {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Upload PDF Files</h2>
        <form action="teacher_pdf.php" method="post" enctype="multipart/form-data">
            <label for="pdfFile">Select PDF file:</label>
            <input type="file" id="pdfFile" name="pdfFile" accept=".pdf">
            <button type="submit" name="submit">Upload</button>
        </form>
    </div>
</body>
</html>
