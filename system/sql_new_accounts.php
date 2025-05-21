<?php 
include'conn.php';

if (isset($_POST['brgy_id'])) {
	$brgy_id = $_POST['brgy_id'];
	$user_level = $_POST['brgy_role'];
	$new_name = $_POST['name'];
	$new_username = $_POST['username'];
	$new_password = $_POST['password'];

	$query_user = "INSERT INTO `dbl_bmis_users` (`user_id`, `name`, `username`, `password`, `user_level`, `brgy_id`, `last_log`) VALUES (NULL, '$new_name', '$new_username', '$new_password', '$user_level', '$brgy_id', CURRENT_TIMESTAMP)";

	$edit = mysqli_query($conn, $query_user) or die(mysqli_error($conn));
	if ($edit) {
		echo "success";
	}
	else {
		echo "error";
	}
}
?>