<?php 
include'conn.php';
session_start();
if (!isset($_SESSION['id'])) {
	header("location:index.php");
}?><?php include'select_from_user.php'; 
$iddd = $_GET['resid'];
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

	<div class="content-wrapper"  style="margin-bottom: 60px;">
		<section class="content-header">
			<h4>Records /  <?php echo "<a href='view_residence_profile.php?resid=".$iddd."'>".$iddd."</a>" ?> / Properties and Commodities /	</h4>
		</section>
		<section class="content">
			<div class="col-md-12">
	          <div class="nav-tabs-custom">
	            <ul class="nav nav-tabs">
	              <li class="active"><a href="#production_facilities" data-toggle="tab">Production Facilities</a></li>
	              <li><a href="#family" data-toggle="tab">Animal Products</a></li>
	              <li><a href="#products" data-toggle="tab">Products</a></li>
	            </ul>
	            <div class="tab-content">
	              <div class="active tab-pane" id="production_facilities">
	              	<!--------------------------------------------------->
	                <!---------------production facilities-------------------->
	                <!--------------------------------------------------->
	              	<div class="row">
	              		<div class="col-md-6">
	              			Select Production Facilities <sup>*If Product is not exist on the list, Check the box and enter your product</sup>
	              			<div class="input-group">
				                <span class="input-group-addon">
				                  <input type="checkbox" id="check_PF">
				                </span>
			                	<div id="input_PF"><?php include'sql_get_PF.php'?></div>
			            	</div>
	              		</div>
	              		<div class="col-md-4">
	              			Ownership
	              			<div class="input-group">
				                <span class="input-group-addon">
				                  
				                </span>
	              				<select name=""class="form-control" id=PF_ownership>
	              					<option value="owned">Owned</option>
	              					<option value="granted">Granted</option>
	              				</select>
			            	</div>
	              		</div>
	              		<div class="col-md-2">
	              			Quantity
	              			<div class="input-group">
				                <span class="input-group-addon">
				                  
				                </span>
	              				<input type="number" id="PF_quantity" name="" value="" placeholder="" class="form-control">
			            	</div>
	              		</div>

	              	</div>
	              	<br>
	              	<div class="row">
	              		<div class="col-md-6">
	              			Year Acquired
	              			<div class="input-group">
				                <span class="input-group-addon">
				                </span>
				                <input type="text" name="" id="PF_year_aqquired" value="" placeholder="" class="form-control">
			            	</div>
	              		</div>
	              		<div class="col-md-6">
	              			Acquisition value(PHP) 
	              			<div class="input-group">
				                <span class="input-group-addon">
				                </span>
	              				<input type="text" name="" id="PF_value" value="" placeholder="" class="form-control">
			            	</div>
	              		</div>
	              	</div><br>
	              	<div class="change_btn_pf">
	            	  	<button type="" class="btn btn-info" id="submit_PF_uncheck">REGISTER</button>
	              	</div>
	              	<!--------------------------------------------------->
	              	<!---------------production facilities-------------------->
	              	<!--------------------------------------------------->
	              </div>
	              <!-- /.tab-pane -->
	              <div class="tab-pane" id="family">
	                <!--------------------------------------------------->
	                <!---------------Animal Products-------------------->
	                <!--------------------------------------------------->
	              	<div class="row">
	              		<div class="col-md-12">
	              			Select Animal Products <sup>*If Product is not exist on the list, Check the box and enter your product</sup>
	              			<div class="input-group">
				                <span class="input-group-addon">
				                  <input type="checkbox" id="check_AP">
				                </span>
			                	<div id="input_AP"><?php include'sql_get_AP.php'?></div>
			            	</div>
	              		</div>
	              	</div>
	              	<br>
	              	<div class="row">
	              		<div class="col-md-4">
	              			Counts - MALE
	              			<div class="input-group">
				                <span class="input-group-addon">
				                </span>
				                <input type="number" name="" value="" id="ap_male_count" placeholder="" class="form-control">
			            	</div>
	              		</div>
	              		<div class="col-md-4">
	              			Counts - FEMALE
	              			<div class="input-group">
				                <span class="input-group-addon">
				                </span>
	              				<input type="number" name="" value="" id="ap_female_count" placeholder="" class="form-control">
			            	</div>
	              		</div>
	              		<div class="col-md-4">
	              			Age <sup>*in Years/Months/Weeks</sup>
	              			<div class="input-group">
				                <span class="input-group-addon">
				                	<select name="" id="ymw">
				                		<option value="year/s">YEARS</option>
				                		<option value="month/s">MONTHS</option>
				                		<option value="week/s">WEEKS</option>
				                	</select>
				                </span>
	              				<input type="number" name="" id="age_count" value="" placeholder="" class="form-control">
			            	</div>
	              		</div>
	              	</div><br>
	              	<div class="change_btn_ap">
	            	  	<button type="" class="btn btn-info" id="submit_ap_uncheck">REGISTER</button>
	              	</div>
					
	              	<!--------------------------------------------------->
	              	<!---------------animal products-------------------->
	              	<!--------------------------------------------------->
	               
	              </div>
	              <div class="tab-pane" id="products">
	              	<!--------------------------------------------------->
	              	<!---------------products-------------------->
	              	<!--------------------------------------------------->
	              	<div class="row">
	              		<div class="col-md-6">
	              			Select Product <sup>*If Product is not exist on the list, Check the box and enter your product</sup>
	              			<div class="input-group">
				                <span class="input-group-addon">
				                  <input type="checkbox" id="check_products">
				                </span>
			                	<div id="input_products"><?php include'sql_get_pr.php'?></div>
			            	</div>
	              		</div>
	              		<div class="col-md-6">
	              			Enter the Area of your product(in Sqm.)
	              			<div class="input-group">
				                <span class="input-group-addon">
				                  Sqm.
				                </span>
	              				<input type="text" name="" value="" id="pr_area" placeholder="" class="form-control">
			            	</div>
	              		</div>
	              	</div>
	              	<br>
	              	<div class="row">
	              		<div class="col-md-6">
	              			Ecosystem
	              			<div class="input-group">
				                <span class="input-group-addon">
				                </span>
				                <input type="text" name="" value="" placeholder="" id="pr_ecosystem" class="form-control">
			            	</div>
	              		</div>
	              		<div class="col-md-6">
	              			Tenant Status
	              			<div class="input-group">
				                <span class="input-group-addon">
				                </span>
	              				<input type="text" name="" value="" placeholder="" id="pr_tenant" class="form-control">
			            	</div>
	              		</div>

	              	</div><br>
	              	<div class="change_btn_pr">
	            	  	<button type="" class="btn btn-info" id="submit_pr_uncheck">REGISTER</button>
	              	</div>
	              	<!--------------------------------------------------->
	              	<!---------------products-------------------->
	              	<!--------------------------------------------------->
	              </div>
	            <!-- /.tab-content -->
	          </div>
	          <!-- /.nav-tabs-custom -->
	        </div>
	    </div>

	    <div class="container-fluid">
	      <table id="ready" class="table table-striped table-bordered" style="width:100%">
	        <thead>
	        <tr>
	          <th>Product</th>
	          <th>Type</th>
	          <th>More details</th>
	        </tr>
	        </thead>
	        <tbody class="table-content">
	            	<?php
	            		$select_pf = mysqli_query($conn, "SELECT * FROM `tbl_production_facilities` WHERE pi_resident_id = '$iddd'");

	            		while ($row_pf = mysqli_fetch_array($select_pf)) {
	            			$pc_code = $row_pf['pc_code'];
	            			$select_pc = mysqli_query($conn, "SELECT * FROM `tbl_property_commodities` WHERE pc_code = '$pc_code'");
	            			$row_pc = mysqli_fetch_array($select_pc);

	            			echo "<tr>
								<td>".$row_pc['pc_type']."</td>
								<td>Production Facilities</td>
								<td>N/A</td>
	            			</>";
	            		}
	            		$select_ap = mysqli_query($conn, "SELECT * FROM `tbl_animal_products` WHERE pi_resident_id = '$iddd'");

	            		while ($row_ap = mysqli_fetch_array($select_ap)) {
	            			$pc_code = $row_ap['pc_code'];
	            			$select_pc = mysqli_query($conn, "SELECT * FROM `tbl_property_commodities` WHERE pc_code = '$pc_code'");
	            			$row_pc = mysqli_fetch_array($select_pc);

	            			echo "<tr>
								<td>".$row_pc['pc_type']."</td>
								<td>Animal Products</td>
								<td>N/A</td>
	            			</>";
	            		}
	            		$select_pr = mysqli_query($conn, "SELECT * FROM `tbl_products` WHERE pi_resident_id = '$iddd'");

	            		while ($row_pr = mysqli_fetch_array($select_pr)) {
	            			$pc_code = $row_pr['pc_code'];
	            			$select_pc = mysqli_query($conn, "SELECT * FROM `tbl_property_commodities` WHERE pc_code = '$pc_code'");
	            			$row_pc = mysqli_fetch_array($select_pc);

	            			echo "<tr>
								<td>".$row_pc['pc_type']."</td>
								<td>Crop Products</td>
								<td>N/A</td>
	            			</>";
	            		}
	            	?>
	        </tbody>
	      </table>
	    </div>
		</section>
	</div>
