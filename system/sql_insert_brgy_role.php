<?php 
include'conn.php';
if (isset($_POST['brgy_role'])) {
	$fh = "";
	$hhh = "";
	$mem = "";
	foreach ($_POST['brgy_role'] as $role) {
		if ($role == "house_hold_head") {
			$hhh = "checked";
		}
		if ($role == "family_head") {
			$fh = "checked";	
		}
		if ($role == "member") {
			$mem = "checked";
		}
	}
	if ($fh == "checked" && $hhh == "checked") {
		if (isset($_POST['submit'])) {
			$resid = $_POST['submit'];
			echo $resid;
			$hh_number = $_POST['hh_number'];
			$purok = $_POST['purok'];

			$insert_hhh = mysqli_query($conn, "INSERT INTO `tbl_household_head` (`hh_id`, `pi_resident_id`, `hh_house_number`, `hh_purok`, `hh_date_added`) VALUES (NULL, '$resid', '$hh_number', '$purok', now())");
			$insert_fh = mysqli_query($conn, "INSERT INTO `tbl_family_head` (`fh_id`, `pi_resident_id`, `fh_date_added`) VALUES (NULL, '$resid', now())");
			$insert_hm = mysqli_query($conn, "INSERT INTO `tbl_house` (`h_id`, `hh_id`, `pi_resident_id`, `hh_date_added`) VALUES (NULL, '$resid', '$resid', now())");
			$insert_fm = mysqli_query($conn, "INSERT INTO `tbl_family` (`f_id`, `fh_id`, `pi_resident_id`, `f_role`, `fh_date_added`)
			VALUES (NULL, '$resid', '$resid', 'head', now())");

			if ($insert_hhh && $insert_fh && $insert_hm && $insert_fm) {
				header("location:educ_job_background.php?resid=$resid");
			}
		}
		
	}
	else {
		if ($hhh == "checked") {
			if (isset($_POST['submit'])) {
			$resid = $_POST['submit'];
			echo $resid;
			$hh_number = $_POST['hh_number'];
			$purok = $_POST['purok'];

			$insert_hhh = mysqli_query($conn, "INSERT INTO `tbl_household_head` (`hh_id`, `pi_resident_id`, `hh_house_number`, `hh_purok`, `hh_date_added`) VALUES (NULL, '$resid', '$hh_number', '$purok', now())");
			$insert_hm = mysqli_query($conn, "INSERT INTO `tbl_house` (`h_id`, `hh_id`, `pi_resident_id`, `hh_date_added`) VALUES (NULL, '$resid', '$resid', now())");
			if ($insert_hhh && $insert_hm) {
				header("location:educ_job_background.php?resid=$resid");
			}
			}
		}
		if ($fh == "checked") {
			if (isset($_POST['submit'])) {
			$resid = $_POST['submit'];
			echo $resid;
			$hh_number = $_POST['hh_number'];
			$purok = $_POST['purok'];
			$hh_head = $_POST['householdhead'];
			$insert_fh = mysqli_query($conn, "INSERT INTO `tbl_family_head` (`fh_id`, `pi_resident_id`, `fh_date_added`) VALUES (NULL, '$resid', now())");
			$insert_hm = mysqli_query($conn, "INSERT INTO `tbl_house` (`h_id`, `hh_id`, `pi_resident_id`, `hh_date_added`) VALUES (NULL, '$hh_head', '$resid', now())");
			$insert_fm = mysqli_query($conn, "INSERT INTO `tbl_family` (`f_id`, `fh_id`, `pi_resident_id`, `f_role`, `fh_date_added`)
			VALUES (NULL, '$resid', '$resid', 'head', now())");

			if ($insert_fh && $insert_hm && $insert_fm) {
				header("location:educ_job_background.php?resid=$resid");
			}
		}
		}
	}
	if ($mem == "checked") {
		if (isset($_POST['submit'])) {
			$resid = $_POST['submit'];
			echo $resid;
			$hh_number = $_POST['hh_number'];
			$purok = $_POST['purok'];
			$fh_head = $_POST['family_head'];
			$fam_role = $_POST['family_role'];
			$insert_fm = mysqli_query($conn, "INSERT INTO `tbl_family` (`f_id`, `fh_id`, `pi_resident_id`, `f_role`, `fh_date_added`)
			VALUES (NULL, '$fh_head', '$resid', '$fam_role', now())");

			if ($insert_fm) {
				header("location:educ_job_background.php?resid=$resid");
			}
		}
	}


}
?>