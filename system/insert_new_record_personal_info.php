<!--------------------------------------------------------------->
<!-------------------------FIRST FORM---------------------------->
<!--------------------------------------------------------------->
<?php 
include'conn.php';
session_start();
if (!isset($_SESSION['id'])) {
	header("location:index.php");
} 
include'select_from_user.php'; 

$brgy_id = $row['brgy_id'];
if ($row['user_level'] == 1) {
	header("location:dashboard.php");
}
include'include_new_record_functions.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include'include/links.php' ?>
	<style type="text/css" media="screen">
		.avatar-upload {
		  position: relative;
		  max-width: 205px;
		  margin: 50px auto;
		}
		.avatar-upload .avatar-edit {
		  position: absolute;
		  right: 12px;
		  z-index: 1;
		  top: 10px;
		}
		.avatar-upload .avatar-edit input {
		  display: none;
		}
		.avatar-upload .avatar-edit input + label {
		  display: inline-block;
		  width: 34px;
		  height: 34px;
		  margin-bottom: 0;
		  border-radius: 100%;
		  background: #FFFFFF;
		  border: 1px solid transparent;
		  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
		  cursor: pointer;
		  font-weight: normal;
		  transition: all 0.2s ease-in-out;
		}
		.avatar-upload .avatar-edit input + label:hover {
		  background: #f1f1f1;
		  border-color: #d6d6d6;
		}
		.avatar-upload .avatar-edit input + label:after {
		  content: "\f040";
		  font-family: 'FontAwesome';
		  color: #757575;
		  position: absolute;
		  top: 10px;
		  left: 0;
		  right: 0;
		  text-align: center;
		  margin: auto;
		}
		.avatar-upload .avatar-preview {
		  width: 192px;
		  height: 192px;
		  position: relative;
		  border-radius: 100%;
		  border: 6px solid 
		  	<?php if (isset($_GET['error'])) {
			$error = $_GET['error'];
				if ($error == "invalidimage") {
					echo "#e74c3c";
				}	
			}
			else {
					echo "#F8F8F8";
				} ?>;
		  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
		}
		.avatar-upload .avatar-preview > div {
		  width: 100%;
		  height: 100%;
		  border-radius: 100%;
		  background-size: cover;
		  background-repeat: no-repeat;
		  background-position: center;
		}

	</style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
	<?php include'include/header.php' ?>

	<div class="content-wrapper">
		<section class="content-header">
			<h4>Insert new Record / Personal Information</h4>
		</section>
		<section class="content">
			<div class="progress">
                <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                  <span class="sr-only">0% Complete (success)</span>
                </div>
             </div>
			<!-----------FORM FOR PERSONAL INFORMATION----------------->
			<form action="sql_insert_personal_info.php" method="POST" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-4">
						<div class="avatar-upload">
					        <div class="avatar-edit">
					            <input type='file' name="file" id="imageUpload" accept=".png, .jpg, .jpeg" />
					            <label for="imageUpload"></label>
					        </div>
					        <div class="avatar-preview">
					            <div id="imagePreview" style="background-image: url(dist/img/avaatar.png);">
					            </div>
					        </div>
					    </div>
					    <center><h3 style="margin-top:-25px">Upload Picture</h3></center>
				    </div>
				    <!---------------right side form------------------->
				    <div class="col-md-8">
				    	<br><br>
				    	<div class="row">
				    		<div class="col-md-6">
				    			<div class="form-group">
				    				<label>Last name</label>
				    				<input type="text" name="last_name" value="<?php get_lname(); ?>" placeholder="" class="form-control">
				    			</div>
				    		</div>
				    		<div class="col-md-6">
				    			<div class="form-group">
				    				<label>First name</label>
				    				<input type="text" name="first_name" value="<?php get_fname(); ?>" placeholder="" class="form-control">
				    			</div>
				    		</div>	
				    	</div>
				    	<div class="row">
				    		<div class="col-md-3">
				    			<div class="form-group">
				    				<label>Middle name</label>
				    				<input type="text" name="middle_name" value="<?php get_mname() ?>" placeholder="" class="form-control">
				    			</div>
				    		</div>
				    		<div class="col-md-3">
				    			<div class="form-group">
				    				<label>Extension name</label>
				    				<input type="text" name="ext_name" value="<?php get_extname(); ?>" placeholder="&#8220;leave it blank if NONE&#8221;" class="form-control">
				    			</div>
				    		</div>
				    		<div class="col-md-2">
				    			<div class="form-group">
				    				<label>Gender</label>
				    				<select name="gender" id="" class="form-control">
				    					<option value="male">MALE</option>
				    					<option value="female">FEMALE</option>
				    				</select>
				    			</div>
				    		</div>
				    		<div class="col-md-4">
				    			<div class="form-group">
				    				<label>Birthdate</label>
				    				<input type="date" name="birthdate" value="" placeholder="" class="form-control">
				    			</div>
				    		</div> 
						</div>

				    	<div class="row">
				    		<div class="col-md-4">
				    			<div class="form-group">
				    				<label>Civil status</label>
				    				<select name="civil_status" class="form-control" id="ext_name">
				    					<option value="single">SINGLE</option>
				    					<option value="married">MARRIED</option>
				    					<option value="divorced">DIVORCED</option>
				    					<option value="separated">SEPARATED</option>
				    					<option value="widowed">WIDOWED</option>
				    				</select>	
				    			</div>
				    		</div>
				    		<div class="col-md-4">
				    			<div class="form-group">
				    				<label>Religion</label>
				    				<select name="religion" id="religion" class="form-control">
				    					<?php
				    						$select_rel_type = mysqli_query($conn, "SELECT * FROM tbl_religion");
				    						while ($ext_rel_row = mysqli_fetch_array($select_rel_type)) {
				    							echo '<option value="'.$ext_rel_row['rel_type'].'">'.$ext_rel_row['rel_type'].'</option>';
				    						}
				    					?>
				    					<option value="other">OTHER</option>
				    				</select>
				    			</div>
				    		</div>
				    		<div class="col-md-4">
				    			<div class="form-group">
				    				<label>Phone number</label>
				    				<input type="tel" name="phone_number" value="<?php get_cpnumber(); ?>" placeholder="+63" class="form-control">
				    			</div>
				    		</div>
				    			
				    	</div>

				    </div>
				    <!---------------right side form------------------->
			    </div>

			    <!------------------modals------------------>
				<!------------------modals------------------>
				<div class="modal fade bd-example-modal-sm" id="modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-sm">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        <input type="text" name="other_religion" value="" placeholder="Other religion" class="form-control">
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">SAVE</button>
				      </div>
				    </div>
				  </div>
				</div>
				<!------------------modals------------------>
				<!------------------modals------------------>
			    <button type="submit" name="submit" value="<?php echo $brgy_id; ?>" class="btn btn-info btn-lg" style="float: right; margin-right:10px;">CONTINUE</button>
			</form>
			<!-----------FORM FOR PERSONAL INFORMATION----------------->
		</section>
	</div>
</div>


<script>
	function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
});


$.fn.capitalize = function() {
$.each(this, function() {
    this.value = this.value.replace(/\b[a-z]/gi, function($0) {
        return $0.toUpperCase();
    });
    this.value = this.value.replace(/@([a-z])([^.]*\.[a-z])/gi, function($0, $1) {
        console.info(arguments);
        return '@' + $0.toUpperCase() + $1.toLowerCase();
    });
});
}

$("input[type=text]").keyup(function() {
    $(this).capitalize();
}).capitalize();

$('#religion').change(function() {
	var $option = $(this).find('option:selected');
	var value = $option.val();
	if (value == "other") {
		$('#modal').modal('show');
	}
});

//
//reference in preloaded php in select tag value==
//https://stackoverflow.com/questions/5589629/value-attribute-on-select-tag-not-selecting-default-option
//=================================================
</script>
</body>
</html>