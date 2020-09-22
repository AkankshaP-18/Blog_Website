<?php

	$path = '../class/';
	include_once($path.'config.php');

/**
 * 
 */
class AuthorClass
{
	
	function __construct()
	{
		# code...
	}

	function getCategoryData()
	{
		global $con;
		// $mobile = mysqli_real_escape_string($con, htmlspecialchars($logData['mobile']));
		// $password = mysqli_real_escape_string($con, htmlspecialchars($logData['password']));
		$fetch_category = "SELECT `CATEGORY_ID`, `TITLE` FROM `category_table`";

        $selresult = $con->query($fetch_category);
			while($final = $selresult->fetch_assoc())
			{
				$finalArray[$final['CATEGORY_ID']]=$final;
						// $address_id[] = $final['ADDRESS_ID'];
			}

			return $finalArray;
			


	}
}



	$author_class = new AuthorClass();




?>