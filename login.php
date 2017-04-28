<?php
if($_GET['action'] == "logout"){
	unset($_SESSION['uid']);
	echo 'Logout successed! Click here to <a href="home.html">go back.</a>';
	exit;
}

//login
if(!isset($_POST['submit'])){
	exit('Unauthorized access!');
}
$email = $_POST['email'];
$password = $_POST['password'];

include('conn.php');

$check_query = mysql_query("SELECT Uid FROM User WHERE email='$email' AND password='$password' limit 1");
if($result = mysql_fetch_array($check_query)){
	$_SESSION['uid'] = $result['Uid'];
	echo 'Welcome, enter <a href="my.php">personal page</a><br />';
	echo 'Click here to <a href="login.php?action=logout">logout</a><br />';
	exit;
} else {
	exit('Login failed! Click here to go <a href="javascript:history.back(-1);">back</a>.');
}

?>