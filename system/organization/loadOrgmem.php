<?php
include'../conn.php';
$org_id = $_GET['orgid'];
?>
<br><br>
<b>Members:</b>
<div  style="overflow-y:scroll; height: 300px; display:block; width:100%">
<table class="table table-stripped table-hover table-responsive" >
<thead>
    <tr>
        <th>ID number</th>
        <th>Name</th>
        <th>...</th>
    </tr>
</thead>
<tbody>
    <?php
        $select_org_member = mysqli_query($conn, "SELECT * FROM `org_members` WHERE org_id = $org_id");

        while($fetch_om = mysqli_fetch_array($select_org_member)) {
            $res_id = $fetch_om['pi_resident_id'];
            $select_from_resident_list = mysqli_query($conn, "SELECT * FROM `tbl_personal_info` WHERE pi_resident_id = '$res_id'");
            $fetch_name = mysqli_fetch_array($select_from_resident_list);
            echo "<tr>
                <td>".$fetch_om['pi_resident_id']."</td>
                <td>".$fetch_name['pi_last_name'].", ".$fetch_name['pi_first_name']." ".$fetch_name['pi_middle_name']."</td>
                <td><a id='#view_org_mem_info".$fetch_om['om_id']."'><i class='fa fa-edit fa-lg'></i></a></td>
            </tr>"; ?>
            <script>
                $("#view_org_mem_info<?php echo $fetch_om['om_id']?>").click(function(){
                    alert("clicked");
                });
            </script>
       <?php }
    ?>
</tbody>
</table>
</div>