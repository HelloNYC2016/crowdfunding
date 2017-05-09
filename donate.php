<?php
    session_start();
    $db=mysqli_connect("127.0.0.1","root","yuqi00","Final");
    if (!$db) 
    {
        die("Connection failed: " . mysqli_connect_error());
    } 
    $uid=$_SESSION['uid'];
    $query="SELECT cardnum FROM cardownership WHERE uid='$uid'";
    $result=mysqli_query($db,$query);
    $options="";
    while($row=mysqli_fetch_array($result))
    {
        $cardnum=$row['cardnum'];
        $cardnum=str_pad(substr($cardnum, -4), strlen($cardnum), '*', STR_PAD_LEFT);
        $options=$options."<option>$cardnum</option>";
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fundraiser</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="assets/css/Newsletter-Subscription-Form.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/MUSA_navbar.css">
    <link rel="stylesheet" href="assets/css/MUSA_navbar1.css">
    <!-- nav font CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.7/journal/bootstrap.min.css">
</head>
<body>
<?php include "nav-login.php"; ?>

<div class="newsletter-subscribe" style="background-color:#f1f7fc;">
    <div class="container">
        <div class="intro">
            <h2 class="text-center">Support This Project</h2>
            <p class="text-center">Once the project successes, money will be released to it, otherwise we will refund your money. </p>
            <form method="post" action="#">
                <p>
                    Choose card:
                <select>
                    <?php echo $options; ?>
                </select>
                    / <a href="addcard.html"> Add New Card</a>
                </p>
            </form>

        </div>
        <form class="form-inline" method="post" action="raise.php">
            <div class="form-group">
                <input class="form-control" type="number" name="amount" placeholder="$" required>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Donate </button>
            </div>
        </form>
    </div>
</div>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>

</html>