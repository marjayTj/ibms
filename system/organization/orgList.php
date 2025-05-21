<?php
include'../conn.php';
$brgyid = $_GET['brgyid'];
$get_all_list = mysqli_query($conn, "SELECT * FROM `tbl_organization` WHERE brgy_id = $brgyid");

while($row_main_list = mysqli_fetch_array($get_all_list)) { ?>
<!----------------------------------------------------------------------------------------------------------------------->
<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-<?php echo $row_main_list['org_card_color']?>">
        <div class="inner">
            <h3><?php
                $org_id = $row_main_list['org_id'];
                $select_count_org_mem = mysqli_query($conn, "SELECT COUNT(om_id) AS memCount FROM org_members WHERE org_id = $org_id");
                $row_count = mysqli_fetch_array($select_count_org_mem);
                if(empty($row_count)) {
                    echo "0";
                }
                else {
                    echo $row_count['memCount'];
                }
            ?><small style="color:#fff"> members</small></h3>
            <p><?php echo $row_main_list['org_pupose'];?>(Organization)</p>
        </div>
        <div class="icon">
            <i class="ion ion-person"></i>
        </div>
        <a href="#open_org<?php echo $row_main_list['org_id'];?>" data-toggle="modal" class="small-box-footer">More info
            <i class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>

<div class="modal fade" id="open_org<?php echo $row_main_list['org_id'];?>">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Manage Organization<h5>
                <style>
                    #org_setting<?php echo $row_main_list['org_id'];?> {
                    list-style-type: none;
                    text-align: center;
                    margin: 0;
                    padding: 0;
                    }
                    #org_setting<?php echo $row_main_list['org_id'];?> li {
                    display: inline-block;
                    }
                </style>
                <ul id="org_setting<?php echo $row_main_list['org_id'];?>" class="pull-right" style="margin-top:-30px; display:none">
                    <li><a id="close_setting<?php echo $row_main_list['org_id'];?>" class="text-info pull-right" style="margin-right:20px;"><span class="fa fa-times fa-lg"></span></a></li>
                    <li><a id="dltthisOrg<?php echo $row_main_list['org_id'];?>" class="text-danger pull-right"><span class="fa fa-trash fa-lg"></span></a></li>
                </ul>
                <a id="oepn_org_settings<?php echo $row_main_list['org_id'];?>" class="pull-right" style="margin-top:-30px;"><i class="fa fa-gear fa-lg"></i></a>
                <script>
                    $("#oepn_org_settings<?php echo $row_main_list['org_id'];?>").click(function() {
                        $("#org_setting<?php echo $row_main_list['org_id'];?>").fadeIn();
                        $(this).fadeOut();
                    });
                    $("#close_setting<?php echo $row_main_list['org_id'];?>").click(function() {
                        $("#org_setting<?php echo $row_main_list['org_id'];?>").fadeOut();
                        $("#oepn_org_settings<?php echo $row_main_list['org_id'];?>").fadeIn();
                    });
                    $("#dltthisOrg<?php echo $row_main_list['org_id'];?>").click(function() {
                        alert("Delete temporarily not available");
                    })                
                </script>
            </div>
            <div class="modal-body" id="panel1<?php echo $org_id;?>">
                    <div class="row">
                        <div class="col-md-6" style="border-right:1px solid grey">
                            <h3>Organization name:<b> <?php echo $row_main_list['org_pupose'];?></b></h3>
                            <h3>Total Members:<b>UNAVAILABLE</b></h3>
                            <h3>Organization Purposes:</h3>
                            <p style="white-space:pre-wrap;"><?php echo $row_main_list['org_info'];?></p>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <select id="select_new_org_mem<?php echo $row_main_list['org_id'];?>" class="form-control">
                                    <?php
                                        $select_brgy_res = mysqli_query($conn, "SELECT * FROM `tbl_personal_info` WHERE pi_brgy_id = $brgyid");
                                        $num = 1;
                                        while($row_res = mysqli_fetch_array($select_brgy_res)) {
                                            $new_num = $num++;
                                            echo "<option value='".$row_res['pi_resident_id']."'>".$new_num.". ".$row_res['pi_last_name'].", ".$row_res['pi_first_name']."</option>"; 
                                        }
                                    ?>
                                </select>
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" id="submit_new_member<?php echo $row_main_list['org_id'];?>">Add new member</button>
                                    <script>
                                        $("#submit_new_member<?php echo $row_main_list['org_id'];?>").click(function(){
                                            var new_mem = $("#select_new_org_mem<?php echo $row_main_list['org_id'];?>").val();
                                            //alert(new_mem);
                                            $.post("organization/sql_insert_new_org_mem.php", {
                                                org_id : "<?php echo $row_main_list['org_id'];?>",
                                                new_mem : new_mem
                                            }, function(data) {
                                                
                                                $("#load_thisOrg_member<?php echo $row_main_list['org_id'];?>").load("organization/loadOrgmem.php?orgid=<?php echo $row_main_list['org_id'];?>");
                                            });
                                        });
                                    </script>
                                </span>
                            </div>
                            <div id="load_thisOrg_member<?php echo $row_main_list['org_id'];?>"></div>
                            <script>
                                $(document).ready(function() {
                                    $("#load_thisOrg_member<?php echo $row_main_list['org_id'];?>").load("organization/loadOrgmem.php?orgid=<?php echo $row_main_list['org_id'];?>")
                                });
                            </script>       
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
$("#open_org<?php echo $row_main_list['org_id'];?>").on("hidden.bs.modal", function(){
    $("#orgList").load("organization/orgList.php?brgyid=<?php echo $brgyid?>");
    $('.modal-backdrop').remove();
});
</script>
<!----------------------------------------------------------------------------------------------------------------------->
<?php }
?>