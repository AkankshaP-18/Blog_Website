<?php

include_once('../class/config.php');
include_once('class/author_class.php');

// to pass the data sent while adding new blog
if(isset($_REQUEST['type']) && $_REQUEST['type'] == "blog_data")
{
	$logData  = array();
	parse_str($_POST['data'], $logData);
	$cate_id = $_POST['cate_id'];
	// print_r($logData); 
	$return 			= $author_class->addNewBlog($logData, $cate_id);
	
}

// to get the post details according to the category
if(isset($_REQUEST['type']) && $_REQUEST['type'] == "post_data")
{
	// $logData  = array();
	// parse_str($_POST['data'], $logData);
	$id = $_POST['id']; 
	$return 			= $author_class->getCategoryPost($id);
	
}

// to pass the data sent to delete
if(isset($_REQUEST['type']) && $_REQUEST['type'] == "delete_data")
{
	// $logData  = array();
	// parse_str($_POST['data'], $logData);
	$post_id = $_POST['post_id']; 
	$return 			= $author_class->deletePost($post_id);
	
}

// to pass the data sent to update
if(isset($_REQUEST['type']) && $_REQUEST['type'] == "edit_data")
{
	$logData  = array();
	parse_str($_POST['data'], $logData);
	$cate_id = $_POST['cate_id']; 
	$return 			= $author_class->updateBlog($logData,$cate_id);
	
}


?>