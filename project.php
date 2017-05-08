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
            <a class="navbar-brand" href="index.html">Fundraiser</a>
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
                <li><a href="new">Build fundraiser</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Me <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Message</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="logout.php">Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<ol class="breadcrumb">
    <li class="active"><span>Project </span></li>
    <li><a href="update.html"><span>Updates </span></a></li>
</ol>
<div class="container">
    <div class="row product">
        <div class="col-md-5 col-md-offset-0"><img class="img-responsive" src="assets/images/suit_jacket.jpg"></div>
        <div class="col-md-7">
            <h2>Buy Me Suits</h2>
            <p>dio. Momattis. Maecenas in pharetra mi, vel mollis odio. Morbi non mauris masmattis. Maecenas in pharetra n mauris masmattis. Mae non mauris masnlis odio.ra mi, vel mollis odio. Morbi non mauris mas </p>
            <a class="btn btn-primary" href="donate.html" role="button">Donate</a>
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
            <p>Project Popularity: <strong class="text-danger">Hot </strong> </p>
            <div class="progress">
                <?php $goal_percent=50; ?>
                <div class="progress-bar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $goal_percent; ?>%"><?php echo $goal_percent; ?>%</div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <p>Raised: $36,000
                        <br>
                        <a href="donations.html"><small class="text-muted"><i class="fa fa-heart text-primary"></i> 128 Donations</small></a></p>
                </div>
                <div class="col-md-6">
                    <p class="text-right">Goal: $40,000
                        <br>
                        <small class="text-muted"><i class="fa fa-clock-o text-primary"></i> Ends July 1, 2017</small></p>
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <div class="page-header">
            <h3>Donation</h3></div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Donor</th>
                <th>Amount</th>
                <th>Time</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Cell</td>
                <td>Cell</td>
                <td>Cell</td>
            </tr>
            <tr>
                <td>Cell</td>
                <td>Cell</td>
                <td>Cell</td>
            </tr>
            <tr>
                <td>Cell</td>
                <td>Cell</td>
                <td>Cell</td>
            </tr>
            <tr>
                <td>Cell</td>
                <td>Cell</td>
                <td>Cell</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="page-header">
        <h3>Reviews</h3></div>
    <div class="media">
        <div class="media-body">
            <h4 class="media-heading">Love this!</h4>
            <div><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half"></i></div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus nisl ac diam feugiat, non vestibulum libero posuere. Vivamus pharetra leo non nulla egestas, nec malesuada orci finibus. </p>
            <p><span class="reviewer-name"><strong>John Doe</strong></span><span class="review-date">7 Oct 2015</span></p>
        </div>
    </div>
    <div class="media">
        <div class="media-body">
            <h4 class="media-heading">Fantastic idea</h4>
            <div><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus nisl ac diam feugiat, non vestibulum libero posuere. Vivamus pharetra leo non nulla egestas, nec malesuada orci finibus. </p>
            <p><span class="reviewer-name"><strong>Jane Doe</strong></span><span class="review-date">1 May 2016</span></p>
        </div>
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
            <div class="col-sm-6 social-icons"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-instagram"></i></a></div>
        </div>
    </div>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>