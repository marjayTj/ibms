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
                <h4>Manage Organizations</h4>
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <a href="#open_add_new_org" data-toggle="modal">
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>ADD <small style="color:#fff"></small></h3>

                                    <p>New Organizations</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-plus"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div id="orgList"></div>
                    <script>
                    $(document).ready(function() {
                        $("#orgList").load("organization/orgList.php?brgyid=<?php echo $brgy_id?>");
                    });
                    </script>
                    <!-- ./col -->
                </div>
            </section>

        </div>
    </div>

    <div class="modal fade" id="open_add_new_org" tabindex="-1" role="dialog" aria-labelledby="	" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new organization</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Organization Name</label>
                                <input type="text" class="form-control" id="org_name">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Organization purpose</label>
                                <textarea cols="30" rows="5" class="form-control" id="org_purpose"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="submit_new_org">Create</button>
                    <script>
                    $("#submit_new_org").click(function() {
                        var brgy_id = "<?php echo $brgy_id;?>";
                        var org_name = $("#org_name").val();
                        var org_purpose = $.trim($("#org_purpose").val());
                        //alert(brgy_id+", "+org_name+", "+org_purpose);
                        $.post("organization/sql_insert_new_org.php", {
                            brgy_id: brgy_id,
                            org_name: org_name,
                            org_purpose: org_purpose
                        }, function(data) {
                            $("#open_add_new_org").modal("hide");
                            $("#open_add_new_org").on("hidden.bs.modal", function() {
                                $("#orgList").load("organization/orgList.php?brgyid=<?php echo $brgy_id?>");
                                var org_name = $("#org_name").val("");
                                var org_purpose = $.trim($("#org_purpose").val(""));
                            })
                        });
                    });
                    </script>
                </div>
            </div>
        </div>
    </div>
</body>

</html>