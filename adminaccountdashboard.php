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
                        <!--<li>
                            <a href="http://citizenscharter.dole10.net/CSHP" target="_blank"><i class="mdi mdi-book-open"></i> <span>About CSHP</span></a>
                        </li>-->
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
                        <ul class="nav navbar-nav">                           
                            <!-- Classic dropdown -->
                            <li class="dropdown">
                                <a href="javascript:;" data-toggle="dropdown" class=""> English <i class="mdi mdi-chevron-down"></i> </a>
                                <ul role="menu" class="dropdown-menu language-switch">
                                    <li>
                                        <a tabindex="-1" href="javascript:;"> German </a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="javascript:;"> Italian </a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="javascript:;"> French </a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="javascript:;"> Spanish </a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="javascript:;"> Russian </a>
                                    </li>
                                </ul>
                            </li>
                             <!-- Classic list 
                            <li>
                                <form class="search-content" action="index.html" method="post">
                                    <input type="text" class="form-control mt-3" name="keyword" placeholder="Search...">
                                    <span class="search-button"><i class="ti ti-search"></i></span>
                                </form>
                            </li>-->
                        </ul>
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
                                        <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle m-r-5 text-muted"></i> Profile</a>
                                        <a class="dropdown-item" href="#"><span class="badge badge-success pull-right">5</span><i class="mdi mdi-settings m-r-5 text-muted"></i> Settings</a>
                                        <a class="dropdown-item" href="#"><i class="mdi mdi-lock-open-outline m-r-5 text-muted"></i> Lock screen</a>
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
                        <h4 class="my-2">System Account - Dashboard</h4>
                    </div>
                    
                    <div class="row">                        
                        <div class="col-lg-4 col-sm-6 bg-gradient">
                            <div class="widget-box bg-grad-2 m-b-30">
                                <div class="row d-flex align-items-center">
                                    <div class="col-4">
                                        <div class=""><i class="fa fa-user"></i></div>
                                    </div>
                                    <div class="col-4 align-items-center">
                                        <p class="m-0 text-white text-center">Total System Users</p>
                                    </div>                                    
                                    <div class="col-4 align-self-end">
                                        <?php 
                                            $sql = "SELECT COUNT(user_id) AS maxa FROM users WHERE user_role='USER'";
                                            $result = mysqli_query($conn,$sql);
                                            $values = mysqli_fetch_assoc($result);
                                        ?>                                        
                                        <h2 class="m-0 counter text-right"><?php echo $values['maxa']; ?></h2>                                         
                                    </div>
                                </div>
                           </div> 
                        </div>
                        <div class="col-lg-4 col-sm-6 bg-gradient">
                           <div class="widget-box bg-grad-3 m-b-30">
                                <div class="row d-flex align-items-center">
                                    <div class="col-4">
                                        <div class=""><i class="fa fa-id-card-o"></i></div>
                                    </div>
                                    <div class="col-4 align-items-center">
                                        <p class="m-0 text-white text-center">Total System Admin</p>
                                    </div>                                    
                                    <div class="col-4 align-self-end">
                                        <?php 
                                            $sql = "SELECT COUNT(user_id) AS maxb FROM users WHERE user_role='ADMIN'";
                                            $result = mysqli_query($conn,$sql);
                                            $values = mysqli_fetch_assoc($result);
                                        ?>                                          
                                        <h2 class="m-0 counter text-right"><?php echo $values['maxb']; ?></h2>                                         
                                    </div>
                                </div>
                           </div> 
                        </div>
                        <div class="col-lg-4 col-sm-6 bg-gradient">
                            <div class="widget-box bg-grad-1 m-b-30">
                                <div class="row d-flex align-items-center">
                                    <div class="col-4">
                                        <div class=""><i class="fa fa-users"></i></div>
                                    </div>
                                    <div class="col-4 align-items-center">
                                       <p class="m-0 text-white text-center">Overall Total Accounts</p>
                                       <?php 
                                            $sql = "SELECT COUNT(user_id) AS maxc FROM users";
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
                    </div><!--end row-->
                    <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                <div class="card m-b-30">
                                    <div class="card-body table-responsive">
                                        <h5 class="header-title">System Users</h5>
                                        <p class="text-muted">System Users and Admins</p>
                                        <div class="">
                                            <table id="datatable2" class="table">
                                                <thead>
                                                <tr>
                                                    <th>Account ID</th>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Email</th>
                                                    <th>Username</th>
                                                    <th>Contact</th>
                                                    <th>Role</th>
                                                    <th>Status</th>
                                                    <th class='text-center'>Date Registered</th>
                                                    <th>View</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $query = "SELECT * FROM users";
                                                $result1 = mysqli_query($conn, $query);
                                                if($result1->num_rows > 0){?>
                                                <?php while($row = mysqli_fetch_array($result1)):;?>
                                                <?php echo "<tr>"; ?> 
                                                <?php echo "<td>".$row['user_id']."</td>"; ?>
                                                <?php echo "<td>".$row['user_first']."</td>"; ?>
                                                <?php echo "<td>".$row['user_last']."</td>"; ?>
                                                <?php echo "<td>".$row['user_email']."</td>"; ?>
                                                <?php echo "<td>".$row['user_uid']."</td>"; ?>
                                                <?php echo "<td>".$row['contact']."</td>"; ?>
                                                <?php echo "<td>".$row['user_role']."</td>"; ?>
                                                <?php echo "<td>".$row['active']."</td>"; ?>
                                                <?php echo "<td>".$row['date_registered']."</td>"; ?>
                                                <?php //echo "<td>".$row['project_status']."</td>"; ?>
                                                <?php //echo "<td>".$row['date_filed']."</td>"; ?>
                                                <?php echo "<td><center><form action='adminviewusers.php' method='post'><input name='get' type='hidden' value=".$row['user_id']."><button name='submit' title='VIEW USER' class='btn btn-success '><i class='mdi mdi-account-settings-variant'></i></button></form></center></td>"; ?>
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


                <!-- Right Slidebar start -->
                <div class="sb-slidebar sb-right sb-style-overlay">
                    <div class="right-bar slimscroll">
                        <span class="r-close-btn sb-close"><i class="fa fa-times"></i></span>

                        <ul class="nav nav-tabs nav-justified-">
                            <li class="">
                                <a href="#chat" class="active" data-toggle="tab">Chat</a>
                            </li>
                            <li class="">
                                <a href="#activity" data-toggle="tab">Activity</a>
                            </li>
                            <li class="">
                                <a href="#settings" data-toggle="tab">Settings</a>
                            </li>
                        </ul>
                        
                    </div>
                </div>
                <!--end Right Slidebar-->
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