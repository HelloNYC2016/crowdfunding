<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>username</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Newsletter-Subscription-Form.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/MUSA_navbar.css">
    <link rel="stylesheet" href="assets/css/MUSA_navbar1.css">
    <link rel="stylesheet" href="assets/css/styles.css">

</head>

<body>

<nav class="navbar navbar-default "  role="navigation">
    <div class="container-fluid">
        <!-- Brand -->
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">Raise Me Up</a>
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
                <li><a href="login.html">Log In</a></li>
                <li><a href="signup.html">Sign Up</a></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->


    <div class="newsletter-subscribe" style="background-color:#f1f7fc;">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Set your username</h2>
                <p class="text-center">Create an unique username for yourself. People can find and follow you by it. Plus, you can login with your username later. </p>
            </div>
            <form class="form-inline" method="post" action="setname.php">
                <div class="form-group">
                    <input class="form-control" type="text" name="username" placeholder="Your Username">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit" name="setname_btn">Submit </button>
                </div>
            </form>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>