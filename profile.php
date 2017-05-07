<?php
session_start();
if (isset($_SESSION['email'])) {
$email = $_SESSION['email'];
}
else {
echo "You have not signed in";
}

   $db=mysqli_connect("127.0.0.1","root","yuqi00","Final");
   if (!$db) 
   {
    die("Connection failed: " . mysqli_connect_error());
   } 

$sql = "SELECT * FROM user WHERE email='$email' LIMIT 1";
$user_query = mysqli_query($db, $sql);
while ($row = mysqli_fetch_array($user_query, MYSQLI_ASSOC)) {
$name = $row["name"];
$hometown = $row["hometown"];
$interest = $row["interest"];
echo "Name: $name<br />";
echo "Hometown: $hometown<br />";
echo "interest: $interest<br />";
echo '<a href="editprofile.php">Edit</a><br />';
}


?>
