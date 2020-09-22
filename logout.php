<?php
include_once("class/login.php");

// $order_book = new orderBook();

if(!$class_login->isUserLoggedIn())
{
	// header("Location: index.php");
	echo '<script>window.location.href="index.php"</script>';
	exit(0);
} 
$class_login->doUserLogout();
 // header("Location:index.php");
echo '<script>window.location.href="index.php"</script>';
?>