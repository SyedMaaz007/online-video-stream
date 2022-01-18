<?php
    session_start();
    if(isset($_POST['Login']))
  {
    $admin = $_POST['admin'];
    $pass = $_POST['password'];

    if ($admin == "admin" && $pass == "admin") {
         $_SESSION['admin'] = $admin;
         header('Location: index.php');
    }
    else
    {
        ?>
                 <div class="alert alert-danger" role="alert">
                 <?php  echo " login failed enter correct details"; ?>
                </div>
        <?php
        
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Admin Dashboard</title>

        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Please Sign In</h3>
                        </div>
                        <div class="panel-body">
                            <form method="post">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Admin name" name="admin" type="text" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                    </div>
                                    <input type="submit" name="Login" class="btn btn-lg btn-success btn-block" value="Login"/>
                                </fieldset>
                            </form>
                            <hr>
                            <div class="text-center mt-5">
                        <p class="light-gray"> <a href="\new0\login.php">Click here To Go Back</a></p>
                     </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php include ('script.php'); ?>
    </body>
</html>
