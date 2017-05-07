<?php
session_start();
$db=mysqli_connect("127.0.0.1","root","yuqi00","Final");
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
} 

if(isset($_POST['card_btn']))
{
    //get the CC information
    $uid=$_SESSION['uid'];
    $cardNumber=$_POST['cardNumber'];
    $cardExpiry=$_POST['cardExpiry'];  
    $cardCVV=$_POST['cardCVV'];
    $holdername=$_POST['holdername'];

    //check whether the card already exists
    $check1 = "SELECT * FROM creditcard WHERE cardnum = '$cardNumber'";
    $result1 = mysqli_query($db, $check1);
    $check2 = "SELECT * FROM cardownership WHERE cardnum = '$cardNumber' and uid='$uid'";
    $result2 = mysqli_query($db, $check2);

    //card not exist in creditcard table
    if(mysqli_num_rows($result1)!=1)
    {      
      $sql1 = "INSERT INTO creditcard(cardnum,holdername,expiredate,CVV) VALUES('$cardNumber','$holdername','$cardExpiry','$cardCVV')";
      mysqli_query($db,$sql1);
    
      $sql2 = "INSERT INTO cardownership(uid,cardnum) VALUES('$uid','$cardNumber')";
      mysqli_query($db, $sql2);
      //header("location:.html");  //redirect home page
    }
    
    //card exist in creditcard table
    else
    {
      if(mysqli_num_rows($result2)!=1)
      {
        $sql3 = "INSERT INTO cardownership(uid,cardnum) VALUES('$uid','$cardNumber')";
        mysqli_query($db, $sql3);
      }
      //else{}
    }
}
?>