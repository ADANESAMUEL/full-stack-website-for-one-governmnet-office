<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the record from the database
    $sql = "DELETE FROM login WHERE id=$id";
    mysqli_query($conn, $sql);

    // Redirect back to the display page
    header('Location: display.php');
    exit();
}
?>