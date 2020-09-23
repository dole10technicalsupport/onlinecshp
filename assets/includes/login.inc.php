<?php 
//START SESSION
session_start();

//CONDITION CHECKING
if (isset($_POST['submit'])) {
    define('db', TRUE); 
    include "dbh.server.inc.php"; 
    defined('db') or die('You have been track!'); 
	//include 'dbh.server.inc.php';

	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

	//Error handlers
	//Check if inputs are empty
	if (empty($uid) || empty($pwd)) {
			header("Location: ../../login.php?login=empty");
			exit();
	} else {
		$sql = "SELECT * FROM users WHERE user_uid='$uid' OR user_email='$uid'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			header("Location: ../../login.php?login=error");
			exit();
		} else {
			if ($row = mysqli_fetch_assoc($result)) {
				//De-hashing the paswrd
				$hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
				if ($hashedPwdCheck == false) {
					header("Location: ../../login.php?login=error");
					exit();
				}elseif ($hashedPwdCheck == true) {

					if($row['user_role'] === "USER"){
						//Log in - the user path
						$_SESSION['u_id'] = $row['user_id'];
						$_SESSION['u_first'] = $row['user_first'];
						$_SESSION['u_last'] = $row['user_last'];
						$_SESSION['u_email'] = $row['user_email'];
						$_SESSION['u_uid'] = $row['user_uid'];
						$_SESSION['role'] = $row['user_role'];
						header("Location: ../../userdashboard.php?login=success");
						exit();
					}elseif($row['user_role'] === "ADMIN"){
						//Log in - the admin path
						$_SESSION['u_id'] = $row['user_id'];
						$_SESSION['u_first'] = $row['user_first'];
						$_SESSION['u_last'] = $row['user_last'];
						$_SESSION['u_email'] = $row['user_email'];
						$_SESSION['u_uid'] = $row['user_uid'];
						$_SESSION['role'] = $row['user_role'];
						header("Location: ../../admindashboard.php?login=success");
						exit();
					}elseif($row['user_role'] === "MISOR"){
						//Log in - the admin path
						$_SESSION['u_id'] = $row['user_id'];
						$_SESSION['u_first'] = $row['user_first'];
						$_SESSION['u_last'] = $row['user_last'];
						$_SESSION['u_email'] = $row['user_email'];
						$_SESSION['u_uid'] = $row['user_uid'];
						$_SESSION['role'] = $row['user_role'];
						header("Location: ../../adminprovincedashboard.php?login=success");
						exit();

					}elseif($row['user_role'] === "MISOC"){
						//Log in - the admin path
						$_SESSION['u_id'] = $row['user_id'];
						$_SESSION['u_first'] = $row['user_first'];
						$_SESSION['u_last'] = $row['user_last'];
						$_SESSION['u_email'] = $row['user_email'];
						$_SESSION['u_uid'] = $row['user_uid'];
						$_SESSION['role'] = $row['user_role'];
						header("Location: ../../adminprovincedashboard.php?login=success");
						exit();

					}elseif($row['user_role'] === "BUKIDNON"){
						//Log in - the admin path
						$_SESSION['u_id'] = $row['user_id'];
						$_SESSION['u_first'] = $row['user_first'];
						$_SESSION['u_last'] = $row['user_last'];
						$_SESSION['u_email'] = $row['user_email'];
						$_SESSION['u_uid'] = $row['user_uid'];
						$_SESSION['role'] = $row['user_role'];
						header("Location: ../../adminprovincedashboard.php?login=success");
						exit();
					}elseif($row['user_role'] === "CAMIGUIN"){
						//Log in - the admin path
						$_SESSION['u_id'] = $row['user_id'];
						$_SESSION['u_first'] = $row['user_first'];
						$_SESSION['u_last'] = $row['user_last'];
						$_SESSION['u_email'] = $row['user_email'];
						$_SESSION['u_uid'] = $row['user_uid'];
						$_SESSION['role'] = $row['user_role'];
						header("Location: ../../adminprovincedashboard.php?login=success");
						exit();
					}elseif($row['user_role'] === "LANAO"){
						//Log in - the admin path
						$_SESSION['u_id'] = $row['user_id'];
						$_SESSION['u_first'] = $row['user_first'];
						$_SESSION['u_last'] = $row['user_last'];
						$_SESSION['u_email'] = $row['user_email'];
						$_SESSION['u_uid'] = $row['user_uid'];
						$_SESSION['role'] = $row['user_role'];
						header("Location: ../../adminprovincedashboard.php?login=success");
						exit();
					}else{
						header("Location: ../../login.php?login=error");
						exit();
					}
				
				}
			}
		}
	}
} else {
	header("Location: ../../login.php?login=error");
	exit();
}