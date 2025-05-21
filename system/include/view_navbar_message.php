<style>
.modal-backdrop.in {
    z-index: 1;
}
#exampleModal22 .modal-dialog {
  position: absolute;
  right: 2%;
  bottom: 0%;
  z-index: 10040;
  overflow: hidden;
  /*overflow-x: hidden;*/
  width:300px;
  margin-bottom:0;
}
</style>

<div class="modal fade" id="exampleModal22" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="">
        <?php include'chat_content.php'?>
    </div>
  </div>
</div>


<li class="dropdown messages-menu">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
  <i class="fa fa-envelope-o"></i>
  <span class="label label-success">4</span>
</a>
<ul class="dropdown-menu">
  <li class="header">You have 4 messages</li>
  <li>
    <!-- inner menu: contains the actual data -->
    <ul class="menu">
      <li><!-- start message -->
        <a data-toggle="modal" href="#exampleModal22">
          <div class="pull-left">
            <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
          </div>
          <h4>
            Support Team
            <small><i class="fa fa-clock-o"></i> 5 mins</small>
          </h4>
          <p>Why not buy a new awesome theme?</p>
        </a>
      </li>
      <!-- end message -->
      <li>
        <a href="#">
          <div class="pull-left">
            <img src="../dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
          </div>
          <h4>
            AdminLTE Design Team
            <small><i class="fa fa-clock-o"></i> 2 hours</small>
          </h4>
          <p>Why not buy a new awesome theme?</p>
        </a>
      </li>
      <li>
        <a href="#">
          <div class="pull-left">
            <img src="../dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
          </div>
          <h4>
            Developers
            <small><i class="fa fa-clock-o"></i> Today</small>
          </h4>
          <p>Why not buy a new awesome theme?</p>
        </a>
      </li>
      <li>
        <a href="#">
          <div class="pull-left">
            <img src="../dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
          </div>
          <h4>
            Sales Department
            <small><i class="fa fa-clock-o"></i> Yesterday</small>
          </h4>
          <p>Why not buy a new awesome theme?</p>
        </a>
      </li>
      <li>
        <a href="#">
          <div class="pull-left">
            <img src="../dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
          </div>
          <h4>
            Reviewers
            <small><i class="fa fa-clock-o"></i> 2 days</small>
          </h4>
          <p>Why not buy a new awesome theme?</p>
        </a>
      </li>
    </ul>
  </li>
  <li class="footer"><a href="#">See All Messages</a></li>
</ul>
</li>

<!-- Modal -->
