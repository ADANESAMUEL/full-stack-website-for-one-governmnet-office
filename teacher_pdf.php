<?php
// Check if the form is submitted
if (isset($_POST["submit"])) {
    // Check if file was uploaded without errors
    if (isset($_FILES["pdfFile"]) && $_FILES["pdfFile"]["error"] == 0) {
        $fileName = $_FILES["pdfFile"]["name"];
        $tempName = $_FILES["pdfFile"]["tmp_name"];
        $fileSize = $_FILES["pdfFile"]["size"];
        $fileType = $_FILES["pdfFile"]["type"];

        // Set the directory where PDF files will be stored
        $uploadDir = "material";

        // Move the uploaded file to the specified directory
        if (move_uploaded_file($tempName, $uploadDir . $fileName)) {
            echo "The file $fileName has been uploaded successfully.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "No file was uploaded.";
    }
}
?>
