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

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RaiseMeUp</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
<nav class="navbar navbar-default "  role="navigation">
    <div class="container-fluid">
        <!-- Brand -->
        <div class="navbar-header">
            <a class="navbar-brand" href="index.html">Raise Me Up</a>
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
                <li><a href="login.php">Log In</a></li>
                <li><a href="signup.php">Sign Up</a></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <?php
    if(isset($_SESSION['message']))
    {
         echo "<div id='error_msg'>".$_SESSION['message']."</div>";
         unset($_SESSION['message']);
    }
    ?>

<div class="login-clean">
    <form method="post" action="fundraiser.php">
        <h2 class="sr-only">Project Form</h2>
        <div class="illustration"><i class="icon ion-android-add-circle"></i></div>
        <div class="form-group">
            <input class="form-control" type="text" name="name" placeholder="Your Project Title" required>
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="description" placeholder="Write Description Here" required>
        </div>
        <div class="form-group">
            <input class="form-control" type="number" name="min" placeholder="Confirm Minimum Money" required>
        </div>
        <div class="form-group">
            <input class="form-control" type="number" name="max" placeholder="Confirm Maximum Money" required>
        </div>
        <div class="form-group">
            Endtime: <input class="form-control" type="date" name="endtime" required>
        </div>
        <div class="form-group">
            Completetime: <input class="form-control" type="date" name="comtime" required>
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit" name="project_btn">Create Your Project</button>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>

</html>