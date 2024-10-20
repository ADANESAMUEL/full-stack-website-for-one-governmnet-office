<?php
session_start();

// Include database connection script
include 'config.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Check if the user is already deactivated
    $check_sql = "SELECT status FROM login WHERE id='$id'";
    $check_result = mysqli_query($conn, $check_sql);
    
    if($check_result) {
        $row = mysqli_fetch_assoc($check_result);
        $status = $row['status'];
        
        if($status == '0') {
            // User is already deactivated, display message
            echo "<script>alert('User is already deactivated.'); window.location.href = 'display.php';</script>";
            exit; // Stop further execution
        } else {
            // Update status to '0' (inactive)
            $sql = "UPDATE login SET status='0' WHERE id='$id'";
            
            if(mysqli_query($conn, $sql)) {
                // Display JavaScript alert and redirect
                echo "<script>alert('User deactivated successfully.'); window.location.href = 'display.php';</script>";
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
        }
    } else {
        echo "Error checking user status: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>