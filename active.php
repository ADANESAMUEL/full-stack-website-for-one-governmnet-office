<?php
include 'config.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Check the current status of the user
    $checkStatusQuery = "SELECT status FROM login WHERE id='$id'";
    $checkStatusResult = mysqli_query($conn, $checkStatusQuery);
    
    if($checkStatusResult) {
        $row = mysqli_fetch_assoc($checkStatusResult);
        $status = $row['status'];
        
        // Check if the user is already activated
        if($status == '1') {
            // Display JavaScript alert
            echo "<script>alert('User is already activated.'); window.location.href = 'display.php';</script>";
        } else {
            // Update status to '1' (active)
            $updateQuery = "UPDATE login SET status='1' WHERE id='$id'";
            
            if(mysqli_query($conn, $updateQuery)) {
                // Display JavaScript alert and redirect
                echo "<script>alert('User activated successfully.'); window.location.href = 'display.php';</script>";
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
        }
    } else {
        echo "Error retrieving user information: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>