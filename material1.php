<?php
// Fetch PDF file details from the database
include("config.php");

$sql = "SELECT * FROM material"; // Assuming you have a table named 'pdf_files'
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Display download links for each PDF file
    while ($row = mysqli_fetch_assoc($result)) {
        $filename = $row['filename'];
        $filepath = $row['filepath'];
        echo "<a href='$filepath' download>$filename</a><br>";
    }
} else {
    echo "No PDF files available for download.";
}
?>
