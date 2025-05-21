<?php 
include'conn.php';
session_start();
if (!isset($_SESSION['id'])) {
	header("location:index.php");
}?><?php include'select_from_user.php'; 
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include'include/links.php' ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
	<?php include'include/header.php' ?>

	<div class="content-wrapper">
		<section class="content-header">
			<?php 
			if (isset($_GET['brgy_id'])) {
				$brgy_id = $_GET['brgy_id'];
				$brgy_role = $_GET['user_type'];
				?>
			<h4>OFFICIAL ACCOUNT >  <?php 
				$get_brgy = mysqli_query($conn, "SELECT * FROM `tbl_brgy_list` WHERE brgy_id = $brgy_id");
				$row_brgy = mysqli_fetch_array($get_brgy);
				echo $row_brgy['brgy_name'];
			 ?> > <?php 
			 	if ($brgy_role == 3) {
			 		echo "CAPTAIN";
			 	}
			 	if ($brgy_role == 2) {
			 		echo "SECRETARY";
			 	}
			 	if ($brgy_role == 1) {
			 		echo "HEALTH WORKER";
			 	}
			  ?></h4>
		</section>
		<section class="content">
			
				<?php
				echo $brgy_id.$brgy_role;
				$get_records = mysqli_query($conn, "SELECT * FROM `dbl_bmis_users` WHERE brgy_id = $brgy_id AND user_level = $brgy_role");
				$rowz = mysqli_fetch_array($get_records); 
				 if (!empty($rowz)) { 
					
					?>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">NAME:</label>
								<input type="text" name="" value="<?php echo $rowz['name'] ?>" placeholder="" class="form-control" disabled>
							</div>
							<div class="form-group">
								<label for="">USERNAME:</label>
								<input type="text" name="" value="<?php echo $rowz['username'] ?>" placeholder="" class="form-control" disabled>
							</div>
							<div class="form-group">
								<label for="">PASSWORD:</label>
								<input type="password" name="" value="<?php echo $rowz['password'] ?>" placeholder="" class="form-control" id="PW" disabled>
								<br><input type="checkbox" onclick="myFunction()">Show Password
							</div>
							<h4>STATUS : <span style="color:green">ACTIVE</span></h4>
							<h4>LAST LOG : <?php echo $row['last_log']; ?></h4>
						</div>
						<div class="col-md-6">
							<button type="" id="btn-edit" class="btn btn-info">EDIT ACCOUNT</button>
							<div id="edit-form" style="display: none">
								<div class="form-group">
									<label for="">NAME:</label>
									<input type="text" name="" id="edit_name" value="<?php echo $rowz['name'] ?>" placeholder="" class="form-control">
								</div>
								<div class="form-group">
									<label for="">USERNAME:</label>
									<input type="text" name="" id="edit_username" value="<?php echo $rowz['username'] ?>" placeholder="" class="form-control">
								</div>
								<div class="form-group">
									<label for="">PASSWORD:</label>
									<input type="password" name="" id="edit_password" value="<?php echo $rowz['password'] ?>" placeholder="" class="form-control">
								</div>
								<button type="" class="btn btn-warning" id="cancel">CANCEL</button> || <button type="" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">SAVE CHANGES</button>
							</div>
							
						</div>
					</div>
					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        <div class="container-fluid" style="width: 60%">
								<div class="login_error_message"></div>
								<div class="align-center">
									<center><small style="color:red">"Please verify to save changes"</small></center>
									<div class="form-group has-feedback">
								        <input type="text" class="form-control" id="username" placeholder="Username">
								        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
								      </div>
								      <div class="form-group has-feedback">
								        <input type="password" class="form-control" id="password" placeholder="Password">
								        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
								      </div>
									<button class="btn btn-info" id="verify">Verify</button>
								</div>
							</div>
					      </div>
					      <div class="modal-footer">
					      </div>
					    </div>
					  </div>
					</div>
					<script>
					
					function login() {
					 var username = $('#username').val();
					 var password = $('#password').val();
					 if (username == "" && password == "") {
					  $('.login_error_message').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-times"></i> FAILED TO LOGIN!</h4>Please enter username and password</div>');
					 }
					 else {
					   $.post("verify.php", {username: username, password: password}, function(data) {
					      if (data == "success") {
							var edit_name = $("#edit_name").val();
					      	var edit_username = $("#edit_username").val();
					      	var edit_password = $("#edit_password").val();
					        $.post("sql_edit_accounts.php", {brgy_id : "<?php echo $brgy_id ?>", brgy_role : <?php echo $brgy_role; ?> ,edit_name: edit_name, edit_username: edit_username, edit_password : edit_password}, function(data) {
					        	if (data == "success") {
					        		 location.reload(true);
					        	}
					        	else {
					        		alert(data);
					        	}
					      });
					      }
					      else {
					        $('.login_error_message').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-times"></i> FAILED TO LOGIN!</h4>Incorrect Username or Password</div>');
					      }
					   });
					 }
					}

					$(document).keypress(function(event){
					  var keycode = (event.keyCode ? event.keyCode : event.which);
					  if(keycode == '13'){
					    login();
					  }
					});
					$("#verify").click(function(){
					  login();
					});
					</script>

				<?php
			} else {
				?>
					<h3>No records Available</h3>
				<div class="col-md-6">
				<button type="" id="btn-edit" class="btn btn-info">ADD ACCOUNT</button>
				<div id="edit-form" style="display: none">
					<div class="form-group">
						<label for="">NAME:</label>
						<input type="text" name="" id="edit_name" value="<?php echo $rowz['name'] ?>" placeholder="" class="form-control">
					</div>
					<div class="form-group">
						<label for="">USERNAME:</label>
						<input type="text" name="" id="edit_username" value="<?php echo $rowz['username'] ?>" placeholder="" class="form-control">
					</div>
					<div class="form-group">
						<label for="">PASSWORD:</label>
						<input type="password" name="" id="edit_password" value="<?php echo $rowz['password'] ?>" placeholder="" class="form-control">
					</div>
					<button type="" class="btn btn-warning" id="cancel">CANCEL</button> || <button type="" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">SAVE CHANGES</button>
				</div>
			</div>
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        <div class="container-fluid" style="width: 60%">
								<div class="login_error_message"></div>
								<div class="align-center">
									<center><small style="color:red">"Please verify to save changes"</small></center>
									<div class="form-group has-feedback">
								        <input type="text" class="form-control" id="username" placeholder="Username">
								        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
								      </div>
								      <div class="form-group has-feedback">
								        <input type="password" class="form-control" id="password" placeholder="Password">
								        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
								      </div>
									<button class="btn btn-info" id="verify">Verify</button>
								</div>
							</div>
					      </div>
					      <div class="modal-footer">
					      </div>
					    </div>
					  </div>
					</div>
					<script>
					
					function login() {
					 var username = $('#username').val();
					 var password = $('#password').val();
					 if (username == "" && password == "") {
					  $('.login_error_message').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-times"></i> FAILED TO LOGIN!</h4>Please enter username and password</div>');
					 }
					 else {
					   $.post("verify.php", {username: username, password: password}, function(data) {
					      if (data == "success") {
					       var name = $("#edit_name").val();
					       var username = $("#edit_username").val();
					       var password = $("#edit_password").val();
					       var brgy_role = "<?php echo $brgy_role ?>";
					       var brgy_id = "<?php echo $brgy_id ?>";

					       $.post("sql_new_accounts.php", {brgy_id : brgy_id, brgy_role , brgy_role, name : name, username : username , password : password}, function(data) {
					       	location.reload(true);
					       });
					      }
					      else {
					        $('.login_error_message').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-times"></i> FAILED TO LOGIN!</h4>Incorrect Username or Password</div>');
					      }
					   });
					 }
					}

					$(document).keypress(function(event){
					  var keycode = (event.keyCode ? event.keyCode : event.which);
					  if(keycode == '13'){
					    login();
					  }
					});
					$("#verify").click(function(){
					  login();
					});
					</script>
		
			<?php }
			}?>
		</section>
	</div>
</div>
<!--------MODAL--------->

<!--------MODAL--------->
<script>
	$("#btn-edit").click(function() {
		$("#edit-form").show();
		$("#btn-edit").hide();
	});
	$("#cancel").click(function() {
		$("#edit-form").hide();
		$("#btn-edit").show();
	});
	function myFunction() {
 		var x = document.getElementById("PW");
  		if (x.type === "password") {
	    x.type = "text";
	  } else {
	    x.type = "password";
	  }
	}
</script>
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="dist/js/app.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="plugins/iCheck/icheck.min.js"></script>
</body>
</html>