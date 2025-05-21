<?php
include'conn.php';

$resid = $_POST['resid'];
$employment_new_status = $_POST['employment_new_status'];
$insert_employment_details = mysqli_query($conn, "INSERT INTO `tbl_work_details` (`wd_id`, `pi_resident_id`, `wd_status`, `wd_date_added`) VALUES (NULL, '$resid', '$employment_new_status', CURRENT_DATE())");

if($employment_new_status == "unemployed") {
        echo "true";
}
elseif($employment_new_status == "employed") {
    $sector = $_POST['sector'];
    $employer = $_POST['employer'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];
    $address = $_POST['address'];
    $insert_new_employment_status = mysqli_query($conn, "INSERT INTO `tbl_employee_details` 
    (`ed_id`, `pi_resident_id`, `ed_sector`, `ed_position`, `ed_employer`, `ed_address`, `ed_salary`, `ed_date_added`)
        VALUES (NULL, '$resid', '$sector', '$position', '$employer', '$address', '$salary', now())");
        if($insert_new_employment_status) {
            echo "true";
        }
        else {
            echo "false12";
        }
}
elseif($employment_new_status == "self-employed") {
    $business_name = $_POST['business_name'];
    $business_address = $_POST['business_address'];
    $insert_new_self_employed = mysqli_query($conn, "INSERT INTO `tbl_self_employed_details` 
    (`sed_id`, `pi_resident_id`, `sed_name_of_business`, `sed_address`, `sed_date_added`)
        VALUES (NULL, '$resid', '$business_name', '$business_address', now())");
        if($insert_new_self_employed) {
            echo "true";
        }
        else {
            echo "false 13";
        }
}
?>