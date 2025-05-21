<?php
include'conn.php';

$resid = $_POST['resid'];
$employment_status = $_POST['employment_status'];
$employment_new_status = $_POST['employment_new_status'];

$edit_wd = mysqli_query($conn, "UPDATE `tbl_work_details` SET `wd_status` = '$employment_new_status' 
WHERE `tbl_work_details`.`pi_resident_id` = '$resid'");

if($employment_status == "unemployed") {
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
}
elseif($employment_status == "employed") {
    $delete_old_employed = mysqli_query($conn,"DELETE FROM `tbl_employee_details` WHERE `tbl_employee_details`.`pi_resident_id` = '$resid'");
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
             echo "false22";
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
             echo "false 23";
         }
    }
}
elseif($employment_status == "self-employed") {
    $delete_old_self_employed = mysqli_query($conn,"DELETE FROM `tbl_self_employed_details` WHERE `tbl_self_employed_details`.`pi_resident_id` = '$resid'");
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
             echo "false23";
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
             echo "false 33";
         }
    }
}
?>