</div>
</body>
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../dist/js/app.min.js"></script>
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="../plugins/iCheck/icheck.min.js"></script>
<script>
$(document).ready(function() {
	$('#ready').DataTable();
	//$('input[type=checkbox]').prop('checked', true)
});

var pi_id = "<?php echo $iddd; ?>";
//=========================================
//=========Production Facilities============
//=========================================
$("#check_PF").change(function() {
    var ischecked= $(this).is(':checked');
    if(!ischecked) {
      $("#input_PF").html('<?php include'sql_get_PF.php' ?>');
      $(".change_btn_pf").html('<button type="" class="btn btn-info" id="submit_PF_uncheck">REGISTER</button>');
      console.log("checked");
     }
     else {
      var get_PF = "get_PF";
      console.log("unchecked");
      $("#input_PF").html('<input type="text" id="PF_new_list" class="form-control">'); 
      $(".change_btn_pf").html('<button type="" class="btn btn-info" id="submit_PF_check">REGISTER</button>');  
     }
     $("#submit_PF_uncheck").click(function(){
     	////////////////////////////////////////
     	////////////CODES HERE//////////////////
     	////////////////////////////////////////
     	//alert("nauncheck na");
     	var pf_id = $("#select_PF").val();
     	var pf_ownership = $("#PF_ownership").val();
     	var pf_quantity = $("#PF_quantity").val();
     	var pf_year_acquired = $("#PF_year_aqquired").val();
     	var pf_value = $("#PF_value").val();
     	var command = "pf_uncheck";
     	//alert(pf_id+pf_ownership+pf_quantity+pf_year_acquired+pf_value);

     	$.post("sql_insert_properties_commodities.php", {
     		command:command,
     		pi_id:pi_id,
     		pf_id:pf_id,
     		pf_ownership:pf_ownership, 
     		pf_quantity:pf_quantity,
     		pf_year_acquired:pf_year_acquired,
     		pf_value:pf_value
     	}, function(data) {
     		//alert(data);
     		if (data == "reload") {
     			location.reload(true);
     		}
     		else {
     		$(".table-content").append(data);
     		}
     	});	
     	////////////////////////////////////////
     	////////////CODES HERE//////////////////
     	////////////////////////////////////////
     });
     $("#submit_PF_check").click(function(){
     	//alert("nacheck na");
     	////////////////////////////////////////
     	////////////CODES HERE//////////////////
     	////////////////////////////////////////
     	var pf_input = $("#PF_new_list").val();
    	var pf_ownership = $("#PF_ownership").val();
     	var pf_quantity = $("#PF_quantity").val();
     	var pf_year_acquired = $("#PF_year_aqquired").val();
     	var pf_value = $("#PF_value").val();
     	var command = "pf_check";
     	//alert(pf_id+pf_ownership+pf_quantity+pf_year_acquired+pf_value);

     	$.post("sql_insert_properties_commodities.php", {
     		command:command,
     		pi_id:pi_id,
     		pf_input:pf_input,
     		pf_ownership:pf_ownership, 
     		pf_quantity:pf_quantity,
     		pf_year_acquired:pf_year_acquired,
     		pf_value:pf_value
     	}, function(data) {
     		//alert(data);
     		if (data == "reload") {
     			location.reload(true);
     		}
     		else {
     		$(".table-content").append(data);
     		}
     	});
     	////////////////////////////////////////
     	////////////CODES HERE//////////////////
     	////////////////////////////////////////
     });
  });
