<?php
session_start();
date_default_timezone_set('America/New_York');

$db=mysqli_connect("127.0.0.1","root","yuqi00","Final");
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
} 

$uid=$_SESSION['uid'];
$pid=$_SESSION['pid'];
$content=$_POST['content'];
$title=$_POST['title'];
$time=date('Y-m-d');
$sql="INSERT INTO Comment(uid,pid,time,content,title) 
    VALUES('$uid','$pid','$time','$content','$title')";
    mysqli_query($db, $sql);
header("location:project.php?id={$pid}");

?>