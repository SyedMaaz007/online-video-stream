<?php include 'config.php';
$res = $counter->count( ['sem'=>$_SESSION['sem'],'user'=>$_SESSION['user']] );
                    if(!$res)
                    {
                    $insert = 
                    [
                        'user'=>$_SESSION['user'],
                        'sem'=>$_SESSION['sem'],
                        'count'=>0
                    ];
$res = $counter->insertOne($insert);
}
$total =$db->total;
$res1 = $total->count( ['sem'=>$_SESSION['sem']]);
                    if(!$res1)
                    {
                    $insert1 = 
                    [
                        'sem'=>$_SESSION['sem'],
                        'count'=>0
                    ];
$res1 = $total->insertOne($insert1);
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
   <body class="sidebar-toggled">
      <?php include 'nav.php'; ?>
      <div id="wrapper">
    <?php include 'sidebar.php'; ?>
         <div class="single-channel-page" id="content-wrapper">
            <div class="single-channel-image">
               <img class="img-fluid" alt="" src="img/Logo1.jpg">
               <div class="channel-profile">
               </div>
            </div>
            <div class="single-channel-nav">
               <nav class="navbar navbar-expand-lg navbar-light">
                  <a class="channel-brand" href="#"><?php echo $_SESSION['sem'];?></a>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav mr-auto">
                        <?php $dis = $upload->distinct('subject',['sem'=>$_SESSION['sem']]);
                        foreach($dis as $doc)
                        {
                           ?>
                        <li class="nav-item">
                           <a class="nav-link"><?php echo $doc ?></a>
                        </li>
                        <?php
                        }
                        ?>
                     </ul>
                  </div>
               </nav>
            </div>
            <div class="container-fluid">
               <div class="video-block section-padding">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="main-title">
                           <h6>Recent Uploaded Videos</h6><hr>
                        </div>
                     </div>
                       <?php $dis = $upload->find(['sem'=>$_SESSION['sem']],['sort'=>['_id'=>-1]]);
                      foreach($dis as $doc)
                       {
                           $file = $getID->analyze( "admin/pages/videos/$doc->url");
                           ?>
                     <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="video-card">
                           <div class="video-card-image">
                              <a class="play-icon" href="view1.php?view=<?php echo $doc->title ?>&video=<?php echo $doc->url; ?>"><i class="fas fa-play-circle"></i></a>
                             <a href="view1.php?view=<?php echo $doc->title ?>&video=<?php echo $doc->url; ?>">
                                  <img src="admin/pages/imgs/<?php echo $doc->img; ?>" class="img-fluid">
                               </a>
                               <div id="time" class="time"><?php echo $file['playtime_string']; ?> </div>
                           </div>
                           <div class="video-card-body">
                            <div class="btn-group float-right right-action">
                              <a href="#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                              </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                  <a class="dropdown-item" href="code.php?action=add&view=<?php echo $doc->title ?>">
                                    <i class="fas fa-fw fa-star"></i> &nbsp; Add to Watchlist</a>
                                </div>
                            </div>
                              <div class="video-title">
                                 <a href="view1.php?view=<?php echo $doc->title ?>&video=<?php echo $doc->url; ?>">
                                      <?php echo $doc->title ?></a>
                              </div>
                              <div class="video-page text-success">
                                 <a ><?php echo $doc->lecturar ?></a>
                              </div>
                              <div class="video-view">
                                 <?php echo $doc->subcode ?>
                              </div>
                           </div>
                        </div>
                     </div>
                       <?php
                   }
                   ?>
               </div>
           </div>
           <div class="video-block section-padding">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="main-title">
                           <h6>Semeter Subject</h6>
                            <hr>
                        </div>
                     </div>
                      
                      <?php $dis = $upload->distinct('subject',['sem'=>$_SESSION['sem']]);
                      foreach($dis as $doc)
                       {
                           ?>
                     <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="channels-card">
                           <div class="channels-card-image">
                           <a href="channels.php?subject=<?php echo $doc ?>"><img class="img-fluid" src="img/sub.png" alt="">
                            <div class="channels-card-image-btn"><button type="button" class="btn btn-outline-danger btn-lg"><?php echo $doc ?></button>
                            </div></a>
                           </div>
                           <div class="channels-card-body">
                              <div class="channels-title">
                                 <a href="channels.php?subject=<?php echo $doc ?>"> <?php echo $_SESSION['sem'];?></a>
                              </div>
                           </div>
                        </div>
                     </div>
                    <?php } ?>
                  </div>
               </div>
       </div>
   </div>
</div>
      <!-- /#wrapper -->
      <?php include 'footer.php'; ?>
      <!-- Bootstrap core JavaScript-->
      <?php include ('script.php'); ?>
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

