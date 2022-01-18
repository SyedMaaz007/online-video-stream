<?php include 'config.php';?>
<?php if(isset($_GET['action']) && $_GET['action'] == 'add')
    {
        $view = $_GET['view'];
        $doc = $upload->findOne(['title' =>$view]);
                $title = $doc->title;
                $name = $doc->name;
                $url = $doc->url;
                $chapter = $doc->chapter;
                $part = $doc->part;
                $code = $doc->subcode;
                $sub = $doc->subject;
                $sem = $doc->sem;
                $lec = $doc->lecturar;
                $img = $doc->img;
        $data = 
                    [
                        'name'=>$name ,
                        'url'=>$url ,
                        'user'=>$_SESSION['user'],
                        'title'=>$title,
                        'chapter'=>$chapter,
                        'part'=>$part,
                        'subcode'=>$code,
                        'subject'=>$sub ,
                        'sem'=>$sem ,
                        'lecturar'=>$lec ,
                        'img'=>$img
                    ];
$res = $watchlist->insertOne($data);
$_SESSION['status'] = "added Successful";
            $_SESSION['code'] = "success";
header('Location: index.php');
    } 
    
if(isset($_GET['action']) && $_GET['action'] == 'remove')
    {
        $fil = ['_id' => new MongoDB\BSON\ObjectId($_GET['id'])];
         $data = $watchlist->findOne($fil);
         $res = $watchlist->deleteOne($fil);
        $_SESSION['status'] = "Deletion Successful";
        $_SESSION['code'] = "success";
        header('Location: watchlist.php');
         }

         if(isset($_GET['action']) && $_GET['action'] == 'clear')
    {
        
         $res = $history->deleteMany(['sem'=>$_SESSION['sem']]);
        $_SESSION['status'] = "Deletion Successful";
        $_SESSION['code'] = "success";
        header('Location: history.php');
         }
    ?>
