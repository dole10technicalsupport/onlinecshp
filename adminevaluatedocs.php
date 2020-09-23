<?php define('db', TRUE); ?>
<?php include "assets/includes/dbh.server.inc.php"; ?>
<?php defined('db') or die('You have been track!'); ?>
<?php 
session_start();
setlocale(LC_MONETARY,"en_US");
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

        <title>CSHP Online System - EVALUATE DOCUMENTS</title>

        <!-- Theme icon -->
        <link rel="shortcut icon" href="assets/images/cshp.ico">

        <!-- Theme Css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/slidebars.min.css" rel="stylesheet">
        <link href="assets/css/icons.css" rel="stylesheet">
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet">
        <style>
            dd {
                font-weight: bolder;
                color: black;
                font-size: 17px;;
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
                        <?php 
                            if($_SESSION['role'] === "ADMIN"){
                                echo '<li>
                                        <a href="admindashboard.php"><i class="mdi mdi-gauge"></i> <span>Dashboard</span></a>
                                      </li>';
                            }else{
                                echo '<li>
                                        <a href="adminprovincedashboard.php"><i class="mdi mdi-gauge"></i> <span>Dashboard</span></a>
                                      </li>';
                            }
                        ?>
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
                        <h4 class="my-2">Construction Safety and Health Program Application</h4>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-8 col-sm-12">
                            <div class="card bg-white m-b-30">
                                <?php 
                                $data = $_POST['get'];
                                $parts = explode('.',$data);       
                                $projectid = $parts[0];
                                $clientid = $parts[1];
                                $query = "SELECT * FROM tbl_project_info WHERE project_id=$projectid AND client_id=$clientid";
                                $result1 = mysqli_query($conn, $query);
                                if($result1->num_rows > 0){?>
                                <?php while($row = mysqli_fetch_array($result1)):; ?>
                                <?php echo '<div class="card-body">
                                                <div class="card-title border-b mb-4">
                                                    <h5>Project Information</h5>
                                                </div>
                                                <dl class="row">
                                                    <dt class="col-sm-3">Project Name</dt>
                                                    <dd class="col-sm-9">'.$row[2].'</dd>

                                                    <dt class="col-sm-3">Project Duration</dt>
                                                    <dd class="col-sm-9">'.$row[9].' Days </dd>

                                                    <dt class="col-sm-3">Estimated Project Cost</dt>
                                                    <dd class="col-sm-9">Php '.$english_format_number = number_format($row[10], 2, '.', ',') . "\n".'</dd>

                                                    <dt class="col-sm-3 text-truncate">Estimated Project Start</dt>
                                                    <dd class="col-sm-9">'.$row[11].'</dd>

                                                    <dt class="col-sm-3 text-truncate">Estimated Project End</dt>
                                                    <dd class="col-sm-9">'.$row[12].'</dd>

                                                    <br><br><br>
                                                    <dt class="col-sm-12 text-truncate"><h5>Project Complete Address</h5></dt>

                                                    <dt class="col-sm-3 text-truncate">No./Street</dt>
                                                    <dd class="col-sm-9">'.$row[3].'</dd>

                                                    <dt class="col-sm-3 text-truncate">Barangay / Subdivision</dt>
                                                    <dd class="col-sm-9">'.$row[4].'</dd>

                                                    <dt class="col-sm-3 text-truncate">City/Municipality</dt>
                                                    <dd class="col-sm-9">'.$row[5].'</dd>

                                                    <dt class="col-sm-3 text-truncate">Province</dt>
                                                    <dd class="col-sm-9">'.$row[6].'</dd>

                                                    <dt class="col-sm-3 text-truncate">Zip Code</dt>
                                                    <dd class="col-sm-9">'.$row[7].'</dd>

                                                    <dt class="col-sm-3 text-truncate">Region</dt>
                                                    <dd class="col-sm-9">'.$row[8].'</dd>

                                                    <br><br><br>
                                                    <dt class="col-sm-12 text-truncate"><h5>Application Status</h5></dt>

                                                    <dt class="col-sm-3 text-truncate">Project Status</dt>
                                                    <dd class="col-sm-9" id="project_status">'.$row[15].'</dd>

                                                    <dt class="col-sm-3 text-truncate">Date Filed</dt>
                                                    <dd class="col-sm-9" id="dateE">'.$row[14].'</dd>

                                                    <dt class="col-sm-3 text-truncate">Project Classification</dt>
                                                    <dd class="col-sm-9">'.$row[16].'</dd>

                                                    <dt class="col-sm-3 text-truncate">Date Evaluated</dt>
                                                    <dd class="col-sm-9">'.$row[19].'</dd>

                                                    <dt class="col-sm-3 text-truncate">Project Google Drive Link</dt>
                                                    <dd class="col-sm-9" id="get">'.$row[18].'</dd>

                                                    <br><br><br>
                                                    <dt class="col-sm-12 text-truncate"><h5>Application Remarks</h5></dt>
                                                    <div class="col-lg-12 col-sm-12">
                                                    
                                                            
                                                <textarea class="form-control" id="getRemark" rows="10" readonly>'.$row[17].'</textarea>
                                                </dl>
                                                </div>
                                            </div>
                                        </div>';?>
                                                                                
                                    <?php endwhile;?>
                                    <?php }else{} ?>

                                    <div class="col-lg-4 col-sm-12">
                                        <div class="card bg-white m-b-30">
                                            <div class="card-body">
                                                <div class="card-title border-b mb-4">
                                                    <h5>Admin Controls</h5>
                                                </div>

                                                <button class="btn-block btn btn-primary" data-toggle="modal" data-target="#exampleModalform" data-id="<?php echo $projectid; ?>" data-role="update">Add Remark</button><br>

                                                <button class="btn-block btn btn-dark" data-toggle="modal" data-target="#exampleModalform" id="receive" data-role="receivebtn" data-id="<?php echo $projectid; ?>">Receive Application</button><br>

                                                <button class="btn-block btn btn-success" data-toggle="modal" data-target="#exampleModalform" id="approve" data-role="approvebtn" data-id="<?php echo $projectid; ?>">Approve Application</button><br>

                                                <button class="btn-block btn btn-info" data-toggle="modal" data-target="#exampleModalform" id="pending" data-role="pendingbtn" data-id="<?php echo $projectid; ?>">Pending Application</button><br>

                                                <button class="btn-block btn btn-danger" data-toggle="modal" data-target="#exampleModalform" id="deny" data-role="denybtn" data-id="<?php echo $projectid; ?>">Denied Application</button><br>
                                              
                                            </div>
                                        </div>       
                                    </div>
                                         
                    </div>


                    <div class="row"> 
                        <div class="col-lg-8 col-sm-12">
                            <div class="card bg-white m-b-30">
                                <?php
                                $query = "SELECT * FROM tbl_company_info WHERE project_id=$projectid";
                                $result1 = mysqli_query($conn, $query);
                                if($result1->num_rows > 0){?>
                                <?php while($row = mysqli_fetch_array($result1)):; ?>
                                <?php echo '<div class="card-body">
                                                <div class="card-title border-b mb-4">
                                                    <h5>Contractor / Main  - Information</h5>
                                                </div>
                                                <dl class="row">
                                                    <dt class="col-sm-3">Project Contractor</dt>
                                                    <dd class="col-sm-9">'.$row[1].'</dd>

                                                    <dt class="col-sm-3">Contractor Contact No</dt>
                                                    <dd class="col-sm-9">'.$row[2].'</dd>

                                                    <dt class="col-sm-3">No/Street Address</dt>
                                                    <dd class="col-sm-9">'.$row[3].'</dd>

                                                    <dt class="col-sm-3 text-truncate">Barangay/Subdivision</dt>
                                                    <dd class="col-sm-9">'.$row[4].'</dd>

                                                    <dt class="col-sm-3 text-truncate">City/Municipality</dt>
                                                    <dd class="col-sm-9">'.$row[5].'</dd>

                                                    <dt class="col-sm-3 text-truncate">Province</dt>
                                                    <dd class="col-sm-9">'.$row[6].'</dd>

                                                    <dt class="col-sm-3 text-truncate">Zip Code</dt>
                                                    <dd class="col-sm-9">'.$row[7].'</dd>

                                                </dl>
                                            </div>
                            </div>
                        </div>';?>
                                                                                
                        <?php endwhile;?>
                        <?php }else{} ?>

                    </div>

                    <div class="row"> 
                        <div class="col-lg-8 col-sm-12">
                            <div class="card bg-white m-b-30">
                                <?php
                                $query = "SELECT * FROM tbl_owner_info WHERE project_id=$projectid";
                                $result1 = mysqli_query($conn, $query);
                                if($result1->num_rows > 0){?>
                                <?php while($row = mysqli_fetch_array($result1)):; ?>
                                <?php echo '<div class="card-body">
                                                <div class="card-title border-b mb-4">
                                                    <h5>Project Owner  - Information</h5>
                                                </div>
                                                <dl class="row">
                                                    <dt class="col-sm-3">Project Owner Name</dt>
                                                    <dd class="col-sm-9">'.$row[1].'</dd>

                                                    <dt class="col-sm-3">Project Owner Contact</dt> 
                                                    <dd class="col-sm-9">'.$row[2].'</dd> 

                                                    <dt class="col-sm-3">No./Street</dt>
                                                    <dd class="col-sm-9">'.$row[3].'</dd>

                                                    <dt class="col-sm-3 text-truncate">Barangay/Subdivision</dt>
                                                    <dd class="col-sm-9">'.$row[4].'</dd>

                                                    <dt class="col-sm-3 text-truncate">City/Municipality</dt>
                                                    <dd class="col-sm-9">'.$row[5].'</dd>

                                                    <dt class="col-sm-3 text-truncate">Province</dt>
                                                    <dd class="col-sm-9">'.$row[6].'</dd>

                                                    <dt class="col-sm-3 text-truncate">Zip Code</dt>
                                                    <dd class="col-sm-9">'.$row[7].'</dd>

                                                </dl>
                                            </div>
                            </div>
                        </div>';?>
                                                                                
                        <?php endwhile;?>
                        <?php }else{} ?>
                    
                </div><!--end container-->

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


        <!-- Modal -->
        <div class="modal fade" id="exampleModalform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelform" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New Remark</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group no-margin">
                                    <label for="field-7" class="control-label">Application Remark</label>
                                    <input type='hidden' id='userId' class="form-control">
                                    <textarea data-target="remark" name="remark" class="form-control" id="remarks" placeholder="Write something about yourself" style="margin-top: 0px; margin-bottom: 0px; height: 137px;"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>                                          
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-id="<?php echo $projectid; ?>" id="save" name="submit">Send message</button>
                    </div>
                </div>
            </div>
        </div>          


        <!-- AJAX 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

        <!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery-migrate.js"></script>
        <script src="assets/js/modernizr.min.js"></script>
        <script src="assets/js/jquery.slimscroll.min.js"></script>
        <script src="assets/js/slidebars.min.js"></script>

        
        <script>
        $(document).ready(function() {
            $(document).on('click', 'button[data-role=update]', function() {
                    var id = $(this).data('id');
                    var remark = $("#getRemark").text();


                    $('#remarks').val(remark);
                    $('#userId').val(id);


                    $('#save').click(function() {
                    //var id = $(this).data('id');
                    //var remark = $('#getRemark').text();
                    var id = $('#userId').val();
                    var remark = $('#remarks').val();
                    $('#getRemark').text(remark);
                    $.ajax({
                        url: 'assets/includes/remarks.inc.php',
                        method: 'post',
                        data: {
                            id: id,
                            remark: remark
                        },
                        success: function(response) {
                            console.log(response);
                            $('#getRemark').text(remark);
                            $('#exampleModalform').modal('toggle');
                        }
                    });
                });
            });

            $(document).on('click', 'button[data-role=receivebtn]', function() {
                    var id = $(this).data('id');
                    var remark = $("#getRemark").text();


                    $('#remarks').val(remark);
                    $('#userId').val(id);


                    $('#save').click(function() {
                    //var id = $(this).data('id');
                    //var remark = $('#getRemark').text();
                    var id = $('#userId').val();
                    var remark = $('#remarks').val();
                    $('#getRemark').text(remark);
                    $.ajax({
                        url: 'assets/includes/receiveapp.inc.php',
                        method: 'post',
                        data: {
                            id: id,
                            remark: remark
                        },
                        success: function(response) {
                            console.log(response);
                            $('#getRemark').text(remark);
                            $('#project_status').text("RECEIVE");
                            var d = new Date();
                            var month = d.getMonth()+1;
                            var day = d.getDate();
                            var output = d.getFullYear() + '/' +
                                (month<10 ? '0' : '') + month + '/' +
                                (day<10 ? '0' : '') + day;
                            $('#dateE').text(output);
                            $('#exampleModalform').modal('toggle');
                        }
                    });
                });
            });

            $(document).on('click', 'button[data-role=approvebtn]', function() {
                var id = $(this).data('id');
                var remark = $("#getRemark").text();

                $('#remarks').val(remark);
                $('#userId').val(id);
                
                $('#save').click(function() {

                var id = $('#userId').val();
                var remark = $('#remarks').val();
                var dateE = $('#dateE').text();
                alert(dateE);
                $('#getRemark').text(remark);
                $.ajax({
                    url: 'assets/includes/approve.inc.php',
                    method: 'post',
                    data: {
                        id: id,
                        remark: remark,
                        dateE: dateE
                    },
                    success: function(response) {
                        console.log(response);
                        $('#getRemark').text(remark);
                        $('#project_status').text("APPROVED");
                        $('#exampleModalform').modal('toggle');
                    }
                });
            });
            });
            $(document).on('click', 'button[data-role=pendingbtn]', function() {
                var id = $(this).data('id');
                var remark = $("#getRemark").text();

                $('#remarks').val(remark);
                $('#userId').val(id);

                $('#save').click(function() {

                var id = $('#userId').val();
                var remark = $('#remarks').val();
                $('#getRemark').text(remark);
                $.ajax({
                    url: 'assets/includes/pending.inc.php',
                    method: 'post',
                    data: {
                        id: id,
                        remark: remark
                    },
                    success: function(response) {
                        console.log(response);
                        $('#getRemark').text(remark);
                        $('#project_status').text("PENDING");
                        $('#exampleModalform').modal('toggle');
                    }
                });
                });
                
            });
            $(document).on('click', 'button[data-role=denybtn]', function() {
                var id = $(this).data('id');
                var remark = $("#getRemark").text();

                $('#remarks').val(remark);
                $('#userId').val(id);

                $('#save').click(function() {
                var id = $('#userId').val();
                var remark = $('#remarks').val();
                $('#getRemark').text(remark);
                $.ajax({
                    url: 'assets/includes/denied.inc.php',
                    method: 'post',
                    data: {
                        id: id,
                        remark: remark
                    },
                    success: function(response) {
                        console.log(response);
                        $('#getRemark').text(remark);
                        $('#project_status').text("DENIED");
                        $('#exampleModalform').modal('toggle');
                    }
                });
            });
            });
        });
        </script>
        

        <!--app js-->
        <script src="assets/js/jquery.app.js"></script>
    </body>
</html>
