<?php 
include'conn.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$username = stripslashes($username);
	$password = stripslashes($password);
	$username = mysqli_real_escape_string($conn, $username);
	$password = mysqli_real_escape_string($conn, $password);

	$query_user = "SELECT * FROM dbl_bmis_users WHERE username = '$username' && password = '$password' && user_level = 4";

	$select_user = mysqli_query($conn, $query_user) or die(mysqli_error($conn));
	$row = mysqli_fetch_array($select_user);
	$count = mysqli_num_rows($select_user);

	if ($count == 1) {
		echo "success";
	}
	else {
		echo "error";
	}




}
?>