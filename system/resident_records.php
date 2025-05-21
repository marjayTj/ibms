<?php 
include'conn.php';
session_start();
if (!isset($_SESSION['id'])) {
	header("location:index.php");
} 
include'select_from_user.php'; 
$brgy_id = $row['brgy_id'];
if ($row['user_level'] == 1) {
	header("location:dashboard.php");
}
?>
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
			<h4>Manage Residential Records</h4>
			<a href="insert_new_record_personal_info.php" class="btn btn-primary"><span class="fa fa-plus"></span> Insert New Record</a><hr>
		</section>
		<section class="content">
			
		
		<div class="container-fluid">
	      <table id="ready" class="table table-striped table-bordered" style="width:100%">
	        <thead>
	        <tr>
	          <th>Name</th>
	          <th>Birth date</th>
	          <th>Residential ID</th>
	          <th>Contact number</th>
	          <th>...</th>
	        </tr>
	        </thead>
	        <tbody>
	            <?php 
	            	$select_all_resident = mysqli_query($conn, "SELECT * FROM `tbl_personal_info` WHERE pi_brgy_id = $brgy_id");
	            	$num = 1;
	            	while ($row = mysqli_fetch_array($select_all_resident)) {
	            		$newdateformat = date("M j, Y", strtotime($row['pi_birth_date']));
	            		echo "<tr>
								<td>".$row['pi_last_name'].", ".$row['pi_first_name']." ".$row['pi_middle_name']."</td>
								<td>".$newdateformat."</td>
								<td>".$row['pi_resident_id']."</td>
								<td>".$row['pi_cp_number']."</td>";	
	            		echo "<td> <a href='view_residence_profile.php?resid=".$row['pi_resident_id']."'>View Profile</a> </td>
	            			</tr>";
	            	}
	            ?>
	        </tbody>

	      </table>
	    </div>
		</section>

	</div>
</div>


<script>
	$(document).ready(function() {
      $('#ready').DataTable();
  });
</script>
</body>
</html>