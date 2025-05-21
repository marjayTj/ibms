<?php
include'../conn.php';

$org_id = $_POST['org_id'];
$new_mem = $_POST['new_mem'];

$get_query = "INSERT INTO `org_members` 
(`om_id`, `org_id`, `pi_resident_id`, `om_desc`, `date_added`) 
VALUES (NULL, '$org_id', '$new_mem', 'New member!', CURRENT_TIMESTAMP)";
$execute_query = mysqli_query($conn, $get_query);
if ($execute_query) {
    echo "true";
} else {
    echo "false";
}
?>