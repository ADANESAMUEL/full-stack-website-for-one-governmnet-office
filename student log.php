<!---sign up--->
<?php
session_start();
include("connection.php");
include("function.php");
 
 if ($_SERVER['REQUEST_METHOD'] =='POST') 
 {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $password = $_POST['pswd'];

    if (!empty($fname) && !empty($lname) && !empty($password) && !is_numeric($fname) && !is_numeric($lname)) {
        $query = "INSERT INTO login (First_name, Last_name, password) VALUES ('$fname', '$lname', '$password')";
        mysqli_query($con, $query);
        header("location: login.php");
        die;
    } else {
        echo "Please enter valid information";
    }
 }
?>

<!----login--->
<?php
session_start();
include("connection.php");
include("function.php");
 
 if ($_SERVER['REQUEST_METHOD'] =='POST') 
 {
    $login_fname = $_POST['fname'];
    $login_lname = $_POST['lname'];
    $login_password = $_POST['pswd'];

    if (!empty($login_fname) && !empty($login_lname) && !empty($login_password) && !is_numeric($login_fname) && !is_numeric($login_lname)) {
        $query = "SELECT * FROM login WHERE First_name = '$login_fname' LIMIT 1";
        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            
            if ($user_data['password'] === $login_password) {
                $_SESSION['fname'] = $user_data['First_name'];
                header("location: index.html");
                die;
            }
        }
    } else {
        echo "Please enter valid information";
    }
 }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="student log.css">
</head>

<body>
    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">

        <div class="signup">
            <form action="" method="post">
                <label for="chk" aria-hidden="true">Sign Up</label>
                <input type="text" name="fname" placeholder="First Name" required>
                <input type="text" name="lname" placeholder="Last Name" required>
                <input type="password" name="pswd" placeholder="Password" required>
                <button>Sign Up</button>
            </form>
        </div>
        <div class="login">
            <form action="" method="post">
                <label for="chk" aria-hidden="true">Login</label>
                <input type="text" name="fname" placeholder="First Name" required>
                <input type="text" name="lname" placeholder="Last Name" required>
                <input type="password" name="pswd" placeholder="Password" required>
                <button>Login</button>
            </form>
        </div>
    </div>
</body>

</html>
