<?php

include_once('class/config.php');
include_once('class/login.php');

// to pass the data sent while registration
if(isset($_REQUEST['type']) && $_REQUEST['type'] == "sign_up_data")
{
	$logData  = array();
	parse_str($_POST['data'], $logData);
	// print_r($logData); 
	$return 			= $class_login->register_data($logData);
	
}

// to pass the data sent while login
if(isset($_REQUEST['type']) && $_REQUEST['type'] == "login_data")
{
	$logData  = array();
	parse_str($_POST['data'], $logData);
	// print_r($logData); 
	$return 			= $class_login->login_check($logData);
	
}

?>