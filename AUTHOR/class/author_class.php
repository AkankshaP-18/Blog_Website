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

			function getPostData()
		{
			global $con;

			$fetch_post = "SELECT `POST_ID`, `USER_ID`, `PARENT_ID`, `TITLE`, `SLUG`, `SUMMARY`, `PUBLISHED`, `DATE_CREATED`, `DATE_MODIFIED`, `PUBLISHED_ON`, `CONTENT` FROM `post_details` WHERE DELFLAG = 1";
        	$selresult = $con->query($fetch_post);
			while($final = $selresult->fetch_assoc())
			{
				$finalArray[$final['POST_ID']]=$final;
			}

			return $finalArray;
		}

		function getAuthorDetails()
		{
			global $con;

			$fetch_post = "SELECT `USER_ID`, `FIRST_NAME`, `LAST_NAME`, `MOBILE`, `EMAIL`, `DOB`, `PASSWORD`, `PROFILE`, `INTRO`, `LAST_LOGIN` FROM `member_details` WHERE PROFILE = 'Author'";
        	$selresult = $con->query($fetch_post);
			while($final = $selresult->fetch_assoc())
			{
				$finalArray=$final;
			}

			return $finalArray;

		}
function getPostDetails()
		{
			global $con;

			$fetch_cate_id = "SELECT `CATEGORY_ID` FROM `category_table`";
        	$result_id = $con->query($fetch_cate_id);
			while($row_id = $result_id->fetch_assoc())
			{
				$post_ids[]=$row_id;
			}

			foreach ($post_ids as $key => $value) {
				foreach ($value as $keys => $values) {	
					$fetch_post_id = "SELECT `POST_ID`, `CATEGORY_ID` FROM `post_category_table` WHERE CATEGORY_ID = '".$values."' AND DELFLAG = 1";
		        	$result = $con->query($fetch_post_id);
					while($id_row = $result->fetch_assoc())
					{
						$post_id[$id_row['CATEGORY_ID']][$id_row['POST_ID']]=$id_row['POST_ID'];
					}
				} 
			}
			// print_r($post_id);
			// die;

			$fetch_post_dets = "SELECT `POST_ID`, `USER_ID`, `PARENT_ID`, `TITLE`, `SLUG`, `SUMMARY`, `PUBLISHED`, `DATE_CREATED`, `DATE_MODIFIED`, `PUBLISHED_ON`, `CONTENT` FROM `post_details` WHERE DELFLAG = 1";
        	$result_post = $con->query($fetch_post_dets);
			while($row = $result_post->fetch_assoc())
			{
				$post_array[$row['POST_ID']]=$row;
			}

			foreach ($post_id as $key => $value) {
				foreach ($value as $keys => $values) {
					// print_r($values);
					foreach ($post_array as $k => $val) {
					// 	// print_r($k);
						if($values == $k)
						{
							// $post_id[$key][$keys] =$post_array[$values];
							$post_id[$key][$keys] =$val;
						}
					}
				}
				
			}
			// echo "<pre>";
			// print_r($post_id);
			// // print_r($post_array);
			// echo "</pre>";

			return $post_id;


		}
		function getCategoryPost($id)
		{
			global $con;

			$fetch_post_id = "SELECT `POST_ID`, `CATEGORY_ID` FROM `post_category_table` WHERE CATEGORY_ID = '".$id."' AND DELFLAG = 1";
        	$result = $con->query($fetch_post_id);
			while($id_row = $result->fetch_assoc())
			{
				$post_id[$id_row['CATEGORY_ID']][$id_row['POST_ID']]=$id_row['POST_ID'];
			}

			$fetch_post_dets = "SELECT `POST_ID`, `USER_ID`, `PARENT_ID`, `TITLE`, `SLUG`, `SUMMARY`, `PUBLISHED`, `DATE_CREATED`, `DATE_MODIFIED`, `PUBLISHED_ON`, `CONTENT` FROM `post_details` WHERE DELFLAG = 1";
        	$result_post = $con->query($fetch_post_dets);
			while($row = $result_post->fetch_assoc())
			{
				$post_array[$row['POST_ID']]=$row;
			}

			foreach ($post_id as $key => $value) {
				foreach ($value as $keys => $values) {
					// print_r($values);
					foreach ($post_array as $k => $val) {
					// 	// print_r($k);
						if($values == $k)
						{
							// $post_id[$key][$keys] =$post_array[$values];
							$post_id[$key][$keys] =$val;
						}
					}
				}
				
			}
			// echo "<pre>";
			// print_r($post_id);
			// // print_r($post_array);
			// echo "</pre>";

			print_r(json_encode($post_id));
		}
		function getPostDataSingle($id)
		{
			global $con;

			$fetch_post = "SELECT `POST_ID`, `USER_ID`, `PARENT_ID`, `TITLE`, `SLUG`, `SUMMARY`, `PUBLISHED`, `DATE_CREATED`, `DATE_MODIFIED`, `PUBLISHED_ON`, `CONTENT` FROM `post_details` WHERE POST_ID = '".$id."' AND DELFLAG = 1";
        	$selresult = $con->query($fetch_post);
			while($final = $selresult->fetch_assoc())
			{
				$finalArray=$final;
			}

			return $finalArray;
		}
	function addNewBlog($logData, $cate_id)
	{
		global $con;

		// print_r($logData);
		$userid 	= mysqli_real_escape_string($con, htmlspecialchars($logData['userid']));
		$category 	= mysqli_real_escape_string($con, htmlspecialchars($logData['category']));
		$title 		= mysqli_real_escape_string($con, htmlspecialchars($logData['title']));
		$summary 	= mysqli_real_escape_string($con, htmlspecialchars($logData['summary']));
		$comment 	= mysqli_real_escape_string($con, htmlspecialchars($logData['comment']));
		$cate_id 	= mysqli_real_escape_string($con, htmlspecialchars($cate_id));
		$max = 1;
		$query_user_id = "SELECT MAX(POST_ID) AS max FROM post_details WHERE DELFLAG = 1"; #get stock grp id
        $sql  = mysqli_query($con, $query_user_id);
       
        $row = mysqli_fetch_assoc($sql);
        				// print_r($row);
		$rowcount	= mysqli_num_rows($sql);
		if($rowcount > 0 && $row['max'] != '') {
							// echo 123;
        	$lastid = $row['max'];
        	$id = (($lastid * 1) + $max); # stock grp id
			$insert_post = "INSERT INTO `post_details`(`POST_ID`, `USER_ID`, `PARENT_ID`, `TITLE`, `SLUG`, `SUMMARY`, `PUBLISHED`, `DATE_CREATED`, `DATE_MODIFIED`, `PUBLISHED_ON`, `CONTENT`,`DELFLAG`) VALUES ('".$id."','".$userid."','','".$title."','','".$summary."',1,NOW(),NOW(),NOW(),'".$comment."',1)";

			$insert_cate_post = "INSERT INTO `post_category_table`(`POST_ID`, `CATEGORY_ID`,`DELFLAG`) VALUES ('".$id."','".$cate_id."',1)";
		}
		else
		{
			// echo 111;
			$insert_post = "INSERT INTO `post_details`(`POST_ID`, `USER_ID`, `PARENT_ID`, `TITLE`, `SLUG`, `SUMMARY`, `PUBLISHED`, `DATE_CREATED`, `DATE_MODIFIED`, `PUBLISHED_ON`, `CONTENT`,`DELFLAG`) VALUES ('201','".$userid."','','".$title."','','".$summary."',1,NOW(),NOW(),NOW(),'".$comment."',1)";

			$insert_cate_post = "INSERT INTO `post_category_table`(`POST_ID`, `CATEGORY_ID`,`DELFLAG`) VALUES ('201','".$cate_id."',1)";

		}

		$insertpost = mysqli_query($con,$insert_post);
		$insertpostcate = mysqli_query($con,$insert_cate_post);

		if($insertpost > 0 && $insertpostcate > 0)
		{
			$return = 1;
		}
		else
		{
			$return = 2;
		}

		echo $return;

	}

	function deletePost($post_id)
	{
		global $con;

		$delete_post = "UPDATE post_details SET DELFLAG = 2 WHERE DELFLAG = 1 AND POST_ID = '".$post_id."'";
		$deletepost = mysqli_query($con,$delete_post);
		$delete_post_cate = "UPDATE post_category_table SET DELFLAG = 2 WHERE DELFLAG = 1 AND POST_ID = '".$post_id."'";
		$deletecatepost = mysqli_query($con,$delete_post_cate);

		if($deletepost>0 && $deletecatepost>0)
		{
			$return = 1;
		}
		else
		{
			$return = 2;
		}

		echo $return;
	}

	function getPostEditData($post_id)
	{
		global $con;

		$fetch_cate_id = "SELECT CATEGORY_ID, POST_ID from post_category_table WHERE DELFLAG = 1 AND POST_ID = '".$post_id."'";
        	$result = $con->query($fetch_cate_id);
			while($id_row = $result->fetch_assoc())
			{
				$cate_id[$id_row['POST_ID']]=$id_row['CATEGORY_ID'];
				$cate_id_val=$id_row['CATEGORY_ID'];
			}
		$fetch_category = "SELECT CATEGORY_ID, TITLE FROM category_table WHERE CATEGORY_ID = '".$cate_id_val."'";
        	$result_cate = $con->query($fetch_category);
			while($row = $result_cate->fetch_assoc())
			{
				$cate_array[$row['CATEGORY_ID']]=$row;
			}

			foreach ($cate_id as $key => $value) {
				foreach ($cate_array as $keys => $values) {
					if($value == $keys)
					{
						$cate_id[$key] = $values;
					}
				}
			}

		$fetch_post_dets = "SELECT `POST_ID`, `USER_ID`, `PARENT_ID`, `TITLE`, `SLUG`, `SUMMARY`, `PUBLISHED`, `DATE_CREATED`, `DATE_MODIFIED`, `PUBLISHED_ON`, `CONTENT` FROM `post_details` WHERE DELFLAG = 1 AND POST_ID = '".$post_id."'";
        	$result_post = $con->query($fetch_post_dets);
			while($row = $result_post->fetch_assoc())
			{
				$row['CATE_DETAIL'] = $cate_id[$row['POST_ID']];
				$post_array=$row;
			}

		return $post_array;


	}

	function updateBlog($logData,$cate_id)
	{
		global $con;

		// print_r($logData);
		$userid 	= mysqli_real_escape_string($con, htmlspecialchars($logData['userid']));
		$post_id 	= mysqli_real_escape_string($con, htmlspecialchars($logData['postid']));
		$category 	= mysqli_real_escape_string($con, htmlspecialchars($logData['category']));
		$title 		= mysqli_real_escape_string($con, htmlspecialchars($logData['title']));
		$summary 	= mysqli_real_escape_string($con, htmlspecialchars($logData['summary']));
		$comment 	= mysqli_real_escape_string($con, htmlspecialchars($logData['comment']));
		$cate_id 	= mysqli_real_escape_string($con, htmlspecialchars($cate_id));

		$update_post = "UPDATE post_details SET TITLE = '".$title."', SUMMARY = '".$summary."', CONTENT = '".$comment."' WHERE DELFLAG = 1 AND POST_ID = '".$post_id."' AND USER_ID = '".$userid."' ";
		$updatepost = mysqli_query($con,$update_post);

		$update_cate = "UPDATE post_category_table SET CATEGORY_ID = '".$cate_id."' WHERE DELFLAG = 1 AND POST_ID = '".$post_id."'";
		$updatecate = mysqli_query($con,$update_cate);

		if($updatepost>0 && $updatecate>0)
		{
			$return = 1;
		}
		else
		{
			$return = 2;
		}

		echo $return;
	}
}



	$author_class = new AuthorClass();




?>