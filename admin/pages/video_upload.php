 <?php include 'config.php' ;?>
  <!DOCTYPE html>
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
                                <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>                            
                            <li>
                                <a href="video_upload.php" class="active"><i class="fa fa-edit fa-fw"></i>Video Details</a>
                            </li>
                            <li>
                                <a href="student_details.php" ><i class="fa fa-sitemap fa-fw"></i> Students Details</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Video Details</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Upload Video
                                </div>
                                <div class="panel-body">
                                    <form method="post" enctype="multipart/form-data" action="code.php">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Upload Video</label>
                                                    <input type="file" name="file" id="file"/>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Upload Thumbnail</label>
                                                    <input type="file" name="img" id="img"/>
                                                </div>
                                                <div class="form-group">
                                                    <input type="hidden" id="id" name="id">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Video Title</label>
                                                    <input type="text" placeholder="Video Title" name="title" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Chapter</label>
                                                    <select class="form-control" name="chapter">
                                                        <option value="Chapter 1">Chapter 1</option>
                                                        <option value="Chapter 2">Chapter 2</option>
                                                        <option value="Chapter 3">Chapter 3</option>
                                                        <option value="Chapter 4">Chapter 4</option>
                                                        <option value="Chapter 5">Chapter 5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Chapter Part</label>
                                                    <input type="number" placeholder="Part Number" name="part" class="form-control">
                                                </div>
                                            </div>  
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Lecturar</label>
                                                    <input type="text" placeholder="Lecturar name" name="lecturar" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Select Semester</label>
                                                    <select class="form-control" name="semester">
                                                        <option value="Semester 1">Semester 1</option>
                                                        <option value="Semester 2">Semester 2</option>
                                                        <option value="Semester 3">Semester 3</option>
                                                        <option value="Semester 4">Semester 4</option>
                                                        <option value="Semester 5">Semester 5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Subject</label>
                                                    <input type="text" placeholder="Subject" name="subject" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Subject Code</label>
                                                    <input type="text" placeholder="Subject Code" name="subcode" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <input type="submit" name="upload" class="btn btn-primary btn-lg" value="Upload Video"/>
                                        </div>
                                    </form>
                                    <!-- /.row (nested) -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                   All Videos Details
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Chapter</th>
                                                <th>Chapter Part</th>
                                                <th>Lecturar</th>
                                                <th>Semester</th>
                                                <th>Subject</th>
                                                <th>Subject Code</th>
                                                <th>Edit/Delete</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Title</th>
                                                <th>Chapter</th>
                                                <th>Chapter Part</th>
                                                <th>Lecturar</th>
                                                <th>Semester</th>
                                                <th>Subject</th>
                                                <th>Subject Code</th>
                                                <th>Edit/Delete</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            $dis = $upload->find();
                                            foreach ($dis as $doc)
                                             {
                                                $data = json_encode( 
                                                    [
                                                        'id' => (string) $doc->_id ,
                                                        'title' => $doc->title ,
                                                        'chapter'=> $doc->chapter,
                                                        'subject' => $doc->subject ,
                                                        'sem' => $doc->sem ,
                                                        'part'=>$doc->part,
                                                        'subcode'=>$doc->subcode,
                                                        'lecturar' => $doc->lecturar
                                                    ],true);
                                             ?>
                                            <tr>
                                                <td><?php echo  $doc->title; ?></td>
                                                <td><?php echo  $doc->chapter; ?></td>
                                                <td><?php echo  $doc->part; ?></td>
                                                <td><?php echo  $doc->lecturar; ?></td>
                                                <td><?php echo  $doc->sem; ?></td>
                                                <td><?php echo  $doc->subject; ?></td>
                                                <td><?php echo  $doc->subcode; ?></td>
                                                <td><?php 
                                                    echo "<a href='javascript:edit($data)'><button type='button' class='btn btn-info' data-toggle='modal' data-target='#myModal'>Edit</button></a>";?>
                                                <a href='code.php?action=delete_video&id=<?php echo $doc->_id?>' class='btn btn-danger'>delete</a></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#wrapper -->
        <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <?php include ('script.php'); ?>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Update Details</h4>
      </div>
      <div class="modal-body"> 
       <div id='box'>
                  <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Update Details
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form method="post" enctype="multipart/form-data" action="code.php">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Video Title</label>
                                                    <input type="text" placeholder="Video Title" name="title" class="form-control" id="title">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Chapter</label>
                                                    <select class="form-control" name="chapter" id="chapter">
                                                        <option value="Chapter 1">Chapter 1</option>
                                                        <option value="Chapter 2">Chapter 2</option>
                                                        <option value="Chapter 3">Chapter 3</option>
                                                        <option value="Chapter 4">Chapter 4</option>
                                                        <option value="Chapter 5">Chapter 5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Chapter Part</label>
                                                    <input type="number" placeholder="Part Number" name="part" class="form-control" id="part">
                                                </div>
                                                <div class="form-group">
                                                    <input type="hidden" id="idd" name="id">
                                                </div>
                                            </div>  
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Select Semester</label>
                                                    <select class="form-control" name="semester" id="sem">
                                                        <option value="Semester 1">Semester 1</option>
                                                        <option value="Semester 2">Semester 2</option>
                                                        <option value="Semester 3">Semester 3</option>
                                                        <option value="Semester 4">Semester 4</option>
                                                        <option value="Semester 5">Semester 5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Subject</label>
                                                    <input type="text" placeholder="Subject" name="subject" class="form-control" id="subject">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Subject Code</label>
                                                    <input type="text" placeholder="Subject Code" id="subcode" name="subcode" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Lecturar</label>
                                                    <input type="text" placeholder="Lecturar name" name="lecturar" class="form-control" id="lecturar">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="edit" class="btn btn-primary btn-lg" value="Update"/>
                                        </div>
                                    </form>
                                        </div>
                                        <!-- /.col-lg-6 (nested) -->
                                        
                                        <!-- /.col-lg-6 (nested) -->
                                    </div>
                                    <!-- /.row (nested) -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    
    function edit(doc)
    {
        console.log(doc);
        $('#idd').val(doc.id);
        $('#title').val(doc.title);
        $('#sem').val(doc.sem);
        $('#subject').val(doc.subject);
        $('#lecturar').val(doc.lecturar);
        $('#subcode').val(doc.subcode);
        $('#part').val(doc.part);
        $('#chapter').val(doc.chapter);
    }
        $('.btn-danger').on('click',function(e)
        {
            e.preventDefault();
            const href = $(this).attr('href')
            Swal.fire({
                title : 'Are you sure ?',
                text : 'Record will be deleted !!',
                icon : 'warning',
                showCancelButton : true,
                confirmButtonText : 'Delete Record',
            }).then((result)=>{
                if(result.value) {
                    document.location.href = href;
                }
            })
        })
</script>
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
    </body>
</html>

