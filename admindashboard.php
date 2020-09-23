<?php define('db', TRUE); ?>
<?php include "assets/includes/dbh.server.inc.php"; ?>
<?php defined('db') or die('You have been track!'); ?>
<?php 
session_start();
if (isset($_SESSION['u_id'])){
  if($_SESSION['role'] === "ADMIN"){
    if(isset($_POST["export"])){
        $connect = new PDO("mysql:host=localhost;dbname=dolexcshpformdb", "root", "");
        $file_name = 'reportdata.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$file_name");
        header("Content-Type: application/csv;");
    
        $file = fopen('php://output', 'w');
      

        $header = array("No.", "Company Name", "Company Address", "Rule 1020", "DO 18-A", "PCAB", "No. of Workers", "No. of Sub-contractor", "Project Classification","Project Name", "Project Owner", "Type of CSHP (Simplified or Comprehensive)" , "Date Filed", "Date Approved", "Date Ordered for Compliance","Date Disapproved", "*PCT (No. of days)", "Remarks", "Location");
        
        fputcsv($file, $header);
        
        $query = "
        SELECT * FROM ((tbl_project_info INNER JOIN tbl_company_info ON tbl_project_info.project_id = tbl_company_info.project_id) INNER JOIN tbl_owner_info ON tbl_owner_info.project_id = tbl_project_info.project_id) 
        WHERE date_filed >= '".$_POST["date1"]."' 
        AND date_filed <= '".$_POST["date2"]."' 
        AND project_status='APPROVED' ORDER BY date_filed DESC
        ";
        $statement = $connect->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $x= 1;
        foreach($result as $row){
            $data = array();
            $data[] = $x;
            $data[] = $row["company_name"];
            $data[] = $row["street"]. ", ".$row["barangay"]. ", ".$row["city"];
            $data[] = $row["rule1020"];
            $data[] = $row["do18A"];
            $data[] = $row["pcab"];
            $data[] = $row["total_worker"];
            $data[] = "N/A";
            $data[] = $row["classification"];
            $data[] = $row["project_name"];
            $data[] = $row["project_owner_name"];
            $data[] = $row["project_classification"];
            $data[] = $row["date_filed"];
            $data[] = $row["date_approved"];
            $data[] = "N/A";
            //$data[] = $row["date_disapproved"];
            $data[] = "N/A";
            $data[] = $row["pct"];
            $data[] = $row["remarks"];
            $data[] = $row["provincee"];

            fputcsv($file, $data);
            $x= $x +1;
        }
        fclose($file);
        exit;
     }

  }elseif($_SESSION['role'] === "USER"){
    header("Location: userdashboard.php");
  }else{
    header("Location: adminprovincedashboard.php");
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
                            <a href="admindashboard.php"><i class="mdi mdi-gauge"></i> <span>Dashboard</span></a>
                        </li>
                        <li>
                            <a href="adminaccountdashboard.php"><i class="mdi mdi-account-multiple-plus"></i> <span>System Account</span></a>
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
                        <a href="admindashboard.php">
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

                    <!--mega menu start-->
                    <div id="navbar-collapse-1" class="navbar-collapse collapse mega-menu">
                        
                    </div>
                    <!--mega menu end-->

                    <div class="notification-wrap">
                        <!--right notification start-->
                        <div class="right-notification">
                            <ul class="notification-menu">
                                <li>
                                    <a href="javascript:;" data-toggle="dropdown">
                                        <img src="assets/images/users/avatar-1.jpg" alt="">
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
                    
                    <div class="row">                        
                        <div class="col-lg-3 col-sm-6 bg-gradient">
                            <div class="widget-box bg-grad-2 m-b-30">
                                <div class="row d-flex align-items-center">
                                    <div class="col-4">
                                        <div class=""><i class="fa fa-thumbs-up"></i></div>
                                    </div>
                                    <div class="col-4 align-items-center">
                                        <p class="m-0 text-white text-center">Approved Application</p>
                                    </div>                                    
                                    <div class="col-4 align-self-end">
                                        <?php 
                                            $sql = "SELECT COUNT(project_id) AS maxa FROM tbl_project_info WHERE project_status='APPROVED'";
                                            $result = mysqli_query($conn,$sql);
                                            $values = mysqli_fetch_assoc($result);
                                        ?>                                        
                                        <h2 class="m-0 counter text-right"><?php echo $values['maxa']; ?></h2>                                         
                                    </div>
                                </div>
                           </div> 
                        </div>
                        <div class="col-lg-3 col-sm-6 bg-gradient">
                           <div class="widget-box bg-grad-3 m-b-30">
                                <div class="row d-flex align-items-center">
                                    <div class="col-4">
                                        <div class=""><i class="fa fa-thumbs-down"></i></div>
                                    </div>
                                    <div class="col-4 align-items-center">
                                        <p class="m-0 text-white text-center">Denied Application</p>
                                    </div>                                    
                                    <div class="col-4 align-self-end">
                                        <?php 
                                            $sql = "SELECT COUNT(project_id) AS maxb FROM tbl_project_info WHERE project_status='DENIED'";
                                            $result = mysqli_query($conn,$sql);
                                            $values = mysqli_fetch_assoc($result);
                                        ?>                                          
                                        <h2 class="m-0 counter text-right"><?php echo $values['maxb']; ?></h2>                                         
                                    </div>
                                </div>
                           </div> 
                        </div>
                        <div class="col-lg-3 col-sm-6 bg-gradient">
                            <div class="widget-box bg-grad-1 m-b-30">
                                <div class="row d-flex align-items-center">
                                    <div class="col-4">
                                        <div class=""><i class="fa fa-line-chart"></i></div>
                                    </div>
                                    <div class="col-4 align-items-center">
                                       <p class="m-0 text-white text-center">Pending Application</p>
                                       <?php 
                                            $sql = "SELECT COUNT(project_id) AS maxc FROM tbl_project_info WHERE project_status='PENDING'";
                                            $result = mysqli_query($conn,$sql);
                                            $values = mysqli_fetch_assoc($result);
                                        ?>                                           
                                    </div>                                    
                                    <div class="col-4 align-self-end">
                                        <h2 class="m-0 counter text-right"><?php echo $values['maxc']; ?></h2>
                                    </div>
                                </div>
                           </div> 
                        </div>
                        <div class="col-lg-3 col-sm-6 bg-gradient">
                            <div class="widget-box bg-grad-4 m-b-30">
                                <div class="row d-flex align-items-center">
                                    <div class="col-4">
                                        <div><i class="fa fa-id-card"></i></div>
                                    </div>
                                    <div class="col-4 align-items-center">
                                        <p class="m-0 text-white text-center">Overall Total of Application</p>
                                        <?php 
                                            $sql = "SELECT COUNT(project_id) AS maxd FROM tbl_project_info";
                                            $result = mysqli_query($conn,$sql);
                                            $values = mysqli_fetch_assoc($result);
                                        ?>    
                                    </div>                                    
                                    <div class="col-4 align-self-end">
                                        <h2 class="m-0 counter text-right"><?php echo $values['maxd']; ?></h2>
                                    </div>
                                </div>
                           </div> 
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
                                                    <th>Contractor</th>
                                                    <th>Total Worker</th>
                                                    <th>Contact</th>
                                                    <th>Project Name</th>
                                                    <th>Status</th>
                                                    <th>Date Filed</th>
                                                    <th>View</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $query = "SELECT * FROM tbl_project_info INNER JOIN tbl_company_info ON tbl_project_info.project_id = tbl_company_info.project_id";
                                                $result1 = mysqli_query($conn, $query);
                                                if($result1->num_rows > 0){?>
                                                <?php while($row = mysqli_fetch_array($result1)):;?>
                                                <?php echo "<tr>"; ?> 
                                                <?php echo "<td>".$row['company_name']."</td>"; ?>
                                                <?php echo "<td>".$row['total_worker']."</td>"; ?>
                                                <?php echo "<td>".$row['contact_no']."</td>"; ?>
                                                <?php echo "<td>".$row['project_name']."</td>"; ?>
                                                <?php 
                                                if($row['project_status'] === 'APPROVED'){
                                                    echo "<td>".$row['project_status']." <i style='color:green;' class='mdi mdi-check-circle'></i></td>";
                                                }else if($row['project_status'] === 'PENDING'){
                                                    echo "<td>".$row['project_status']." <i style='color:blue;' class='mdi mdi-bookmark-plus'></i></td>";
                                                }else if($row['project_status'] === 'DENIED'){
                                                    echo "<td>".$row['project_status']." <i style=''color:red; class='mdi mdi-backspace'></i></td>";
                                                }else{
                                                    echo "<td>".$row['project_status']." <i style=''color:green; class='mdi mdi-contact-mail'></i></td>";
                                                }
                                                ?>
                                                <?php //echo "<td>".$row['project_status']."</td>"; ?>
                                                <?php echo "<td>".$row['date_filed']."</td>"; ?>
                                                <?php echo "<td><center><form action='adminevaluatedocs.php' method='post'><input name='get' type='hidden' value=".$row['project_id'].'.'.$row['client_id']."><button name='submit' title='EVALUATE' class='btn btn-success '><i class='mdi mdi-file-document-box'></i></button></form></center></td>"; ?>
                                                <?php echo "</tr>"; ?>
                                                <?php endwhile;?>
                                                <?php }else{ }?>
                                                </tbody>
                                            </table>
                                        </div>           
                                    </div>
                                </div>
                            </div>
                        </div><!--end row-->

                        
                        <div class="row">
                        <div class="col-7">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <h5 class="header-title pb-3">GENERATE REPORT</h5>              
                                    <div class="general-label">
                                        <form class="form-inline" role="form" method="post">
                                            <div class="form-group">
                                                <label class="sr-only" for="exampleInputEmail2">FROM</label>
                                                FROM<input type="date" name="date1" class="form-control ml-3" id="datea"  style="margin-right:10px;" placeholder="" required>
                                            </div>
                                              
                                            <div class="form-group m-l-10">
                                                <label class="sr-only" for="exampleInputPassword2">TO</label>
                                                TO<input type="date" name="date2" class="form-control ml-3" id="dateb" placeholder="" required>
                                            </div>
                                            <button type="submit" name="export" class="btn btn-success ml-3">GENERATE</button>
                                        </form>           
                                    </div>                            
                                </div>
                            </div>
                        </div>
                    </div><!--end row-->
                            
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
