<?php 
include'conn.php';

if(isset($_GET['id'])) 
	$resid = $_GET['id'];
	$ed_sector = "";
	$ed_position = "";
	$ed_employer = "";
	$ed_address = "";
	$ed_salary = "";
	$sed_name_of_business = "";
	$sed_address = "";
    $get_data = mysqli_query($conn, "SELECT * FROM `tbl_work_details` WHERE pi_resident_id = '$resid'") or die(mysqli_error());
	$row_data = mysqli_fetch_array($get_data);

	if(empty($row_data)){
		//some useful codes here
	}
	else {
		if($row_data['wd_status'] == "unemployed") {
			//echo "unemployed";
		}
		if($row_data['wd_status'] == "employed") {
			$select_employment_details = mysqli_query($conn, "SELECT * FROM `tbl_employee_details` WHERE pi_resident_id = '$resid'");
			$row_ed = mysqli_fetch_array($select_employment_details);
			$ed_sector = $row_ed['ed_sector'];
			$ed_position = $row_ed['ed_position'];
			$ed_employer = $row_ed['ed_employer'];
			$ed_address = $row_ed['ed_address'];
			$ed_salary = $row_ed['ed_salary'];
		}
		if($row_data['wd_status'] == "self-employed") {
			//echo "selfemployed";
			$select_self_employment_details = mysqli_query($conn, "SELECT * FROM `tbl_self_employed_details` WHERE pi_resident_id = '$resid'");
			$row_sed = mysqli_fetch_array($select_self_employment_details);
			$sed_name_of_business = $row_sed['sed_name_of_business'];
			$sed_address = $row_sed['sed_address'];
		}
	}
	
?>
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
<div class="alert alert-success alert-dismissible" id="success-box" style="display:none"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-times"></i> Successfully updated!</h4></div>	
<div class="option-content">
<div class="options">
    <label class="option">
        <input type="radio" name="job_desc[]" id="unemployed" value="unemployed">
        <div class="option-content">
            <h4>UNEMPLOYED</h4>
            <h4><i class="ion-android-checkbox-outline"></i></h4>
        </div>
        <div class="on-checked"></div>
    </label>
    <label class="option">
        <input type="radio" name="job_desc[]" id="employee" value="employed">
        <div class="option-content">
            <h4>EMPLOYEE</h4>
            <h4><i class="ion-android-checkbox-outline"></i></h4>
        </div>
        <div class="on-checked"></div>
    </label>
    <label class="option">
        <input type="radio" name="job_desc[]" id="self_employ" value="selfemployed">
        <div class="option-content">
            <h4>SELF-EMPLOYED</h4>
            <h4><i class="ion-android-checkbox-outline"></i></h4>
        </div>
        <div class="on-checked"></div>	
    </label>
</div>
</div>
<hr>

<div class="col-md-12" id="unemployed_panel" style="display: none">
    <div class="row">
        <div class="alert alert-warning alert-dismissible">
                UNEMPLOYED
            </div>
    </div>
	<?php if(empty($row_data)){?> 
		<button class="btn btn-primary pull-right" id="unemployed_button">Update to unemployed</button>
		<script>
			$("#unemployed_button").click(function(){
				var resid = "<?php echo $resid?>";
				var employment_new_status = "unemployed";
				$.post("sql_insert_new_employment_status.php", {
					resid : resid,
					employment_new_status : employment_new_status
				}, function(data) {
					if(data == "true") {
						$("#success-box").fadeIn("slow");
						$("#success-box").hide(5000);
					}
				});
			});
		</script>
	<?php } else { ?>
		<button class="btn btn-primary pull-right" id="unemployed_button">Update to unemployed</button>
		<script>
			$("#unemployed_button").click(function(){
				var resid = "<?php echo $resid?>";
				var employment_status = "<?php echo $row_data['wd_status']?>";
				var employment_new_status = "unemployed";
				$.post("sql_edit_employment_status.php", {
					resid : resid,
					employment_status : employment_status,
					employment_new_status : employment_new_status
				}, function(data) {
					if(data == "true") {
						$("#success-box").fadeIn("slow");
						$("#success-box").hide(5000);
					}
				});
			});
		</script>
	<?php }?>
	
</div>

