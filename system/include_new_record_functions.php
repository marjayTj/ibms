<?php 
function get_lname() {
if (isset($_GET['lname'])) {
	$lname = $_GET['lname'];
	echo $lname;	
	}
	else {
			echo "";
		}
}
function get_fname() {
if (isset($_GET['fname'])) {
	echo $_GET['fname'];	
	}
	else {
			echo "";
		}
}
function get_mname() {
if (isset($_GET['mname'])) {
	echo $_GET['mname'];	
	}
	else {
			echo "";
		}
}
function get_extname() {
if (isset($_GET['extname'])) {
	echo $_GET['extname'];	
	}
	else {
			echo "";
		}
}
function get_cpnumber() {
if (isset($_GET['cpnumber'])) {
	echo $_GET['cpnumber'];	
	}
	else {
			echo "";
		}
}
?>