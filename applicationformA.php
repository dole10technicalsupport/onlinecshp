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

        <!-- Responsive and DataTables -->
        <link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Theme Css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/slidebars.min.css" rel="stylesheet">
        <link href="assets/css/icons.css" rel="stylesheet">
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet">
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
                            </ul>
                        </div><!--right notification end-->
                    </div>
                </div>
                <!-- header section end-->

                <div class="container-fluid">
                    <div class="page-head">
                        <h4 class="my-2">Dashboard</h4>
                    </div>
                    
                    <form style="box-shadow: 5px 5px 5px 5px #888888;" class="container table-bordered" method="post" action="cshpapplication.php">
                        <h3 style="margin-top:25px;">Please fill out this form so we can determine what requirement you should comply. Thank you.</h3>
                        <div class="form-group"> <!-- PROJECT -->
                            <label for="project_id" class="control-label">Type of Project</label>
                            <select class="form-control" id="project_id" name="project" onchange="change()">
                                <option value="cb">Commercial Building</option>
                                <option value="rb">Residential Buildings</option>
                                <option value="lp">Large Project</option>
                                <option value="gp">Government Project</option>
                            </select>					
                        </div>

                        <div class="form-group "> <!-- STOREY -->
                            <label for="storey_id" class="control-label">How many storey or floor your building has?</label>
                            <select class="form-control" id="storey_id" name="storey">
                                <option value="2sa">3 Storey and Above</option>
                                <option value="2sb">2 Storey and Below /Minor repairs</option>
                            </select>
                        </div>	

                        <div class="form-group"> <!-- PROJECT COST -->
                            <label for="cost_id" class="control-label">Total Cost of the Project?</label>
                            <select class="form-control" id="cost_id" name="cost">
                                <option value="3ma">3 Million and Above Project Cost</option>
                                <option value="3mb">3 Million and Below Project Cost</option>
                            </select>
                        </div>
                        
                        <div class="form-group"> <!-- TOTAL WORKERS -->
                            <label for="worker_id" class="control-label">Total Workers</label>
                            <select class="form-control" id="worker_id" name="worker">
                                <option value="10b">10 Workers and below</option>
                                <option value="11a">11 Workers and above</option>
                            </select>
                        </div>
                                                                
                        <div class="form-group"> <!-- SUBMIT BUTTON -->
                            <button type="submit" name="submit" class="btn btn-primary">Submit!</button>
                        </div>     
                
                    </form>		                                   
                </div>
                <!--footer section start-->
                <footer class="footer">
                    <center>2020 &copy; DOLE X.</center>
                </footer>
                <!--footer section end-->

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

         <!-- Responsive and datatable js -->
        <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

        <!--app js-->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
 
        
    </body>
</html>
