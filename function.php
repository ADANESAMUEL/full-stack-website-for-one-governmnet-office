<?php
function check_login($con)
{
	if (isset($_SESSION['fname'])) {
		$login_fname = $_SESSION['fname'];
		$query = "select * from login where id = $login_fname limit 1";

		$result = mysqli_query($con, $query);
		if ($result && mysqli_num_rows($result) > 0) {
			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}
	header("location: index.html");
	exit;
}
?>