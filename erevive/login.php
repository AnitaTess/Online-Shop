<?php
session_start(); // Enable sessions
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>login</title>
    <link rel="stylesheet" href="assets2/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Black+Ops+One">
    <link rel="stylesheet" href="assets2/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets2/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets2/css/styles.css">
</head>

<body>
    <div class="login-dark" style="background: url(&quot;assets2/img/Background.png&quot;) center / contain round;">

    <?php
        // Check for 'success' in URL
        // eg: .../filephp?success=ABCDE
        if (isset($_GET['success'])) {
            // Assign the value to a variable
            $message = $_GET['success'];
            // Output a message for a register success
            if ($message == "register") {
                echo "<h1 class=\"text-success\">Registration successful!</h1>";
            }
        }

        // Check for 'error' in URL
        // eg: .../filephp?error=ABCDE
        if (isset($_GET['error'])) {
            // Assign the value to a variable
            $message = $_GET['error'];
            // Output a message for a login error
            if ($message == "login") {
                echo "<h1 class=\"text-danger\">Login unsuccessful!</h1>";
            }
        }
        ?>

        <form action="check-user.inc.php" method="POST" style="background: #1e2833;">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-locked-outline" style="color: #214a80;"></i></div>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" style="background: #214a80;">Log In</button></div><a class="forgot" href="index.php" style="font-family: 'Black Ops One', cursive;color: #acbcda;">eRevive.com</a>
        </form>
    </div>
    <script src="assets2/js/jquery.min.js"></script>
    <script src="assets2/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>