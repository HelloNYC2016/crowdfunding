<?php
session_start();
date_default_timezone_set('America/New_York');

$db=mysqli_connect("127.0.0.1","root","yuqi00","Final");
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
} 

$pid=$_SESSION['pid'];
$description=$_POST['description'];
$time=date('Y-m-d');
$sql="INSERT INTO Updates(pid,time,description) 
    VALUES('$pid','$time','$description')";
    mysqli_query($db, $sql);
header("location:update.php?id={$pid}");

?>