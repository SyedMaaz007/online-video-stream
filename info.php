<?php include 'config.php' ;?>

<h1>Welcome <?php echo $_SESSION['user'] ?>
	 <?php echo $_SESSION['sem'] ?>
</h1>

<a href="logout.php">logout</a>
<div id='box'>
    <script src="vendor/jquery/jquery-3.5.1.min.js"></script>
    <script src="vendor/jquery/sweetalert2.all.min.js"></script>
    	<form method="post" enctype="multipart/form-data" >
         <?php
			
			if(isset($_POST['upload']))
            {
			
				$name = $_FILES['file']['name'];
                $title = $_POST['title'];
                $chapter = $_POST['chapter'];
                $part = $_POST['part'];
                $code = $_POST['subcode'];
                $sub = $_POST['subject'];
                $sem = $_POST['semester'];
                $lec = $_POST['lecturar'];
                $img = $_FILES['img']['name'];
                $random_name = rand();
				$type = $_FILES['file']['type'];
				$size = $_FILES['file']['size']/1024/1024;
				$tmp = $_FILES['file']['tmp_name'];
                $img_type = $_FILES['img']['type'];
				$img_size = $_FILES['img']['size']/1024/1024;
				$img_tmp = $_FILES['img']['tmp_name'];
				
               if ((strtolower($type) != "video/mp4") && (strtolower($type) != "video/mpeg") && (strtolower($type) != "video/mpeg1") && (strtolower($type) != "video/mpeg4") && (strtolower($type) != "video/avi") && (strtolower($type) != "video/flv") && (strtolower($type) != "video/wmv") && (strtolower($type) != "video/mov"))
				{
					$message= "Video Format is not supported !";
					
    			}
                elseif ((strtolower($img_type) != "image/jpeg") && (strtolower($img_type) != "image/jpg") && (strtolower($img_type) != "image/png") && (strtolower($img_type) != "image/gif")) 
                    
                {
                    $message = "Image Format is not Supported";
                }
                elseif($_FILES['file'])
				{
					move_uploaded_file($tmp, 'videos/'.$random_name);
                    move_uploaded_file($img_tmp, 'imgs/'.$img); 
                    
                    $data = 
                    [
                        'name'=>$name ,
                        'url'=>$random_name ,
                        'title'=>$title ,
                        'chapter'=>$chapter,
                        'part'=>$part,
                        'subcode'=>$code,
                        'subject'=>$sub ,
                        'sem'=>$sem ,
                        'lecturar'=>$lec ,
                        'img'=>$img
                    ];
					$upload->insertOne($data);
                    $upload->createIndex(['title'=>"text" , 'subject'=>"text" , 'sem'=>"text" , 'lecturar'=>"text"]);
                }
                else
                {
                    $message="error uploading";
                }
			}

