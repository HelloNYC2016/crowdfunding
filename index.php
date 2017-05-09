<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="assets/images/crowdfund.ico">

  <title>FundRaiser</title>

  <!-- Custom styles for this template -->
  <link href="assets/css/carousel.css" rel="stylesheet">
  <!-- Search Icon -->
  <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
  <!-- font CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.7/journal/bootstrap.min.css">
</head>
<!-- NAVBAR
================================================== -->
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

  <!-- Carousel
  ================================================== -->
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <div class="item active">
          <img class="first-slide" src="assets/images/sea.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1 style="color:white">Make Your Dream Come True.</h1>
              <p>Share your idea and gain supports from all over the world. You are not alone chasing your dream, how about being a member of us today?
              </p>
              <p><a class="btn btn-lg btn-primary" href="signup.php" role="button">Sign up today</a></p>
            </div>
          </div>
      </div>
      <div class="item">
        <img class="second-slide" src="assets/images/party.jpg" alt="Second slide">
        <div class="container">
          <div class="carousel-caption">
            <h1 style="color:white">Creators thrive here.</h1>
            <p>Fundrasier creators pursue bold ideas on their own terms — and make an impact on the world, too.</p>
            <p><a class="btn btn-lg btn-primary" href="result.php" role="button">Browse their ideas.</a></p>
          </div>
        </div>
      </div>
      <div class="item">
        <img class="third-slide" src="assets/images/fly.jpg" alt="Third slide">
        <div class="container">
          <div class="carousel-caption">
            <h1 style="color:white">About Us.</h1>
            <p>We are student of tandon engineering school of NYU. We build this website to help people achieve their dreams.</p>
          </div>
        </div>
      </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div><!-- /.carousel -->


  <!-- Marketing messaging and featurettes
  ================================================== -->

  <!-- Wrap the rest of the page in another container to center all the content. -->
  
  <!-- Get Random Project-->
  <?php
  $db=mysqli_connect("127.0.0.1","root","yuqi00","Final");
  if (!$db) 
  {
    die("Connection failed: " . mysqli_connect_error());
  } 
  $query="SELECT * FROM project ORDER BY RAND() LIMIT 3";
  $result=mysqli_query($db,$query);
  $name=array();
  $description=array();
  $pid=array();
  while($row=mysqli_fetch_array($result))
  {
    $name[]=$row['name'];
    $description[]=$row['description'];
    $pid[]=$row['pid'];
  }
  ?>

  <div class="container marketing">
    <!-- Three columns of text below the carousel -->
    <div class="row">
      <div class="col-lg-4">
        <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
        <h2> <?php print_r($name[0]); ?></h2>
        <p> <?php print_r($description[0]); ?></p>
        <p><a href="<?php echo "project.php?id=".$pid[0] ?>">View details</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
        <h2> <?php print_r($name[1]); ?></h2>
        <p> <?php print_r($description[1]); ?></p>
        <p><a href="<?php echo "project.php?id=".$pid[1] ?>">View details</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
        <h2> <?php print_r($name[2]); ?></h2>
        <p><?php print_r($description[2]); ?></p>
        <p><a href="<?php echo "project.php?id=".$pid[2] ?>">View details</a></p>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->

  </div><!-- /.container -->


  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
  <script src="assets/js/bootstrap.min.js"></script>
  <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
  <script src="assets/js/vendor/holder.min.js"></script>
  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
