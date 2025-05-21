<?php 
include'conn.php';

if (isset($_POST['brgy_id'])) {
	$brgy_id = $_POST['brgy_id'];
	$brgy_name = $_POST['brgy_name'];
	$brgy_number_of_purok = $_POST['bergy_number_of_purok'];
 
	$select_brgy = mysqli_query($conn, "UPDATE `tbl_brgy_list` SET `brgy_name` = '$brgy_name', `bergy_number_of_purok` = '$brgy_number_of_purok', `brgy_date_added` = now() WHERE `tbl_brgy_list`.`brgy_id` = $brgy_id");
	if ($select_brgy) {
		echo "success";
	}
	else {
		echo "error";
	}

}
?>