?>
            <?php
	if(isset($_POST['edit']))
{
         $title = $_POST['title'];
                $sub = $_POST['subject'];
                $sem = $_POST['semester'];
                $lec = $_POST['lecturar'];
                $chapter = $_POST['chapter'];
                $part = $_POST['part'];
                $code = $_POST['subcode'];
        $fil = ['_id' => new MongoDB\BSON\ObjectId($_POST['id'])];
         $data = 
                    [
                        'title'=>$title ,
                        'chapter'=>$chapter,
                        'subject'=>$sub ,
                        'sem'=>$sem ,
                        'part'=>$part,
                        'subcode'=>$code,
                        'lecturar'=>$lec
                    ];
        $res = $upload->updateOne($fil, ['$set' =>$data]);
    }
		?>
            <div class="row">
                  <div class="col-lg-12">
                     <div class="osahan-form">
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label>Video Title</label>
                                 <input type="text"  id="title" placeholder="Video Title" name="title" class="form-control">
                              </div>
                           </div>
                              <div class="col-lg-12">
                              <div class="form-group">
                                 <label>Subject</label>
                                 <input type="text" placeholder="Subject" id="subject" name="subject" class="form-control">
                              </div>
                           </div>
                             <div class="col-lg-12">
                               <div class="form-group">
                                 <label>Chapter Part</label>
                                 <select class="custom-select" name="part" id="par">
                                    <option value="Chapter 1">Chapter 1</option>
                                    <option value="Chapter 2">Chapter 2</option>
                                    <option value="Chapter 3">Chapter 3</option>
                                    <option value="Chapter 4">Chapter 4</option>
                                    <option value="Chapter 5">Chapter 5</option>
                                 </select>
                              </div>
                           </div>
                             <div class="col-lg-12">
                              <div class="form-group">
                                 <label>Subject Code</label>
                                 <input type="text" placeholder="Subject Code" id="subcode" name="subcode" class="form-control">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                 <label>Select Semester</label>
                                 <select class="custom-select" name="semester">
                                    <option value="Semester 1">Semester 1</option>
                                    <option value="Semester 2">Semester 2</option>
                                    <option value="Semester 3">Semester 3</option>
                                    <option value="Semester 4">Semester 4</option>
                                    <option value="Semester 5">Semester 5</option>
                                 </select>
                              </div>
                           <div class="col-lg-4">
                              <div class="form-group">
                                 <label>Lecturar</label>
                                 <input type="text" placeholder="Lecturar name" name="lecturar" id="lecturar" class="form-control">
                              </div>
                           </div>
                         </div>
                     </div>
                      <input type="hidden" id="id" name="id">
            <input type="file" name="file" id="file" />
            <label id="label">enter thumbnail</label>
            <input type="file" name="img" id="img"/>

               <hr>
                     <div class="osahan-area text-center mt-3">
                        <input type="submit"  id="upload" class="btn btn-outline-primary" value="Upload" name="upload"/>
                         <button type="submit" id="edit" style="display:none;" class="btn btn-outline-primary" name="edit">Edit</button>
                         <?php echo "<a href='info.php?sort=".$_SESSION['sem']."'>sort</a>";?>

                     </div>
                     <hr>
                </div>
            </div>
        </form>
	</div>
     

    <div id='box'>
		<?php
        require_once('vendor/getid3/getid3.php');
        $getID = new getID3;
        $dis = $upload->find(['sem'=>$_SESSION['sem']]);
        foreach($dis as $doc)
        {
        	
              $data = json_encode( 
                    [
                        'id' => (string) $doc->_id ,
                        'title' => $doc->title ,
                        'chapter'=>$doc->chapter,
                        'subject' => $doc->subject ,
                        'sem' => $doc->sem ,
                        'part'=>$doc->part,
                        'subcode'=>$doc->subcode,
                        'lecturar' => $doc->lecturar
                        
                    ],true);
                    $file = $getID->analyze( "admin/pages/videos/$doc->url");
            ?><hr>
         <a href="view1.php?view=<?php echo $doc->title ?>&video=<?php echo $doc->url; ?>">
       <img   src="imgs/<?php echo $doc->img; ?>" height="100" width="100">
        </a> <div id="time" class="time"><?php echo $file['playtime_string']; ?> </div>
		<?php
            echo "<button type='button' class='btn btn-info btn-lg' data-toggle='modal' data-target='#myModal'><a href='javascript:edit($data)'>edit</a></button>";
               echo "<a href='delete.php?action=delete&id=".$doc->_id."' class='del'>delete</a> <hr>";
		}
		?>
    </div>
<div id='box'>
		<?php
        if(isset($_GET['sort']))
        {
        	$sort = $_GET['sort'];
        require_once('vendor/getid3/getid3.php');
        $getID = new getID3;
        $dis = $upload->find(['sem'=>$sort],['sort' =>['subcode'=> 1]]);
        foreach($dis as $doc)
        {
                    $file = $getID->analyze( "videos/$doc->url");
            ?><hr>
         <a href="view1.php?view=<?php echo $doc->title ?>&video=<?php echo $doc->url; ?>">
       <img   src="imgs/<?php echo $doc->img; ?>" height="100" width="100">
        </a> <div id="time" class="time"><?php echo $file['playtime_string']; ?> </div>
		<?php
            echo  "<a href='javascript:edit($data)'>edit</a>";
               echo "<a href='delete.php?action=delete&id=".$doc->_id."' class='del'>delete</a> <hr>";
		}
	}
		?>
    </div>
<div>

<form method="post" enctype="multipart/form-data">
    
                       <input type="text" name="search" placeholder = "type to search" required/>
                        <input type="submit" value="search"/>
    </form>
    <?php
