<?php define('db', TRUE); ?>
<?php include "assets/includes/dbh.server.inc.php"; ?>
<?php defined('db') or die('You have been track!'); ?>
<?php 
session_start();
//setlocale(LC_MONETARY,"en_US");
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
                        <li>
                            <a href="admindashboard.php"><i class="mdi mdi-gauge"></i> <span>Dashboard</span></a>
                        </li>
                        <li>
                            <a href="adminaccountdashboard.php"><i class="mdi mdi-account-multiple-plus"></i> <span>System Account</span></a>
                        </li>
                        <!--<li>
                            <a href="applicationformA.php"><i class="mdi mdi-account-card-details"></i> <span>Apply CSHP</span></a>
                        </li>
                        <li>
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
                        <h4 class="my-2">Manage Account</h4>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 col-sm-12">
                            <div class="card bg-white m-b-30">
                                <?php 
                                $userid = $_POST['get'];       
                                $query = "SELECT * FROM users WHERE user_id=$userid";
                                $result1 = mysqli_query($conn, $query);
                                if($result1->num_rows > 0){?>
                                <?php while($row = mysqli_fetch_array($result1)):; ?>
                                <?php echo '<div class="card-body">
                                                <div class="card-title border-b mb-4">
                                                    <h5>Account Information</h5>
                                                </div>
                                                <dl class="row">
                                                <dt class="col-sm-3">Account ID</dt>
                                                <dd class="col-sm-9" id="userid">'.$row[0].'</dd>

                                                <dt class="col-sm-3">Account First Name</dt>
                                                <dd class="col-sm-9" id="firstname">'.$row[1].'</dd>
                                                
                                                <dt class="col-sm-3">Account Last Name</dt>
                                                <dd class="col-sm-9" id="lastname">'.$row[2].'</dd>

                                                <dt class="col-sm-3">Account Email</dt>
                                                <dd class="col-sm-9" id="email">'.$row[3].'</dd>

                                                <dt class="col-sm-3">Account Username</dt>
                                                <dd class="col-sm-9" id="username">'.$row[4].'</dd>

                                                <dt class="col-sm-3">Account Contact</dt>
                                                <dd class="col-sm-9" id="contact">'.$row[6].'</dd>

                                                <dt class="col-sm-3">Account Role</dt>
                                                <dd class="col-sm-9" id="role">'.$row[7].'</dd>

                                                <dt class="col-sm-3">Account Status</dt>
                                                <dd class="col-sm-9" id="status">'.$row[8].'</dd>

                                                <dt class="col-sm-3">Date Registered</dt>
                                                <dd class="col-sm-9" id="dateregistered">'.$row[9].'</dd>
                                            </div>                                                             
                                </dl>
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
                                    <button class="btn-block btn btn-primary" data-toggle="modal" data-target="#exampleModalform" data-id="<?php echo $userid; ?>" data-role="update">Update Account</button><br>
                            </div>
                        </div>       
                    </div>  
                </div>                                   
            
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
                        <h5 class="modal-title" id="exampleModalLabel">Manage Account</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group no-margin">
                                    <label for="field-7" class="control-label">Account First Name</label>
                                    <input id="acc-fname" data-target="fname" name="fname" type="text" class="form-control" required placeholder="First Name"/><br>

                                    <label for="field-7" class="control-label">Account Last Name</label>
                                    <input id="acc-lname" data-target="lname" name="lname" type="text" class="form-control" required placeholder="Last Name"/><br>

                                    <label for="field-7" class="control-label">Account Last Name</label>
                                    <input id="acc-username" data-target="user" name="usernmae" type="text" class="form-control" required placeholder="Username"/><br>

                                    <label for="field-7" class="control-label">Account Email</label>
                                    <input id="acc-email" data-target="email" name="email" type="text" class="form-control" required placeholder="Email"/><br>

                                    <label for="field-7" class="control-label">Account Contact</label>
                                    <input id="acc-contact" data-target="contact" name="contact" type="text" class="form-control" required placeholder="Contact"/><br>

                                    <label for="field-7" class="control-label">Account Role</label>
                                    <select id="acc-role" data-target="role" name="role" class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;">
                                        <option>Select</option>
                                        <optgroup label="ADMIN PRVILEDGE">
                                            <option value="ADMIN">Admin - Super</option>
                                        </optgroup>
                                        <optgroup label="ADMIN PRVILEDGE - PROVINCE">
                                            <option value="MISOR">Admin - Misamis Oriental</option>
                                            <option value="MISOC">Admin - Misamis Occidental</option>
                                            <option value="BUKIDNON">Admin - Bukidnon</option>
                                            <option value="CAMIGUIN">Admin - Camiguin</option>
                                            <option value="LANAO">Admin - Lanao Del Norte</option>
                                        </optgroup>
                                        <optgroup label="USER">
                                            <option value="USER">User</option>
                                        </optgroup>
                                    </select>

                                    <label for="field-7" class="control-label">Account Status</label>
                                    <select id="acc-status" data-target="status" name="status" class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;">
                                        <option>Select</option>
                                        <optgroup label="Account Status">
                                            <option value="Active">Account - Active</option>
                                            <option value="Inactive">Account - Inactive</option>
                                            <option value="Temporary Ban">Account - Temporary Ban</option>
                                            <option value="Permanent Ban">Account - Permanent Ban</option>
                                        </optgroup>
                                    </select>

                                    <label for="field-7" class="control-label">Date Registered</label>
                                    <input id="dateregistered" data-target="date" name="date" type="text" class="form-control" placeholder="Date" readonly><br>

                                    <input type='hidden' id='userId' class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>                                          
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-id="<?php echo $userid; ?>" id="save" name="submit">Update Account</button>
                    </div>
                </div>
            </div>
        </div>          


        <!-- AJAX 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

        <!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery-migrate.js"></script>
        <script src="assets/js/modernizr.min.js"></script>
        <script src="assets/js/jquery.slimscroll.min.js"></script>
        <script src="assets/js/slidebars.min.js"></script>

        
        <script>
        $(document).ready(function() {
            $(document).on('click', 'button[data-role=update]', function() {
                    var id = $(this).data('id');
                    var firstname = $("#firstname").text();
                    var lastname = $("#lastname").text();
                    var email = $("#email").text();
                    var username = $("#username").text();
                    var contact = $("#contact").text();
                    var role = $("#role").text();
                    var status = $("#status").text();
                    var dateregistered = $("#dateregistered").text();

                    $('#userId').val(id);
                    $('#acc-fname').val(firstname);
                    $('#acc-lname').val(lastname);
                    $('#acc-username').val(username);
                    $('#acc-email').val(email);
                    $('#acc-contact').val(contact);
                    //$('#acc-role').val(role);
                    //$('#acc-status').val(status);
                    $('#dateregistered').val(dateregistered);

                    if(role=="ADMIN"){
                        $("#acc-role").val("ADMIN");
                    }
                    if(role=="MISOR"){
                        $("#acc-role").val("MISOR");
                    }
                    if(role=="MISOC"){
                        $("#acc-role").val("MISOC");
                    }
                    if(role=="CAMIGUIN"){
                        $("#acc-role").val("CAMIGUIN");
                    }
                    if(role=="LANAO"){
                        $("#acc-role").val("LANAO");
                    }
                    if(role=="BUKIDNON"){
                        $("#acc-role").val("BUKIDNON");
                    }
                    if(role=="USER"){
                        $("#acc-role").val("USER");
                    }

                    if(status=="Active"){
                        $("#acc-status").val("Active");
                    }
                    if(status=="Inactive"){
                        $("#acc-status").val("Inactive");
                    }
                    if(status=="Temporary Ban"){
                        $("#acc-status").val("Temporary Ban");
                    }
                    if(status=="Permanent Ban"){
                        $("#acc-status").val("Permanent Ban");
                    }
                    

                    $('#save').click(function() {
                    //var id = $(this).data('id');
                    //var remark = $('#getRemark').text();
                    var id = $('#userId').val();
                    var fname = $('#acc-fname').val();
                    var lastname = $('#acc-lname').val();
                    var username = $('#acc-username').val();
                    var email = $('#acc-email').val();
                    var contact = $('#acc-contact').val();
                    var role = $('#acc-role').val();
                    var status = $('#acc-status').val();
                    var dateregistered = $('#dateregistered').val();
                    //$('p#getRemark').text(remark);

                 
                    $.ajax({
                        url: 'assets/includes/updateuser.inc.php',
                        method: 'post',
                        data: {
                            id: id,
                            fname: fname,
                            lastname: lastname,
                            username: username,
                            email: email,
                            contact: contact,
                            role: role,
                            status: status,
                            dateregistered: dateregistered

                        },
                        success: function(response) {
                            console.log(response);
                            $('#firstname').text(firstname);
                            $('#lastname').text(lastname);
                            $('#username').text(username);
                            $('#email').text(email);
                            $('#contact').text(contact);
                            $('#role').text(role);
                            $('#status').text(status);
                            $('#dateregistered').text(dateregistered);
                            $('#exampleModalform').modal('toggle');
                        }
                    });
                });
            });
        });
        </script>
        
        <!-- Parsley js -->
        <script type="text/javascript" src="assets/plugins/parsleyjs/dist/parsley.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('form').parsley();
            });
        </script>
        <!--app js-->
        <script src="assets/js/jquery.app.js"></script>
    </body>
</html>