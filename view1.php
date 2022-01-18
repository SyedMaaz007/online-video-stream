<?php include 'config.php';

$res = $counter->findOne( ['sem'=>$_SESSION['sem'],'user'=>$_SESSION['user']] );

$count = $res->count + 1;

$update = $counter->updateOne(['sem'=>$_SESSION['sem'],'user'=>$_SESSION['user']], ['$set' =>['count'=>$count]]);

$res1 = $total->findOne( ['sem'=>$_SESSION['sem']]);

$td = $res1->count + 1;

$update1 = $total->updateOne(['sem'=>$_SESSION['sem']], ['$set' =>['count'=>$td]]);

        $video = $_GET['video'];
        $view = $_GET['view'];
 $data = $upload->findOne(['title' =>$view]);
                $title = $data->title;
                $name = $data->name;
                $url = $data->url;
                $chapter = $data->chapter;
                $part = $data->part;
                $code = $data->subcode;
                $sub = $data->subject;
                $sem = $data->sem;
                $lec = $data->lecturar;
                $img = $data->img;
        $insert = 
                    [
                        'name'=>$name ,
                        'user'=>$_SESSION['user'],
                        'url'=>$url ,
                        'title'=>$title,
                        'chapter'=>$chapter,
                        'part'=>$part,
                        'subcode'=>$code,
                        'subject'=>$sub ,
                        'sem'=>$sem ,
                        'lecturar'=>$lec ,
                        'img'=>$img
                    ];
$res = $history->insertOne($insert);
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <title><?php echo $data->title; ?></title>
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
            <div class="container-fluid pb-0">
               <div class="video-block-right-list section-padding">
                <div class="single-video">
                  <!-- Video Streaming -->
                  <video  controls data-setup="{}"  preload="auto" width="100%" height="500"  autoplay="true" >
                    <source src="admin/pages/videos/<?php echo $video; ?>" type='video/mp4' />
                    </video>
                  </div>
                </div>
                <br/>
               <div class="video-block section-padding">
                  <div class="row">
                     <div class="col-md-8">
                        <div class="single-video-left">
                           <div class="single-video-title box mb-3">
                              <h2><a href="#"><?php echo $data->title; ?></a></h2>
                           </div>
                           <div class="single-video-info-content box mb-3">
                              
                              <h6>Chapter :</h6>
                              <p><?php echo $data->chapter; ?></p>
                              <h6>Chapter Part:</h6>
                              <p><?php echo $data->part; ?></p>
                              <h6>Lecturar :</h6>
                              <p><?php echo $data->lecturar; ?></p>
                           </div>       
                        </div>
                     </div>
                     <div class="col-md-4">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="main-title">
                            <br/>
                            <h6>Up Next</h6>
                          </div>
                        </div>
                      </div>
                      <div class="video-slider-right-list">
                          <?php
                          $dis = $upload->find(['subject'=>$data->subject,'chapter'=>$data->chapter],['sort'=>['part'=>1]]);
                          foreach($dis as $doc)
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
                                        <div id="time" class="time"><?php echo $file['playtime_string']; ?>
                                         </div>
                                    </div>
                                    <div class="video-card-body">
                                       <div class="video-title">
                                          <a href="view1.php?view=<?php echo $doc->title ?>&video=<?php echo $doc->url; ?>">
                                              <?php echo $doc->title ?></a>
                                       </div>
                                       <div class="video-page text-success">
                                          <?php echo $doc->lecturar ?> <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                                       </div>
                                    </div>
                                 </div>
                           <?php
                         }
                         ?>
                        </div>
                  </div>
             </div>
           </div>
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
                           <a href="chapter.php?subject=<?php echo $data->subject ?>&chapter=<?php echo $doc ?>"><img class="img-fluid" src="img/sub.png" alt="">
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
         <?php include 'footer.php'; ?>
       </div>
         <!-- /.content-wrapper -->
      </div>
      <!-- /#wrapper -->
      <!-- Logout Modal-->
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