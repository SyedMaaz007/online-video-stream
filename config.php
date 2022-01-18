<?php
	require 'vender/autoload.php';
    require_once('vendor/getid3/getid3.php');
	$con = new MongoDB\Client;
    $db = $con->my_project;
    $register = $db->register;
    $upload = $db->video_upload;
    $watchlist = $db->watchlist;
    $history = $db->history;
    $counter = $db->count;
    $total = $db->total;
    $getID = new getID3;
    session_start();
    if(!isset($_SESSION['user']))
    {
    	echo"<script>location.href='login.php'</script>";
    }
?>
