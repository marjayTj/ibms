<?php 
$select_work_details = mysqli_query($conn, "SELECT * FROM `tbl_work_details` WHERE pi_resident_id = '$resid'");
$row_wd = mysqli_fetch_array($select_work_details);
?>

<h4><?php echo $row_wd ? $row_wd['wd_status'] : ''; ?></h4>
<hr>
<?php 
if($row_wd) {
	if ($row_wd['wd_status'] == "unemployed") {
	echo "nothing to display....";
}
elseif ($row_wd['wd_status'] == "employed") {
	$select_employed_detailes = mysqli_query($conn, "SELECT * FROM `tbl_employee_details` WHERE pi_resident_id = '$resid' ");
	$row_emp = mysqli_fetch_array($select_employed_detailes);

	echo "<b>Sector :</b> ".$row_emp['ed_sector']."<br>";
	echo "<b>Employer :</b> ".$row_emp['ed_employer']."<br>";
	echo "<b>Position :</b> ".$row_emp['ed_position']."<br>";
	echo "<b>Salary :</b> ".$row_emp['ed_salary']."<br>";
	echo "<b>Address :</b> ".$row_emp['ed_address']."<br><br>";
	echo "<a href=''>Edit</a>";
}
elseif ($row_wd['wd_status'] == "self-employed") {
	$select_self_employed_detailes = mysqli_query($conn, "SELECT * FROM `tbl_self_employed_details` WHERE pi_resident_id = '$resid' ");
	$row_sed = mysqli_fetch_array($select_self_employed_detailes);

	echo "<b>Name of business :</b> ".$row_sed['sed_name_of_business']."<br>";
	echo "<b>Business address :</b> ".$row_sed['sed_address']."<br><br>";
	echo "<a href=''>Edit</a>";
}
}

?>