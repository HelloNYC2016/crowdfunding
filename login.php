<?php
   session_start();
   $db=mysqli_connect("127.0.0.1","root","yuqi00","Final");
   if (!$db) 
   {
    die("Connection failed: " . mysqli_connect_error());
   } 

   if(isset($_POST['login_btn']))
   {
      $email = $_POST['email'];
      $password = $_POST['password'];
      $sql = "SELECT * FROM User WHERE email='$email' AND password='$password'";
      $result = mysqli_query($db,$sql);
      if(mysqli_num_rows($result)==1)
      {
         $_SESSION['message']= "You are now Logged in";
         $_SESSION['email'] = $email;
         header("location:home.html");
      } 
      else 
      {
         $_SESSION['message']="Username and Password combiation incorrect";
         header("location:login.html");
      }
   }
?>
