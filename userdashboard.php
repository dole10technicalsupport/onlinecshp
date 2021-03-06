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

        <title>CSHP Online CSHP - User</title>

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
                        <h4 class="my-2">User Dashboard</h4>
                    </div>
                    
                    
                    </div><!--end row-->
                    <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                <div class="card m-b-30">
                                    <div class="card-body table-responsive">
                                        <h5 class="header-title">CSHP - Online System</h5>
                                        <p class="text-muted">Construction Safety and Health Program</p>
                                        <div class="">
                                            <table id="datatable2" class="table">
                                                <thead>
                                                <tr>
                                                    <th>Project Name</th>
                                                    <th>Project Duration</th>
                                                    <th>Project Classification</th>
                                                    <th>Total Worker</th>
                                                    <th>Status</th>
                                                    <th>Date Evaluated</th>
                                                    <th>View</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $clientid = $_SESSION['u_id'];
                                                $query = "SELECT * FROM tbl_project_info WHERE client_id='$clientid'";
                                                $result1 = mysqli_query($conn, $query);
                                                if($result1->num_rows > 0){?>
                                                <?php while($row = mysqli_fetch_array($result1)):;?>
                                                <?php echo "<tr>"; ?> 
                                                <?php echo "<td>".$row['project_name']."</td>"; ?>
                                                <?php echo "<td>".$row['project_duration']."</td>"; ?>
                                                <?php echo "<td>".$row['project_classification']."</td>"; ?>
                                                <?php echo "<td>".$row['total_worker']."</td>"; ?>
                                                <?php 
                                                if($row['project_status'] === 'APPROVED'){
                                                    echo "<td>".$row['project_status']." <i style='color:green;' class='mdi mdi-check-circle'></i></td>";
                                                }else if($row['project_status'] === 'PENDING'){
                                                    echo "<td>".$row['project_status']." <i style='color:blue;' class='mdi mdi-bookmark-plus'></i></td>";
                                                }else if($row['project_status'] === 'DENIED'){
                                                    echo "<td>".$row['project_status']." <i style=''color:red; class='mdi mdi-backspace'></i></td>";
                                                }else{
                                                    echo "<td>".$row['project_status']." <i style=''color:green; class='fas fa-star'></i></td>";
                                                }
                                                ?>
                                                <?php //echo "<td>".$row['project_status']."</td>"; ?>
                                                <?php echo "<td>".$row['date_evaluated']."</td>"; ?>
                                                <?php echo "<td><center><form action='userviewdocs.php' method='post'><input name='get' type='hidden' value=".$row['project_id'].'.'.$row['client_id']."><button name='submit' title='EVALUATE' class='btn btn-success '><i class='mdi mdi-file-document-box'></i></button></form></center></td>"; ?>
                                                <?php echo "</tr>"; ?>
                                                <?php endwhile;?>
                                                <?php }else{ }?>
                                                </tbody>
                                            </table>
                                        </div>           
                                    </div>
                                </div>
                            </div>
                        <!--end row-->                                     
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
    
        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable2').DataTable();  
            } );
        </script>
        
    </body>
</html>
