<?php define('db', TRUE); ?>
<?php include "assets/includes/dbh.server.inc.php"; ?>
<?php defined('db') or die('You have been track!'); ?>
<?php 
session_start();
if (isset($_SESSION['u_id'])){
    if($_SESSION['role'] === "ADMIN"){
        //header("Location: index.php");
    }elseif($_SESSION['role'] === "USER"){
        header("Location: userdashboard.php");
    }else{
        //header("Location: adminprovincedashboard.php");
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
                            <?php
                                if($_SESSION['role'] === "MISOR"){
                                    $role = "MIS OR ADMIN";
                                }elseif($_SESSION['role'] === "MISOC"){
                                    $role = "MIS OC ADMIN";
                                }elseif($_SESSION['role'] === "BUKIDNON"){
                                    $role = "BUKIDNON ADMIN";
                                }elseif($_SESSION['role'] === "CAMIGUIN"){
                                    $role = "CAMIGUIN ADMIN";
                                }elseif($_SESSION['role'] === "LANAO"){
                                    $role = "LANAO ADMIN";
                                }else{

                                }
                            ?>
                            <p class="text-muted m-0"><?php echo $role; ?></p>
                        </div>
                    </div>   
                                        
                    <!--sidebar nav start-->
                    <ul class="side-navigation">
                        <li>
                            <h3 class="navigation-title">Navigation</h3>
                        </li>
                        <li>
                            <a href="adminprovincedashboard.php"><i class="mdi mdi-gauge"></i> <span>Dashboard</span></a>
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
                        <h4 class="my-2">Dashboard - <?php echo $role; ?></h4>
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
                                            if($_SESSION['role'] === "MISOR"){
                                                $sql = "SELECT COUNT(project_id) AS maxa FROM tbl_project_info WHERE project_status='APPROVED' AND provincee='MISAMIS ORIENTAL'";
                                                $result = mysqli_query($conn,$sql);
                                                $values = mysqli_fetch_assoc($result);
                                            }elseif($_SESSION['role'] === "MISOC"){
                                                $sql = "SELECT COUNT(project_id) AS maxa FROM tbl_project_info WHERE project_status='APPROVED' AND provincee='MISAMIS OCCIDENTAL'";
                                                $result = mysqli_query($conn,$sql);
                                                $values = mysqli_fetch_assoc($result);
                                            }elseif($_SESSION['role'] === "BUKIDNON"){
                                                $sql = "SELECT COUNT(project_id) AS maxa FROM tbl_project_info WHERE project_status='APPROVED' AND provincee='BUKIDNON'";
                                                $result = mysqli_query($conn,$sql);
                                                $values = mysqli_fetch_assoc($result);
                                            }elseif($_SESSION['role'] === "CAMIGUIN"){
                                                $sql = "SELECT COUNT(project_id) AS maxa FROM tbl_project_info WHERE project_status='APPROVED' AND provincee='CAMIGUIN'";
                                                $result = mysqli_query($conn,$sql);
                                                $values = mysqli_fetch_assoc($result);
                                            }elseif($_SESSION['role'] === "LANAO"){
                                                $sql = "SELECT COUNT(project_id) AS maxa FROM tbl_project_info WHERE project_status='APPROVED' AND provincee='LANAO DEL NORTE'";
                                                $result = mysqli_query($conn,$sql);
                                                $values = mysqli_fetch_assoc($result);
                                            }else{

                                            } 
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
                                            if($_SESSION['role'] === "MISOR"){
                                                $sql = "SELECT COUNT(project_id) AS maxb FROM tbl_project_info WHERE project_status='DENIED' AND provincee='MISAMIS ORIENTAL'";
                                                $result = mysqli_query($conn,$sql);
                                                $values = mysqli_fetch_assoc($result);
                                            }elseif($_SESSION['role'] === "MISOC"){
                                                $sql = "SELECT COUNT(project_id) AS maxb FROM tbl_project_info WHERE project_status='DENIED' AND provincee='MISAMIS OCCIDENTAL'";
                                                $result = mysqli_query($conn,$sql);
                                                $values = mysqli_fetch_assoc($result);
                                            }elseif($_SESSION['role'] === "BUKIDNON"){
                                                $sql = "SELECT COUNT(project_id) AS maxb FROM tbl_project_info WHERE project_status='DENIED' AND provincee='BUKIDNON'";
                                                $result = mysqli_query($conn,$sql);
                                                $values = mysqli_fetch_assoc($result);
                                            }elseif($_SESSION['role'] === "CAMIGUIN"){
                                                $sql = "SELECT COUNT(project_id) AS maxb FROM tbl_project_info WHERE project_status='DENIED' AND provincee='CAMIGUIN'";
                                                $result = mysqli_query($conn,$sql);
                                                $values = mysqli_fetch_assoc($result);
                                            }elseif($_SESSION['role'] === "LANAO"){
                                                $sql = "SELECT COUNT(project_id) AS maxb FROM tbl_project_info WHERE project_status='DENIED' AND provincee='LANAO DEL NORTE'";
                                                $result = mysqli_query($conn,$sql);
                                                $values = mysqli_fetch_assoc($result);
                                            }else{

                                            } 
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
                                            if($_SESSION['role'] === "MISOR"){
                                                $sql = "SELECT COUNT(project_id) AS maxc FROM tbl_project_info WHERE project_status='PENDING' AND provincee='MISAMIS ORIENTAL'";
                                                $result = mysqli_query($conn,$sql);
                                                $values = mysqli_fetch_assoc($result);
                                            }elseif($_SESSION['role'] === "MISOC"){
                                                $sql = "SELECT COUNT(project_id) AS maxc FROM tbl_project_info WHERE project_status='PENDING' AND provincee='MISAMIS OCCIDENTAL'";
                                                $result = mysqli_query($conn,$sql);
                                                $values = mysqli_fetch_assoc($result);
                                            }elseif($_SESSION['role'] === "BUKIDNON"){
                                                $sql = "SELECT COUNT(project_id) AS maxc FROM tbl_project_info WHERE project_status='PENDING' AND provincee='BUKIDNON'";
                                                $result = mysqli_query($conn,$sql);
                                                $values = mysqli_fetch_assoc($result);
                                            }elseif($_SESSION['role'] === "CAMIGUIN"){
                                                $sql = "SELECT COUNT(project_id) AS maxc FROM tbl_project_info WHERE project_status='PENDING' AND provincee='CAMIGUIN'";
                                                $result = mysqli_query($conn,$sql);
                                                $values = mysqli_fetch_assoc($result);
                                            }elseif($_SESSION['role'] === "LANAO"){
                                                $sql = "SELECT COUNT(project_id) AS maxc FROM tbl_project_info WHERE project_status='PENDING' AND provincee='LANAO DEL NORTE'";
                                                $result = mysqli_query($conn,$sql);
                                                $values = mysqli_fetch_assoc($result);
                                            }else{

                                            } 
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
                                            if($_SESSION['role'] === "MISOR"){
                                                $sql = "SELECT COUNT(project_id) AS maxd FROM tbl_project_info WHERE provincee='MISAMIS ORIENTAL'";
                                                $result = mysqli_query($conn,$sql);
                                                $values = mysqli_fetch_assoc($result);
                                            }elseif($_SESSION['role'] === "MISOC"){
                                                $sql = "SELECT COUNT(project_id) AS maxd FROM tbl_project_info WHERE provincee='MISAMIS OCCIDENTAL'";
                                                $result = mysqli_query($conn,$sql);
                                                $values = mysqli_fetch_assoc($result);
                                            }elseif($_SESSION['role'] === "BUKIDNON"){
                                                $sql = "SELECT COUNT(project_id) AS maxd FROM tbl_project_info WHERE provincee='BUKIDNON'";
                                                $result = mysqli_query($conn,$sql);
                                                $values = mysqli_fetch_assoc($result);
                                            }elseif($_SESSION['role'] === "CAMIGUIN"){
                                                $sql = "SELECT COUNT(project_id) AS maxd FROM tbl_project_info WHERE provincee='CAMIGUIN'";
                                                $result = mysqli_query($conn,$sql);
                                                $values = mysqli_fetch_assoc($result);
                                            }elseif($_SESSION['role'] === "LANAO"){
                                                $sql = "SELECT COUNT(project_id) AS maxd FROM tbl_project_info WHERE provincee='LANAO DEL NORTE'";
                                                $result = mysqli_query($conn,$sql);
                                                $values = mysqli_fetch_assoc($result);
                                            }else{

                                            } 
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
                                                if($_SESSION['role'] === "MISOR"){
                                                    $query = "SELECT * FROM tbl_project_info INNER JOIN tbl_company_info ON tbl_project_info.project_id = tbl_company_info.project_id WHERE tbl_project_info.provincee = 'MISAMIS ORIENTAL'";
                                                    $result1 = mysqli_query($conn, $query);
                                                }elseif($_SESSION['role'] === "MISOC"){
                                                    $query = "SELECT * FROM tbl_project_info INNER JOIN tbl_company_info ON tbl_project_info.project_id = tbl_company_info.project_id WHERE tbl_project_info.provincee = 'MISAMIS OCCIDENTAL'";
                                                    $result1 = mysqli_query($conn, $query);
                                                }elseif($_SESSION['role'] === "BUKIDNON"){
                                                    $query = "SELECT * FROM tbl_project_info INNER JOIN tbl_company_info ON tbl_project_info.project_id = tbl_company_info.project_id WHERE tbl_project_info.provincee = 'BUKIDNON'";
                                                    $result1 = mysqli_query($conn, $query);
                                                }elseif($_SESSION['role'] === "CAMIGUIN"){
                                                    $query = "SELECT * FROM tbl_project_info INNER JOIN tbl_company_info ON tbl_project_info.project_id = tbl_company_info.project_id WHERE tbl_project_info.provincee = 'CAMIGUIN'";
                                                    $result1 = mysqli_query($conn, $query);
                                                }elseif($_SESSION['role'] === "LANAO"){
                                                    $query = "SELECT * FROM tbl_project_info INNER JOIN tbl_company_info ON tbl_project_info.project_id = tbl_company_info.project_id WHERE tbl_project_info.provincee = 'LANAO'";
                                                    $result1 = mysqli_query($conn, $query);
                                                }else{

                                                }
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
                                                <?php //echo "<td>".$row['province']."</td>"; ?>
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