if(isset($_POST['search']))
{
    $sch = $_POST['search'];

     $srh = $upload->find( ['$text' => ['$search' => $sch] ] );

    $res = $upload->count( ['$text' => ['$search' => $sch] ] );
    if($res==0)
    {

    echo "no details";
    }
    else
    {
        foreach($srh as $ret)
        {
           ?>
        <a href="video-page.php?video=<?php echo $ret->url; ?>">
       <img   src="imgs/<?php echo $ret->img; ?>" height="100" width="100">
        </a>
    
		<?php
		}
    }
}
    
?>
</div>
<div>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Update Details</h4>
      </div>
      <div class="modal-body"> 
       <div id='box'>
    <script src="vendor/jquery/jquery-3.5.1.min.js"></script>
    <script src="vendor/jquery/sweetalert2.all.min.js"></script>
        <form method="post" enctype="multipart/form-data" >
         
            <?php
    if(isset($_POST['Update']))
{
         $title = $_POST['title'];
                $sub = $_POST['subject'];
                $sem = $_POST['semester'];
                $lec = $_POST['lecturar'];
                $part = $_POST['part'];
                $code = $_POST['subcode'];
        $fil = ['_id' => new MongoDB\BSON\ObjectId($_POST['id'])];
         $data = 
                    [
                        'title'=>$title ,
                        'subject'=>$sub ,
                        'sem'=>$sem ,
                        'part'=>$part,
                        'subcode'=>$code,
                        'lecturar'=>$lec
                    ];
        $res = $upload->updateOne($fil, ['$set' =>$data]);
        echo"<script>location.href='info.php'</script>";
    }
        ?>
            <div class="row">
                  <div class="col-lg-12">
                     <div class="osahan-form">
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label>Video Title</label>
                                 <input type="text"  id="titl" placeholder="Video Title" name="title" class="form-control">
                              </div>
                           </div>
                              <div class="col-lg-12">
                              <div class="form-group">
                                 <label>Subject</label>
                                 <input type="text" placeholder="Subject" id="subjec" name="subject" class="form-control">
                              </div>
                           </div>
                             <div class="col-lg-12">
                               <div class="form-group">
                                 <label>Chapter Part</label>
                                 <select class="custom-select" name="part" id="par">
                                    <option value="Chapter 1">Chapter 1</option>
                                    <option value="Chapter 2">Chapter 2</option>
                                    <option value="Chapter 3">Chapter 3</option>
                                    <option value="Chapter 4">Chapter 4</option>
                                    <option value="Chapter 5">Semester 5</option>
                                 </select>
                              </div>
                           </div>
                             <div class="col-lg-12">
                              <div class="form-group">
                                 <label>Subject Code</label>
                                 <input type="text" placeholder="Subject Code" id="subcod" name="subcode" class="form-control">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                 <label>Select Semester</label>
                                 <select class="custom-select" name="semester" id="semm">
                                    <option value="Semester 1">Semester 1</option>
                                    <option value="Semester 2">Semester 2</option>
                                    <option value="Semester 3">Semester 3</option>
                                    <option value="Semester 4">Semester 4</option>
                                    <option value="Semester 5">Semester 5</option>
                                 </select>
                              </div>
                           <div class="col-lg-4">
                              <div class="form-group">
                                 <label>Lecturar</label>
                                 <input type="text" placeholder="Lecturar name" name="lecturar" id="lectura" class="form-control">
                              </div>
                           </div>
                         </div>
                     </div>
                      <input type="hidden" id="idd" name="id">
            <input type="file" name="file" id="fil" />
            <label id="labe">enter thumbnail</label>
            <input type="file" name="img" id="im"/>

               <hr>
                     <div class="osahan-area text-center mt-3">
                        <input type="submit"  id="Update" class="btn btn-outline-primary" value="Update" name="Update"/>
                     </div>
                     <hr>
                </div>
            </div>
        </form>
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
        $('#titl').val(doc.title);
        $('#semm').val(doc.sem);
        $('#subjec').val(doc.subject);
        $('#lectura').val(doc.lecturar);
        $('#subcod').val(doc.subcode);
        $('#par').val(doc.part);
        $('#im').hide();
        $('#labe').hide();
        $('#fil').hide();
    }
        $('.del').on('click',function(e)
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
</div>