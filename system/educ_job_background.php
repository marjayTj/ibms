<?php 
include'conn.php';
session_start();
if (!isset($_SESSION['id'])) {
	header("location:index.php");
}
$id = $_SESSION['id'];
?><?php include'select_from_user.php'; 
if (isset($_GET['resid'])) {
	$resid = $_GET['resid'];
}
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
			<h4>Insert new Record / Educational Background / Job details</h4>
		</section>
		<section class="content">
			<div class="progress">
                <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                  <span class="sr-only">0% Complete (success)</span>
                </div>
             </div>
			<h3>EDUCATIONAL BACKGROUND</h3>
			<form action="sql_insert_educ_job.php" method="POST">
			<div class="row">
				<div class="col-md-8">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="">
										<input type="checkbox" name="elem_check" id="elem_check"> PRIMARY/ELEMENTARY SCHOOL
									</label>
									<input type="text" name="elem_input" value="" placeholder="Name of School. Ex: Juan Elementary School" id="elem_input" class="form-control" style="display: none">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="">
										<input type="checkbox" name="hs_check" id="hs_check"> SECONDARY/HIGH SCHOOL
									</label>
									<input type="text" name="hs_input" value="" placeholder="Name of School. Ex: Juan Natinal High School" id="hs_input" class="form-control" style="display: none">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="">
										<input type="checkbox" name="col_check" id="col_check"> TERTIARY/COLLEGE	
									</label>
									<input type="text" name="col_input" value="" placeholder="Name of School. Ex: Juan State University" id="col_input" class="form-control" style="display: none">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="">
										<input type="checkbox" name="deg_check" id="deg_check"> DEGREE EARNED	
									</label>
									<input type="text" name="deg_input" value="" placeholder="Name of School. Ex: bachelor of science in information technology" id="deg_input" class="form-control" style="display: none">
								</div>
							</div>
						</div>	
				</div>
			</div>
			<h3>JOB STATUS</h3>
             	<div class="option-content">
				<div class="options">
				    <label class="option">
				        <input type="radio" name="job_desc[]" id="house_hold_head" value="unemployed">
				        <div class="option-content">
				            <h4>UNEMPLOYED</h4>
				            <h4><i class="ion-android-checkbox-outline"></i></h4>
				        </div>
				        <div class="on-checked"></div>
				    </label>
				    <label class="option">
				        <input type="radio" name="job_desc[]" id="family_head" value="employed">
				        <div class="option-content">
				            <h4>EMPLOYEE</h4>
				            <h4><i class="ion-android-checkbox-outline"></i></h4>
				        </div>
				        <div class="on-checked"></div>
				    </label>
				    <label class="option">
				        <input type="radio" name="job_desc[]" id="member" value="selfemployed">
				        <div class="option-content">
				            <h4>SELF-EMPLOYED</h4>
				            <h4><i class="ion-android-checkbox-outline"></i></h4>
				        </div>
				        <div class="on-checked"></div>	
				    </label>
				</div>
				</div>
				<hr>

				<div class="col-md-12" id="hhh_panel" style="display: none">
					<div class="row">
						<div class="alert alert-warning alert-dismissible">
			                    UNEMPLOYED
			                </div>
					</div>
				</div>

				<div class="col-md-12" id="fh_panel" style="display: none">
					<h3>EMPLOYEE</h3><br>
					<div class="container">	
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Business Sector</label>
									<input type="text" name="sector" value="" placeholder="" class="form-control">
								</div>
								<div class="form-group">
									<label for="">Business Employer</label>
									<input type="text" name="employer" value="" placeholder="" class="form-control">
								</div>
								<div class="form-group">
									<label for="">Position</label>
									<input type="text" name="position" value="" placeholder="" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Salary</label>
									<input type="text" name="salary" value="" placeholder="" class="form-control">
								</div>
								<div class="form-group">
									<label for="">Business Address</label>
									<input type="text" name="address" value="" placeholder="" class="form-control">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12" id="m_panel" style="display: none">
					<h3>SELF-EMPLOYED</h3><br>
					<div class="row">
						<br>
						<div class="container">
							<div class="form-group">
								<label for="">Business Name</label>
								<input type="text" name="business_name" value="" placeholder="" class="form-control"  style="width: 50%">
							</div>
							<div class="form-group">
								<label for="">Business Address</label>
								<input type="text" name="business_address" value="" placeholder="" class="form-control"  style="width: 50%">
							</div>
						</div>
					</div>
				</div>
				<button type="submit" name="submit" value="<?php echo $resid ?>" class="btn btn-info btn-lg">CONTINUE</button>
             <br>
             </form>
		</section>
	</div>
</div>
<script src="plugins/iCheck/icheck.min.js"></script>
<script>	
	$('input[type=radio]').change(function() {
		var val = $(this).val();
		if ($('#house_hold_head').is(':checked')) {
			$("#hhh_panel").show();
		}
		else {
			$("#hhh_panel").hide();
		}
		if ($('#family_head').is(':checked')) {
			$("#fh_panel").show();
		}
		else {
			$("#fh_panel").hide();
		}
		if ($('#member').is(':checked')) {
			$("#m_panel").show();
		}
		else {
			$("#m_panel").hide();
		}

	});
	////////////////////////////////////////////
	//educational background
	///////////////////////////////////////////
	
		  $("#elem_check").change(function() {
		    var checked= $(this).is(':checked');
		    if(!checked) {
		     	$("#elem_input").hide();
		     }
		     else {
		     	$("#elem_input").show();
		     }
		  });
		   $("#hs_check").change(function() {
		    var checked= $(this).is(':checked');
		    if(!checked) {
		     	$("#hs_input").hide();
		     }
		     else {
		     	$("#hs_input").show();
		     }
		  });
		    $("#col_check").change(function() {
		    var checked= $(this).is(':checked');
		    if(!checked) {
		     	$("#col_input").hide();
		     }
		     else {
		     	$("#col_input").show();
		     }
		  });
		     $("#deg_check").change(function() {
		    var checked= $(this).is(':checked');
		    if(!checked) {
		     	$("#deg_input").hide();
		     }
		     else {
		     	$("#deg_input").show();
		     }
		  });
</script>
</body>
</html>