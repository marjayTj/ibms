<?php 
include'conn.php';
session_start();
if (!isset($_SESSION['id'])) {
	header("location:index.php");
} 
include'select_from_user.php'; 

if ($row['user_level'] > 4) {
	header("location:dashboard.php");
}
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
		<section class="content">
			
		<!--<a href="insert_new_record_personal_info.php" class="btn btn-info btn-lg">Insert New Record</a>-->
		<br> <h4>List of all barangay</h4> <br>
		<div class="container-fluid">
	      <table id="ready" class="table table-striped table-bordered" style="width:100%">
	        <thead>
	        <tr>
	          <th>##</th>
	          <th>Barangay name</th>
	          <th>Total population</th>
	          <th>number of puroks</th>
	          <th>...</th>
	        </tr>
	        </thead>
	        <tbody>
	            <?php 
	            	$select_all_brgy = mysqli_query($conn, "SELECT * FROM `tbl_brgy_list` ORDER BY `tbl_brgy_list`.`brgy_name` ASC");
	            	$num = 1;
	            	while ($row = mysqli_fetch_array($select_all_brgy)) {
	            		$new_num = $num++;
	            		echo "<tr>
								<td>".$new_num."</td>
								<td>".$row['brgy_name']."</td>
								<td> N/A </td>";
	            		if ($row['bergy_number_of_purok'] == 0) {
	            				echo "<td> N/A </td>";
	            		}
	            		else {
								echo "<td>".$row['bergy_number_of_purok']."</td>";	
	            		}
	            		echo "<td> <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal".$row['brgy_id']."'>More info </button> </td>";

	            			echo '<div class="modal fade" id="exampleModal'.$row['brgy_id'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="exampleModalLabel">'.$row['brgy_name'].'</h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">';
								      //panel 1
								      	echo "<div id='panel1".$row['brgy_id']."'>";
								        echo "<div class='row'>		<div class='col-md-4'>number of puroks : 
								        <input type='' name='' id='bergy_number_of_purok".$row['brgy_id']."' value='".$row['bergy_number_of_purok']."' placeholder='' class='form-control'></div>";
								        echo "	<div class='col-md-8'>Barangay name : 
								        <input type='' name='' id='brgy_name".$row['brgy_id']."' value='".$row['brgy_name']."' placeholder='' class='form-control'></div></div>";

								        echo "<hr>";

								        echo "ACCOUNTS <br><br>";

								        echo "
											<div class='row'>
												<div class='col-md-4'>
													Brgy. Captain <br>
													<a href='check_accounts.php?brgy_id=".$row['brgy_id']."&&user_type=3'>View Account>>></a>
												</div>
												<div class='col-md-4'>
													Brgy. Secretary <br>
													<a href='check_accounts.php?brgy_id=".$row['brgy_id']."&&user_type=2'>View Account>>></a>
												</div>
												<div class='col-md-4'>
													Brgy. Health worker <br>
													<a href='check_accounts.php?brgy_id=".$row['brgy_id']."&&user_type=1'>View Account>>></a>
												</div>
											</div>
								        ";
								        echo "</div>";
								        // end of panel 1

								        //panel 2
								        echo "<div id='panel2".$row['brgy_id']."' style='display:none'>"; ?>
								        
											<div class="container-fluid" style="width: 60%">
												<div class="login_error_message"></div>
												<div class="align-center">
													<center><small style="color:red">"Please verify to save changes"</small></center>
													<div class="form-group has-feedback">
												        <input type="text" class="form-control" id="username<?php echo $row['brgy_id']?>" placeholder="Username">
												        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
												      </div>
												      <div class="form-group has-feedback">
												        <input type="password" class="form-control" id="password<?php echo $row['brgy_id']?>" placeholder="Password">
												        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
												      </div>
													<button class="btn btn-info" id="verify<?php echo $row['brgy_id']?>">Verify</button>
												</div>
											</div>	
								        <?php echo"</div>";
								      echo '</div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-secondary" id="cancel'.$row['brgy_id'].'" style="display:none">Cancel</button>
								        <button type="button" class="btn btn-primary" id="saveChange'.$row['brgy_id'].'">Save changes</button>
								      </div>
								    </div>
								  </div>
								</div>'; ?>

								<script>
									$("#saveChange<?php echo $row['brgy_id']?>").click(function() {
										$("#panel1<?php echo $row['brgy_id']?>").hide();
										$("#panel2<?php echo $row['brgy_id']?>").show();
										$("#cancel<?php echo $row['brgy_id']?>").show();

									});
									$("#cancel<?php echo $row['brgy_id']?>").click(function() {
										$("#panel1<?php echo $row['brgy_id']?>").show();
										$("#panel2<?php echo $row['brgy_id']?>").hide();
										$("#cancel<?php echo $row['brgy_id']?>").hide();
										$("#password").val('');
										$("#username").val('');
									});
									$("#verify<?php echo $row['brgy_id']?>").click(function() {
									login<?php echo $row['brgy_id']?>();
									});
									function login<?php echo $row['brgy_id']?>() {
										 var username = $('#username<?php echo $row['brgy_id']?>').val();
										 var password = $('#password<?php echo $row['brgy_id']?>').val();
										 if (username == "" && password == "") {
										  $('.login_error_message').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-times"></i> FAILED TO VERIFY!</h4>Please enter username and password</div>');
										 }
										 else {
										   $.post("verify.php", {username: username, password: password}, function(data) {
										      if (data == "success") {



										      	var brgy_name<?php echo $row['brgy_id']?> = $("#brgy_name<?php echo $row['brgy_id']?>").val();
										      	var bergy_number_of_purok<?php echo $row['brgy_id']?> =  $("#bergy_number_of_purok<?php echo $row['brgy_id']?>").val();
										      	 $.post("sql_change_brgy_details.php", {brgy_id: "<?php echo $row['brgy_id'] ?>", brgy_name: brgy_name<?php echo $row['brgy_id']?>, bergy_number_of_purok: bergy_number_of_purok<?php echo $row['brgy_id']?>}, function(data) {
										      	 		if (data == "success") {
															$("#panel1<?php echo $row['brgy_id']?>").show();
															$("#panel2<?php echo $row['brgy_id']?>").hide();
															$("#cancel<?php echo $row['brgy_id']?>").hide();
										      	 		}
         											});

										      }
										      else {
										        $('.login_error_message').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-times"></i> FAILED TO VERIFY!</h4>Incorrect Username or Password</div>');
										      }
										   });
										 }
										}

								$(document).keypress(function(event){
								  var keycode = (event.keyCode ? event.keyCode : event.which);
								  if(keycode == '13'){
								    login<?php echo $row['brgy_id']?>();
								  }
								});
								</script>

	            			 <?php echo "</tr>";


	            	}
	            ?>
	        </tbody>

	      </table>
	    </div>	
	    <!--section-->
		</section>
	</div>
</div>
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="dist/js/app.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
	$(document).ready(function() {
      $('#ready').DataTable();
  });
</script>
</body>
</html>