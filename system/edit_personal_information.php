<?php 
include'conn.php';

if(isset($_GET['id'])) 
    $resid = $_GET['id'];
    $get_data = mysqli_query($conn, "SELECT * FROM `tbl_personal_info` WHERE pi_resident_id = '$resid'") or die(mysqli_error($conn));
    $row_data = mysqli_fetch_array($get_data);
?>
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
<form action="sql_edit_personal_information.php?id=<?php echo $resid;?>" method="POST" enctype="multipart/form-data">
<div class="row">
<div class="col-md-4">
    <div class="avatar-upload">
        <div class="avatar-edit">
            <input type='file' name="file" id="imageUpload" accept=".png, .jpg, .jpeg" val />
            <label for="imageUpload"></label>
        </div>
        <div class="avatar-preview">
            <div id="imagePreview" style="background-image: url(<?php echo $row_data['pi_photo_dir'];?>);">
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
                <input type="text" name="last_name" value="<?php echo $row_data['pi_last_name'] ?>" placeholder="" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>First name</label>
                <input type="text" name="first_name" value="<?php echo $row_data['pi_first_name'] ?>" placeholder="" class="form-control">
            </div>
        </div>	
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label>Middle name</label>
                <input type="text" name="middle_name" value="<?php echo $row_data['pi_middle_name'] ?>" placeholder="" class="form-control">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Extension name</label>
                <input type="text" name="ext_name" value="<?php echo $row_data['pi_extension_name'] ?>" placeholder="&#8220;leave it blank if NONE&#8221;" class="form-control">
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
                <input type="date" name="birthdate" value="<?php echo $row_data['pi_birth_date'] ?>" placeholder="" class="form-control">
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
                <input type="tel" name="phone_number" value="<?php echo $row_data['pi_cp_number'] ?>" placeholder="+63" class="form-control">
            </div>
        </div>
            
    </div>

</div>
<!---------------right side form------------------->
</div>
<!------------------modals------------------>
<!------------------modals------------------>
<button type="submit" name="submit" class="btn btn-info pull-right" >Update Personal Info</button>
</form>


<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>

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
</script>