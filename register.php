<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="DOLE X - CSHP - Construction Safety and Health Program">
        <meta name="keyword" content="">

        <title>CSHP Online System - Register</title>

        <!-- Theme icon -->
        <link rel="shortcut icon" href="assets/images/cshp.ico">

        <!-- Theme Css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/slidebars.min.css" rel="stylesheet">
        <link href="assets/css/icons.css" rel="stylesheet">
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet">
    </head>

    <body class="sticky-header">
        <section class="bg-login" style="background-image:none; background-color: #1A355B;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="wrapper-page">
                            <div class="account-pages">
                                <div class="account-box">
                                    <div class="card m-b-30">
                                        <div class="card-body">
                                            <div class="card-title text-center">
                                                <img src="assets/images/cshp.gif" height="100" width="100" alt="" class="">
                                                <h5 class="mt-3"><b>Welcome to Construction Safety and Health Program</b></h5>
                                                <p></p>
                                            </div>
                                            
                                            <?php 
                                                //ERROR HANDLING
                                                if(isset($_GET['error'])){
                                                    if($_GET['error'] === "usertaken"){
                                                        echo '<div class="row">
                                                                <div class="col-lg-12 col-sm-12">
                                                                    <div class="card bg-white m-b-30">
                                                                        <div class="card-body">
                                                                            <h5 class="header-title mb-3">Sorry The Username is already Taken</h5>
                                                                            <div class="alert alert-danger" role="alert">
                                                                            <h4 class="alert-heading">Please Try again with another username</h4>
                                                                            <p></p>
                                                                            
                                                                            <p class="mb-0"></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>';
                                                    }else if($_GET['error'] === "empty"){
                                                        echo '<div class="row">
                                                                <div class="col-lg-12 col-sm-12">
                                                                    <div class="card bg-white m-b-30">
                                                                        <div class="card-body">
                                                                            <h5 class="header-title mb-3">Empty Fields</h5>
                                                                            <div class="alert alert-danger" role="alert">
                                                                            <h4 class="alert-heading">Please Fill Up all the necessary fields</h4>
                                                                            <p></p>
                                                                            
                                                                            <p class="mb-0"></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>';        
                                                    }else{
                                                        
                                                    }
                                                }else if(isset($_GET['status'])){
                                                    if($_GET['status'] === "success"){
                                                        echo '<div class="row">
                                                                <div class="col-lg-12 col-sm-12">
                                                                    <div class="card bg-white m-b-30">
                                                                        <div class="card-body">
                                                                            <h5 class="header-title mb-3">YOU HAVE SUCCESSFULLY CREATED ACCOUNT</h5>
                                                                            <div class="alert alert-success" role="alert">
                                                                            <center><h4 class="alert-heading"><a class="btn btn-primary" href="login.php">PLEASE CLICK THIS LINK LOGIN HERE</a></h4></center>
                                                                            <p></p>
                                                                        
                                                                            <p class="mb-0"></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>';
                                                    }else{
                                                        
                                                    }
                                                }else{

                                                }
                                            ?>
                                            <form class="form mt-5 contact-form" method="post" action="assets/includes/register.inc.php">
                                                <div class="form-group ">
                                                    <div class="col-sm-12">
                                                        <label>First Name</label>
                                                        <input class="form-control form-control-line" name="first" type="text" data-parsley-type="alphanum" placeholder="First Name" required="required">
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="col-sm-12">
                                                        <label>Last Name</label>
                                                        <input type="text" name="last" class="form-control" data-parsley-type="alphanum" placeholder="Last Name" required/>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="col-sm-12">
                                                    <label>Contact No</label>
                                                        <input data-parsley-type="digits" type="text" name="contact_no" class="form-control" required placeholder="Contact No (Enter only digits)"/>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="col-sm-12">
                                                        <label>E-Mail</label>
                                                        <input type="email" name="email" class="form-control" required parsley-type="email" placeholder="Enter a valid e-mail"/>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="col-sm-12">
                                                        <label>Username</label>
                                                        <input class="form-control form-control-line" name="uid" type="text" placeholder="Username (Prefered Constractor or Owner)" required="required">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <label>Password</label>
                                                        <input type="password" name="pwd" id="pass2" class="form-control" required placeholder="Password"/>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <label>Re-type Password</label>
                                                        <input type="password" class="form-control" requireddata-parsley-equalto="#pass2" placeholder="Re-Type Password"/>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-12">
                                                        <label class="cr-styled">
                                                            <input type="checkbox" required>
                                                            <i class="fa"></i> 
                                                            I accept <a href="">Terms and Conditions</a>
                                                        </label>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <div class="col-sm-12 mt-4">
                                                        <button class="btn btn-primary btn-block" type="submit" name="submit">Sign Up Free</button>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-12 mt-4 text-center">
                                                        <a href="login.php">Already have an account ?</a>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery-migrate.js"></script>
        <script src="assets/js/modernizr.min.js"></script>
        <script src="assets/js/jquery.slimscroll.min.js"></script>
        <script src="assets/js/slidebars.min.js"></script>
        
        <!-- Parsley js -->
        <script type="text/javascript" src="assets/plugins/parsleyjs/dist/parsley.min.js"></script>

        <!--app js-->
        <script src="assets/js/jquery.app.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('form').parsley();
            });
        </script>
    </body>
</html>