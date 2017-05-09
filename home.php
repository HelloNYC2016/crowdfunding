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


 <!-- Bootstrap core CSS -->
 <link href="assets/css/bootstrap.min.css" rel="stylesheet">

 <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

 <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
 <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
 <script src="assets/js/ie-emulation-modes-warning.js"></script>

 <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
 <!--[if lt IE 9]>
 <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
 <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
 <![endif]-->

 <!-- Custom styles for this template -->
 <link href="assets/css/carousel.css" rel="stylesheet">



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
    <?php 
    if ($_GET['id']!=$_SESSION['uid'])
    {
      echo "<button class='btn btn-info' onclick='Function()'>Follow</button>";
    }

   ?>
    <script>
       function Function() {
         alert("You have followed this user.");
         <?php 
             if ($_GET['id']!=$_SESSION['uid']){
        $follow = "INSERT INTO Follow(uid,followerID) VALUES ('{$_GET['id']}', '{$_SESSION['uid']}')";
        mysqli_query($db, $follow);}
        ?>
         }
     </script>
  </div>
 </div>
</div>
<div>
 <div class="row post-body" >
  <div class="col-md-3 side-bar">
   <div class="side-block">
    <p><b><center>Profile</center></b></p >
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
    <p><b><center>Rates</center></b></p >
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

    <div class="side-block">
    <p><b><center>Comments</center></b></p >
    <?php 
    $sql4 = "SELECT * FROM Comment c, Project p WHERE c.uid='$uid' AND c.pid=P.pid";
    $result4 = mysqli_query($db,$sql4);
    while($row4=mysqli_fetch_array($result4))
    {
      echo "<h4 class='media-heading'>{$row4['title']}</h4>";
      echo "<p>{$row4['content']}</p>";
       echo "<p><span class='project-name'><strong><a href='project.php?id={$row4["pid"]}'>{$row4['name']}</a></strong></span><span class='review-date'>{$row4['time']}</span></p>";
    }
    ?>
    </div>
  </div>

  <div class="col-md-7 col-md-offset-0 container marketing">
   <ol class="breadcrumb">
    <li class="active"><span>Projects </span></li>
    <li><?php echo "<a href='comments.php?id={$_GET['id']}'>Messages</a>"; ?></li>
   </ol>
   <!-- Three columns of text below -->
   

   <?php 
   $sql2 = "SELECT * FROM Project WHERE uid='$uid'";
   $result2 = mysqli_query($db,$sql2);

   while($row2=mysqli_fetch_array($result2))
   {
        echo "\t\t<div class=\"col-lg-3\">\n";
        echo "\t\t\t<img class='img-circle' src='data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==' alt='Generic placeholder image' width='140' height='140'>\n";
        echo "\t\t\t<h2> {$row2['name']}</h2>\n";
        echo "\t\t\t<p> {$row2['description']}</p>\n";
        echo "\t\t\t<p><a href='project.php?id={$row2['pid']}'>View details</a></p>\n";
        echo "\t\t</div>\n";
   }
   ?>
  </div>
 </div>
</div>


</body>
</html>