<?php
session_start();
$db=mysqli_connect("127.0.0.1","root","yuqi00","Final");
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
} 

if(isset($_POST['setname_btn']))
{
    $username=$_POST['username']; 
    $email=$_SESSION['email'];
    $sql = "SELECT username FROM User WHERE username='$username'";
    $result = mysqli_query($db,$sql);
      if(mysqli_num_rows($result)==1)
      {
         $_SESSION['message']="This username has been occupied, please try another.";
         header("location:wrongname.php");
      } 
      else 
      {
            $sql1="UPDATE user SET username='$username' WHERE email='$email'";
            mysqli_query($db, $sql1);
            header("location:home.html");  //redirect home page
      }
   }
     
?>