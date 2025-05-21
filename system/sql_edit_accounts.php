<?php 
include'conn.php';

if (isset($_POST['brgy_id'])) {
	$brgy_id = $_POST['brgy_id'];
	$brgy_role = $_POST['brgy_role'];
	$edit_name = $_POST['edit_name'];
	$edit_username = $_POST['edit_username'];
	$edit_password = $_POST['edit_password'];

	$query_user = "UPDATE `dbl_bmis_users` SET `name` = '$edit_name', `username` = '$edit_username', `password` = '$edit_password' WHERE `dbl_bmis_users`.`brgy_id` = $brgy_id AND `dbl_bmis_users`.`user_level` = $brgy_role";

	$edit = mysqli_query($conn, $query_user) or die(mysqli_error($conn));
	if ($edit) {
		echo "success";
	}
	else {
		echo "error";
	}
}
?>