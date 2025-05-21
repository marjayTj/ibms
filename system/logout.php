<?php 
include'conn.php';
session_start();
$id = $_SESSION['id'];

$update_last_log = mysqli_query($conn, "UPDATE `dbl_bmis_users` SET `last_log` = now() WHERE `dbl_bmis_users`.`user_id` = $id ");
if ($update_last_log) {
	session_destroy();
	unset($_SESSION['id']);
	header("location:../index.php");
}
?>