<?php
include'../conn.php';

$brgy_id = $_POST['brgy_id'];
$org_name = $_POST['org_name'];
$org_purpose = $_POST['org_purpose'];

$get_query = "INSERT INTO `tbl_organization` 
(`org_id`, `org_pupose`, `org_info`, `brgy_id`, `org_card_color`, `org_time_added`)
 VALUES (NULL, '$org_name', '$org_purpose', '$brgy_id', 'aqua', CURRENT_TIMESTAMP)";
$execute_query = mysqli_query($conn, $get_query);
if ($execute_query) {
    echo "true";
} else {
    echo "false";
}
?>