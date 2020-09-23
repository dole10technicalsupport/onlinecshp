<?php define('db', TRUE); ?>
<?php include "assets/includes/dbh.server.inc.php"; ?>
<?php defined('db') or die('You have been track!'); ?>
<?php 
session_start();
if (isset($_SESSION['u_id'])){
  if($_SESSION['role'] === "ADMIN"){
    //header("Location: index.php");
  }else{
    //header("Location: userdashboard.php");
  }
}else{
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="DOLE X - CSHP - Construction Safety and Health Program">
        <meta name="keyword" content="">

        <title>CSHP Online CSHP - Admin</title>

        <!-- Theme icon -->
        <link rel="shortcut icon" href="assets/images/cshp.ico">

        <!-- Theme Css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/slidebars.min.css" rel="stylesheet">
        <link href="assets/css/icons.css" rel="stylesheet">
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet">

        <style>
            .fa-hand-o-right {
                color:green;
            }
        </style>
    </head>

    <body class="sticky-header">
        <section>
            <!-- sidebar left start-->
            <div class="sidebar-left">
                <div class="sidebar-left-info">

                    <div class="user-box">
                        <div class="d-flex justify-content-center">
                            <img src="assets/images/default.png" alt="" class="img-fluid rounded-circle"> 
                        </div>
                        <div class="text-center text-white mt-2">
                            <h6><?php echo $_SESSION['u_first']. ' '. $_SESSION['u_last']; ?></h6>
                            <p class="text-muted m-0"><?php echo $_SESSION['role']; ?></p>
                        </div>
                    </div>   
                                        
                    <!--sidebar nav start-->
                    <ul class="side-navigation">
                        <li>
                            <h3 class="navigation-title">Navigation</h3>
                        </li>
                        <li>
                            <a href="userdashboard.php"><i class="mdi mdi-gauge"></i> <span>Dashboard</span></a>
                        </li>
                        <li>
                            <a href="applicationformA.php"><i class="mdi mdi-account-card-details"></i> <span>Apply CSHP</span></a>
                        </li>
                        <li>
                            <a href="http://citizenscharter.dole10.net/CSHP" target="_blank"><i class="mdi mdi-book-open"></i> <span>About CSHP</span></a>
                        </li>
                    </ul><!--sidebar nav end-->
                </div>
            </div><!-- sidebar left end-->

            <!-- body content start-->
            <div class="body-content">
                <!-- header section start-->
                <div class="header-section">
                    <!--logo and logo icon start-->
                    <div class="logo">
                        <a href="userdashboard.php">
                            <span class="logo-img">
                                <img src="assets/images/cshp.gif" alt="" height="36" width="40">
                            </span>
                            <!--<i class="fa fa-maxcdn"></i>-->
                            <span class="brand-name" style="font-family: 'Times New Roman', Times, serif;">DOLE REGION 10</span>
                        </a>
                    </div>

                    <!--toggle button start-->
                    <a class="toggle-btn"><i class="ti ti-menu"></i></a>
                    <!--toggle button end-->

            

                    <div class="notification-wrap">
                        <!--right notification start-->
                        <div class="right-notification">
                            <ul class="notification-menu">
                                <li>
                                    <a href="javascript:;" data-toggle="dropdown">
                                        <img src="assets/images/default.png" alt="">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right profile-menu">
                                        <a class="dropdown-item" href="assets/includes/logout.inc.php?logout=userout"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
                                    </div>
                                </li>

                                <li>
                                    <!--
                                    <div class="sb-toggle-right">
                                        <i class="mdi mdi-apps"></i>
                                    </div>-->
                                </li>
                            </ul>
                        </div><!--right notification end-->
                    </div>
                </div>
                <!-- header section end-->

                <div class="container-fluid">
                    <div class="page-head">
                        <h4 class="my-2 text-center">Construction Health and Safety Program Application</h4>
                    </div>
                    <?php
                    if(isset($_SESSION['u_first'])){
                        if(isset($_POST['project'])) {
                            $pro = $_POST['project'];
                            $sto = $_POST['storey'];
                            $cos = $_POST['cost'];
                            $wor = $_POST['worker'];

                            if($pro === "gp"){
                                $pro = "GOVERNMENT PROJECT";
                            }elseif($pro === "lp"){
                                $pro = "LARGE PROJECT";
                            }elseif($pro === "cb"){
                                $pro = "COMMERCIAL";
                            }elseif($pro === "rb"){
                                $pro = "RESIDENTIAL";
                            }else{}

                            if($sto === "2sa"){
                                $sto = "3 STOREY AND ABOVE";
                            }elseif($sto === "2sb"){
                                $sto = "2 STOREY AND BELOW / MINOR REPAIRS";
                            }else{}

                            if($cos === "3ma"){
                                $cos = "3 MILLION AND ABOVE PROJECT COST";
                            }elseif($cos === "3mb"){
                                $cos = "3 MILLION AND BELOW PROJECT COST";
                            }else{}

                            if($wor === "10b"){
                                $wor = "10 WORKERS AND BELOW";
                            }elseif($wor === "11a"){
                                $wor = "11 WORKERS AND ABOVE";
                            }else{}
                            
                           

                            if($_POST['project'] === "gp"){
                                echo '<div class="col-lg-11 col-sm-12 mx-auto container table-bordered" style="box-shadow: 7px 10px 15px 15px #888888; background-color:#F3F4F5;">
                                        <div class="card-body icon-list">
                                            <div class="card-title border-b mb-4" style="margin-top:20px;">
                                                <h5>Application Requirements</h5>
                                            </div>
                                            <h5 class="font-weight-bold text-dark">YOUR APPLICATION</h5>
                                                <ul class="list-unstyled">
                                                    <li><i class="fa fa-file-text"></i>'.$pro.'</li>
                                                    <li><i class="fa fa-file-text"></i>'.$sto.'</li>
                                                    <li><i class="fa fa-file-text"></i>'.$cos.'</li>
                                                    <li><i class="fa fa-file-text"></i>'.$wor.'</li>
                                                </ul>
                                            <h5 class="font-weight-bold text-dark">1. DOWNLOAD ALL CSHP APPLICATION FORM (PLEASE REFER TO THE LINK BELOW)</h5>
                                                <ul class="list-unstyled">
                                                    <li><i class="fa fa-hand-o-right" ></i><a href="http://ncr.dole.gov.ph/fndr/mis/files/Comprehensive%20CSHP%20Application%20Form.doc"> Download the form here</a> </li>
                                                    <li><i class="fa fa-hand-o-right" ></i><a href="http://ncr.dole.gov.ph/fndr/mis/files/Documentary%20Requirements%20and%20Format%20of%20Comprehensive%20CSHP%20.doc.docx"> Download the requirements here</a> </li>
                                                    <li><i class="fa fa-hand-o-right" ></i><a href="http://ncr.dole.gov.ph/fndr/mis/files/Comprehensive%20CHSP%20Template.doc"> Download Comprehensive Template Here</a> </li>
                                                </ul>
                                            <h5 class="font-weight-bold text-dark">2. SCAN ALL THE REQUIRED DOCUMENTS. (PLEASE REFER TO THE CHECKLIST BELOW)</h5><hr>
                                                <ul class="list-unstyled">
                                                    <li><i class="fa fa-hand-o-right"></i> Application Form of CSHP ( 3 Pages )</li>
                                                    <li><i class="fa fa-hand-o-right"></i> DOLE Registry of Establishment ( Rule 1020 ) of the Contractor'.'s Office</li>
                                                    <li><i class="fa fa-hand-o-right"></i> Certificate Philippine Contractors Association Board (PCAB)</li>
                                                    <li><i class="fa fa-hand-o-right"></i> Certificate of Construction Safety Training for Safety Officer 40 Hrs</li>
                                                    <li><i class="fa fa-hand-o-right"></i> Certificate of Basic First Aid Training for First Aider and I.D</li>
                                                    <li><i class="fa fa-hand-o-right"></i> Construction workers Skills Certificate TESDA (NC II)</li>
                                                    <li><i class="fa fa-hand-o-right"></i> Certificate of Heavy Equipment Operator TESDA (NC II)</li>
                                                    <li><i class="fa fa-hand-o-right"></i> Invitation to Bid/Notice of award</li>
                                                    <li><i class="fa fa-hand-o-right"></i> Construction Safety</li>
                                                    <li><i class="fa fa-hand-o-right"></i> For DPWH Projects they must have Concurrence Certificate signed by DPWH</li>
                                                    <li><i class="fa fa-hand-o-right"></i> Certificate of Safety Officer (COSH training)</li>
                                                    <li><i class="fa fa-hand-o-right"></i> Certificate of First-Aid training</li>
                                                </ul>
                                            <hr><h5 class="font-weight-bold text-dark">3. COMPRESS THE FOLDER INTO ZIP FILE (REFER TO THIS <a href="https://www.wikihow.com/Make-a-Zip-File" target="_blank" style="color:blue;">LINK </a>FOR INSTRUCTIONS)</h5><hr>
                                            <hr><h5 class="font-weight-bold text-dark">4. UPLOAD COMPRESSED FILE TO GOOGLE DRIVE (REFER TO THIS <a href="https://www.wikihow.com/Use-Google-Drive" target="_blank" style="color:blue;">LINK</a> FOR INSTRUCTIONS)</h5><hr>
                                            <hr><h5 class="font-weight-bold text-dark">5. ALLOW FILE TO BE SHARED (REFER TO THIS <a href="https://www.wikihow.com/Share-a-Google-Drive-File" target="_blank" style="color:blue;">LINK</a> FOR INSTRUCTIONS)</h5><hr>
                                            <hr><h5 class="font-weight-bold text-dark">6. COPY LINK AND PASTE IT TO THE FIELD BELOW (REFER TO THIS <a href="https://www.cloudwards.net/google-file-sharing/#:~:text=Click%20%E2%80%9Csharing%20settings.%E2%80%9D,you%20want%20to%20share%20it." target="_blank" style="color:blue;">LINK</a> FOR INSTRUCTIONS)</h5><hr>                                                                 
                                        </div>
                                    </div>';
                                    $typeofcshp = "GP";
                                }elseif($_POST['project'] === "lp"){
                                    echo '<div class="col-lg-11 col-sm-12 mx-auto container table-bordered" style="box-shadow: 7px 10px 15px 15px #888888; background-color:#F3F4F5;">
                                        <div class="card-body icon-list">
                                            <div class="card-title border-b mb-4" style="margin-top:20px;">
                                                <h5>Application Requirements</h5>
                                            </div>
                                            <h5 class="font-weight-bold text-dark">YOUR APPLICATION</h5>
                                                <ul class="list-unstyled">
                                                    <li><i class="fa fa-file-text"></i>'.$pro.'</li>
                                                    <li><i class="fa fa-file-text"></i>'.$sto.'</li>
                                                    <li><i class="fa fa-file-text"></i>'.$cos.'</li>
                                                    <li><i class="fa fa-file-text"></i>'.$wor.'</li>
                                                </ul>
                                            <h5 class="font-weight-bold text-dark">1. DOWNLOAD ALL CSHP APPLICATION FORM (PLEASE REFER TO THE LINK BELOW)</h5>
                                                <ul class="list-unstyled">
                                                    <li><i class="fa fa-hand-o-right" ></i><a href="http://ncr.dole.gov.ph/fndr/mis/files/Comprehensive%20CSHP%20Application%20Form.doc">Download the form here</a></li>
                                                    <li><i class="fa fa-hand-o-right" ></i><a href="http://ncr.dole.gov.ph/fndr/mis/files/Documentary%20Requirements%20and%20Format%20of%20Comprehensive%20CSHP%20.doc.docx">Download the requirements here</a></li>
                                                    <li><i class="fa fa-hand-o-right" ></i><a href="http://ncr.dole.gov.ph/fndr/mis/files/Comprehensive%20CHSP%20Template.doc">Download Comprehensive Template Here</a></li>
                                                </ul>
                                            <h5 class="font-weight-bold text-dark">2. SCAN ALL THE REQUIRED DOCUMENTS. (PLEASE REFER TO THE CHECKLIST BELOW)</h5><hr>
                                                <ul class="list-unstyled">
                                                    <li><i class="fa fa-hand-o-right"></i> Application Form of CSHP ( 3 Pages )</li>
                                                    <li><i class="fa fa-hand-o-right"></i> DOLE Registry of Establishment ( Rule 1020 ) of the Contractor'.'s Office</li>
                                                    <li><i class="fa fa-hand-o-right"></i> Certificate Philippine Contractors Association Board (PCAB)</li>
                                                    <li><i class="fa fa-hand-o-right"></i> Certificate of Construction Safety Training for Safety Officer 40 Hrs</li>
                                                    <li><i class="fa fa-hand-o-right"></i> Certificate of Basic First Aid Training for First Aider and I.D</li>
                                                    <li><i class="fa fa-hand-o-right"></i> Construction workers Skills Certificate TESDA (NC II)</li>
                                                    <li><i class="fa fa-hand-o-right"></i> Certificate of Heavy Equipment Operator TESDA (NC II)</li>
                                                    <li><i class="fa fa-hand-o-right"></i> Testing certificate of Heavy Equipment by DOLE Accredited Testing Organization</li>
                                                    <li><i class="fa fa-hand-o-right"></i> Invitation to Bid/Notice of award</li>
                                                    <li><i class="fa fa-hand-o-right"></i> Construction Safety & Health Program (25 Elements)</li>
                                                    <li><i class="fa fa-hand-o-right"></i> For DPWH Projects they must have Concurrence Certificate signed by DPWH</li>
                                                    <li><i class="fa fa-hand-o-right"></i> Certificate of Safety Officer (COSH training)</li>
                                                    <li><i class="fa fa-hand-o-right"></i> Certificate of First-Aid training</li>
                                                </ul>
                                            <hr><h5 class="font-weight-bold text-dark">3. COMPRESS THE FOLDER INTO ZIP FILE (REFER TO THIS <a href="https://www.wikihow.com/Make-a-Zip-File" target="_blank" style="color:blue;">LINK </a>FOR INSTRUCTIONS)</h5><hr>
                                            <hr><h5 class="font-weight-bold text-dark">4. UPLOAD COMPRESSED FILE TO GOOGLE DRIVE (REFER TO THIS <a href="https://www.wikihow.com/Use-Google-Drive" target="_blank" style="color:blue;">LINK</a> FOR INSTRUCTIONS)</h5><hr>
                                            <hr><h5 class="font-weight-bold text-dark">5. ALLOW FILE TO BE SHARED (REFER TO THIS <a href="https://www.wikihow.com/Share-a-Google-Drive-File" target="_blank" style="color:blue;">LINK</a> FOR INSTRUCTIONS)</h5><hr>
                                            <hr><h5 class="font-weight-bold text-dark">6. COPY LINK AND PASTE IT TO THE FIELD BELOW (REFER TO THIS <a href="https://www.cloudwards.net/google-file-sharing/#:~:text=Click%20%E2%80%9Csharing%20settings.%E2%80%9D,you%20want%20to%20share%20it." target="_blank" style="color:blue;">LINK</a> FOR INSTRUCTIONS)</h5><hr>                                                                 
                                        </div>
                                    </div>';
                                    $typeofcshp = "LP";
                                }elseif($_POST['project'] === "cb" AND $_POST['storey'] === "2sb" AND $_POST['cost'] === "3mb" AND $_POST['worker'] === "10b"){
                                    //COMMERCIAL - SIMPLIFIED
                                    echo '<div class="col-lg-11 col-sm-12 mx-auto container table-bordered" style="box-shadow: 7px 10px 15px 15px #888888; background-color:#F3F4F5;">
                                            <div class="card-body icon-list">
                                            <div class="card-title border-b mb-4" style="margin-top:20px;">
                                                <h5>Application Requirements</h5>
                                            </div>
                                                <h5 class="font-weight-bold text-dark">YOUR APPLICATION</h5>
                                                    <ul class="list-unstyled">
                                                        <li><i class="fa fa-file-text"></i>'.$pro.'</li>
                                                        <li><i class="fa fa-file-text"></i>'.$sto.'</li>
                                                        <li><i class="fa fa-file-text"></i>'.$cos.'</li>
                                                        <li><i class="fa fa-file-text"></i>'.$wor.'</li>
                                                    </ul>
                                                <h5 class="font-weight-bold text-dark">1. DOWNLOAD ALL CSHP APPLICATION FORM (PLEASE REFER TO THE LINK BELOW)</h5>
                                                <ul class="list-unstyled">
                                                <li><i class="fa fa-hand-o-right" ></i><a href="http://ncr.dole.gov.ph/fndr/mis/files/Simplified%20CSHP%20Application%20Form.doc">Download the form here</a></li>
                                                <li><i class="fa fa-hand-o-right" ></i><a href="http://ncr.dole.gov.ph/fndr/mis/files/Documentary%20Requirements%20and%20Format%20of%20Simplified%20CSHP.doc">Download the requirements here</a></li>
                                                <li><i class="fa fa-hand-o-right" ></i><a href="http://ncr.dole.gov.ph/fndr/mis/files/Simplified%20CHSP%20Template(1).doc">Download Simplified Template Here</a></li>
                                            </ul>
                                        <h5 class="font-weight-bold text-dark">2. SCAN ALL THE REQUIRED DOCUMENTS. (PLEASE REFER TO THE CHECKLIST BELOW)</h5><hr>
                                            <ul class="list-unstyled">
                                                <li><i class="fa fa-hand-o-right"></i> Application Form of CSHP ( 3 Pages )</li>
                                                <li><i class="fa fa-hand-o-right"></i> Proof of Project (Building Plan Photocopy)</li>
                                                <li><i class="fa fa-hand-o-right"></i> Construction Safety & Health Program (6 Pages) BWC Prescribed</li>
                                                <li><i class="fa fa-hand-o-right"></i> Certificate of First-Aid training</li>
                                                <li><i class="fa fa-hand-o-right"></i> Certificate of Safety Officer (COSH training)</li>
                                            </ul>
                                                <hr><h5 class="font-weight-bold text-dark">3. COMPRESS THE FOLDER INTO ZIP FILE (REFER TO THIS <a href="https://www.wikihow.com/Make-a-Zip-File" target="_blank" style="color:blue;">LINK </a>FOR INSTRUCTIONS)</h5><hr>
                                                <hr><h5 class="font-weight-bold text-dark">4. UPLOAD COMPRESSED FILE TO GOOGLE DRIVE (REFER TO THIS <a href="https://www.wikihow.com/Use-Google-Drive" target="_blank" style="color:blue;">LINK</a> FOR INSTRUCTIONS)</h5><hr>
                                                <hr><h5 class="font-weight-bold text-dark">5. ALLOW FILE TO BE SHARED (REFER TO THIS <a href="https://www.wikihow.com/Share-a-Google-Drive-File" target="_blank" style="color:blue;">LINK</a> FOR INSTRUCTIONS)</h5><hr>
                                                <hr><h5 class="font-weight-bold text-dark">6. COPY LINK AND PASTE IT TO THE FIELD BELOW (REFER TO THIS <a href="https://www.cloudwards.net/google-file-sharing/#:~:text=Click%20%E2%80%9Csharing%20settings.%E2%80%9D,you%20want%20to%20share%20it." target="_blank" style="color:blue;">LINK</a> FOR INSTRUCTIONS)</h5><hr>                                                                 
                                        </div>
                                    </div>';
                                    $typeofcshp = "CS";
                                }elseif(($_POST['project'] === "cb") AND $_POST['storey'] === "2sa" OR $_POST['cost'] === "3ma" OR $_POST['worker'] === "11a"){
                                    //COMMERCIAL - COMPREHENSIVE
                                    echo '<div class="col-lg-11 col-sm-12 mx-auto container table-bordered" style="box-shadow: 7px 10px 15px 15px #888888; background-color:#F3F4F5;">
                                            <div class="card-body icon-list">
                                            <div class="card-title border-b mb-4" style="margin-top:20px;">
                                                <h5>Application Requirements</h5>
                                            </div>
                                            <h5 class="font-weight-bold text-dark">YOUR APPLICATION</h5>
                                                <ul class="list-unstyled">
                                                    <li><i class="fa fa-file-text"></i>'.$pro.'</li>
                                                    <li><i class="fa fa-file-text"></i>'.$sto.'</li>
                                                    <li><i class="fa fa-file-text"></i>'.$cos.'</li>
                                                    <li><i class="fa fa-file-text"></i>'.$wor.'</li>
                                                </ul>
                                            <h5 class="font-weight-bold text-dark">1. DOWNLOAD ALL CSHP APPLICATION FORM (PLEASE REFER TO THE LINK BELOW)</h5>
                                            <ul class="list-unstyled">
                                                        <li><i class="fa fa-hand-o-right" ></i><a href="http://ncr.dole.gov.ph/fndr/mis/files/Comprehensive%20CSHP%20Application%20Form.doc">Download the form here</a></li>
                                                        <li><i class="fa fa-hand-o-right" ></i><a href="http://ncr.dole.gov.ph/fndr/mis/files/Documentary%20Requirements%20and%20Format%20of%20Comprehensive%20CSHP%20.doc.docx">Download the requirements here</a></li>
                                                        <li><i class="fa fa-hand-o-right" ></i><a href="http://ncr.dole.gov.ph/fndr/mis/files/Comprehensive%20CHSP%20Template.doc">Download Comprehensive Template Here</a></li>
                                                    </ul>
                                                <h5 class="font-weight-bold text-dark">2. SCAN ALL THE REQUIRED DOCUMENTS. (PLEASE REFER TO THE CHECKLIST BELOW)</h5><hr>
                                                    <ul class="list-unstyled">
                                                        <li><i class="fa fa-hand-o-right"></i> Application Form of CSHP ( 3 Pages )</li>
                                                        <li><i class="fa fa-hand-o-right"></i> Certificate of Construction Safety Training for Safety Officer 40 Hrs</li>
                                                        <li><i class="fa fa-hand-o-right"></i> Certificate of Basic First Aid Training for First Aider and I.D</li>
                                                        <li><i class="fa fa-hand-o-right"></i> Construction Safety & Health Program (6 Pages) BWC Prescribed</li>
                                                        <li><i class="fa fa-hand-o-right"></i> Certificate of First-Aid training</li>
                                                        <li><i class="fa fa-hand-o-right"></i> Certificate of Safety Officer (COSH training)</li>
                                                    </ul>    
                                           
                                            <hr><h5 class="font-weight-bold text-dark">3. COMPRESS THE FOLDER INTO ZIP FILE (REFER TO THIS <a href="https://www.wikihow.com/Make-a-Zip-File" target="_blank" style="color:blue;">LINK </a>FOR INSTRUCTIONS)</h5><hr>
                                            <hr><h5 class="font-weight-bold text-dark">4. UPLOAD COMPRESSED FILE TO GOOGLE DRIVE (REFER TO THIS <a href="https://www.wikihow.com/Use-Google-Drive" target="_blank" style="color:blue;">LINK</a> FOR INSTRUCTIONS)</h5><hr>
                                            <hr><h5 class="font-weight-bold text-dark">5. ALLOW FILE TO BE SHARED (REFER TO THIS <a href="https://www.wikihow.com/Share-a-Google-Drive-File" target="_blank" style="color:blue;">LINK</a> FOR INSTRUCTIONS)</h5><hr>
                                            <hr><h5 class="font-weight-bold text-dark">6. COPY LINK AND PASTE IT TO THE FIELD BELOW (REFER TO THIS <a href="https://www.cloudwards.net/google-file-sharing/#:~:text=Click%20%E2%80%9Csharing%20settings.%E2%80%9D,you%20want%20to%20share%20it." target="_blank" style="color:blue;">LINK</a> FOR INSTRUCTIONS)</h5><hr>                                                                 
                                        </div>
                                    </div>';
                                    $typeofcshp = "CC";
                                }elseif($_POST['project'] === "rb" AND $_POST['storey'] === "2sb" AND $_POST['cost'] === "3mb" AND $_POST['worker'] === "10b"){
                                    //RESIDENTIAL - SIMPLIFIED
                                    echo '<div class="col-lg-11 col-sm-12 mx-auto container table-bordered" style="box-shadow: 7px 10px 15px 15px #888888; background-color:#F3F4F5;">
                                            <div class="card-body icon-list">
                                                <div class="card-title border-b mb-4" style="margin-top:20px;">
                                                    <h5>Application Requirements</h5>
                                                </div>
                                                <h5 class="font-weight-bold text-dark">YOUR APPLICATION</h5>
                                                    <ul class="list-unstyled">
                                                        <li><i class="fa fa-file-text"></i>'.$pro.'</li>
                                                        <li><i class="fa fa-file-text"></i>'.$sto.'</li>
                                                        <li><i class="fa fa-file-text"></i>'.$cos.'</li>
                                                        <li><i class="fa fa-file-text"></i>'.$wor.'</li>
                                                    </ul>
                                                <h5 class="font-weight-bold text-dark">1. DOWNLOAD ALL CSHP APPLICATION FORM (PLEASE REFER TO THE LINK BELOW)</h5>
                                                    <ul class="list-unstyled">
                                                        <li><i class="fa fa-hand-o-right"></i><a href="http://ncr.dole.gov.ph/fndr/mis/files/Simplified%20CSHP%20Application%20Form.doc">Download the form here</a></li>
                                                        <li><i class="fa fa-hand-o-right"></i><a href="http://ncr.dole.gov.ph/fndr/mis/files/Documentary%20Requirements%20and%20Format%20of%20Simplified%20CSHP.doc">Download the requirements here</a></li>
                                                        <li><i class="fa fa-hand-o-right"></i><a href="http://ncr.dole.gov.ph/fndr/mis/files/Simplified%20CHSP%20Template(1).doc">Download Simplified Template Here</a></li>
                                                    </ul>
                                                <h5 class="font-weight-bold text-dark">2. SCAN ALL THE REQUIRED DOCUMENTS. (PLEASE REFER TO THE CHECKLIST BELOW)</h5><hr>
                                                    <ul class="list-unstyled">
                                                        <li><i class="fa fa-hand-o-right"></i> Application Form of CSHP ( 3 Pages )</li>
                                                        <li><i class="fa fa-hand-o-right"></i> Proof of Project (Building Plan Photocopy)</li>
                                                        <li><i class="fa fa-hand-o-right"></i> Construction Safety & Health Program (6 Pages) BWC Prescribed</li>
                                                        <li><i class="fa fa-hand-o-right"></i> Certificate of First-Aid training</li>
                                                        <li><i class="fa fa-hand-o-right"></i> Certificate of Safety Officer (COSH training)</li>
                                                    </ul>
                                                <hr><h5 class="font-weight-bold text-dark">3. COMPRESS THE FOLDER INTO ZIP FILE (REFER TO THIS <a href="https://www.wikihow.com/Make-a-Zip-File" target="_blank" style="color:blue;">LINK </a>FOR INSTRUCTIONS)</h5><hr>
                                                <hr><h5 class="font-weight-bold text-dark">4. UPLOAD COMPRESSED FILE TO GOOGLE DRIVE (REFER TO THIS <a href="https://www.wikihow.com/Use-Google-Drive" target="_blank" style="color:blue;">LINK</a> FOR INSTRUCTIONS)</h5><hr>
                                                <hr><h5 class="font-weight-bold text-dark">5. ALLOW FILE TO BE SHARED (REFER TO THIS <a href="https://www.wikihow.com/Share-a-Google-Drive-File" target="_blank" style="color:blue;">LINK</a> FOR INSTRUCTIONS)</h5><hr>
                                                <hr><h5 class="font-weight-bold text-dark">6. COPY LINK AND PASTE IT TO THE FIELD BELOW (REFER TO THIS <a href="https://www.cloudwards.net/google-file-sharing/#:~:text=Click%20%E2%80%9Csharing%20settings.%E2%80%9D,you%20want%20to%20share%20it." target="_blank" style="color:blue;">LINK</a> FOR INSTRUCTIONS)</h5><hr>                                                                 
                                        </div>
                                    </div>';
                                    $typeofcshp = "RS";
                                }elseif(($_POST['project'] === "rb") AND $_POST['storey'] === "2sa" OR $_POST['cost'] === "3ma" OR $_POST['worker'] === "11a"){
                                    //RESIDENTIAL - COMPREHENSIVE
                                    echo '<div class="col-lg-11 col-sm-12 mx-auto container table-bordered" style="box-shadow: 7px 10px 15px 15px #888888; background-color:#F3F4F5;">
                                            <div class="card-body icon-list">
                                                <div class="card-title border-b mb-4" style="margin-top:20px;">
                                                    <h5>Application Requirements</h5>
                                                </div>
                                            <h5 class="font-weight-bold text-dark">YOUR APPLICATION</h5>
                                            <ul class="list-unstyled">
                                                <li><i class="fa fa-file-text"></i>'.$pro.'</li>
                                                <li><i class="fa fa-file-text"></i>'.$sto.'</li>
                                                <li><i class="fa fa-file-text"></i>'.$cos.'</li>
                                                <li><i class="fa fa-file-text"></i>'.$wor.'</li>
                                            </ul>
                                            <h5 class="font-weight-bold text-dark">1. DOWNLOAD ALL CSHP APPLICATION FORM (PLEASE REFER TO THE LINK BELOW)</h5>
                                            <ul class="list-unstyled">
                                                <li><i class="fa fa-hand-o-right" ></i><a href="http://ncr.dole.gov.ph/fndr/mis/files/Comprehensive%20CSHP%20Application%20Form.doc">Download the form here</a></li>
                                                <li><i class="fa fa-hand-o-right" ></i><a href="http://ncr.dole.gov.ph/fndr/mis/files/Documentary%20Requirements%20and%20Format%20of%20Comprehensive%20CSHP%20.doc.docx">Download the requirements here</a></li>
                                                <li><i class="fa fa-hand-o-right" ></i><a href="http://ncr.dole.gov.ph/fndr/mis/files/Comprehensive%20CHSP%20Template.doc">Download Comprehensive Template Here</a></li>
                                            </ul>
                                            <h5 class="font-weight-bold text-dark">2. SCAN ALL THE REQUIRED DOCUMENTS. (PLEASE REFER TO THE CHECKLIST BELOW)</h5><hr>
                                            <ul class="list-unstyled">
                                                <li><i class="fa fa-hand-o-right"></i> Application Form of CSHP ( 3 Pages )</li>
                                                <li><i class="fa fa-hand-o-right"></i> Certificate of Construction Safety Training for Safety Officer 40 Hrs</li>
                                                <li><i class="fa fa-hand-o-right"></i> Certificate of Basic First Aid Training for First Aider and I.D</li>
                                                <li><i class="fa fa-hand-o-right"></i> Construction Safety & Health Program (6 Pages) BWC Prescribed</li>
                                                <li><i class="fa fa-hand-o-right"></i> Certificate of First-Aid training</li>
                                                <li><i class="fa fa-hand-o-right"></i> Certificate of Safety Officer (COSH training)</li>
                                            </ul>   
                                                <hr><h5 class="font-weight-bold text-dark">3. COMPRESS THE FOLDER INTO ZIP FILE (REFER TO THIS <a href="https://www.wikihow.com/Make-a-Zip-File" target="_blank" style="color:blue;">LINK </a>FOR INSTRUCTIONS)</h5><hr>
                                                <hr><h5 class="font-weight-bold text-dark">4. UPLOAD COMPRESSED FILE TO GOOGLE DRIVE (REFER TO THIS <a href="https://www.wikihow.com/Use-Google-Drive" target="_blank" style="color:blue;">LINK</a> FOR INSTRUCTIONS)</h5><hr>
                                                <hr><h5 class="font-weight-bold text-dark">5. ALLOW FILE TO BE SHARED (REFER TO THIS <a href="https://www.wikihow.com/Share-a-Google-Drive-File" target="_blank" style="color:blue;">LINK</a> FOR INSTRUCTIONS)</h5><hr>
                                                <hr><h5 class="font-weight-bold text-dark">6. COPY LINK AND PASTE IT TO THE FIELD BELOW (REFER TO THIS <a href="https://www.cloudwards.net/google-file-sharing/#:~:text=Click%20%E2%80%9Csharing%20settings.%E2%80%9D,you%20want%20to%20share%20it." target="_blank" style="color:blue;">LINK</a> FOR INSTRUCTIONS)</h5><hr>                                                                 
                                        </div>
                                    </div>';
                                    $typeofcshp = "RC";
                                }else{   

                                }

                            }else{
           
                            }

                        }else{
     
                        }
                        ?>

                    <form style="box-shadow: 7px 10px 15px 15px #888888; margin-top: 40px; margin-bottom:60px;" method="post" action="assets/includes/insercshpapplication.inc.php" id="form-app" class="container table-bordered col-lg-11 col-sm-12" enctype="multipart/form-data">
                    <br>
                    <h5 style="font-weight:bolder;">Construction Safety and Health Program Form</h5>
                    <div class="row">

                        <div class="form-group col-sm-12">
                            <!-- Full Name -->
                            <label class="control-label">Name of the Project</label>
                            <input pattern="[A-Za-z0-9\s]+" type="text" class="form-control" name="project_name" placeholder="Complete Name of the Project (Input letters and numbers only)" required/>
                        </div>

                        <div class="form-group col-sm-12">
                          <h5 style="font-weight:bolder;">Project Location : </h5>
                        </div>

                        <div class="form-group col-sm-6">
                            <!-- Street -->
                            <label class="control-label">No./Street</label>
                            <input pattern="[A-Za-z0-9\s]+" type="text" class="form-control" name="street" placeholder="Block No / Street (Input letters and numbers only)" required/>
                        </div>

                        <div class="form-group col-sm-6">
                            <!-- Barangay -->
                            <label class="control-label">Barangay/Subdivision</label>
                            <input pattern="[A-Za-z0-9\s]+" type="text" class="form-control" name="barangay" placeholder="Barangay / Subdivision (Input letters and numbers only)" required/>
                        </div>

                        <div class="form-group col-sm-6">
                            <!-- Province -->
                            <label class="control-label">Province</label>
                            <select name="province" id="province" class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;" required>
                                <option>Select province</option>
                                    <optgroup label="REGION 10 PROVINCE">
                                        <option value="MISAMIS ORIENTAL">Misamis Oriental</option>
                                        <option value="MISAMIS OCCIDENTAL">Misamis Occidental</option>
                                        <option value="BUKIDNON">Bukidnon</option>
                                        <option value="LANAO DEL NORTE">Lanao Del Norte</option>
                                        <option value="CAMIGUIN">Camiguin</option>
                                    </optgroup>
                            </select>
                            <!--<input data-parsley-type="alphanum" type="text" class="form-control" c placeholder="Province" required/>-->
                        </div>

                        <div class="form-group col-sm-6">
                            <!-- City -->
                            <label class="control-label">City/Municipality</label>
                            <!--<input data-parsley-type="alphanum" type="text" class="form-control" name="city" placeholder="City / Municipality" required/>-->
                            <select placeholder="City / Municipality" name="city" id="city" class="select2 form-control mb-3" style="width: 100%; height:36px;" required>
                                
                            </select>
                        </div>

                        <div class="form-group col-sm-6">
                            <!-- Zip Code -->
                            <label class="control-label">Zip Code</label>
                            <input data-parsley-type="digits" type="text" class="form-control" name="zipcode" placeholder="Zip Code" required/>
                        </div>

                        <div class="form-group col-sm-6">
                            <!-- Region -->
                            <label class="control-label">Region</label>
                            <input pattern="[A-Za-z0-9\s]+" type="text" class="form-control" name="region" value="REGION X" readonly/>
                        </div>

                        <div class="form-group col-sm-6">
                            <!-- Project Start -->
                            <label class="control-label">Estimated Project Start</label>
                            <input type="date" class="form-control" name="project_start" placeholder="Estimated Project Start" required>
                        </div>

                        <div class="form-group col-sm-6">
                            <!-- Project End -->
                            <label class="control-label">Estimated Project End</label>
                            <input type="date" class="form-control" name="project_end" placeholder="Estimated Project End" required>
                        </div>

                        <div class="form-group col-sm-6">
                            <!-- Project Duration -->
                            <label class="control-label">Project Duration (In Days)</label>
                            <input data-parsley-type="digits" type="text" class="form-control" name="project_duration" placeholder="Project Duration (E.X. 265 Days)" required>
                        </div>

                        <div class="form-group col-sm-6">
                            <!-- Project Cost -->
                            <label class="control-label">Estimated Project Cost</label>
                            <input data-parsley-type="digits" type="text" class="form-control" name="project_cost" placeholder="Project Cost (E.X. 9,000,000)" required>
                        </div>

                        <div class="form-group col-sm-6">
                            <!-- Number of Workers -->
                            <label class="control-label">Number of Worker</label>
                            <input data-parsley-type="digits" type="number" class="form-control" name="total_worker" placeholder="Number of Worker" required>
                        </div>

                        <div class="form-group col-sm-6">
                            <!-- Classification -->
                            <label class="control-label">Project Classification</label>
                            <select name="classi" id="classification" class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;" required>
                                <option disabled>Select project classification</option>
                                    <optgroup label="CLASSIFICATION">
                                        <option value="REHABILITATION">REHABILITATION</option>
                                        <option value="IMPROVEMENT">IMPROVEMENT</option>
                                        <option value="CONSTRUCTION">CONSTRUCTION</option>
                                        <option value="COMMERCIAL">COMMERCIAL</option>
                                        <option value="RESIDENTIAL">RESIDENTIAL</option>
                                        <option value="EXTENSION">EXTENSION</option>
                                        <option value="CONCRETING">CONCRETING</option>
                                        <option value="DEVELOPMENT">DEVELOPMENT</option>
                                        <option value="FURNISHING">FURNISHING</option>
                                        <option value="POTABLE">POTABLE</option>
                                        <option value="REPAIR">REPAIR</option>
                                        <option value="CONCRETE">CONCRETE</option>
                                        <option value="BUILDING">BUILDING</option>
                                        <option value="FENCE">FENCE</option>
                                        <option value="FLY OVER">FLY OVER</option>
                                        <option value="INSTALLATION">INSTALLATION</option>
                                        <option value="REBLOCKING">REBLOCKING</option>
                                        <option value="APARTMENT">APARTMENT</option>
                                        <option value="RENOVATION">RENOVATION</option>
                                        <option value="IMPROVEMENT">IMPROVEMENT</option>
                                        <option value="OPENING">OPENING</option>
                                        <option value="COMPLETION">COMPLETION</option>
                                        <option value="BRIDGE">BRIDGE</option>
                                        <option value="ROAD">ROAD</option>
                                        <option value="MULTIPURPOSE">MULTIPURPOSE</option>
                                        <option value="INFRATRACTURE">INFRATRACTURE</option>
                                        <option value="OTHERS">OTHERS</option>
                                    </optgroup>
                            </select>
                        </div>

                        <div class="form-group col-sm-12">
                          <h5 style="font-weight:bolder;">Project Owner Information : </h5>
                        </div>

                        <div class="form-group col-sm-12">
                            <!-- Owner Name -->
                            <label class="control-label">Complete Name of Project Owner</label>
                            <input pattern="[A-Za-z0-9\s]+" type="text" class="form-control" name="owner_name" placeholder="Complete Name of Project Owner (Input letters only)" required>
                        </div>

                        <div class="form-group col-sm-12">
                            <h5 style="font-weight:bolder;">Project Owner Address : </h5>
                        </div>

                        <div class="form-group col-sm-4">
                            <!-- Street -->
                            <label class="control-label">No./Street</label>
                            <input pattern="[A-Za-z0-9\s]+" type="text" class="form-control" name="owner_street" placeholder="Street Address of Owner (Input letters and numbers only)" required>
                        </div>

                        <div class="form-group col-sm-4">
                            <!-- Barangay -->
                            <label class="control-label">Barangay/Subdivision</label>
                            <input pattern="[A-Za-z0-9\s]+" type="text" class="form-control" name="owner_brgy" placeholder="Owner Barangay/Subdivision (Input letters and numbers only)" required>
                        </div>

                        <div class="form-group col-sm-4">
                            <!-- City-->
                            <label class="control-label">City/Municipality</label>
                            <input pattern="[A-Za-z0-9\s]+" type="text" class="form-control" name="owner_city" placeholder="Owner Address : City / Municipality (Input letters and numbers only)" required>
                        </div>

                        <div class="form-group col-sm-4">
                            <!-- Province -->
                            <label class="control-label">Province</label>
                            <input pattern="[A-Za-z0-9\s]+" type="text" class="form-control" name="owner_province" placeholder="Owner Address : Province" required>
                        </div>

                        <div class="form-group col-sm-4">
                            <!-- Zip Code -->
                            <label class="control-label">Zip Code</label>
                            <input pattern="[A-Za-z0-9\s]+" type="text" class="form-control" name="owner_zipcode" placeholder="Owner Zip Code (Input numbers only)" required>
                        </div>
                        

                        <div class="form-group col-sm-4">
                            <!-- Owner Contact -->
                            <label class="control-label">Contact No. of Project Owner</label>
                            <input data-parsley-type="digits" type="text" class="form-control" name="owner_contact" placeholder="Owner Contact No." required>
                        </div>

                        <div class="form-group col-sm-12">
                          <h5 style="font-weight:bolder;">Contractor's Details : </h5>
                        </div>

                        <div class="form-group col-sm-12">
                            <!-- Contractor Name -->
                            <label class="control-label">Name of Contractor (If any)</label>
                            <input pattern="[A-Za-z0-9\s]+" type="text" class="form-control" name="company_name" placeholder="Complete Name of the Company / Main / General Contractor (Input letters and numbers only)" title="Complete Name of the Company / Main / General Contractor" required>
                        </div>

                        <div class="form-group col-sm-12">
                          <h5 style="font-weight:bolder;">Contractor's Address : </h5>
                        </div>

                        <div class="form-group col-sm-6">
                            <!-- Street -->
                            <label class="control-label">No./Street (If any)</label>
                            <input pattern="[A-Za-z0-9\s]+" type="text" class="form-control" name="company_street" placeholder="Complete Street Address of Contractor / Main / General Contractor (Input letters and numbers only)" required>
                        </div>

                        <div class="form-group col-sm-6">
                            <!-- Barangay -->
                            <label class="control-label">Barangay/Subdivision (If any)</label>
                            <input pattern="[A-Za-z0-9\s]+" type="text" class="form-control" name="company_brgy" placeholder="Contractor's Barangay/Subdivision (Input letters and numbers only)" required>
                        </div>

                        <div class="form-group col-sm-6">
                            <!-- City -->
                            <label class="control-label">City/Municipality (If any)</label>
                            <input pattern="[A-Za-z0-9\s]+" type="text" class="form-control" name="company_city" placeholder="Contractor's City / Municipality (Input letters and numbers only)" required>
                        </div>

                        <div class="form-group col-sm-6">
                            <!-- Province -->
                            <label class="control-label">Province (If any)</label>
                            <input pattern="[A-Za-z0-9\s]+" type="text" class="form-control" name="company_province" placeholder="Company Province (Input letters and numbers only)" required>
                        </div>

                        <div class="form-group col-sm-6">
                            <!-- Zip Code -->
                            <label class="control-label">Zip Code (If any)</label>
                            <input pattern="[A-Za-z0-9\s]+" type="text" class="form-control" name="company_zipcode" placeholder="Company Zip Code (Input numbers only)" required>
                        </div>

                        <div class="form-group col-sm-6">
                            <!-- Contractor Contact -->
                            <label class="control-label">Contractor's Contact No.</label>
                            <input pattern="[A-Za-z0-9\s]+" type="text" class="form-control" name="company_contact" placeholder="Contact No. of Company / Main / General Contractor (Input letters and numbers only)" required>
                        </div>

                        <div class="form-group col-sm-4">
                            <!-- Date of PCAB -->
                            <label class="control-label">PCAB (Date of registration)</label>
                            <input type="date" class="form-control" name="pcab" placeholder="Date of PCAB registration" required>
                        </div>

                        <div class="form-group col-sm-4">
                            <!-- Date of DO-18-A -->
                            <label class="control-label">DO-18-A (Date of registratioin)</label>
                            <input type="date" class="form-control" name="do18A" placeholder="Date of DO-18-A registration" required>
                        </div>

                        <div class="form-group col-sm-4">
                            <!-- Date of RULE 1020 -->
                            <label class="control-label">Rule 1020 (Date of registratioin)</label>
                            <input type="date" class="form-control" name="rule1020" placeholder="Date of Rule 1020 registration" required>
                        </div>
                    </div>
                    <br>                     
                    <h3></h3>
                    <div class="form-group col-sm-13" id="googelinkinput">
                        <label class="control-label text-dark font-weight-bold">Paste Google Drive Link Below</label>
                        <input parsley-type="url" type="input" class="form-control" name="link"
                            placeholder="Google Drive Link of the requirements" required> 
                    </div>

                    <input name='get' type='hidden' value="<?php echo $typeofcshp; ?>">

                    <div class="form-group">
                        <!-- Submit Button -->
                        <center>
                        <button type="submit" id="submitappbtn" class="btn btn-primary" name="submit">SUBMIT YOUR
                            APPLICATION</button>
                        </center>
                    </div>
        
                </form>                                                    
                
                          
    
            </div>   
        </div>
        <!--end body content-->

        </section>

        
        
        <!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery-migrate.js"></script>
        <script src="assets/js/modernizr.min.js"></script>
        <script src="assets/js/jquery.slimscroll.min.js"></script>
        <script src="assets/js/slidebars.min.js"></script>

        <!--app js-->
        
        <script src="assets/js/jquery.app.js"></script>
        <script src="assets/pages/jquery.form-advance.init.js" type="text/javascript"></script>
        <!-- Parsley js -->
        <script type="text/javascript" src="assets/plugins/parsleyjs/dist/parsley.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#form-app').parsley();
            });
        </script>

        <script type="text/javascript" src="assets/js/citiesselection.js"></script>
            

    </body>
</html>
