<?php
session_start();
date_default_timezone_set('America/New_York');
$pid=$_SESSION['pid'];
$uid=$_SESSION['uid'];
$amount=$_POST['amount'];
$time=date('Y-m-d');

$db = mysqli_connect("127.0.0.1","root","yuqi00","Final");
   if (!$db) 
   {
    die("Connection failed: " . mysqli_connect_error());
   } 

$sql="INSERT INTO pledge(uid,pid,time,amount) VALUES('$uid','$pid','$time','$amount')";
mysqli_query($db, $sql);
header("location:project.php");
?>