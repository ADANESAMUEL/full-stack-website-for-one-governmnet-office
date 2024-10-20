<?php
$SERVER ='localhost';
$username ='root';
$password = '';
$dbname ='schooldata';

if (!$con = mysqli_connect($SERVER, $username, $password, $dbname)) {
	die("failed to connect!");
}?>
