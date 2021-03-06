<?php
require_once("../includes/initialize.php");

if (isset($_POST['submit'])) {
    $any = trim($_POST['any']);
    $password = trim($_POST['password']); 
    
    $found_user = Student::authenticate($any, $password);
    
    if($found_user){
          $session->login($found_user);
            redirect_to("public/home.php");
            
        }
        else {
            $found_user2 = Lecturer::authenticate($any, $password);
            if($found_user2){
                  $session->login($found_user2);
                redirect_to("staff/home.php");
            }else{
                $message = "Username | Matric Number / password incorrect.";
            }
        }
    
    
}
else {
    $email = "";
    $password = "";
}
?>
<!DOCTYPE html>
<html>
    <head>
        
        <!-- Title -->
        <title>RECORDS System | Login - Sign in</title>
        
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        <meta name="description" content="Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Fusion Tech" />
        
        <!-- Styles -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
        <link href="assets/plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet"/>
        <link href="assets/plugins/uniform/css/uniform.default.min.css" rel="stylesheet"/>
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/line-icons/simple-line-icons.css" rel="stylesheet" type="text/css"/>	
        <link href="assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet" type="text/css"/>	
        <link href="assets/plugins/waves/waves.min.css" rel="stylesheet" type="text/css"/>	
        <link href="assets/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css"/>	
        
        <!-- Theme Styles -->
        <link href="assets/css/modern.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/themes/green.css" class="theme-color" rel="stylesheet" type="text/css"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
        
        <script src="assets/plugins/3d-bold-navigation/js/modernizr.js"></script>
        <script src="assets/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
    </head>
    
    <body class="page-login">
<form method="post" action="">
        <main class="page-content">
            <div class="page-inner">
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-3 center">
                            <div class="login-box">
                                <a href="index.html" class="logo-name text-lg text-center">RECORDS System</a>
                                    <?php $msg = "";if(isset($message)){$msg = $message;}echo output_message($msg); ?>
                                <p class="text-center m-t-md">Please login into your account.</p>
                                <form class="m-t-md" action="index.html">
                                    <div class="form-group">
                                        <input type="text" name="any" value="<?php if(isset($_POST['any'])){echo $_POST['any'];} ?>" class="form-control" placeholder="Username | Matric Number" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" value="" class="form-control" placeholder="Password" required>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-success btn-block">Login</button>
                                    <a href="forgot.html" class="display-block text-center m-t-md text-sm">Forgot Password?</a>
                                </form>
                                <p class="text-center m-t-xs text-sm">2017 &copy; by Fusion Tech.</p>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->
            </div><!-- Page Inner -->
        </main><!-- Page Content -->
	
        </form>
        <!-- Javascripts -->
        <script src="assets/plugins/jquery/jquery-2.1.4.min.js"></script>
        <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="assets/plugins/pace-master/pace.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="assets/plugins/switchery/switchery.min.js"></script>
        <script src="assets/plugins/uniform/jquery.uniform.min.js"></script>
        <script src="assets/plugins/offcanvasmenueffects/js/classie.js"></script>
        <script src="assets/plugins/waves/waves.min.js"></script>
        <script src="assets/js/modern.min.js"></script>
        
    </body>
</html>
