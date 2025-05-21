<?php 
include'conn.php';
	if (isset($_POST['submit'])) {
		$resid = $_POST['submit'];

		if (!empty($_POST['elem_check'])) {	
			$elem_input = $_POST['elem_input'];
			$insert_educ = mysqli_query($conn, "INSERT INTO `tbl_educational_background` (`eb_id`, `pi_resident_id`, `schl_name`, `schl_level`, `eb_date_added`) VALUES (NULL, '$resid', '$elem_input', '1', now())");
		}
		if (!empty($_POST['hs_check'])) {
			$hs_input = $_POST['hs_input'];
			$insert_educ = mysqli_query($conn, "INSERT INTO `tbl_educational_background` (`eb_id`, `pi_resident_id`, `schl_name`, `schl_level`, `eb_date_added`) VALUES (NULL, '$resid', '$hs_input', '2', now())");
		}
		if (!empty($_POST['col_check'])) {
			$col_input = $_POST['col_input'];
			$insert_educ = mysqli_query($conn, "INSERT INTO `tbl_educational_background` (`eb_id`, `pi_resident_id`, `schl_name`, `schl_level`, `eb_date_added`) VALUES (NULL, '$resid', '$col_input', '3', now())");
		}
		if (!empty($_POST['deg_check'])) {
			$deg_input = $_POST['deg_input'];
			$insert_educ = mysqli_query($conn, "INSERT INTO `tbl_educational_background` (`eb_id`, `pi_resident_id`, `schl_name`, `schl_level`, `eb_date_added`) VALUES (NULL, '$resid', '$deg_input', '4', now())");
		}	
		if (isset($_POST['job_desc'])) {
			foreach ($_POST['job_desc'] as $role) {
				if ($role == "unemployed") {
					$desc = "unemployed";
					$insert_job = mysqli_query($conn, "INSERT INTO `tbl_work_details` (`wd_id`, `pi_resident_id`, `wd_status`, `wd_date_added`) VALUES (NULL, '$resid', '$desc', now())");

					echo "oks na1";
					header("location:view_residence_profile.php?resid=$resid");
				}
				if ($role == "employed") {	
					$desc = "employed";
					$insert_job = mysqli_query($conn, "INSERT INTO `tbl_work_details` (`wd_id`, `pi_resident_id`, `wd_status`, `wd_date_added`) VALUES (NULL, '$resid', '$desc', now())");
					if ($insert_job) {
						$sector = $_POST['sector'];
						$employer = $_POST['employer'];
						$position = $_POST['position'];
						$salary = $_POST['salary'];
						$address = $_POST['address'];

						$insert_job_details = mysqli_query($conn, "INSERT INTO `tbl_employee_details` (`ed_id`, `pi_resident_id`, `ed_sector`, `ed_position`, `ed_employer`, `ed_address`, `ed_salary`, `ed_date_added`) VALUES (NULL, '$resid', '$sector', '$position', '$employer', '$address', '$salary', now())");

						if ($insert_job_details) {
							//header("location:");
							header("location:view_residence_profile.php?resid=$resid");
							echo "oks na2";
						}
					}

				}
				if ($role == "selfemployed") {
					$desc = "self-employed";
					$insert_job = mysqli_query($conn, "INSERT INTO `tbl_work_details` (`wd_id`, `pi_resident_id`, `wd_status`, `wd_date_added`) VALUES (NULL, '$resid', '$desc', now())");
				
				if ($insert_job) {
						$name = $_POST['business_name'];
						$address = $_POST['business_address'];

						$insert_job_details = mysqli_query($conn, "INSERT INTO `tbl_self_employed_details` (`sed_id`, `pi_resident_id`, `sed_name_of_business`, `sed_address`, `sed_date_added`) VALUES (NULL, '$resid', '$name', '$address', now())");

						if ($insert_job_details) {
							//header("location:");
							header("location:view_residence_profile.php?resid=$resid");
							echo "oks na3";
						}
					}
				}
			}
		}
	}

?>