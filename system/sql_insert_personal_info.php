<?php
include'conn.php';
if (isset($_POST['submit'])) {
	$brgy_id = $_POST['submit'];
	$res_id = uniqid("bmis_");
	$lname = $_POST['last_name'];
	$fname = $_POST['first_name'];
	$mname = $_POST['middle_name'];
	$extname = $_POST['ext_name'];
	$gender = $_POST['gender'];
	$birthdate = $_POST['birthdate'];
	$civil = $_POST['civil_status'];
	$cpnumber = $_POST['phone_number'];
	if ($_POST['religion'] == "other") {
		$religion = $_POST['other_religion'];
	}
	else {
		$religion = $_POST['religion'];
	}

	$file = $_FILES['file'];
	$fileName = $_FILES[file]['name'];
	$fileTmpName = $_FILES[file]['tmp_name'];
	$fileSize = $_FILES[file]['size'];
	$fileError = $_FILES[file]['error'];
	$fileType = $_FILES[file]['type'];
	$fileExt = explode('.',$fileName);
	$fileActualExt = strtolower(end($fileExt));
	$allowed = array('jpg' , 'jpeg' , 'png');
	if (in_array($fileActualExt , $allowed)) {
		if ($fileError === 0) {
			if ($fileSize < 100000000) {
				$fileNameNew = uniqid('img_' , true).".".$fileActualExt;
				$fileDestination = "../dist/img/".$fileNameNew;
				move_uploaded_file($fileTmpName, $fileDestination);

				$insert_data = mysqli_query($conn, "INSERT INTO `tbl_personal_info` (`pi_id`, `pi_resident_id`, `pi_last_name`, `pi_first_name`, `pi_middle_name`, `pi_extension_name`, `pi_sex`, `pi_birth_date`, `pi_civil_status`, `pi_religion`, `pi_cp_number`, `pi_photo_dir`, `pi_brgy_id`) VALUES (NULL, '$res_id', '$lname', '$fname', '$mname', '$extname', '$gender', '$birthdate', '$civil ', '$religion', '$cpnumber', '$fileDestination', '$brgy_id')");

				if ($insert_data) {
					header("location:check_barangay_role.php?resid=$res_id&&lname=$lname&&fname=$fname&&mname=$mname");
				}
				else {
					echo "error";
				}
			}
			else {
				echo "Your file was too big";
			}
		}	
		else {
			echo "There was an error uploading your file";
		}
	}
	else {
		echo "you cannot upload files of this type";
		header("location:insert_new_record_personal_info.php?error=invalidimage&&lname=$lname&&fname=$fname&&mname=$mname&&extname=$extname&&gender=$gender&&birthdate=$birthdate&&civil=$civil&&cpnumber=$cpnumber");
	}
}
?>