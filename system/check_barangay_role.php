<!--------------------------------------------------------------->
<!-------------------------SECOND FORM--------------------------->
<!--------------------------------------------------------------->
<?php 
include'conn.php';
session_start();
if (!isset($_SESSION['id'])) {
	header("location:index.php");
}
$id = $_SESSION['id'];
if (isset($_GET['resid'])) {
	$resid = $_GET['resid'];
	$fname = $_GET['fname'];
	$lname = $_GET['lname'];
	$mname = $_GET['mname'];
}
?><?php include'select_from_user.php'; 
$brgy_id = $row['brgy_id'];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include'include/links.php' ?>
	<style type="text/css" media="screen">		
		.option-content {
		  height: 100px;
		  width: 100%;
		  max-width: 100%;
		  font-size: 2rem;
		  letter-spacing: 0.5px;
		  text-align: center;
		  font-family: 'Roboto Mono', monospace;
		  color:#fff;

		}
		.options {
		  display: table;
		  border-collapse: collapse;
		  width: 100%;
		  height: inherit;
		  table-layout: fixed;
		  border-color: 1px solid #000;
		  background-color: #00c0ef;
		  padding: 10px;
		}
		.options > .option {
		  position: relative;
		  overflow: hidden;
		  display: table-cell;
		  vertical-align: middle;
		  -webkit-transform: translate3d(0, 0, 0);
		          transform: translate3d(0, 0, 0);
		  transition-property: background;
		  transition-timing-function: cubic-bezier(0.19, 1, 0.22, 1);
		  transition-duration: .3s;
		  border: 1px solid rgba(0, 0, 0, .2);
		  padding: 10px;
		}
		.options > .option > input[type="radio"],
		.options > .option > input[type="checkbox"] {
		  position: absolute;
		  display: none;
		  top: 0;
		  left: 0;
		  width: 100%;
		  height: 100%;
		}
		.options > .option > input[type="radio"]:hover ~ .option-content, .options > .option > input[type="radio"]:checked ~ .option-content,
		.options > .option > input[type="checkbox"]:hover ~ .option-content,
		.options > .option > input[type="checkbox"]:checked ~ .option-content {
		  width: 100%;
		  -webkit-transform: scale(1.3, 1.3);
		          transform: scale(1.3, 1.3);
		}
		.options > .option > input[type="radio"]:checked ~ .on-checked,
		.options > .option > input[type="checkbox"]:checked ~ .on-checked {
		  opacity: 1;
		  box-shadow: inset 0px 0px 3em -1.2em rgba(0, 0, 0, .5);
		}
		.options > .option > input[type="radio"]:active ~ .option-content,
		.options > .option > input[type="checkbox"]:active ~ .option-content {
		  -webkit-transform: scale(1.15, 1.15);
		          transform: scale(1.15, 1.15);
		}
		.options > .option > .option-content {
		  position: relative;
		  z-index: 1;
		  cursor: pointer !important;
		  height: inherit;
		  -webkit-transform: translate3d(0, 0, 0);
		          transform: translate3d(0, 0, 0);
		  transition-property: background, padding, -webkit-transform, -webkit-transform;
		  transition-property: transform, background, padding, transform;
		  transition-property: transform, background, padding, transform, -webkit-transform, -webkit-transform;
		  transition-timing-function: cubic-bezier(0.19, 1, 0.22, 1);
		  transition-duration: .3s;
		}
		.options > .option > .on-checked {
		  position: absolute;
		  z-index: 0;
		  left: 0;
		  top: 0;
		  height: 100%;
		  width: 100%;
		  opacity: 0;
		  pointer-events: none;
		  transition-property: opacity;
		  transition-duration: .5s;
		  background-color: rgba(60, 141, 188, .5);
		}
	</style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
	<?php include'include/header.php' ?>

	<div class="content-wrapper">
		<section class="content-header">
			<h4>Insert new Record / Household Information</h4>
		</section>
		<section class="content">
			<div class="progress">
                <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                  <span class="sr-only">0% Complete (success)</span>
                </div>
             </div>
			<h3>What is your Resident Role?</h3>
             <form action="sql_insert_brgy_role.php" method="POST">
             	<div class="option-content">
				<div class="options">
				    <label class="option">
				        <input type="checkbox" name="brgy_role[]" id="house_hold_head" value="house_hold_head">
				        <div class="option-content">
				            <h4>HOUSE HOLD HEAD</h4>
				            <h4><i class="ion-android-checkbox-outline"></i></h4>
				        </div>
				        <div class="on-checked"></div>
				    </label>
				    <label class="option">
				        <input type="checkbox" name="brgy_role[]" id="family_head" value="family_head">
				        <div class="option-content">
				            <h4>FAMILY HEAD</h4>
				            <h4><i class="ion-android-checkbox-outline"></i></h4>
				        </div>
				        <div class="on-checked"></div>
				    </label>
				    <label class="option">
				        <input type="checkbox" name="brgy_role[]" id="member" value="member">
				        <div class="option-content">
				            <h4>MEMBER</h4>
				            <h4><i class="ion-android-checkbox-outline"></i></h4>
				        </div>
				        <div class="on-checked"></div>	
				    </label>
				</div>
				</div>
				<hr>

				<div class="col-md-6" id="hhh_panel" style="display: none">
					<h3>Household informations</h3><br>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								 <label for="">House Number</label> 
								 	<input type="text" name="hh_number" value="" placeholder="For example #1111" class="form-control">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								 <label for="">Purok</label> 
								 	<select name="purok" class="form-control">
								 		<!---SELECT PUROK NUMBER VIA PUROK NUMBER PER BARANGAY--->
								 		<?php 
								 			$select_brgy = mysqli_query($conn, "SELECT brgy_id FROM `dbl_bmis_users` WHERE user_id = $id");
								 			$row_select_brgy = mysqli_fetch_array($select_brgy);
								 			$brgy_id = $row_select_brgy['brgy_id'];
								 			$select_purok = mysqli_query($conn, "SELECT bergy_number_of_purok FROM `tbl_brgy_list` WHERE brgy_id = $brgy_id");
								 			$row_select_purok = mysqli_fetch_array($select_purok);
								 			$brgy_number_of_purok = $row_select_purok['bergy_number_of_purok'];
								 			for ($i=0; $i < $brgy_number_of_purok; $i++) { 
								 				$ii = $i + 1;
								 				echo '<option value="'.$ii.'">PUROK '.$ii.'</option>';
								 			}
								 		?>
								 	</select>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-6" id="fh_panel" style="display: none">
					<h3>Family Head Information</h3><br>
					<div class="row">
						<div class="col-md-12">
							<div class="alert alert-success alert-dismissible">
			                    <h4><i class="icon fa fa-check"></i>You're being registered as family head</h4>
			                    
			                </div>
			                <div class="col-md-12" id="not-hh">
			                	<div class="form-group">
			                		<label for="">WHO IS YOUR HOUSEHOLD HEAD?</label>
			                		<select name="householdhead" id="" class="form-control">
			                			<?php 
			                				$select_data = mysqli_query($conn, "SELECT a.pi_last_name, a.pi_first_name, a.pi_middle_name, a.pi_resident_id FROM tbl_personal_info a, tbl_household_head b WHERE a.pi_resident_id = b.pi_resident_id AND pi_brgy_id = $brgy_id");
			                				while ($roww = mysqli_fetch_array($select_data)) {
			                					echo "<option value='".$roww['pi_resident_id']."'>".$roww['pi_resident_id']." - ".$roww['pi_last_name'].", ".$roww['pi_first_name']." ".$roww['pi_middle_name']."</option>";
			                				}
			                			?>
			                		</select>
			                	</div>
			                </div>
						</div>	
					</div>
				</div>
				<div class="col-md-4" id="m_panel" style="display: none">
					<h3>Member informations</h3><br>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
			                		<label for="">WHO IS YOUR FAMILY HEAD?</label>
			                		<select name="family_head" id="" class="form-control">
			                			<?php 
			                				$select_data = mysqli_query($conn, "SELECT a.pi_last_name, a.pi_first_name, a.pi_middle_name, a.pi_resident_id FROM tbl_personal_info a, tbl_family_head b WHERE a.pi_resident_id = b.pi_resident_id AND pi_brgy_id = $brgy_id");
			                				while ($roww = mysqli_fetch_array($select_data)) {
			                					echo "<option value='".$roww['pi_resident_id']."'>".$roww['pi_resident_id']." - ".$roww['pi_last_name'].", ".$roww['pi_first_name']." ".$roww['pi_middle_name']."</option>";
			                				}
			                			?>
			                		</select>
			                	</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
			                		<label for="">WHO IS YOUR FAMILY HEAD?</label>
			                		<select name="family_role" id="" class="form-control">
			                			<option value="child">Child</option>
										<option value="wife">Wife</option>
			                		</select>
			                	</div>
						</div>
					</div>
				</div>
				<button type="submit" name="submit" value="<?php echo $resid ?>" class="btn btn-info btn-lg" style="float: right; margin-right:10px;">CONTINUE</button>
             </form>
		</section>
	</div>
</div>
<script>
	$('form input[type=checkbox]').change(function() {
		var val = $(this).val();
		if ($('#house_hold_head').is(':checked')) {
			$("#member").prop('checked', false);
			$("#hhh_panel").show();
			$("#not-hh").hide();
		}
		else {
			$("#hhh_panel").hide();
			$("#not-hh").show();
		}
		if ($('#family_head').is(':checked')) {
			$("#member").prop('checked', false);
			$("#fh_panel").show();
		}
		else {
			$("#fh_panel").hide();
		}
		if ($('#member').is(':checked')) {
			$("#house_hold_head").prop('checked', false);
			$("#family_head").prop('checked', false);
			$("#m_panel").show();
		}
		else {
			$("#m_panel").hide();
		}

	});
</script>
</body>
</html>