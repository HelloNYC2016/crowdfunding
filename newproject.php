<?php
session_start();
date_default_timezone_set('America/New_York');
$db=mysqli_connect("127.0.0.1","root","yuqi00","Final");
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
} 

if(isset($_POST['project_btn']))
{
    $name=$_POST['name'];
    $description=$_POST['description'];
    $minimum=$_POST['min'];  
    $maximum=$_POST['max']; 
    $endtime=$_POST['endtime'];
    $comtime=$_POST['comtime'];
    $posttime=date('Y-m-d');
    $uid=$_SESSION['uid'];
    $sql1="INSERT INTO project(uid,name,description,minimum,maximum,endtime,completetime,posttime) 
    VALUES('$uid','$name','$description','$minimum','$maximum','$endtime','$comtime','$posttime')";
    mysqli_query($db, $sql1);
    $sql2="SELECT pid FROM project where name='$name'";
    $result2=mysqli_query($db, $sql2);
    $row2=mysqli_fetch_array($result2);
    header("location:project.php?id={$row2['pid']}");  //redirect home page
}
?>