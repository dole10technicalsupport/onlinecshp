<?php define('db', TRUE); ?>
<?php include "dbh.server.inc.php"; ?>
<?php defined('db') or die('You have been track!'); ?>
<?php 

session_start();

if (isset($_SESSION['u_id'])){
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $remark = $_POST['remark'];
        $dateeval = $_POST['dateE'];
        $todaydate = date("Y-m-d");
        $sqlDate = date('Y-m-d', strtotime($todaydate));

        $now = time(); // or your date as well
        $dateb = strtotime($dateeval);
        $datediff = $now - $dateb;



        $dated = round($datediff / (60 * 60 * 24));
        //echo $s;

        $result = mysqli_query($conn, "UPDATE tbl_project_info SET project_status='APPROVED', remarks='$remark', pct='$dated', date_approved='$sqlDate' WHERE project_id='$id'");
        if($result){
            return 'data updated';
        }
    } 
}else{
    header("Location: ../../login.php");
}