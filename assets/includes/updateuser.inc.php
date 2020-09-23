<?php define('db', TRUE); ?>
<?php include "dbh.server.inc.php"; ?>
<?php defined('db') or die('You have been track!'); ?>
<?php 

session_start();

if (isset($_SESSION['u_id'])){
    if(isset($_POST['fname'])){
        $id = $_POST['id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lastname'];
        $uname = $_POST['username'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $role = $_POST['role'];
        $status = $_POST['status'];
        $result = mysqli_query($conn, "UPDATE users SET user_first='$fname', user_last='$lname', user_email='$email', user_uid='$uname', contact='$contact', user_role='$role', active='$status' WHERE user_id='$id'");
        if($result){
            return 'data updated';
            echo "ss";
        }
    
    }
}else{
    header("Location: ../../login.php");
}


?>