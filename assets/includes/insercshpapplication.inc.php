<?php define('db', TRUE); ?>
<?php include "dbh.server.inc.php"; ?>
<?php defined('db') or die('You have been track!'); ?>
<?php
session_start();

if(isset($_SESSION['u_id'])){
    if(isset($_POST['submit'])){
    //Uploadfile($conn);
    InsertApplication($conn);
    //Uploadfile($conn);
    //echo "A";
    }else{

    }
}else{
    header ("Location: ../../userdashboard.php");
    exit();
}

function InsertApplication($conn){

    //GET PROJECT ID
    $sql = "SELECT MAX(project_id) AS max FROM tbl_project_info";
    $result = mysqli_query($conn,$sql);
    $values = mysqli_fetch_assoc($result);
    $projectid = $values['max'];
    $projectid = $projectid + 1;

    $project_name = $_POST['project_name'];
    $street = $_POST['street'];
    $barangay = $_POST['barangay'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $zipcode = $_POST['zipcode'];
    $region = $_POST['region'];
    $project_duration = $_POST['project_duration'];
    $project_cost = $_POST['project_cost'];
    $project_start = $_POST['project_start'];
    $project_end = $_POST['project_end'];
    $total_worker = $_POST['total_worker'];
    $link = $_POST['link'];

    

    $project_status = "PENDING";
    
    $datefiled = date("Y-m-d");
    $id = $_SESSION['u_id'];

    $status = "PENDING";
    $remarks = "NONE";

    //GUIDE
    //gp - government project
    //lp - large project
    //cs - commercial simplified
    //cc - commercial comprehensive
    //rs - residential simplified
    //rc = residential comprehensive

    if($_POST['get'] === "GP"){
        $classification = "COMPREHENSIVE";
    }elseif($_POST['get'] === "LP"){
        $classification = "COMPREHENSIVE";
    }elseif($_POST['get'] === "CC"){
        $classification = "COMPREHENSIVE";
    }elseif($_POST['get'] === "CS"){
        $classification = "SIMPLIFIED";
    }elseif($_POST['get'] === "RS"){
        $classification = "SIMPLIFIED";
    }elseif($_POST['get'] === "RC"){
        $classification = "COMPREHENSIVE";
    }else{
        $classification = "NONE";
    }

    $project_id = $projectid + 1;
    $company_name = $_POST['company_name'];
    $company_street = $_POST['company_street'];
    $company_brgy = $_POST['company_brgy'];
    $company_city = $_POST['company_city'];
    $company_province = $_POST['company_province'];
    $company_zipcode = $_POST['company_zipcode'];
    $company_contact = $_POST['company_contact'];
    $pcab = $_POST['pcab'];
    $rule1020 = $_POST['rule1020'];
    $do18A = $_POST['do18A'];

    
    $owner_name = $_POST['owner_name'];
    $owner_street = $_POST['owner_street'];
    $owner_brgy = $_POST['owner_brgy'];
    $owner_city = $_POST['owner_city'];
    $owner_province = $_POST['owner_province'];
    $owner_zipcode = $_POST['owner_zipcode'];
    $owner_contact = $_POST['owner_contact'];

    $classi = $_POST['classi'];
 
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        header ("Location: ../../usercomprehensive.php");
        exit();
    }

    //$project_id =+1;
    
    $sql = "INSERT tbl_project_info(client_id, project_name, street, barangay, city, provincee, zipcode, region, project_duration,estimated_project_cost, estimated_project_start, estimated_project_end, total_worker, date_filed, project_status, project_classification, remarks, google_drive_link, classification) VALUES('" . $id  . "','" . $project_name . "','" . $street . "', '" . $barangay . "', '" . $city . "', '" . $province . "','" . $zipcode . "', '" . $region . "', '" . $project_duration . "', '" . $project_cost . "', '" . $project_start . "', '" . $project_end . "', '" . $total_worker . "', '" . $datefiled . "', '" . $project_status . "', '" . $classification. "','" . $remarks . "','".$link."', '".$classi."');";
    
    $sql .= "INSERT tbl_company_info(project_id, company_name, contact_no, street, barangay, city, province, zipcode, pcab, rule1020, do18A) VALUES('" . $projectid  . "','" . $company_name . "','" . $company_contact . "','" . $company_street . "', '" . $company_brgy . "','" . $company_city . "','" . $company_province . "','" . $company_zipcode . "','" . $pcab . "','" . $rule1020 . "', '" . $do18A . "');";

    $sql .= "INSERT tbl_owner_info(project_id, project_owner_name, contact_no, street, barangay, city, province, zip_code) VALUES('" . $projectid  . "','" . $owner_name . "','" . $owner_contact . "', '" . $owner_street . "', '" . $owner_brgy . "', '" . $owner_city . "','" . $owner_province . "', '" . $owner_zipcode . "')";

    //$sql2 = "INSERT tbl_owner_info(project_id, project_owner_name, contact_no, street, barangay, city, province, zipcode) VALUES('" . $id  . "','" . $project_name . "','" . $street . "', '" . $barangay . "', '" . $city . "', '" . $province . "','" . $zipcode . "', '" . $region . "', '" . $project_duration . "', '" . $project_cost . "', '" . $project_start . "', '" . $project_end . "', '" . $datefiled . "', '" . $project_status . "', '" . $classification. "', '" . $remarks . "','".$link."')";
    if ($conn->multi_query($sql) === TRUE) { 
        //echo "New record created successfully";

        //header ("Location: ../../cshpthankyoupage.php");
        //exit();
        //echo "A";
        //insertfilepath($conn); 
        header ("Location: ../../cshpthankyoupage.php");
        exit(); 
    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
        //header ("Location: ../usercomprehensive.php");
        //exit();
        //echo "AA";
        header ("Location: ../../userdashboard.php");
        exit();
    }

    
}

/*
function insertfilepath($conn){
    $sql = "SELECT MAX(project_id) AS max FROM tbl_project";
    $result = mysqli_query($conn,$sql);
    $values = mysqli_fetch_assoc($result);


    $projectid = $values['max'];
    
    $id = $_SESSION['u_id'];
    $path = $GLOBALS['a'];


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        header ("Location: usercomprehensive.php");
        exit();
    }
    
    $sql = "INSERT tbl_path_docs(project_id, client_id, path_a) VALUES('" . $projectid  . "','" . $id . "','" . $path . "')";
    
    if ($conn->query($sql) === TRUE) {
        //echo "New record created successfully";
        //header ("Location: ../thankyoupage.php");
        header ("Location: ../../cshpthankyoupage.php");
        exit();      
    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
        header ("Location: ../../userdashboard.php");
        //exit();
    }    
}

?>