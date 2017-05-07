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
    $email=$_SESSION['email'];
    $sql = "SELECT * FROM User WHERE email='$email'";
    $result = mysqli_query($db,$sql);
    while($row=mysqli_fetch_array($result))
    {
        $uid=$row['uid']; 
    }
    $sql1="INSERT INTO project(uid,name,description,minimum,maximum,endtime,completetime,posttime) 
    VALUES('$uid','$name','$description','$minimum','$maximum','$endtime','$comtime','$posttime')";
    mysqli_query($db, $sql1);
    $_SESSION['message']="The project has been created."; 
    header("location:home.html");  //redirect home page
}
?>