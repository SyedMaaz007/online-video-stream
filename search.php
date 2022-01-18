<?php include 'config.php' ?>

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
  <body class="sidebar-toggled">
     <?php include 'nav.php'; ?>
      <div id="wrapper">
         <!-- Sidebar -->
    <?php include 'sidebar.php'; ?>
         <div id="content-wrapper">
            <div class="container-fluid">
               <div class="video-block section-padding">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="main-title">
                           <h6>Search Result</h6>
                           <hr>
                        </div>
                     </div>
                  <?php
                  if(isset($_POST['search']))
                  {
                    $sch = $_POST['search'];
                    $srh = $upload->find(['sem'=>$_SESSION['sem'],'$text' => ['$search' => $sch] ] ); 
                    $res = $upload->count( ['sem'=>$_SESSION['sem'],'$text' => ['$search' => $sch] ] );
                    if($res==0)
                    {
                      echo 
                    '<div class="col-md-8 mx-auto text-center  pt-4 pb-5">
                     <h1><img alt="404" src="img/404.png" class="img-fluid"></h1>
                     <h1>Sorry! Page not found.</h1>
                     <div class="mt-5">
                        <a class="btn btn-outline-primary" href="index.php"><i class="mdi mdi-home"></i> GO TO HOME PAGE</a>
                     </div>
                     </div>';
                   }
                   else
                   {
                    foreach($srh as $doc)
                    {
                      $file = $getID->analyze( "admin/pages/videos/$doc->url");
                      ?>
                           <div class="video-card video-card-list">
                              <div class="video-card-image">
                                <a class="play-icon" href="view1.php?view=<?php echo $doc->title ?>&video=<?php echo $doc->url; ?>">
                                    <i class="fas fa-play-circle"></i></a>
                                        <a href="view1.php?view=<?php echo $doc->title ?>&video=<?php echo $doc->url; ?>">
                                             <img src="admin/pages/imgs/<?php echo $doc->img; ?>" class="img-fluid">
                                        </a>
                                        <div id="time" class="time"><?php echo $file['playtime_string']; ?> </div>
                                    </div>
                                    <div class="video-card-body">
                                      <div class="btn-group float-right right-action">
                                  <a class="dropdown-item" href="code.php?action=add&view=<?php echo $doc->title ?>">
                                    <i class="fas fa-fw fa-star"></i> &nbsp; Add to Watchlist</a>
                                </div>
                                       <div class="video-title">
                                       <a href="view1.php?view=<?php echo $doc->title ?>&video=<?php echo $doc->url; ?>">
                                              <h5><?php echo $doc->title ?></h5></a>
                                       </div>
                                       <div class="video-page text-success">
                                          <?php echo $doc->lecturar ?>
                                       </div>
                                    </div>
                                 </div>
                           <?php
                         }
                       }
                     }
                     ?>
                   </div>
               </div>
            </div>
            <!-- /.container-fluid -->
            <!-- Sticky Footer -->
            <?php include 'footer.php'; ?>
         </div>
         <!-- /.content-wrapper -->
      </div>
      <!-- /#wrapper -->
    
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