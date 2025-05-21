<?php
include'conn.php';
if (isset($_POST['submit'])) {
	$res_id = $_GET['id'];
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
	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];
	$fileExt = explode('.',$fileName);
	$fileActualExt = strtolower(end($fileExt));
	$allowed = array('jpg' , 'jpeg' , 'png');
	if (in_array($fileActualExt , $allowed)) {
		if ($fileError === 0) {
			if ($fileSize < 100000000) {
				$fileNameNew = uniqid('img_' , true).".".$fileActualExt;
				$fileDestination = "../dist/img/".$fileNameNew;
				move_uploaded_file($fileTmpName, $fileDestination);

                $insert_data = mysqli_query($conn, 
                "UPDATE `tbl_personal_info` SET 
                `pi_last_name` = '$lname', 
                `pi_first_name` = '$fname', 
                `pi_middle_name` = '$mname', 
                `pi_extension_name` = '$extname', 
                `pi_sex` = '$gender', 
                `pi_birth_date` = '$birthdate', 
                `pi_civil_status` = '$civil', 
                `pi_religion` = '$religion', 
                `pi_cp_number` = '$cpnumber', 
                `pi_photo_dir` = '$fileDestination' WHERE `tbl_personal_info`.`pi_resident_id` = '$res_id'");

				if ($insert_data) {
					header("location:view_residence_profile.php?resid=$res_id");
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
		$insert_data = mysqli_query($conn, 
                "UPDATE `tbl_personal_info` SET 
                `pi_last_name` = '$lname', 
                `pi_first_name` = '$fname', 
                `pi_middle_name` = '$mname', 
                `pi_extension_name` = '$extname', 
                `pi_sex` = '$gender', 
                `pi_birth_date` = '$birthdate', 
                `pi_civil_status` = '$civil', 
                `pi_religion` = '$religion', 
                `pi_cp_number` = '$cpnumber'
				 WHERE `tbl_personal_info`.`pi_resident_id` = '$res_id'");

				if ($insert_data) {
					header("location:view_residence_profile.php?resid=$res_id");
				}
				else {
					echo "error";
				}
	}
}
?>