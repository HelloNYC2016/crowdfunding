<?php
session_start();

$db=mysqli_connect("127.0.0.1","root","yuqi00","Final");
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
} 

$uid=$_SESSION['uid'];
$pid=$_SESSION['pid'];
$stars=$_POST['stars'];
$sql="INSERT INTO Rate(uid,pid,stars) 
    VALUES('$uid','$pid','$stars')";
    mysqli_query($db, $sql);
header("location:project.php?id={$pid}");

?>