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
            header("location:username.html");  //redirect home page
      }
    }
    else
    {
      $_SESSION['message']="The two password do not match"; 
      header("location:signup.html");
     }
}
?>