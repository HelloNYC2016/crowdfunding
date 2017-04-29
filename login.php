<?php
   session_start();
   $db=mysqli_connect("127.0.0.1","root","yuqi00","Final");
   if(isset($_POST['login_btn']))
   {
      $email = $_POST['email'];
      $password = $_POST['password'];
      $sql = "SELECT * FROM User WHERE email='$email' AND password='$password'";
      $result = mysqli_query($db,$sql);
      if(mysqli_num_rows($result)==1)
      {
         $_SESSION['message']="You are now Logged in";
         $_SESSION['email'] = $email;
         header("location:home.html");
      } 
      else 
      {
         $_SESSION['message']="Username and Password combiation incorrect";
      }
   }
?>

<!DOCTYPE html>
<html>   
   <head>
      <title>Sign in</title>
      <link rel="stylesheet" type="text/css" href="style.css"/>      
   </head>  
   <body>
   <?php
    if(isset($_SESSION['message']))
    {
         echo "<div id='error_msg'>".$_SESSION['message']."</div>";
         unset($_SESSION['message']);
    }
   ?>   
   
      <form action = "login.php" method = "post">
         <table>
            <tr>
               <td>Email : </td>
               <td><input type = "email" name = "email" class="textInput" required autofocus></td>
            </tr>
            <tr>
               <td>Password : </td>
               <td><input type = "password" name = "password" class="textInput" required></td>
            </tr>
            <tr>
               <td></td>
               <td><input type="submit" name="login_btn" class="Log In"></td>
            </tr>
            <tr>
               <td>Don't have an account?</td>
               <td><a href="register.php">Rigister</a></td>
            </tr>
         </table>

      </form>          
</body>
</html>