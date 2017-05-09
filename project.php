<?php
session_start();
$pid = $_GET['id'];
$_SESSION['pid']=$pid;
$db = mysqli_connect("127.0.0.1","root","yuqi00","Final");
if (!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM Project p, User u WHERE p.pid='$pid' AND u.uid=p.uid";
$result = mysqli_query($db,$sql);
while($row=mysqli_fetch_array($result))
{
    $name=$row[2];
    $owner=$row[13];
    $id=$row['uid'];
    $description=$row['description'];
    $moneyraised=$row['moneyraised'];
    $minimum=$row['minimum'];
    $maximum=$row['maximum'];
    $posttime=$row['posttime'];
    $endtime=$row['endtime'];
    $completetime=$row['completetime'];
    $status=$row['status'];
}
$sql = "SELECT count(*) as total FROM Pledge WHERE pid='$pid'";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_assoc($result);
$total = $row['total'];
?>

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
    <!-- proile -->
    <link rel="stylesheet" href="assets/css/profile.css">

</head>

<body>
<nav class="navbar navbar-default "  role="navigation">
    <div class="container-fluid">
        <!-- Brand -->
        <div class="navbar-header">
            <a class="navbar-brand" href=" ">Fundraiser</a >
        </div>
        <!-- Search -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <form class="navbar-form navbar-left" role="search" action="#">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                        <input type="text" class="form-control" placeholder="Search for something">
                    </div>
                </div>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="newproject.html">Build fundraiser</a ></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Me <span class="caret"></span></a >
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="home.php">Profile</a ></li>
                        <li><a href="#">Message</a ></li>
                        <li><a href="#">Something else here</a ></li>
                        <li class="divider"></li>
                        <li><a href="logout.php">Log Out</a ></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<ol class="breadcrumb">
    <li class="active"><span>Project </span></li>
    <li><a href="<?php echo "update.php?id=".$pid ?>"><span>Updates </span></a ></li>
</ol>
<div class="container">
    <div class="row product">
        <div class="col-md-5 col-md-offset-0">
            <img class="img-responsive" src="assets/images/suit_jacket.jpg"></div>
        <div class="col-md-7">
            <h2><?php echo $name; ?></h2>
            <p>Post by <?php echo "<a href='home.php?id={$id}'>{$owner}</a>"; ?></h2>
            <p><?php echo $description; ?> </p >
            <a class="btn btn-primary" href="donate.php" role="button">Donate</a >
            <button class="btn btn-info" onclick="myFunction()">Follow</button>
            <script>
                function myFunction() {
                    alert("You have followed this project.");
                }
            </script>
        </div>
    </div>
    <div class="page-header">
        <h3>Project Progress</h3></div>
    <div class="panel panel-default">

        <div class="panel-body">
            <h4><small class="display-inline-block pull-right"></small></h4>
            <p>Project Popularity: <strong class="text-danger">Hot </strong> </p >
            <div class="progress">
                <?php $percent=100*$moneyraised/$maximum; ?>
                <div class="progress-bar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percent; ?>%"><?php echo $percent; ?>%</div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <p>Raised: $<?php echo $moneyraised; ?>
                        <br>
                        <small class="text-muted"><i class="fa fa-heart text-primary"></i><?php echo $total; ?> Donations</small></p >
                </div>
                <div class="col-md-6">
                    <p class="text-right">Goal: $<?php echo $maximum; ?>
                        <br>
                        <small class="text-muted"><i class="fa fa-clock-o text-primary"></i> Ends <?php echo $endtime; ?></small></p >
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <div class="page-header">
            <h3>Donation</h3></div>
        <?php
        $sql1 = "SELECT * FROM Pledge NATURAL JOIN User WHERE pid='$pid'";
        $result1 = mysqli_query($db,$sql1);
        echo "<table class='table table-striped'><thead><tr><th>Donor</th><th>Amount</th><th>Time</th></tr></thead>";
        while($row1=mysqli_fetch_array($result1))
        {
            $username=$row1['username'];
            $amount=$row1['amount'];
            $time=$row1['time'];
            echo "<tbody>";
            echo "<tr>";
            echo "<td>{$username}</td>";
            echo "<td>{$amount}</td>";
            echo "<td>{$time}</td>";
            echo "</tr>";
            echo "</tbody>";
        }
        echo "</table>";
        ?>
    </div>

    <div class="page-header">
        <h3>Reviews</h3></div>
    <div class="media">
        <div class="media-body">
            <?php
            $sql2 = "SELECT * FROM Comment NATURAL JOIN User WHERE pid='$pid' ORDER BY time DESC";
            $result2 = mysqli_query($db,$sql2);
            while($row2=mysqli_fetch_array($result2))
            {
                $title=$row2['title'];
                $content=$row2['content'];
                $time=$row2['time'];
                $user=$row2['username'];
                echo "<h4 class='media-heading'>$title</h4>";
                echo "<p>$content</p >";
                echo "<p><span class='reviewer-name'><strong>$user</strong></span><span class='review-date'>$time</span></p >";
                echo "</br>";
            }
            ?>
        </div>
        <br>
        <form action="#">
            <textarea class="form-control" rows="6" name="comment" placeholder="Comment"></textarea>
            <br>
            <button class="btn btn-primary" type="submit" name="comment_btn">Submit</button>
        </form>
    </div>
    <footer class="site-footer">
        <div class="container">
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    <h5>Fund Raiser @ 2016</h5></div>
                <div class="col-sm-6 social-icons"><a href="#"><i class="fa fa-facebook"></i></a ><a href="#"><i class="fa fa-twitter"></i></a ><a href="#"><i class="fa fa-instagram"></i></a ></div>
            </div>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>