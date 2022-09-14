<?php
session_start(); // Enable sessions
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php?error=notloggedin');
    }
    $id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>manageitems</title>
    <link rel="stylesheet" href="assets3/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bevan">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Black+Ops+One">
    <link rel="stylesheet" href="assets3/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets3/css/Animated-Pretty-Product-List-v12.css">
    <link rel="stylesheet" href="assets3/css/Filter.css">
    <link rel="stylesheet" href="assets3/css/Footer-Basic.css">
    <link rel="stylesheet" href="assets3/css/Grid-and-List-view-V10-1.css">
    <link rel="stylesheet" href="assets3/css/Grid-and-List-view-V10.css">
    <link rel="stylesheet" href="assets3/css/Header-Dark.css">
    <link rel="stylesheet" href="assets3/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets3/css/styles.css">
</head>

<body style="background: #ccd8ea;">
            <nav class="navbar navbar-dark navbar-expand-lg navigation-clean-search" style="background: #3f6591;">
            <div class="container"><a class="navbar-brand" style="color: rgb(172,188,218);font-size: 30px;font-family: 'Black Ops One', cursive;" href="index.php">eRevive.com</a>
                    <div id="navcol-1">
                        <div style= "margin-left: auto; margin-right: 0;"><p class="navbar-text" style="font-size: 20px;padding: 0px;margin: 0px;">Hello, <?php
            echo $_SESSION['email'];
            ?></p>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a class="btn btn-light action-button" role="button" href="logout.inc.php" style="background: rgb(13,42,69); color: white">&nbsp;Log Out&nbsp;</a></div>
                    
                    </div>
                </div>
            </nav>
    <div style="background: #ccd8ea;padding: 9px;">
        <h1 style="text-align: center;">Add, delete and edit items here:</h1>
        <h4>Books added by: <?php echo "<p>ID: " . $id . "</p>"; ?></h4>
        
        <div class="table-responsive table-bordered" style="background: #ccd8ea;border-style: solid;">
        <?php
        // Check for 'success' in URL
        if (isset($_GET['success'])) {
            // Assign the value to a variable
            $message = $_GET['success'];
            // Output a message for a success
            if ($message == "itemadded") {
                echo "<p class=\"text-success\">Product added!</p>";
            }
        }

        // Check for 'error' in URL
        if (isset($_GET['error'])) {
            // Assign the value to a variable
            $message = $_GET['error'];
            // Output a message for a login error
            // .../file.php?error=sqlerror
            if ($message == "sqlerror") {
                echo "<p class=\"text-danger\">Sorry, there's an issue connecting to our database!</p>";
            }
        }
        ?>
</div>
</div>
<div><a class='btn btn-light action-button' role='button' href='editadd.php' style='background: rgb(13,42,69); color: white;'>&nbsp;Add New Product&nbsp;</a></div>
        <?php
        // Include script which displays current user's products
        include('myitems.inc.php');
        ?>
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
    <script src="assets3/js/jquery.min.js"></script>
    <script src="assets3/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets3/js/Animated-Pretty-Product-List-v12.js"></script>
    <script src="assets3/js/Grid-and-List-view-V10.js"></script>
</body>

</html>
