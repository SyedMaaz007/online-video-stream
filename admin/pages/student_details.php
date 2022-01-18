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
                                <a href="video_upload.php"><i class="fa fa-edit fa-fw"></i>Video Details</a>
                            </li>
                            <li>
                                <a href="student_details.php" class="active"><i class="fa fa-sitemap fa-fw"></i> Students Details</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Student Details</h1>
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Add Student 
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                             <form method="post" enctype="multipart/form-data" action="code.php">
                                                <div class="form-group">
                                                    <label>Register Number</label>
                                                    <input type="text" class="form-control" name="reg" placeholder="Enter Register Number" required>
                                                </div>
                                                <div class="form-group">
                                                    <input type="hidden" id="id" name="id">
                                                </div>
                                                <div class="form-group">
                                                    <label>Select Semester</label>
                                                    <select class="custom-select" name="sem">
                                                        <option value="Semester 1">Semester 1</option>
                                                        <option value="Semester 2">Semester 2</option>
                                                        <option value="Semester 3">Semester 3</option>
                                                        <option value="Semester 4">Semester 4</option>
                                                        <option value="Semester 5">Semester 5</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>User Name</label>
                                                    <input type="text" class="form-control" name="u_name" placeholder="Enter User Name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" class="form-control" name="pass" placeholder="Password" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Student Access</label>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="status" id="optionsRadios1" value="Active" checked>Active
                                                        </label>
                                                    </div>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="status" id="optionsRadios2" value="Blocked">Blocked
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="mt-4">
                                                    <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Register"/>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
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
                                    DataTables Advanced Tables
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Register Number</th>
                                                <th>Semester</th>
                                                <th>Status</th>
                                                <td>Edit/Delete</td>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Register Number</th>
                                                <th>Semester</th>
                                                <th>Status</th>
                                                <th>Edit/Delete</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            $dis = $register->find();
                                            foreach ($dis as $doc)
                                             {
                                                $data = json_encode( 
                                                [
                                                    'id' => (string) $doc->_id ,
                                                    'u_name'=>$doc->u_name , 
                                                    'reg'=>$doc->reg ,
                                                    'pass'=>$doc->pass ,
                                                    'sem'=>$doc->sem ,
                                                    'status'=>$doc->status
                                                ],true);
                                             ?>
                                            <tr>
                                                <td><?php echo  $doc->u_name; ?></td>
                                                <td><?php echo  $doc->reg; ?></td>
                                                <td><?php echo  $doc->sem; ?></td>
                                                <td><?php echo  $doc->status; ?></td>
                                                <td><?php 
                                                    echo "<a href='javascript:edit($data)'><button type='button' class='btn btn-info' data-toggle='modal' data-target='#myModal'>Edit</button></a>";?>
                                                <a href='code.php?action=delete&id=<?php echo $doc->_id?>' class='btn btn-danger'>delete</a></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
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
                                    Add Student 
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form method="post" enctype="multipart/form-data" action="code.php">
                                                <div class="form-group">
                                                    <input type="hidden" id="idd" name="id">
                                                </div>
                                                <div class="form-group">
                                                    <label>Register Number</label>
                                                    <input type="text" class="form-control" name="reg" id="rnum" placeholder="Enter Register Number" required>
                                                </div>
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
                                                <div class="form-group">
                                                    <label>User Name</label>
                                                    <input type="text" class="form-control" name="u_name" id="name" placeholder="Enter User Name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Student Access</label>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="status1" id="opt" value="Active">Active
                                                        </label>
                                                    </div>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="status1" id="opt1" value="Blocked">Blocked
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="mt-4">
                                                    <input type="submit" name="Update" class="btn btn-primary btn-lg" value="Update" id="Update"/>
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
        <script type="text/javascript">
    
    function edit(doc)
    {
        console.log(doc);
        $('#idd').val(doc.id);
        $('#rnum').val(doc.reg);
        $('#sem').val(doc.sem);
        $('#name').val(doc.u_name);
        $('#fil').hide();
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
    </body>
</html>
