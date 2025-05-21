<?php 
include'conn.php';

if (isset($_POST['command'])) {
	if ($_POST['command'] == "pf_uncheck") {
		$pi_id = $_POST['pi_id'];
		$pf_id = $_POST['pf_id'];
		$pf_ownership = $_POST['pf_ownership'];
		$pf_quantity = $_POST['pf_quantity'];
		$pf_year_acquired = $_POST['pf_year_acquired'];
		$pf_value = $_POST['pf_value'];

		$insert_pf_uncheck = mysqli_query($conn, "INSERT INTO `tbl_production_facilities` 
			(`pf_id`, `pi_resident_id`, `pc_code`, `pf_quantity`, `pf_ownership`,
			 `pf_year_acquired`, `pf_cost`, `pf_date_added`) VALUES
			(NULL, '$pi_id', '$pf_id', '$pf_quantity', '$pf_ownership', '$pf_year_acquired', '$pf_value', now())");
			//echo $pi_id." === ".$pf_id." === ".$pf_ownership." === ".$pf_quantity." === ".$pf_year_acquired." === ".$pf_value;
			
			if ($insert_pf_uncheck) {
				$select_pf = mysqli_query($conn, "SELECT * FROM `tbl_property_commodities` WHERE pc_code = '$pf_id'") or die (mysqli_error($conn));
				$row_pf = mysqli_fetch_array($select_pf);
				if ($row_pf['pc_category'] == "PF") {
					$data_type = "Production Facilities";	
				}
				if ($row_pf['pc_category'] == "AP") {
					$data_type = "Anima Products";	
				}
				if ($row_pf['pc_category'] == "Pr") {
					$data_type = "Crop Products";
				}

				echo '<tr><td>'.$row_pf['pc_type'].'</td><td>'.$data_type.'</td><td>N/A</td></tr>';
			}


	}


	elseif($_POST['command'] == "pf_check") {
		$pr_code = uniqid("pr_");
		$pi_id = 	$_POST['pi_id'];
		$pf_input = $_POST['pf_input'];
		$pf_ownership = $_POST['pf_ownership'];
		$pf_quantity = $_POST['pf_quantity'];
		$pf_year_acquired = $_POST['pf_year_acquired'];
		$pf_value = $_POST['pf_value'];

		$insert_pf_check = mysqli_query($conn, "INSERT INTO `tbl_production_facilities` 
			(`pf_id`, `pi_resident_id`, `pc_code`, `pf_quantity`, `pf_ownership`,
			 `pf_year_acquired`, `pf_cost`, `pf_date_added`) VALUES
			(NULL, '$pi_id', '$pr_code', '$pf_quantity', '$pf_ownership', '$pf_year_acquired', '$pf_value', now())" . mysqli_error($conn) );

		$insert_new_data = mysqli_query($conn, "INSERT INTO `tbl_property_commodities` (`pc_id`, `pc_code`, `pc_category`, `pc_type`, `pc_date_added`) VALUES (NULL, '$pr_code', 'PF', '$pf_input', now())" . mysqli_error($conn));
			//\echo $pi_id." === ".$pf_id." === ".$pf_ownership." === ".$pf_quantity." === ".$pf_year_acquired." === ".$pf_value;
			
			if ($insert_pf_check && $insert_new_data) {
				echo 'reload';
			}
	}

	////////////////////////////////////////////////////////////////////
	//////						animal products 				////////
	////////////////////////////////////////////////////////////////////
	
	elseif($_POST['command'] == "ap_uncheck") {
 		$pi_id = $_POST['pi_id'];
 		$ap_id = $_POST['ap_id'];
 		$ap_male_count = $_POST['ap_male_count']; 
 		$ap_female_count = $_POST['ap_female_count'];
 		$ymw = $_POST['ymw'];
 		$age_count = $_POST['age_count'];

 		$total_age = $age_count." ".$ymw;

 		//echo $pi_id." === ".$ap_id." === ".$ap_male_count." === ".$ap_female_count." === ".$ymw." === ".$total_age;

 		$insert_animal_products = mysqli_query($conn, "INSERT INTO `tbl_animal_products` 
 			( `pi_resident_id`, `pc_code`, `ap_number_of_male`, `ap_number_of_female`, `ap_age`, `ap_date_added`) VALUES 
 			 ( '$pi_id', '$ap_id', '$ap_male_count', '$ap_female_count', '$total_age' , now())" ) or die(mysqli_error($conn));

 		if ($insert_animal_products) {
 			$select_pf = mysqli_query($conn, "SELECT * FROM `tbl_property_commodities` WHERE pc_code = '$ap_id'") or die(mysqli_error($conn));
				$row_pf = mysqli_fetch_array($select_pf);
				if ($row_pf['pc_category'] == "PF") {
					$data_type = "Production Facilities";	
				}
				if ($row_pf['pc_category'] == "AP") {
					$data_type = "Anima Products";	
				}
				if ($row_pf['pc_category'] == "Pr") {
					$data_type = "Crop Products";
				}

				echo '<tr><td>'.$row_pf['pc_type'].'</td><td>'.$data_type.'</td><td>N/A</td></tr>';
 		}


	}

	elseif($_POST['command'] == "ap_check") {
		$ap_code = uniqid("pr_");
		$pi_id = $_POST['pi_id'];
 		$ap_input = $_POST['ap_input'];
 		$ap_male_count = $_POST['ap_male_count']; 
 		$ap_female_count = $_POST['ap_female_count'];
 		$ymw = $_POST['ymw'];
 		$age_count = $_POST['age_count'];
 		$total_age = $age_count." ".$ymw;

 		//echo $ap_code." ==== ".$pi_id." === ".$ap_input." === ".$ap_male_count." === ".$ap_female_count." === ".$ymw." === ".$age_count;
 		
 		$insert_animal_products = mysqli_query($conn, "INSERT INTO `tbl_animal_products` 
 			(`ap_id`, `pi_resident_id`, `pc_code`, `ap_number_of_male`, `ap_number_of_female`, `ap_age`, `ap_date_added`) VALUES 
 			 (NULL, '$pi_id', '$ap_code', '$ap_male_count', '$ap_male_count', '$total_age' , now())" . mysqli_error($conn));

 		$insert_new_data = mysqli_query($conn, "INSERT INTO `tbl_property_commodities` (`pc_id`, `pc_code`, `pc_category`, `pc_type`, `pc_date_added`) VALUES (NULL, '$ap_code', 'AP', '$ap_input', now())" . mysqli_error($conn));

		if ($insert_new_data) {
				echo 'reload';
		}
	}

	elseif($_POST['command'] == "pr_uncheck") {
		$pi_id = $_POST['pi_id'];
     	$pr_id = $_POST['pr_id'];
     	$pr_area = $_POST['pr_area'];
     	$pr_ecosystem = $_POST['pr_ecosystem'];
     	$pr_tenant = $_POST['pr_tenant'];

     	//echo $pi_id." ".$pr_id." ".$pr_area." ".$pr_ecosystem." ".$pr_tenant;
     	$insert_pr = mysqli_query($conn,"INSERT INTO `tbl_products` (`pr_id`, `pi_resident_id`, `pc_code`, `pr_area`, `pr_ecosystem`, `pr_tenant_status`, `pr_date_added`) VALUES (NULL, '$pi_id', '$pr_id', '$pr_area', '$pr_ecosystem', '$pr_tenant', now())" . mysqli_error($conn));

     	if ($insert_pr) {
				$select_pf = mysqli_query($conn, "SELECT * FROM `tbl_property_commodities` WHERE pc_code = $pr_id");
				$row_pf = mysqli_fetch_array($select_pf);
				if ($row_pf['pc_category'] == "PF") {
					$data_type = "Production Facilities";	
				}
				if ($row_pf['pc_category'] == "AP") {
					$data_type = "Anima Products";	
				}
				if ($row_pf['pc_category'] == "Pr") {
					$data_type = "Crop Products";
				}

				echo '<tr><td>'.$row_pf['pc_type'].'</td><td>'.$data_type.'</td><td>N/A</td></tr>';
			}
	}

	elseif($_POST['command'] == "pr_check") {
		echo "yeslol";
	}
	
}
?>