<div class="col-md-12" id="employee_panel" style="display: none">
    <h3>EMPLOYEE</h3><br>
    <div class="container-fluid">	
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Business Sector</label>
                    <input type="text" id="sector" value="<?php echo $ed_sector?>" placeholder="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Business Employer</label>
                    <input type="text" id="employer" value="<?php echo $ed_employer?>" placeholder="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Position</label>
                    <input type="text" id="position" value="<?php echo $ed_position?>" placeholder="" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Salary</label>
                    <input type="text" id="salary" value="<?php echo $ed_salary?>" placeholder="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Business Address</label>
                    <input type="text" id="address" value="<?php echo $ed_address?>" placeholder="" class="form-control">
                </div>
				<?php if(empty($row_data)) {?> 
					<button class="btn btn-primary pull-right" id="insert_employed_button" style="margin-top:25px;">Update to employed</button>
					<script>
						$("#insert_employed_button").click(function(){
							var resid = "<?php echo $resid?>";
							var employment_new_status = "employed";
							var sector = $("#sector").val();
							var employer = $("#employer").val();
							var position = $("#position").val();
							var salary = $("#salary").val();
							var address = $("#address").val();
							$.post("sql_insert_new_employment_status.php", {
								resid : resid,
								employment_new_status : employment_new_status,
								sector : sector,
								employer : employer,
								position : position,
								salary : salary,
								address : address
							}, function(data) {
								if(data == "true") {
						$("#success-box").fadeIn("slow");
						$("#success-box").hide(5000);
					}
							});

						});
					</script>
				<?php } else{ ?>		
				<button class="btn btn-primary pull-right" id="edit_employed_button" style="margin-top:25px;">Update to employed</button>
				<script>
					$("#edit_employed_button").click(function(){
						var resid = "<?php echo $resid?>";
						var employment_status = "<?php echo $row_data['wd_status']?>";
						var employment_new_status = "employed";
						var sector = $("#sector").val();
						var employer = $("#employer").val();
						var position = $("#position").val();
						var salary = $("#salary").val();
						var address = $("#address").val();
						$.post("sql_edit_employment_status.php", {
							resid : resid,
							employment_status : employment_status,
							employment_new_status : employment_new_status,
							sector : sector,
							employer : employer,
							position : position,
							salary : salary,
							address : address
						}, function(data) {
							if(data == "true") {
						$("#success-box").fadeIn("slow");
						$("#success-box").hide(5000);
					}
						});

					});
				</script>
				<?php } ?>	
            </div>
        </div>
    </div>
</div>
<div class="col-md-12" id="self_employ_panel" style="display: none">
    <h3>SELF-EMPLOYED</h3><br>
    <div class="row">
        <br>
        <div class="container">
            <div class="form-group">
                <label for="">Business Name</label>
                <input type="text" id="business_name" value="<?php echo $sed_name_of_business?>" placeholder="" class="form-control"  style="width: 50%">
            </div>
            <div class="form-group">
                <label for="">Business Address</label>
                <input type="text" id="business_address" value="<?php echo $sed_address?>" placeholder="" class="form-control"  style="width: 50%">
            </div>
			<?php
				if(empty($row_data)) { ?>
				<button class="btn btn-primary" id="insert_to_self_employed">Insert to self-employed</button>
				<script>
					$("#insert_to_self_employed").click(function(){
						var resid = "<?php echo $resid?>";
						var employment_new_status = "self-employed";
						var business_name = $("#business_name").val();
						var business_address = $("#business_address").val();
						$.post("sql_insert_new_employment_status.php", {
							resid : resid,
							employment_new_status : employment_new_status,
							business_name : business_name,
							business_address : business_address
						}, function(data) {
							if(data == "true") {
						$("#success-box").fadeIn("slow");
						$("#success-box").hide(5000);
					}
						});
					});
				</script>
			<?php	}
				else { ?>	
				<button class="btn btn-primary" id="update_to_self_employed">Update to self-employed</button>
				<script>
					$("#update_to_self_employed").click(function(){
						var resid = "<?php echo $resid?>";
						var employment_status = "<?php echo $row_data['wd_status']?>";
						var employment_new_status = "self-employed";
						var business_name = $("#business_name").val();
						var business_address = $("#business_address").val();
						$.post("sql_edit_employment_status.php", {
							resid : resid,
							employment_status : employment_status,
							employment_new_status : employment_new_status,
							business_name : business_name,
							business_address : business_address
						}, function(data) {
							if(data == "true") {
						$("#success-box").fadeIn("slow");
						$("#success-box").hide(2000);
					}	
						});
					});
				</script>
				<?php }
			?>
        </div>
    </div>
</div>
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<script>	
	$('input[type=radio]').change(function() {
		var val = $(this).val();
		if ($('#unemployed').is(':checked')) {
			$("#unemployed_panel").show();
		}
		else {
			$("#unemployed_panel").hide();
		}
		if ($('#employee').is(':checked')) {
			$("#employee_panel").show();
		}
		else {
			$("#employee_panel").hide();
		}
		if ($('#self_employ').is(':checked')) {
			$("#self_employ_panel").show();
		}
		else {
			$("#self_employ_panel").hide();
		}
	});
 </script>   