//=========================================
//=========Production Facilities============
//=========================================


//=========================================
//=========Production Facilities============
//=========================================
$("#check_AP").change(function() {
    var ischecked= $(this).is(':checked');
    if(!ischecked) {
      $("#input_AP").html(`<?php include'sql_get_AP.php' ?>`);
      $(".change_btn_ap").html('<button type="" class="btn btn-info" id="submit_ap_uncheck">REGISTER</button>'); 
      
     }
     else {
      var get_AP = "get_AP";
      $("#input_AP").html('<input type="text" id="ap_new_list" class="form-control">'); 
      $(".change_btn_ap").html('<button type="" class="btn btn-info" id="submit_ap_check">REGISTER</button>'); 
//      $.post("sql_get_pr.php" , {get_pr : get_pr} , function(data) {
//        $("#input_products").html(data);
//      });
     }
      $("#submit_ap_uncheck").click(function() {
		//alert('unchecked_ap');
		////////////////////////////////////////
     	////////////CODES HERE//////////////////
     	////////////////////////////////////////
     	//alert("nauncheck na");
     	var ap_id = $("#select_ap").val();
     	var ap_male_count = $("#ap_male_count").val();
     	var ap_female_count = $("#ap_female_count").val();
     	var ymw = $("#ymw").val();
     	var age_count = $("#age_count").val();
     	var command = "ap_uncheck";
     	//alert(ap_id+" ==== "+ap_male_count+" ==== "+ap_female_count+" ==== "+age_count+" "+ymw);

     	$.post("sql_insert_properties_commodities.php", {
     		command:command,
     		pi_id:pi_id,
     		ap_id:ap_id,
     		ap_male_count:ap_male_count, 
     		ap_female_count:ap_female_count,
     		ymw:ymw,
     		age_count:age_count
     	}, function(data) {
     		// alert(data);
     		if (data == "reload") {
     			location.reload(true);
     		}
     		else {
     		$(".table-content").append(data);
     		}
     	});

     		
     	////////////////////////////////////////
     	////////////CODES HERE//////////////////
     	////////////////////////////////////////
		
	});

	$("#submit_ap_check").click(function() {
		//alert('checked_ap');
		var ap_input = $("#ap_new_list").val();
     	var ap_male_count = $("#ap_male_count").val();
     	var ap_female_count = $("#ap_female_count").val();
     	var ymw = $("#ymw").val();
     	var age_count = $("#age_count").val();
     	var command = "ap_check";
     	alert(ap_input+" ==== "+ap_male_count+" ==== "+ap_female_count+" ==== "+age_count+" "+ymw);

     	$.post("sql_insert_properties_commodities.php", {
     		command:command,
     		pi_id:pi_id,
     		ap_input:ap_input,
     		ap_male_count:ap_male_count, 
     		ap_female_count:ap_female_count,
     		ymw:ymw,
     		age_count:age_count
     	}, function(data) {
     		alert(data);
     		if (data == "reload") {
     			location.reload(true);
     		}
     		else {
     		$(".table-content").append(data);
     		}
     	});



	});
  });
