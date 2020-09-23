<?php
if (isset($_GET['logout'])){
	if($_GET['logout'] === "userout"){
	session_start();
	session_unset();
	session_destroy();
	header("Location: ../../login.php");
	exit();
	}
}
