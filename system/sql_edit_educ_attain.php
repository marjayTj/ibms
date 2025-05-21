<?php
include'conn.php';
$resid = $_POST['resid'];
$schl_level = $_POST['schl_level'];
$new_elem_val = $_POST['new_elem_val'];
$get_educ = mysqli_query($conn, "SELECT * FROM `tbl_educational_background` WHERE 
`tbl_educational_background`.`pi_resident_id` = '$resid' AND `tbl_educational_background`.`schl_level` = $schl_level");
$fetch_educ = mysqli_fetch_array($get_educ);
if(!empty($fetch_educ)) {
    $new_query = "UPDATE `tbl_educational_background` SET `schl_name` = '$new_elem_val' 
    WHERE `tbl_educational_background`.`pi_resident_id` = '$resid' AND `tbl_educational_background`.`schl_level` = $schl_level";
    $excecute_query = mysqli_query($conn, $new_query);
    if($excecute_query) {
        echo "true1";
    }
    else {
        echo "false";
    }    
}
else {
    $new_query = "INSERT INTO `tbl_educational_background` 
    (`eb_id`, `pi_resident_id`, `schl_name`, `schl_level`, `eb_date_added`) 
    VALUES (NULL, '$resid', '$new_elem_val', '$schl_level', now())";
    $excecute_query = mysqli_query($conn, $new_query);
    if($excecute_query) {
        echo "true2";
    }
    else {
        echo "false";
    } 
}

?>