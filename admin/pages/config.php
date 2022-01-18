
 <?php
	require 'vender/autoload.php';
$con = new MongoDB\Client;
    $db = $con->my_project;
    $register = $db->register;
  $upload = $db->video_upload;
  $w = $db->watchlist;
  $history = $db->history;
  $counter = $db->count;
  $total = $db->total;
session_start();

if(!isset($_SESSION['admin']))
{
     echo"<script>location.href='login.php'</script>";
}
?>
