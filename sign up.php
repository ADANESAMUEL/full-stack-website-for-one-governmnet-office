<?php
include 'config.php';

if(isset($_POST['submit'])){
    $fname = ($_POST['First_name']);
    $lname = ($_POST['Last_name']);
    $password = ($_POST['password']);
    $uid=($_POST['uid']);
    $authority = ($_POST['authority']);

    // Check for existing username or email
    $check_duplicate_user = "SELECT * FROM login WHERE uid='$uid' AND password='$password'";
    $result = $conn->query($check_duplicate_user);

    if ($result->num_rows > 0) {
        // Username or email already exists, display error message
        echo "<script>alert('User already exists.');";
        echo "window.location.href = 'login.php';</script>";
    } else {
        $status = 1;
        $sql="INSERT INTO login (First_name,Last_name,password,uid,authority) values ('$fname','$lname','$password','$uid','$authority')";

        $result = mysqli_query($conn,$sql);
        if ($result) {
            $message="registered  successfully";
            echo "<script>
            alert('$message');
            window.location.href = 'login.php';
            </script>";
        } else {
            die(mysqli_error($conn));
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>sign up</title>
    <link href="https://fonts.googleapis.com/css2family=jost:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="student log.css">
    <style>
        .center-text {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">

        <div class="signup">
            <form method="post">
                <label for="chk" aria-hidden="true">sign up</label>
                
                <input type="text" name="First_name" placeholder="First Name" required>

                <input type="text" name="Last_name" placeholder="Last Name" required>

                <!--<input type="text" name="id" placeholder="ID" required>-->
                <input type="password" name="password" placeholder="password" required>
                <input type="number" name="uid" placeholder="uid" required>
                <input type="text" name="authority" placeholder="authority" required>
                <button type="submit" name="submit">sign in </button>
                <div class="center-text">
                    <a href="login.php">Back to Login</a>
                </div>
            </form>

        </div>
        <!--<div class="login">
    		<form >
    			<label for="chk" aria-hidden="true">login</label>
    			<input type="text" name="Name" placeholder="Name" required>
    			<input type="text" name="uid" placeholder="UID" required>
    			<input type="password" name="pswd" placeholder="password" required>
    			<button>login</button>
    			
    		</form>
    		
    			
    	</div>--->
    </div>
</body>

</html>