<?php

	$path = '../class/';
	include_once($path.'config.php');

	/**
	 * 
	 */
	class GuestClass
	{
		
		function __construct()
		{
			# code...
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
	}


$guest_class = new GuestClass();

?>