<?php include 'config.php';?>
<?php
  $subject= $_GET['subject'];
 $data = $upload->findOne(['subject' =>$subject]);
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
                           <h6><?php echo $data->subject ?></h6>
                            <hr>
                        </div>
                     </div>
                      
                     <?php $dis = $upload->distinct('chapter',['subject'=>$data->subject]);
                      foreach($dis as $doc)
                       {
                           ?>
                     <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="channels-card">
                           <div class="channels-card-image">
                           <a href="chapter.php?subject=<?php echo $data->subject ?>&chapter=<?php echo $doc ?>"><img class="img-fluid" src="img/book.jpg" alt="">
                            <div class="channels-card-image-btn"><button type="button" class="btn btn-outline-danger btn-lg"><?php echo $doc ?></button>
                            </div></a>
                           </div>
                           <div class="channels-card-body">
                              <div class="channels-title">
                                 <a href="chapter.php?subject=<?php echo $data->subject ?>&chapter=<?php echo $doc ?>">Subject Code</a>
                              </div>
                              <div class="channels-title">
                                 <?php echo $data->subcode ?>
                              </div>
                           </div>
                        </div>
                     </div>
                    <?php } ?>
                  </div>
               </div>
            </div>
            <!-- /.container-fluid -->
            <!-- Sticky Footer -->
            
         </div>
         <!-- /.content-wrapper -->
      </div>
      <!-- /#wrapper -->
      <?php include 'footer.php'; ?>
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