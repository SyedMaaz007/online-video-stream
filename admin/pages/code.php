<?php include 'config.php';
 require 'fusioncharts/fusioncharts.php';
//INSERT USER
  if(isset($_POST['submit']))
  {
    $u_name = $_POST['u_name'];
    $reg = $_POST['reg'];
    $pass =hash('sha256', $_POST['pass']);
    $sem = $_POST['sem'];
    $status = $_POST['status'];
    
    try
        {
            $insert = $register->insertOne(['u_name'=>$u_name , 'reg'=>$reg , 'pass'=>$pass , 'sem'=>$sem, 'status'=>$status]);
            $register->createIndex(['reg' => 1],['unique' => 1]);
            if ($insert) {
            $_SESSION['status'] = "Registeration Successful";
            $_SESSION['code'] = "success";
             header('Location: student_details.php');
         }
        }
        catch(Exception $e)
        {
            if ($e) {
            $_SESSION['status'] = "Register Number already exsists!!!";
            $_SESSION['code'] = "warning";
             header('Location: student_details.php');
         }
        }
    }
    //UPDATE USER
    if(isset($_POST['Update']))
        {
            $u_name = $_POST['u_name'];
            $reg = $_POST['reg'];
            $sem = $_POST['sem'];
            $status = $_POST['status1'];
            $fil = ['_id' => new MongoDB\BSON\ObjectId($_POST['id'])];
            $data = 
                    [
                        'u_name'=>$u_name ,
                        'reg'=>$reg ,
                        'sem'=>$sem ,
                        'status'=>$status
                    ];
            $res = $register->updateOne($fil, ['$set' =>$data]);
            if ($res) {
            $_SESSION['status'] = "Update Successful";
            $_SESSION['code'] = "success";
             header('Location: student_details.php');
         }
        }
 
 //DELETE USER
 if(isset($_GET['action']) && $_GET['action'] == 'delete')
    {
        $fil = ['_id' => new MongoDB\BSON\ObjectId($_GET['id'])]; 
        $del = $register->deleteOne($fil);
        if ($del) {
            $_SESSION['status'] = "Deletion Successful";
            $_SESSION['code'] = "success";
             header('Location: student_details.php');
         }
         
    }

    //UPLOAD VIDEO
            if(isset($_POST['upload'])){
            
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
                     $_SESSION['status'] = "Video Format Not Suppotred!!!";
                     $_SESSION['code'] = "warning";
                     header('Location: video_upload.php');
                }
                elseif ((strtolower($img_type) != "image/jpeg") && (strtolower($img_type) != "image/jpg") && (strtolower($img_type) != "image/png") && (strtolower($img_type) != "image/gif")) 
                    
                {
                 $_SESSION['status'] = "Image Format Not Suppotred!!!";
                     $_SESSION['code'] = "warning";
                     header('Location: video_upload.php');
                }
                else
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
                    $insert = $upload->insertOne($data);
                    $upload->createIndex(['title'=>"text" , 'subject'=>"text" , 'sem'=>"text" , 'lecturar'=>"text"]);
                    if ($insert) {
            $_SESSION['status'] = "Uploaded Successful";
            $_SESSION['code'] = "success";
            header('Location: video_upload.php');
        }
                    
                }
            }

    //EDIT VIDEO
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
                        'subject'=>$sub,
                        'sem'=>$sem ,
                        'part'=>$part,
                        'subcode'=>$code,
                        'lecturar'=>$lec
                    ];
        $res = $upload->updateOne($fil, ['$set' =>$data]);
        if ($res) {
            $_SESSION['status'] = "Update Successful";
            $_SESSION['code'] = "success";
             header('Location: video_upload.php');
         }
    }
    
    //Delete Video

 if(isset($_GET['action']) && $_GET['action'] == 'delete_video')
    {
        $fil = ['_id' => new MongoDB\BSON\ObjectId($_GET['id'])];
         $data = $upload->findOne($fil);
         $url = $data->name;
         $r = $w->findOne(['name' =>$url]);
         $wid = $r->_id;
         $fil_1 = ['_id' => new MongoDB\BSON\ObjectId($wid)];
         $res_1 = $w->deleteOne($fil_1);

         $h = $history->findOne(['name' =>$url]);
         $hid = $r->_id;
         $fil_2 = ['_id' => new MongoDB\BSON\ObjectId($hid)];
         $res_2 = $history->deleteOne($fil_2);

             if(!$data)
             {
                 $_SESSION['status'] = "Video Details Not Found!!!";
                     $_SESSION['code'] = "error";
                     header('Location: video_upload.php');
             }
        $file = "videos/$data->url";
        $img = "imgs/$data->img";
            if(!unlink($file))
            {
                $_SESSION['status'] = "Video Details Not Found!!!";
                     $_SESSION['code'] = "error";
                     header('Location: video_upload.php');
            }
        elseif(!unlink($img))
        {
            $_SESSION['status'] = "Video Details Not Found!!!";
                     $_SESSION['code'] = "error";
                     header('Location: video_upload.php');
        }
         else
         {   
        $res = $upload->deleteOne($fil);
        
        $_SESSION['status'] = "Deletion Successful";
        $_SESSION['code'] = "success";
        header('Location: video_upload.php');
         }
    }
     
?>
