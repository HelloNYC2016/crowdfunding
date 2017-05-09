<?php
session_start();
$uid=$_GET['id'];
$db = mysqli_connect("127.0.0.1","root","yuqi00","Final");
   if (!$db) 
   {
    die("Connection failed: " . mysqli_connect_error());
   } 

$sql = "SELECT * FROM User WHERE uid='$uid'";
$result = mysqli_query($db,$sql);
while($row=mysqli_fetch_array($result))
{
  $username=$row['username'];
  $name=$row['name'];
  $hometown=$row['hometown'];
  $interest=$row['interest'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="icon" href="assets/images/crowdfund.ico">
    <title>Fundraiser</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/dropdown.css" rel="stylesheet">
    <!-- nav font CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.7/journal/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=News+Cycle:400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/project.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
    <!-- profile css-->
    <link rel="stylesheet" href="assets/css/profile.css">
    <link rel="stylesheet" href="assets/css/user.css">
</head>
<body>
<?php include "nav-login.php"; ?>
<div class="profile-header-container">
    <div class="profile-header-img">
        <img class="img-circle" src="assets/images/photo.jpg"/>
        <div class="rank-label-container">
            <span class="label label-default rank-label"><a class="link" href="#"> 5 follows</a></span>
            <span class="label label-default rank-label"><a class="link" href="#">7 follows</a></span>
        </div>
    </div>
</div>
<div>
    <div class="row post-body" >
        <div class="col-md-3 side-bar">
            <div class="side-block">
                <p><b><center>Profile</center></b></p>
                <p>Name: <?php echo $name;?></p >
                <p>Hometown: <?php echo $hometown;?></p >
                <p>Interest: <?php echo $interest;?></p >
                <?php
    if($_GET['id']==$_SESSION['uid'])
   {
    echo "<p><a href='editprofile.php'>Edit</a></p>";
   }
   ?>
            </div>

    <div class="side-block">
    <p><b><center>Likes</center></b></p >
    <?php 
    $sql1 = "SELECT * FROM Likes,Project WHERE Likes.pid=Project.pid AND Likes.uid='$uid'";
    $result1 = mysqli_query($db,$sql1);
    while($row1=mysqli_fetch_array($result1))
    {
      echo "<p><a href='project.php?id={$row1['pid']}'>{$row1['name']}</a></p >";
    }
    ?>
   </div>

            <div class="side-block">
                <p><b><center>Rates</center></b></p>
                <?php 
    $sql3 = "SELECT * FROM Rate,Project WHERE Rate.pid=Project.pid AND Rate.uid='$uid'";
    $result3 = mysqli_query($db,$sql3);
    while($row3=mysqli_fetch_array($result3))
    {
      echo "<p><a href='project.php?id={$row3["pid"]}'>{$row3['name']}</a>: ";
      $count=$row3['stars'];
      while($count>0)
      {
        echo "<i class='fa fa-star'></i>";
        $count=$count-1;
      }
      echo "</p>";
    }
    ?>
</div>
        </div>

        <div class="col-md-6 col-md-offset-0">
            <ol class="breadcrumb">
                <li><?php echo "<a href='home.php?id={$_GET['id']}'>Projects</a>"; ?></li>
                <li class="active"><span>Comments </span></li>
            </ol>
            <div class="media">
                <div class="media-body">

                    <?php  
                    $sql2 = "SELECT * FROM Comment c, Project p WHERE c.uid='$uid' AND c.pid=P.pid";
                    $result2 = mysqli_query($db,$sql2);
                    while($row2=mysqli_fetch_array($result2))
                    {       
                        echo "<h4 class='media-heading'>{$row2['title']}</h4>";
                        echo "<p>{$row2['content']}</p>";
                        echo "<p><span class='project-name'><strong><a href='project.php?id={$row2["pid"]}'>{$row2['name']}</a></strong></span><span class='review-date'>{$row2['time']}</span></p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>
