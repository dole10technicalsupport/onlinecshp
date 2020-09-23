<?php define('db', TRUE); ?>
<?php include "dbh.server.inc.php"; ?>
<?php defined('db') or die('You have been track!'); ?>
<?php 

session_start();

if (isset($_SESSION['u_id'])){
    if(isset($_POST['remark'])){
        $id = $_POST['id'];
        $remark = $_POST['remark'];
        $result = mysqli_query($conn, "UPDATE tbl_project_info SET google_drive_link='$remark' WHERE project_id='$id'");
        if($result){
            return 'data updated';
        }
    
    }
}else{
    header("Location: ../../login.php");
}


?>