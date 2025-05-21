<?php 
include'conn.php';
session_start();
if (!isset($_SESSION['id'])) {
	header("location:index.php");
}
if (isset($_GET['resid'])) {
	$resid = $_GET['resid'];
}
$select_all_from_red = mysqli_query($conn, "SELECT * FROM `tbl_personal_info` WHERE pi_resident_id = '$resid'") ;
$row_data = mysqli_fetch_array($select_all_from_red);
?><?php include'select_from_user.php'; ?>
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
			<h4>Records / Profile / <a  data-toggle="modal" href="#profile_manage_account" class="pull-right">Manage Account</a></h4>
      
		</section>
		<section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo $row_data['pi_photo_dir'] ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $row_data['pi_last_name'].", ".$row_data['pi_first_name']." ".$row_data['pi_middle_name']." ".$row_data['pi_extension_name']; ?></h3>

              <p class="text-muted text-center"><?php echo $resid ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Gender</b> <a class="pull-right"><?php echo $row_data['pi_sex'] ?></a>
                </li>
                <li class="list-group-item">
                  <b>Age</b> <a class="pull-right"><?php
                    $birthyear = date("Y", strtotime($row_data['pi_birth_date']));
                    $present = date("Y");
                    $age = $present-$birthyear;
                    if($age >= 60 ) {
                      echo $age." (SENIOR CITIZEN)";
                    }
                    else {
                      echo $age;
                    }
                  ?></a>
                </li>
                <li class="list-group-item">
                  <b>Civil Status</b> <a class="pull-right"><?php echo $row_data['pi_civil_status'] ?></a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Education Background</strong>
              <hr>
              <p class="text-muted">
                <?php 
                $select_educational_background = mysqli_query($conn, "SELECT * FROM `tbl_educational_background` WHERE pi_resident_id = '$resid'");

                while ($row_ed = mysqli_fetch_array($select_educational_background)) {
                  $school_level = $row_ed['schl_level'];
                  if ($school_level == 1) {
                    $schl_level = "<b>Elementary</b>";
                  }
                  elseif ($school_level == 2) {
                    $schl_level = "<b>High School</b>";
                  }
                  elseif ($school_level == 3) {
                    $schl_level = "<b>College</b>";
                  }
                  elseif ($school_level == 4) {
                    $schl_level = "<b>Degree earned</b>";
                  }
                  echo $row_ed['schl_name']." - ".$schl_level."<br><br>";
                }

                 ?>
              </p>

              <hr>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#personalinfo" data-toggle="tab">Personal Information</a></li>
              <li><a href="#employment" data-toggle="tab">Employment Details</a></li>
              <li><a href="#pac" data-toggle="tab">Properties and Commodities</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="personalinfo">
                <label>Lastname: <?= $row_data['pi_last_name']?></label></br>
                       <label>Firstname: <?= $row_data['pi_first_name']?></label> </br>
                        <label>Middlename: <?= $row_data['pi_middle_name']?></label> </br>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="employment">
               <?php include'view_employment.php' ?>
              </div>

              <div class="tab-pane" id="pac">
               <?php include'profile_pac.php';?>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
		</section>
	</div>
</div>
<?php include'profile_manage_account.php'?>

</body>
</html>