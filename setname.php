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
            $sql2 = "SELECT uid FROM User WHERE username='$username'";
            $result2 = mysqli_query($db,$sql2);
            $row=mysqli_fetch_array($result2);
            $_SESSION['uid']=$row['uid'];
            $_SESSION['login']=true;
            header("location:index.php");  //redirect home page
      }
   }
     
?>