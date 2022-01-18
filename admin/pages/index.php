 <?php include 'config.php' ;
 require 'fusioncharts/fusioncharts.php';
 ?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Admin Dashboard</title>

         <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../css/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="../css/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../css/startmin.css" rel="stylesheet">
        <!-- DataTables CSS -->
        <link href="../css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="../css/dataTables/dataTables.responsive.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

         <!-- including FusionCharts core package JS files -->
        <script src="fusioncharts/fusioncharts.js"></script>
        <script src="fusioncharts/fusioncharts.theme.fint.js"></script>
    </head>
    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">Admin Dashboard</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>


                <ul class="nav navbar-right navbar-top-links">
                            <li class="divider"></li>
                            <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            
                            <li>
                                <a href="index.php" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            
                            <li>
                                <a href="video_upload.php"><i class="fa fa-edit fa-fw"></i>Video Details</a>
                            </li>
                            <li>
                                <a href="student_details.php"><i class="fa fa-sitemap fa-fw"></i> Students Details</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Dashboard</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-users fa-5x"></i>
                                        </div> 
                                         <?php $res = $register->countDocuments(); ?>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo $res; ?></div>
                                            <div>Total Users</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-user fa-5x"></i>
                                        </div>
                                        <?php $res = $register->countDocuments(['status'=>'Active']); ?>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo $res; ?></div>
                                            <div>Active Users</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-user-times fa-5x"></i>
                                        </div>
                                          <?php $res = $register->countDocuments(['status'=>'Blocked']); ?>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo $res; ?></div>
                                            <div>Blocked Users</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-youtube-play fa-5x"></i>
                                        </div>
                                         <?php $res = $upload->countDocuments(); ?>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo $res; ?></div>
                                            <div>Uploaded Videos</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="page-header">Views Chart</h4>
                         <div id="chart-container"></div>
                    </div></div>
                   
                    <div class="row">
                        <div class="col-lg-6">
                            <h4 class="page-header">Views Chart By Semeters</h4>
                    <form method="POST" enctype="multipart/form-data">
                         <div class="form-group">
                        <label>Select Semester</label>
                                                    <select class="custom-select" name="sem" id="sem">
                                                        <option value="Semester 1">Semester 1</option>
                                                        <option value="Semester 2">Semester 2</option>
                                                        <option value="Semester 3">Semester 3</option>
                                                        <option value="Semester 4">Semester 4</option>
                                                        <option value="Semester 5">Semester 5</option>
                                                    </select> 
                                                </div>
                                                    <div class="mt-4">
                                                    <input type="submit" name="show" class="btn btn-primary btn-sm" value="Show Data"/>
                                                </div>
                                                </form>
                                            <div id="chart-container1"></div>
                                        </div>
                                        <div class="col-lg-6">
                                            <h4 class="page-header">Total Student Of The College</h4>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Student Details
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover" id="dataTable_2" cellspacing="0">
                                              <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Register Number</th>
                                                <th>Semester</th>
                                                <th>Status</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $dis = $register->find();
                                            foreach ($dis as $doc)
                                             {
                                             ?>
                                            <tr>
                                                <td><?php echo  $doc->u_name; ?></td>
                                                <td><?php echo  $doc->reg; ?></td>
                                                <td><?php echo  $doc->sem; ?></td>
                                                <td><?php echo  $doc->status; ?></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>

                                    </div><hr>
                    <div class="row">
                        
                        <div class="col-lg-12">
                             <h4 class="page-header">Total Videos Uploaded</h4>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Videos Details
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover" id="dataTable" cellspacing="0">
                                              <thead>
                                            <tr>
                                                <th>Chapter</th>
                                                <th>Chapter Part</th>
                                                <th>Lecturar</th>
                                                <th>Semester</th>
                                                <th>Subject</th>
                                                <th>Subject Code</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $dis = $upload->find();
                                            foreach ($dis as $doc)
                                             {
                                             ?>
                                            <tr>
                                                <td><?php echo  $doc->chapter; ?></td>
                                                <td><?php echo  $doc->part; ?></td>
                                                <td><?php echo  $doc->lecturar; ?></td>
                                                <td><?php echo  $doc->sem; ?></td>
                                                <td><?php echo  $doc->subject; ?></td>
                                                <td><?php echo  $doc->subcode; ?></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>

                        <!-- /.col-lg-6 -->
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->
        <!-- jQuery -->
        <script src="../js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/metisMenu.min.js"></script>


        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>
 <!-- DataTables JavaScript -->

        <script src="../js/dataTables/jquery.dataTables.min.js"></script>
        <script src="../js/dataTables/dataTables.bootstrap.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
            $(document).ready(function() {
                $('#dataTable').DataTable({
                        responsive: true
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#dataTable_2').DataTable({
                        responsive: true,
                        pageLength: 5
                });
            });
        </script>
    </body>
</html>
 <?php
            $myObj = $total->find();
            //convert MongoCursor into an array
            $data=iterator_to_array($myObj);

            // sorting the data
            asort($data);
            $dataseries1=array();
            foreach($data as $row) {
         $value = $row["count"];
         array_push($dataseries1, array(
              "label" => $row["sem"],
              "value" => $row["count"]
                       )
                  );
              }
              $arrData = array(
 "chart" => array(
        "caption" => "Total Views by Different Semesters",
        "xAxisname"=>"Semesters",
        "yAxisName" => "total Views",
        "numberSuffix" => "views",
        "theme" => "candy"
                  )
               );
      $arrData["dataset"] = array(array( "data"=>$dataseries1)); 

//encoding the dataset object in json format
      $jsonEncodedData = json_encode($arrData);

// chart object
$columnChart = new FusionCharts("column2d", "chart-1", "100%", "400", "chart-container", "json", $jsonEncodedData);
 
 // Render the chart
 $columnChart->render();
?>
 <?php
if(isset($_POST['show']))
  {
            $sem = $_POST['sem'];
            $myObj1 = $counter->find(['sem'=>$sem]);

            //convert MongoCursor into an array
            $data1=iterator_to_array($myObj1);

            // sorting the data
            asort($data1);
            $dataseries11=array();
foreach($data1 as $row) {
         $value = $row["count"];
         array_push($dataseries11, array(
              "label" => $row["user"],
              "value" => $row["count"]
                       )
                  );
              }
              $arrData1 = array(
 "chart" => array(
        "caption" => 'Total Views by Different User in '.$row["sem"] ,
        "xAxisname"=>$row["sem"],
        "yAxisName" => "total Views",
        "numberSuffix" => "views",
        "theme" => "fusion"
                  )
               );
      $arrData1["dataset"] = array(array( "data"=>$dataseries11)); 

//encoding the dataset object in json format
      $jsonEncodedData1 = json_encode($arrData1);

// chart object
$columnChart1 = new FusionCharts("column2d", "chart-2", "500", "300", "chart-container1", "json", $jsonEncodedData1);
 
 // Render the chart
 $columnChart1->render();
}
?>