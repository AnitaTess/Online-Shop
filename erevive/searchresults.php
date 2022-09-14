<?php
session_start(); // Enable sessions
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>searchresult</title>
    <link rel="stylesheet" href="assets4/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bevan">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Black+Ops+One">
    <link rel="stylesheet" href="assets4/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets4/css/Animated-Pretty-Product-List-v12.css">
    <link rel="stylesheet" href="assets4/css/Filter.css">
    <link rel="stylesheet" href="assets4/css/Footer-Basic.css">
    <link rel="stylesheet" href="assets4/css/Grid-and-List-view-V10-1.css">
    <link rel="stylesheet" href="assets4/css/Grid-and-List-view-V10.css">
    <link rel="stylesheet" href="assets4/css/Header-Dark.css">
    <link rel="stylesheet" href="assets4/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets4/css/styles.css">
    <?php
$itemQuery = $_GET['itemQuery'];
	if(isset($itemQuery) && !empty($itemQuery)){
		require ('req.php');
		$searchq = mysqli_real_escape_string($con, $itemQuery);
		$sql = mysqli_query($con, "SELECT * FROM products WHERE category LIKE '%$searchq%' OR brand LIKE '%$searchq%' OR name LIKE '%$searchq%' OR price LIKE '%$searchq%'");}
	else{
		echo("Please include a search string");
		die ('<p><a href="onlinemusic.html">Search again</a></p>');}
?>
</head>

<body>
<div>
        <div class="header-dark" style="background: #ccd8ea;">
            <nav class="navbar navbar-dark navbar-expand-lg navigation-clean-search" style="background: #3f6591;">
            <div class="container"><a class="navbar-brand" style="color: rgb(172,188,218);font-size: 30px;font-family: 'Black Ops One', cursive;" href="index.php">eRevive.com</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navcol-1">
                    <?php if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] == '') {
                     echo "<div style='margin-left: auto; margin-right: 0;'><a class='btn btn-light action-button' role='button' href='login.php' style='background: rgb(13,42,69);'>&nbsp;Log In&nbsp;</a>&nbsp;&nbsp;&nbsp;<a class='btn btn-light action-button' role='button' href='signup.php' style='background: rgb(13,42,69);'>Sign Up</a></div>";}    

                    else {
                        echo "<div style= 'margin-left: auto; margin-right: 0;'><a href='manageitems.php' style='color: rgb(255,255,255);'>Manage Items</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a class='btn btn-light action-button' role='button' href='logout.inc.php' style='background: rgb(13,42,69);'>&nbsp;Log Out&nbsp;</a><div>";}
                    ?>
                    </div>
                    </div>
            </nav>
            <div class="container hero" style="background: url(&quot;assets/img/Background.png&quot;) center / cover no-repeat;">
                <h1 class="text-center d-inline-block" style="color: rgb(0,0,0);opacity: 1;padding: 0px;margin: 0px;height: 210px;">Give your old digital goods the second life with our website.<br>Recycle, Sell, No Waste</h1>
            </div>
            <div class="text-center">
                <form action="searchresults.php" method="get" class="form-inline d-inline-block" style="padding-top: 30px;">
                    <div class="form-group text-center d-inline-block" style="padding: 20px;"><input class="form-control form-control-lg" type="text" name="itemQuery" id="itemQuery" style="width: auto;" placeholder="Search">
                    <button class="btn btn-primary btn-lg" type="submit" style="width: auto;">Submit</button></form></div>
            </div>
    <div style="background: #ccd8ea;">
        <h1 style="text-align: center;">Your searching results:</h1>
        
        <?php 
	if (mysqli_num_rows($sql)==0){
		echo("<p>No matches found.</p>");
		die('<p><a href="index.php">Search again</a></p>');}
        
	while($row = mysqli_fetch_array($sql)){
        echo '<div class="card mb-3">';
        echo '<div class="row g-0">';
        echo '<div class="col-md-4">';
        echo '<img src="images/items/' . $row['image'] . '" alt="' . $row['name'] . ' Product Image" class="card-img-top">';
        echo '</div>';
        echo '<div class="col-md-8">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $row['name'] . '</h5>';
        echo '<p>id: ' . $row['item_id'] . '</p>';
        echo '<p>Category: ' . $row['category'] . '</p>';
        echo '<p>Brand: ' . $row['brand'] . '</p>';
        echo '<p>' . $row['age'] . ' years old</p>';
        echo '<p>£' . $row['price'] . '</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>'; }
	mysqli_close($con);
	?>    
     </div></div>             
    </div>
    <div class="footer-basic" style="background: #3f6591;">
        <footer>
            <div class="social"><a href="#"><i class="icon ion-social-instagram" style="color: rgb(255,255,255);"></i></a><a href="#"><i class="icon ion-social-snapchat" style="color: rgb(255,255,255);"></i></a><a href="#"><i class="icon ion-social-twitter" style="color: rgb(255,255,255);"></i></a><a href="#"><i class="icon ion-social-facebook" style="color: rgb(255,255,255);"></i></a></div>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#" style="color: rgb(255,255,255);">United Kingdom</a></li>
                <li class="list-inline-item"><a href="#" style="color: rgb(255,255,255);">+44 666 666 777</a></li>
                <li class="list-inline-item"><a href="#" style="color: rgb(255,255,255);">erevive@gmail.com</a></li>
                <li class="list-inline-item"><a href="#" style="color: rgb(255,255,255);">www.erevive.com</a></li>
                <li class="list-inline-item"><a href="#" style="color: rgb(255,255,255);">"Recycle, Sell, No Waste"</a></li>
            </ul>
            <p class="copyright">eRevive.com © 2021</p>
        </footer>
    </div>
    <script src="assets4/js/jquery.min.js"></script>
    <script src="assets4/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets4/js/Animated-Pretty-Product-List-v12.js"></script>
    <script src="assets4/js/Grid-and-List-view-V10.js"></script>
</body>

</html>