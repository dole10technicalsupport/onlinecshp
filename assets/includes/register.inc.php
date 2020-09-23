<?php
if (isset($_POST['submit'])) {

	define('db', TRUE); 
    include "dbh.server.inc.php"; 
    defined('db') or die('You have been track!'); 

	$first = mysqli_real_escape_string($conn, $_POST['first']);
	$last = mysqli_real_escape_string($conn, $_POST['last']);
	//$province = mysqli_real_escape_string($conn, $_POST['province']);
	$contact = mysqli_real_escape_string($conn, $_POST['contact_no']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
	

	//Error handlers
	//Check for empty fields
	if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd) || empty($contact) ){
		header ("Location: ../../register.php?error=empty");
		exit();
	} else {
		//Check if input characters are valid
		if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
			header ("Location: ../../register.php?error=invalid");
			exit();
		} else {
			//Check if email is valid
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				header ("Location: ../../register.php?error=email");
				exit();
			} else {
				$sql = "SELECT * FROM users WHERE user_uid='$uid'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);

				if ($resultCheck > 0) {
					header ("Location: ../../register.php?error=usertaken");
					exit();
				} else {
					//Hashing the password
					$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
					//Insert the user into the database
					$todaydate = date("Y-m-d");
        			$sqlDate = date('Y-m-d', strtotime($todaydate));
					$sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd, contact, user_role, active, date_registered) VALUES ('$first', '$last', '$email', '$uid', '$hashedPwd','$contact','USER','Active','$sqlDate');";
					mysqli_query($conn, $sql);
					header ("Location: ../../register.php?status=success");
					exit();
				}
			}
		}
	}


} else {
	header ("Location: ../signupform.php");
	exit();
}