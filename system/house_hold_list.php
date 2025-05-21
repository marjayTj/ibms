<?php
include 'conn.php';
session_start();
if (!isset($_SESSION['id'])) {
	header("location:index.php");
}
include 'select_from_user.php';
$brgy_id = $row['brgy_id'];
if ($row['user_level'] == 1) {
	header("location:dashboard.php");
}
?>
<!DOCTYPE html>
<html>

<head>
	<title></title>
	<?php include 'include/links.php' ?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<?php include 'include/header.php' ?>

		<div class="content-wrapper">
			<section class="content-header">
				<h4>Household Records</h4>
			</section>
			<section class="content">
				<div class="container-fluid">
					<table id="ready" class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr>

								<th>Name</th>
								<th>Purok</th>
								<th>House Number</th>
								<th>Residential ID</th>
								<th>Contact number</th>
								<th>...</th>
							</tr>
						</thead>
						<tbody>
							<?php

							$select_all_house_hold_head = mysqli_query($conn, "SELECT * FROM `tbl_household_head`");

							if ($select_all_house_hold_head) {
								while ($row_hh = mysqli_fetch_assoc($select_all_house_hold_head)) {
									$hh = $row_hh['pi_resident_id'];
									//echo $hh." <br>";
									$select_all_resident = mysqli_query($conn, "SELECT tbl_personal_info.pi_resident_id,pi_last_name,pi_first_name,pi_middle_name,pi_extension_name, hh_purok,hh_house_number , pi_cp_number FROM `tbl_personal_info` 
									join tbl_household_head on tbl_personal_info.pi_resident_id = tbl_household_head.pi_resident_id
									WHERE pi_brgy_id = '$brgy_id' and tbl_personal_info.pi_resident_id='$hh' 
									order by hh_house_number");

									$row_red = mysqli_fetch_assoc($select_all_resident);

									$pi_resident = isset($row_red['pi_resident_id']) ? htmlspecialchars($row_red['pi_resident_id']) : '';
									$lastName = isset($row_red['pi_last_name']) ? htmlspecialchars($row_red['pi_last_name']) : '';
									$firstName = isset($row_red['pi_first_name']) ? htmlspecialchars($row_red['pi_first_name']) : '';
									$middleName = isset($row_red['pi_middle_name']) ? htmlspecialchars($row_red['pi_middle_name']) : '';
									$extensionName = isset($row_red['pi_extension_name']) ? htmlspecialchars($row_red['pi_extension_name']) : '';
									$house_number = isset($row_red['hh_house_number']) ? htmlspecialchars($row_red['hh_house_number']) : '';
									$purok = isset($row_red['hh_purok']) ? htmlspecialchars($row_red['hh_purok']) : '';
									$cp_number = isset($row_red['[pi_cp_number]']) ? htmlspecialchars($row_red['[pi_cp_number]']) : '';
									

									echo "<tr>
										<td>" . $lastName . ", " . $firstName. " " . $middleName  . " " . $extensionName  . "</td>
										<td>Purok# " . $purok ." </td>
										<td>" . $house_number ." </td>
										<td>" . $pi_resident . "</td>
										<td>" . $cp_number . "</td>
										<td></td>
									</tr>";
								}
							}



							?>
						</tbody>

					</table>
				</div>
			</section>

		</div>
	</div>


	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Members</h5>
					<a class="btn btn-info" href="insert_new_record_personal_info.php">Add new member</a>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					...
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>

	<script>
		$(document).ready(function() {
			$('#ready').DataTable();
		});
	</script>
</body>

</html>