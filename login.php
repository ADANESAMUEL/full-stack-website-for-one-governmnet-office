<?php
session_start();
include("config.php");

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $Name = $_POST['Name'];
    $uid = $_POST['uid'];
    $pswd = $_POST['pswd'];
    $authority = $_POST['authority'];

    // Query database to check login credentials
    $query = "SELECT * FROM login WHERE First_name='$Name' AND uid='$uid' AND password='$pswd' AND authority='$authority'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            if ($row['status'] == '0') { // Account is inactive
                echo "<script>alert('Your account is deactivated!');</script>";
            } else {
                // Redirect based on authority
                if ($authority == "assigne") {
                    header("Location: assigne.php");
                    exit();
                } elseif ($authority == "workstuff") {
                    header("Location: workstuff.php");
                    exit();
                } elseif ($authority == "director") {
                    header("Location: director.php");
                    exit();
                } elseif ($authority == "wereda") {
                    header("Location: wereda.php");
                    exit();
                } elseif ($authority == "admin") {
                    header("Location: display.php");
                    exit();
                }
            }
        } else {
            echo "<script>alert('Invalid user');</script>";
        }
    } else {
        echo "<script>alert('Query failed: " . mysqli_error($conn) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login</title>
    <link href="https://fonts.googleapis.com/css2family=jost:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="student log.css">
    <style>
        .center-text {
            text-align: center;
        }
    </style>
    <script>
        function onlyNumberKey(evt) {
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode;
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) {
                return false;
            }
            return true;
        }

        function onlyCharacters(evt) {
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode;
            if ((ASCIICode > 64 && ASCIICode < 91) || (ASCIICode > 96 && ASCIICode < 123) || ASCIICode == 32) {
                return true;
            } else {
                return false;
            }
        }
    </script>
</head>

<body>
    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">

        <!--<div class="signup">
            <form>
                <label for="chk" aria-hidden="true">sign up</label>
                <input type="text" name="txt" placeholder="First Name" required>
                <input type="text" name="txt" placeholder="Last Name" required>
                <input type="text" name="txt" placeholder="ID" required>
                <input type="password" name="txt" placeholder="password" required>
                <button>sign in </button>
            </form>
        </div>-->

        <div class="login">
            <form name="loginForm" method="post">
                <label for="chk" aria-hidden="true">login</label>
                <input type="text" onkeypress="return onlyCharacters(event)" name="Name" placeholder="Name" required>
                <input type="text" onkeypress="return onlyNumberKey(event)" name="uid" placeholder="UID" required>
                <input type="password" name="pswd" placeholder="password" required>
                <input type="text" onkeypress="return onlyCharacters(event)" name="authority" placeholder="authority" required>
                <button type="submit" name="submit">login</button>
                <div class="center-text">
                    <a href="sign up.php">For sign up</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
