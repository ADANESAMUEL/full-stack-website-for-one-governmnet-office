<?php
include 'config.php';

if(isset($_POST['submit'])) {
    // Retrieve form data
    $current_password = $_POST['currentpass'];
    $new_password = $_POST['newpass'];
    $confirm_password = $_POST['confirmpass'];

    // Check if new password matches the confirm password
    if ($new_password !== $confirm_password) {
        echo "New password and confirm password do not match.";
        exit();
    }

    // Check if current password is correct
    $sql = "SELECT * FROM login WHERE password = '$current_password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Update password in the database
        $row = mysqli_fetch_assoc($result);
        $user_id = $row['id']; // Assuming id is the primary key of the login table

        $update_sql = "UPDATE login SET password = '$new_password' WHERE id = '$user_id'";
        if (mysqli_query($conn, $update_sql)) {
            echo "Password updated successfully.";
        } else {
            echo "Error updating password: " . mysqli_error($conn);
        }
    } else {
        echo "Current password is incorrect.";
    }
}

mysqli_close($conn); // Close database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="shortcut icon" href="./images/logo.png">
    <link rel="stylesheet" href="index.css">

    <style>
        header{position: relative;}
        .change-password-container{
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 90vh;
        }
        .change-password-container form{
            display: flex;
            flex-direction: column;
            justify-content: center;
            border-radius: var(--border-radius-2);
            padding : 3.5rem;
            background-color: var(--color-white);
            box-shadow: var(--box-shadow);
            width: 95%;
            max-width: 32rem;
        }
        .change-password-container form:hover{box-shadow: none;}
        .change-password-container form input[type=password]{
            border: none;
            outline: none;
            border: 1px solid var(--color-light);
            background: transparent;
            height: 2rem;
            width: 100%;
            padding: 0 .5rem;
        }
        .change-password-container form .box{
            padding: .5rem 0;
        }
        .change-password-container form .box p{
            line-height: 2;
        }
        .change-password-container form h2+p{margin: .4rem 0 1.2rem 0;} 
        .btn{
            background: none;
            border: none;
            border: 2px solid var(--color-primary) !important;
            border-radius: var(--border-radius-1);
            padding: .5rem 1rem;
            color: var(--color-white);
            background-color: var(--color-primary);
            cursor: pointer;
            margin: 1rem 1.5rem 1rem 0;
            margin-top: 1.5rem;
        }
        .btn:hover{
            color: var(--color-primary);
            background-color: transparent;
        }
    </style>

</head>
<body>
    <header>
        <div class="logo">
            <img src="model.png" alt="">
            <h2>HU<span class="danger">MODEL</span>SCHOOL</h2>
        </div>
        
        <div id="profile-btn" style="display: none;">
            <span class="material-icons-sharp">person</span>
        </div>
        <!--<div class="theme-toggler">
            <span class="material-icons-sharp active">light_mode</span>
            <span class="material-icons-sharp">dark_mode</span>
        </div>-->
    </header>

    <div class="change-password-container">
        <form action="" method="post">
            <h2>Create new password</h2>
            <p class="text-muted">Your new password must be different from previous used passwords.</p>
            <div class="box">
                <p class="text-muted">Current Password</p>
                <input type="password" name="currentpass" id="currentpass">
            </div>
            <div class="box">
                <p class="text-muted">New Password</p>
                <input type="password" name="newpass" id="newpass">
            </div>
            <div class="box">
                <p class="text-muted">Confirm Password</p>
                <input type="password" name="confirmpass" id="confirmpass">
            </div>
            <div class="button">
                <input type="submit" name="submit" value="Save" class="btn">
                <a href="index.html" class="text-muted">Cancel</a>
            </div>
            <a href="#"><p>Forget password?</p></a>
        </form>    
    </div>

</body>

<script src="app.js"></script>

</html>