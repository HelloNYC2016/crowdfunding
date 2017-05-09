<?php
session_start();
if (isset($_SESSION['uid'])) {
$uid = $_SESSION['uid'];
}
else {
echo "You have not signed in";
}

$db=mysqli_connect("127.0.0.1","root","yuqi00","Final");
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
} 

if(isset($_POST['edit_btn']))
{
    $query="SELECT * FROM user WHERE uid='$uid' LIMIT 1";
    $result=mysqli_query($db,$query);
    while ($row=mysqli_fetch_array($result)) {
        $name = $row["name"];
        $hometown = $row["hometown"];
        $interest = $row["interest"];
     }
    $newname=$_POST['newname']; 
    $newhometown=$_POST['newhometown'];
    $newinterest=$_POST['newinterest'];
    if(empty($newname))
    {
    	$newname=$name;
    }
        if(empty($newhometown))
    {
    	$newhometown=$hometown;
    }
        if(empty($newinterest))
    {
    	$newinterest=$interest;
    }


    $sql = "UPDATE user SET name='$newname', hometown='$newhometown', interest='$newinterest' where uid='$uid'";
    mysqli_query($db,$sql);
    header("location:home.php");
}
?>
<html>
<body>
      <div class="login-clean">
        <form method="post" action="editprofile.php">
            <h2 class="sr-only">Edit Account Information</h2>
            <div class="illustration"><i class="icon ion-ios-person"></i></div>
            <div class="form-group">
                <input class="form-control" type="text" name="newname" placeholder="name">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="newhometown" placeholder="hometown">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="newinterest" placeholder="interest">
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit" name="edit_btn">Edit</button>
            </div>
    </div>
  </body>
  </html>