//=========================================
//=========Production Facilities============
//=========================================

//=========================================
//=========Product============
//========================================= 
//
$("#check_products").change(function() {
    var ischecked= $(this).is(':checked');
    if(!ischecked) {
      $("#input_products").html('<?php include'sql_get_pr.php' ?>');
      $(".change_btn_pr").html('<button type="" class="btn btn-info" id="submit_pr_uncheck">REGISTER</button>'); 
     }
     else {
      var get_pr = "get_pr";
      $("#input_products").html('<input type="text" id="product_new_list" class="form-control">'); 
      $(".change_btn_pr").html('<button type="" class="btn btn-info" id="submit_pr_check">REGISTER</button>');  
//      $.post("sql_get_pr.php" , {get_pr : get_pr} , function(data) {
//        $("#input_products").html(data);
//      });
     }
          $("#submit_pr_uncheck").click(function(){
     	////////////////////////////////////////
     	////////////CODES HERE//////////////////
     	////////////////////////////////////////
     	//alert("nauncheck na");
     	//var pf_id = $("#select_PF").val();
     	var select_pr = $("#select_pr").val();
     	var pr_area = $("#pr_area").val();
     	var pr_ecosystem = $("#pr_ecosystem").val();
     	var pr_tenant = $("#pr_tenant").val();
     	var command = "pr_uncheck";
     	//alert(pf_id+pf_ownership+pf_quantity+pf_year_acquired+pf_value);

     	$.post("sql_insert_properties_commodities.php", {
     		command:command,
     		pi_id:pi_id,
     		pr_id:select_pr,
     		pr_area:pr_area, 
     		pr_ecosystem:pr_ecosystem,
     		pr_tenant:pr_tenant,
     	}, function(data) {
     		//alert(data);
     		if (data == "reload") {
     			location.reload(true);
     		}
     		else {
     		$(".table-content").append(data);
     		}
     	});	
     	////////////////////////////////////////
     	////////////CODES HERE//////////////////
     	////////////////////////////////////////
     });
     $("#submit_pr_check").click(function(){
     	//alert("nacheck na");
     	////////////////////////////////////////
     	////////////CODES HERE//////////////////
     	////////////////////////////////////////
     	var pf_input = $("#PF_new_list").val();
    	var pf_ownership = $("#PF_ownership").val();
     	var pf_quantity = $("#PF_quantity").val();
     	var pf_year_acquired = $("#PF_year_aqquired").val();
     	var pf_value = $("#PF_value").val();
     	var command = "pr_check";
     	//alert(pf_id+pf_ownership+pf_quantity+pf_year_acquired+pf_value);

     	$.post("sql_insert_properties_commodities.php", {
     		command:command,
     		pi_id:pi_id,
     		pf_input:pf_input,
     		pf_ownership:pf_ownership, 
     		pf_quantity:pf_quantity,
     		pf_year_acquired:pf_year_acquired,
     		pf_value:pf_value
     	}, function(data) {
     		//alert(data);
     		if (data == "reload") {
     			location.reload(true);
     		}
     		else {
     		$(".table-content").append(data);
     		}
     	});
     	////////////////////////////////////////
     	////////////CODES HERE//////////////////
     	////////////////////////////////////////
     });
  });



//=========================================
//=========Product============
//=========================================

//function insert1(){
//    var name1 = $("input[name='content1']").val();
//
//    if (name1 != "") {
//      $(".table-content").append("<tr><td>"+name1+"</td><td>"+name1+"</td><td>"+name1+"</td><td>"+name1+"</td><td>"+name1+"</td></tr>")
//    }
//}
</script>

</html>