
<header class="main-header">
    <!-- Logo -->
    <a href="dashboard.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>B</b>MS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Brgy</b> Management</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        <?php include'view_navbar_message.php'?>
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="../dist/img/avatar5.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $row['name']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="../dist/img/Avatar5.png" class="img-circle" alt="User Image">

                <p>
                  <?php  echo $row['name']; ?>
                  <small><?php  
                    if ($row['user_level'] == 1) {
                      echo " Barangay. Health Worker";
                    }
                    else if ($row['user_level'] == 2) {
                      echo "Barangay. Secretary";
                    }
                    else if ($row['user_level'] == 3) {
                     echo "Barangay. Captain"; 
                    }
                   ?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <button class="btn btn-default btn-flat" data-toggle="modal" data-target=".bd-example-modal-sm">Change Password</button>
                </div>  
                <div class="pull-right">
                  <a href="./logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../dist/img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php 
            $brgy_id = $row['brgy_id'];
              $select_brgy = mysqli_query($conn, "SELECT * FROM `tbl_brgy_list` WHERE brgy_id = $brgy_id");
              $row_brgy = mysqli_fetch_array($select_brgy);

              echo "BRGY. ".$row_brgy['brgy_name'];
          ?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i><?php  
                    if ($row['user_level'] == 1) {
                      echo " Barangay. Health Worker";
                    }
                    else if ($row['user_level'] == 2) {
                      echo "Barangay. Secretary";
                    }
                    else if ($row['user_level'] == 3) {
                     echo "Barangay. Captain"; 
                    }
                   ?></a>
        </div>
      </div>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <!-- Optionally, you can add icons to the links -->
        

        <?php
          if ($row['user_level'] == 3) {
            ?>
             
            <li><a href="dashboard.php"><i class="fa fa-link"></i> <span>Home</span></a></li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Residential Records</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="resident_records.php"><i class="fa fa-circle-o"></i>Resident's info</a></li>
                <li><a href="house_hold_list.php"><i class="fa fa-circle-o"></i> Household</a></li>
                <li><a href="manage_organizations.php"><i class="fa fa-circle-o"></i> Organizations</a></li>
              </ul>
            </li>
            <li><a href="certificates.php"><i class="fa fa-link"></i> <span>Certificates</span></a></li>
            <li><a href="blotter.php"><i class="fa fa-link"></i> <span>Blotter Records</span></a></li>
            <li><a href="health_records.php"><i class="fa fa-link"></i> <span>Health Records</span></a></li>
         <?php }
          else if ($row['user_level'] == 2) {
            ?>
            <li><a href="dashboard.php"><i class="fa fa-link"></i> <span>Home</span></a></li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Residential Records</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="resident_records.php"><i class="fa fa-circle-o"></i>Resident's info</a></li>
                <li><a href="house_hold_list.php"><i class="fa fa-circle-o"></i> Household</a></li>
                <li><a href="manage_organizations.php"><i class="fa fa-circle-o"></i> Organizations</a></li>
              </ul>
            </li>
            <li><a href="certificates.php"><i class="fa fa-link"></i> <span>Certificates</span></a></li>
            <li><a href="blotter.php"><i class="fa fa-link"></i> <span>Blotter Records</span></a></li>
            <li><a href="health_records.php"><i class="fa fa-link"></i> <span>Health Records</span></a></li>
         <?php }
          else if ($row['user_level'] == 1) {
            ?>
            <li><a href="dashboard.php"><i class="fa fa-link"></i> <span>Home</span></a></li>
            <li><a href="health_records.php"><i class="fa fa-link"></i> <span>Health Records</span></a></li>
         <?php }
         else if ($row['user_level'] == 4) {?>
          <li><a href="dashboard.php"><i class="fa fa-link"></i> <span>Home</span></a></li>
            <li><a href="list_of_barangay.php"><i class="fa fa-link"></i> <span>List of Barangay</span></a></li>
        <?php }
         ?>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>