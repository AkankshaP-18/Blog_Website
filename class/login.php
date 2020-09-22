<?php

include_once('config.php');

/**
 * 
 */
class LoginClass 
{
	
	function __construct()
	{
		# code...
	}
	function register_data($logData)
	{
		global $con;
		$f_name = mysqli_real_escape_string($con, htmlspecialchars($logData['first_name']));
		$l_name = mysqli_real_escape_string($con, htmlspecialchars($logData['last_name']));
		$email = mysqli_real_escape_string($con, htmlspecialchars($logData['email']));
		$mobile = mysqli_real_escape_string($con, htmlspecialchars($logData['mobile']));
		$password = mysqli_real_escape_string($con, htmlspecialchars($logData['password']));

		$max = 1;

		if(!empty($f_name) || !empty($l_name) || !empty($mobile) || !empty($email)) {

			$selsql		= "SELECT `MOBILE`, `EMAIL` FROM `member_details` WHERE `MOBILE`='".$mobile."' OR `EMAIL`='".$email."'"; //selection of mobile number from table to check mobile number exists or no.
			$selresult 	= mysqli_query($con, $selsql);
			$rowcount	= mysqli_num_rows($selresult);

			if($rowcount > 0) {
				// echo "111";
				$return = array('invalidmobno' =>'invalidmobno' ,'mobno' => $mobile);
				// echo $return;
			}

			else {
				        $query_user_id = "SELECT MAX(USER_ID) AS max FROM member_details"; #get stock grp id
        				$sql  = mysqli_query($con, $query_user_id);
       
        				$row = mysqli_fetch_assoc($sql);
        				// print_r($row);
						$rowcount	= mysqli_num_rows($sql);
						if($rowcount > 0) {
							// echo 123;
        					$lastid = $row['max'];
        					$id = (($lastid * 1) + $max); # stock grp id
						 	$insertsql_register = "INSERT INTO `member_details`(`USER_ID`, `FIRST_NAME`, `LAST_NAME`, `MOBILE`, `EMAIL`, `DOB`, `PASSWORD`, `PROFILE`, `INTRO`, `LAST_LOGIN`) VALUES ('".$id."','".$f_name."','".$l_name."','".$mobile."','".$email."','','".$password."','Guest','',NOW())";
						}
						else
						{
							echo 111;
						 // $insertsql_register = "INSERT INTO `member_details`(`USER_ID`, `FIRST_NAME`, `LAST_NAME`, `MOBILE`, `EMAIL`, `DOB`, `PASSWORD`, `PROFILE`, `INTRO`, `LAST_LOGIN`) VALUES ('G_101','".$f_name."','".$l_name."','".$mobile."','".$email."','','".$password."','Guest','',NOW())";

						} 

						$insertres  = mysqli_query($con,$insertsql_register);
		    	if(($insertres > 0)) {
					// echo "33";
					$return = array('validdetails' =>'validdetails' ,'mobno' => $mobile);
				}
			}



		}
			print_r(trim(json_encode($return)));
		// return $return;

	}

	function login_check($logData)
	{
		global $con;
		$return = false;
		$mobile = ($logData['user_name']);
		$Password = ($logData['password']);
		$sql_login = "SELECT * FROM `member_details` WHERE `MOBILE`='". $mobile ."' OR `EMAIL` = '".$mobile."' AND `PASSWORD`='".$Password."'";

		    $sql  = mysqli_query($con, $sql_login);
       		$row = mysqli_fetch_assoc($sql);
        				// print_r($row);
			$rowcount	= mysqli_num_rows($sql);
			if($rowcount > 0)
			{
				// $return = 1;
				foreach ($row as $key => $value)
				{
					$_SESSION['USER_ID'] = $row['USER_ID'];

					$_SESSION['MOBILE'] = $row['MOBILE']; 
					$role = $row['PROFILE'];

					$sql = "UPDATE `member_details` SET `LAST_LOGIN` = NOW() WHERE `USER_ID`='". $_SESSION['USER_ID'] ."' AND MOBILE = '".$_SESSION['MOBILE']."'";

					$update_log  = mysqli_query($con,$sql);
				}	
			}
			else
			{
				$role = 'false';
			}

			echo $role;
		// return $return;
	}

	function isUserLoggedIn()
	{ 

			//check session created or not
			global $con;
			$return = false;
			if (isset($_SESSION['USER_ID']) && ($_SESSION['USER_ID'] > 0) && ($_SESSION['USER_ID'] != ''))
			{
				$id = $_SESSION['USER_ID'];
				if ($this->chkValidUser($id))
				{
					$return = true;
				}
			}
			return $return;
	}


		function chkValidUser($id)
		{

			global $con;
			$return = false;
			$sql = "SELECT * FROM `member_details` WHERE `USER_ID`='". $id ."'";
			$result = $con->query($sql);
			$count = mysqli_num_rows($result);

			if (($result) && (($count) > 0))
			{
				$return = true;
			}
			return $return;
		}

		function doUserLogout()

		{

			//session destroy
			$return = true;
			$_SESSION['USER_ID'] = '';
			$_SESSION['MOBILENO'] = '';

			unset($_SESSION['USER_ID']);
			unset($_SESSION['MOBILENO']);

			session_destroy();
			session_start();
			session_regenerate_id();
			$new_sessionid = session_id();
			// echo $new_sessionid;

			return $return;

		}


}
	$class_login = new LoginClass();

?>