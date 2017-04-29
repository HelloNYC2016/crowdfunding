<?php
session_start();
$db=mysqli_connect("127.0.0.1","root","yuqi00","Final");
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
} 

if(isset($_POST['register_btn']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password2=$_POST['password2'];  
     if($password==$password2)
     {           //Create User
      $sql1 = "SELECT * FROM User WHERE email='$email'";
      $result = mysqli_query($db,$sql1);
      if(mysqli_num_rows($result)==1)
      {
         $_SESSION['message']="This email has been occupied";
      } 
      else 
      {
            $sql="INSERT INTO user(email,password) VALUES('$email','$password')";
            mysqli_query($db, $sql);
            $_SESSION['message']="You are now logged in"; 
            $_SESSION['email']=$email;
            header("location:username.php");  //redirect home page
      }
    }
    else
    {
      $_SESSION['message']="The two password do not match";   
     }
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
    <form method="post" action="signup.php">
        <h2 class="sr-only">Signup Form</h2>
        <div class="illustration"><i class="icon ion-android-add-circle"></i></div>
        <div class="form-group">
            <input class="form-control" type="email" name="email" placeholder="Your Email Address" required>
        </div>
        <div class="form-group">
            <input class="form-control" type="password" name="password" placeholder="Create Your Password" required>
        </div>
        <div class="form-group">
            <input class="form-control" type="password" name="password2" placeholder="Confirm your Password" required>
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit" name="register_btn">Sign Up For RaiseMeUp</button>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>

</html>