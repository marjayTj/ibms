<div class="modal fade" id="profile_manage_account" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle" class="pull-left">Edit Profile</h5>
      </div>
      <div class="modal-body">
      <div class="row">
        <div class="col-md-12">
          <h4>Personal Information</h4>
          <div id="edit_personal_information"></div>
          <hr>
        </div>
        <div class="col-md-12">
          <h4>Residential Role</h4>
          <div id="edit_residential_role"></div>
          <hr>
        </div>
        <div class="col-md-12">
          <h4>Educational background</h4>
          <div id="edit_educational_background"></div>
          <hr>
        </div>
        <div class="col-md-12">
        <h4>Employment Status</h4>
        <div id="edit_employment_status"></div>
        </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
 $("#profile_manage_account").on("hidden.bs.modal", function(){
    window.location.replace("view_residence_profile.php?resid=<?php echo $resid;?>")
});
$(document).ready(function() {
  $("#edit_personal_information").load("edit_personal_information.php?id=<?php echo	$resid; ?>");
  $("#edit_residential_role").load("edit_residential_role.php?id=<?php echo	$resid; ?>")
  $("#edit_educational_background").load("edit_educational_attainment.php?id=<?php echo	$resid; ?>")
  $("#edit_employment_status").load("edit_employment_status.php?id=<?php echo	$resid; ?>")
})
</script>