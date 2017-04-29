<?php
session_start();
$db=mysqli_connect("127.0.0.1","root","yuqi00","Final");
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
} 

if(isset($_POST['register_btn']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password2=$_POST['password2'];  
     if($password==$password2)
     {           //Create User
            $sql="INSERT INTO user(name,email,password) VALUES('$name','$email','$password')";
            mysqli_query($db, $sql);
            $_SESSION['message']="You are now logged in"; 
            $_SESSION['name']=$name;
            header("location:home.html");  //redirect home page
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
<form method="post" action="register.php">
  <table>
     <tr>
           <td>Name : </td>
           <td><input type="text" name="name" class="textInput"></td>
     </tr>
     <tr>
           <td>Email : </td>
           <td><input type="email" name="email" class="textInput"></td>
     </tr>
      <tr>
           <td>Password : </td>
           <td><input type="password" name="password" class="textInput"></td>
     </tr>
      <tr>
           <td>Password again: </td>
           <td><input type="password" name="password2" class="textInput"></td>
     </tr>
      <tr>
           <td></td>
           <td><input type="submit" name="register_btn" class="Register"></td>
     </tr>
 
</table>
</form>
</body>
</html>