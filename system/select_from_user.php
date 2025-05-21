<?php
include'conn.php';

$id = $_SESSION['id'];
$select_all_from_user = mysqli_query($conn, "SELECT * FROM `dbl_bmis_users`WHERE user_id = $id");
$row = mysqli_fetch_array($select_all_from_user); ?>