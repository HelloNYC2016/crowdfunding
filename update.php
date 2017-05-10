<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.7/journal/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=News+Cycle:400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/project.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">

</head>

<body>
<?php
if(isset($_SESSION['login']) && $_SESSION['login']==true)
  {
    include "nav-login.php";
  }
  else
  {
    include "nav-sign.php";
  }
   ?>
<ol class="breadcrumb">
    <li><a href="<?php $pid = $_GET['id']; echo "project.php?id=".$pid ?>"><span>Project </span></a></li>
    <li class="active"><span>Updates </span></li>
</ol>
<div class="container">
    <div class="media">
        <div class="media-body">
        <?php
        $db = mysqli_connect("127.0.0.1","root","yuqi00","Final");
        if (!$db) {die("Connection failed: " . mysqli_connect_error());} 
        $sql = "SELECT * FROM Updates WHERE pid='$pid'";
        $result = mysqli_query($db,$sql);
        while($row=mysqli_fetch_array($result))
        {
            $time=$row['time'];
            $description=$row['description'];
            echo "<h4 class='media-heading'>$time</h4>";
            echo "<p>$description</p>";
        }
        ?>
        </div>
    </div>
</div>

<?php
$uid=$_SESSION['uid'];
$check="SELECT uid FROM Project WHERE pid='$pid'";
$checkre=mysqli_query($db, $check);
$row1=mysqli_fetch_array($checkre);
if ($row1['uid']==$uid)
{
    echo "<div>";
    echo "<br>";
    echo "<form action='postup.php' method='POST'>";
    echo "<textarea class='form-control' rows='6' name='description' placeholder='Updates' ></textarea>";
    echo "</br>";
    echo "<input class='btn btn-info' type='submit'>";
    echo "</form>";
    echo "</div>";
}
?>


<footer class="site-footer">
    <div class="container">
        <hr>
        <div class="row">
            <div class="col-sm-6">
                <h5>Fund Raiser @ 2016</h5></div>
            <div class="col-sm-6 social-icons"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-instagram"></i></a></div>
        </div>
    </div>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>