<?php 
include'conn.php';
session_start();
if (!isset($_SESSION['id'])) {
	header("location:index.php");
}?><?php include'select_from_user.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include'include/links.php' ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
	<?php include'include/header.php' ?>

	<div class="content-wrapper">
		<section class="content-header">
			<h4>Insert new Record / Education background and Job description</h4>
		</section>
		<section class="content">
			
		</section>
	</div>
</div>
</body>
</html>