<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="icon" href="assets/images/crowdfund.ico">
    <title>Fundraiser</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/dropdown.css" rel="stylesheet">
    <!-- Search Icon -->
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <!-- font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.7/journal/bootstrap.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=News+Cycle:400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
    <link rel="stylesheet" href="assets/css/carousel.css">
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


</br></br>

<!-- Print All Projects-->
<?php
$db=mysqli_connect("127.0.0.1","root","yuqi00","Final");
if (!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['keyword'])) {
    $keyword = $_POST['keyword'];
    echo $keyword;
    $query = "SELECT p.name, p.description, p.pid FROM Project p, Tag t where p.pid = t.pid and (t.tname = '$keyword' or p.description LIKE '%$keyword%' or p.name LIKE '%$keyword%')";
    printresult($db, $query);
} else {
    $query = "SELECT * from project";
    printresult($db, $query);
}

function printresult($db, $query) {
    $result=mysqli_query($db,$query);
    echo "<div class=\"container marketing\">\n";
    $count = 0;
    while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        if ($count%4 == 0 ) {
            echo "\t<div class=\"row\">\n";
        }
        echo "\t\t<div class=\"col-lg-3\">\n";
        echo "\t\t\t<img src=\"assets/images/photo.jpg\" alt=\"Generic placeholder image\" width=\"140\" height=\"140\">\n";
        echo "\t\t\t<h2> {$line['name']}</h2>\n";
        echo "\t\t\t<p> {$line['description']}</p>\n";
        echo "\t\t\t<p><a href='project.php?id={$line["pid"]}'>View details</a></p>\n";
        echo "\t\t</div>\n";
        $count += 1;
        if ($count%4 == 0 ) {
            echo "\t</div>\n";
        }
    }

}

?>



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
