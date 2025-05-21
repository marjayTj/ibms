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
			<h4>Heath Records /</h4>
			<button class="btn btn-primary" id="panel1"><span class="fa fa-plus"></span> New Record</button>
			<button class="btn btn-primary" style="display:none" id="panel2"><span class="fa fa-dashboard"></span> Back to Health dashboard</button>
		</section>
		<section class="content">
		<div id="health_record_dasbboard">
		<?php include'health_records_dashboard.php' ?>
		</div>
        <div id="add_manage_health_records" style="display:none">
		<?php include'add_manage_health_records.php'?>
		</div>
        </section>
	</div>
</div>
<script>
$("#panel1").click(function() {
	$("#health_record_dasbboard").hide();
	$("#add_manage_health_records").show();
	$("#panel1").hide();
	$("#panel2").show();
});
$("#panel2").click(function() {
	$("#health_record_dasbboard").show();
	$("#add_manage_health_records").hide();
	$("#panel1").show();
	$("#panel2").hide();
});
</script>
</body>
</html>