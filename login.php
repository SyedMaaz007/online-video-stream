<?php

require 'vender/autoload.php';
$con = new MongoDB\Client;
$db = $con->my_project;
$register = $db->register;

session_start();

if(isset($_SESSION['user']))
{
    echo"<script>location.href='index.php'</script>";
}

if(isset($_POST['login']))
{
    $reg = $_POST['reg'];
    $pass =hash('sha256', $_POST['pass']);
    
    $data = $register->findOne(['reg' => $reg , 'pass' => $pass]);

   if(!$data)
    {
       ?>
                 <div class="alert alert-danger" role="alert">
                 <?php  echo " login failed enter correct details"; ?>
                </div>
        <?php 
      
    }
    elseif($data->status=='Active')
    {
        
        $_SESSION['user'] = $data->u_name;
       $_SESSION['sem'] = $data->sem;
        echo"<script>location.href='index.php'</script>"; 
    } 
    else
    {
      ?>
                 <div class="alert alert-danger" role="alert">
                 <?php  echo " User Blocked Contact College For Further Query"; ?>
                </div>
        <?php 
    }
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Knowledge Broadway</title>
      <!-- Favicon Icon -->
      <link rel="icon" type="image/png" href="img/favicon.png">
      <!-- Bootstrap core CSS-->
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom fonts for this template-->
      <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <!-- Custom styles for this template-->
      <link href="css/style.css" rel="stylesheet">
      <!-- Owl Carousel -->
      <link rel="stylesheet" href="vendor/owl-carousel/owl.carousel.css">
      <link rel="stylesheet" href="vendor/owl-carousel/owl.theme.css">
   </head>
   <body class="login-main-body">
      <section class="login-main-wrapper">
         <div class="container-fluid pl-0 pr-0">
            <div class="row no-gutters">
               <div class="col-md-5 p-5 bg-white full-height">
                  <div class="login-main-left">
                     <div class="text-center mb-5 login-main-left-header pt-4">
                        <img src="img/favicon.png" class="img-fluid" alt="LOGO">
                        <h5 class="mt-3 mb-3">Welcome to Knowledge Broadway</h5>
                        <p>It is a long established fact that a reader <br> will be distracted by the readable.</p>
                     </div>
                     <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                           <label>Register Number</label>
                           <input type="text" name="reg" class="form-control" placeholder="Enter Register Number" required>
                        </div>
                        <div class="form-group">
                           <label>Password</label>
                           <input type="password" name="pass" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="mt-4">
                           <div class="row">
                              <div class="col-12">
                                 <button type="submit" name="login" class="btn btn-outline-primary btn-block btn-lg">Sign In</button>
                              </div>
                           </div>
                        </div>
                     </form>
                     <div class="text-center mt-5">
                        <p class="light-gray">Click here for <a href="admin/pages/login.php">Admin Login</a></p>
                     </div>
                  </div>
               </div>
               <div class="col-md-7">
                  <div class="login-main-right bg-white p-5 mt-5 mb-5">
                     <div class="owl-carousel owl-carousel-login">
                        <div class="item">
                           <div class="carousel-login-card text-center">
                              <img src="img/login.png" class="img-fluid" alt="LOGO">
                              <h5 class="mt-5 mb-3">Watch Your Classes Online</h5>
                              <p class="mb-4">when an unknown printer took a galley of type and scrambled<br> it to make a type specimen book. It has survived not <br>only five centuries</p>
                           </div>
                        </div>
                       
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Bootstrap core JavaScript-->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- Core plugin JavaScript-->
      <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
      <!-- Owl Carousel -->
      <script src="vendor/owl-carousel/owl.carousel.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="js/custom.js"></script>
   </body>
</html>
