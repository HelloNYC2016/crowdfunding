<?php
session_start();
$uid=$_SESSION['uid'];
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
<nav class="navbar navbar-default "  role="navigation">
 <div class="container-fluid">
  <!-- Brand -->
  <div class="navbar-header">
   <a class="navbar-brand" href="index.php">Fundraiser</a >
  </div>
  <!-- Search -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
   <form class="navbar-form navbar-left" role="search" action="#">
    <div class="form-group">
     <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-search"></i></span>
      <input type="text" class="form-control" placeholder="Search for something">
     </div>
    </div>
   </form>
   <ul class="nav navbar-nav navbar-right">
    <li><a href="newproject.html">Build fundraiser</a ></li>
    <li class="dropdown">
     <a class="dropdown-toggle" data-toggle="dropdown">Me <span class="caret"></span></a >
     <ul class="dropdown-menu" role="menu">
      <li><a href="home.php">Profile</a ></li>
      <li><a href="#">Message</a ></li>
      <li><a href="#">Something else here</a ></li>
      <li class="divider"></li>
      <li><a href="logout.php">Log Out</a ></li>
     </ul>
    </li>
   </ul>
  </div>
 </div>
</nav>
<div class="profile-header-container">
 <div class="profile-header-img">
  <img class="img-circle" src="assets/images/photo.jpg"/>
  <div class="rank-label-container">
   <span class="label label-default rank-label"><a class="link" href="#"> 5 follows</a ></span>
   <span class="label label-default rank-label"><a class="link" href="#">7 follows</a ></span>
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
    <p><a href="editprofile.php">Edit</a></p>
   </div>

<?php 
$sql1 = "SELECT * FROM Likes,Project WHERE Likes.pid=Project.pid AND Likes.uid='$uid'";
$result1 = mysqli_query($db,$sql1);
$pid=array();
$pname=array();
while($row1=mysqli_fetch_array($result1))
{
  $pid[]=$row1['pid'];
  $pname[]=$row1['name'];
}
?>
   <div class="side-block">
    <p><b><center>Likes</center></b></p >
    <p><a href="<?php echo "project.php?id=".$pid[0] ?>"><?php echo $pname[0]; ?></a></p >
    <p><a href="<?php echo "project.php?id=".$pid[1] ?>"><?php echo $pname[1]; ?></a></p >
    <p><a href="<?php echo "project.php?id=".$pid[2] ?>"><?php echo $pname[2]; ?></a></p >
    <p><a href="<?php echo "project.php?id=".$pid[3] ?>"><?php echo $pname[3]; ?></a></p >
    <p><a href="<?php echo "project.php?id=".$pid[4] ?>"><?php echo $pname[4]; ?></a></p >
    <p><a href="<?php echo "project.php?id=".$pid[5] ?>"><?php echo $pname[5]; ?></a></p >
   </div>

   <div class="side-block">
    <p><b><center>Rates</center></b></p >
    <p>Project 1: <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half"></i> </p >
    <p>Project 2: <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p >
    <p>Project 3: <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p >
   </div>
  </div>

  <div class="col-md-7 col-md-offset-0 container marketing">
   <ol class="breadcrumb">
    <li class="active"><span>My Projects </span></li>
    <li><a href="comments.html"><span>My Comments </span></a ></li>
   </ol>
   <!-- Three columns of text below -->
   <?php 
   $sql2 = "SELECT * FROM Project WHERE uid='$uid'";
   $result2 = mysqli_query($db,$sql2);

   while($row2=mysqli_fetch_array($result2))
   {
     $pid=$row2['pid'];
     $proname=$row2['name'];
     $description=$row2['description'];
   }
   ?>

   <div class="col-lg-4">
    <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
    <h2>Heading</h2>
    <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p >
    <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a ></p >
   </div><!-- /.col-lg-4 -->
   <div class="col-lg-4">
    <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
    <h2>Heading</h2>
    <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p >
    <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a ></p >
   </div><!-- /.col-lg-4 -->
   <div class="col-lg-4">
    <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
    <h2>Heading</h2>
    <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p >
    <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a ></p >
   </div><!-- /.col-lg-4 -->
   <div class="col-lg-4">
    <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
    <h2>Heading</h2>
    <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p >
    <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a ></p >
   </div><!-- /.col-lg-4 -->
   <div class="col-lg-4">
    <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
    <h2>Heading</h2>
    <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p >
    <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a ></p >
   </div><!-- /.col-lg-4 -->
  </div>
 </div>
</div>


</body>
</html>