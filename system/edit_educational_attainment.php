<?php 
include'conn.php';

if(isset($_GET['id'])) 
    $resid = $_GET['id'];
    $elem_val = "";
    $hs_val = "";
    $col_val = "";
    $deg_val = "";
    $get_data = mysqli_query($conn, "SELECT * FROM `tbl_educational_background` WHERE pi_resident_id = '$resid'") or die(mysqli_error());
    while($row_data = mysqli_fetch_array($get_data)) {
        if($row_data['schl_level'] == "1") {
            $elem_val = $row_data['schl_name'];
        }
        if($row_data['schl_level'] == "2") {
            $hs_val = $row_data['schl_name'];
        }
        if($row_data['schl_level'] == "3") {
            $col_val = $row_data['schl_name'];
        }
        if($row_data['schl_level'] == "4") {
            $deg_val = $row_data['schl_name'];
        }
    }
?>
<div class="row">
    <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">
                            <input type="checkbox" name="elem_check" id="elem_check"> PRIMARY/ELEMENTARY SCHOOL
                        </label>
                        <div class="col-lg-12">
                            <div class="input-group" id="elem_input" style="display: none">
                            <input type="text" id="elem_val" value="<?php echo $elem_val?>" placeholder="Name of School. Ex: Juan Elementary School"class="form-control">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button" id="submit_elem_val">Update</button>
                                <script>
                                    $("#submit_elem_val").click(function() {
                                        var resid = "<?php echo $resid;?>";
                                        var schl_level = 1;
                                        var new_elem_val = $("#elem_val").val();
                                        //alert(resid);
                                        $.post("sql_edit_educ_attain.php", {
                                            resid : resid,
                                            schl_level : schl_level,
                                            new_elem_val : new_elem_val
                                        }, function(data) {
                                           
                                        });
                                    });
                                </script>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">
                            <input type="checkbox" name="hs_check" id="hs_check"> SECONDARY/HIGH SCHOOL
                        </label>
                        <div class="col-lg-12">
                            <div class="input-group" id="hs_input" style="display: none">
                            <input type="text" id="hs_val" value="<?php echo $hs_val?>" placeholder="Name of School. Ex: Juan Natinal High School" class="form-control">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button" id="submit_hs_val">Update</button>
                                <script>
                                    $("#submit_hs_val").click(function() {
                                        var resid = "<?php echo $resid;?>";
                                        var schl_level = 2;
                                        var new_elem_val = $("#hs_val").val();
                                        //alert(resid);
                                        $.post("sql_edit_educ_attain.php", {
                                            resid : resid,
                                            schl_level : schl_level,
                                            new_elem_val : new_elem_val
                                        }, function(data) {
                                           
                                        });
                                    });
                                </script>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">
                            <input type="checkbox" name="col_check" id="col_check"> TERTIARY/COLLEGE	
                        </label>
                        <div class="col-lg-12">
                            <div class="input-group" id="col_input" style="display: none">
                            <input type="text" id="col_val" value="<?php echo $col_val?>" placeholder="Name of School. Ex: Juan State University" class="form-control">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button" id="submit_col_val">Update</button>
                                <script>
                                    $("#submit_col_val").click(function() {
                                        var resid = "<?php echo $resid;?>";
                                        var schl_level = 3;
                                        var new_elem_val = $("#col_val").val();
                                        //alert(resid);
                                        $.post("sql_edit_educ_attain.php", {
                                            resid : resid,
                                            schl_level : schl_level,
                                            new_elem_val : new_elem_val
                                        }, function(data) {
                                           
                                        });
                                    });
                                </script>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">
                            <input type="checkbox" name="deg_check" id="deg_check"> DEGREE EARNED	
                        </label>
                        <div class="col-lg-12">
                            <div class="input-group" id="deg_input"  style="display: none">
                            <input type="text" id="deg_val" value="<?php echo $deg_val?>" placeholder="Name of School. Ex: bachelor of science in information technology" class="form-control">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button" id="submit_deg_val">Update</button>
                                <script>
                                    $("#submit_deg_val").click(function() {
                                        var resid = "<?php echo $resid;?>";
                                        var schl_level = 4;
                                        var new_elem_val = $("#deg_val").val();
                                        //alert(resid);
                                        $.post("sql_edit_educ_attain.php", {
                                            resid : resid,
                                            schl_level : schl_level,
                                            new_elem_val : new_elem_val
                                        }, function(data) {
                                           
                                        });
                                    });
                                </script>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>	
    </div>
</div>
<script>	
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