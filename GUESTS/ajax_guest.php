<?php

include_once('../class/config.php');
include_once('class/guest_class.php');

// to pass the data sent while registration
if(isset($_REQUEST['type']) && $_REQUEST['type'] == "post_data")
{
	// $logData  = array();
	// parse_str($_POST['data'], $logData);
	$id = $_POST['id']; 
	$return 			= $guest_class->getCategoryPost($id);
	
}

?>