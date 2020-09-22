<?php


  session_start();
			$servername = "localhost";
			$username = "root";
			$password = "";
			$mydb     = "blog_travels";


	// Create connection
		$con = new mysqli($servername, $username, $password, $mydb);

	// Check connection
		if ($con->connect_error) 
			{
				die("Connection failed: " . $con->connect_error);
			}
	// echo "Connected successfully";
		global $con;

 // $host = 'localhost';
 //  $user = 'root';
 //  $password = '';
 //  $dbname = 'blog_travels';

 //  //Set DSN
 //  $dsn = 'mysql:host='.$host . ';dbname='. $dbname;

 //  //Create a PDO instance

 //  $pdo = new PDO($dsn, $user, $password);
 //  // $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
 //  $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
?>