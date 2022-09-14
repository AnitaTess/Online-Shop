<?php
session_start(); // Enable sessions
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>signup</title>
    <link rel="stylesheet" href="assets5/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Black+Ops+One">
    <link rel="stylesheet" href="assets5/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets5/css/styles.css">
</head>

<body>
    <div class="register-photo" style="background: url(&quot;assets5/img/Background.png&quot;) center / cover no-repeat;">
    <?php
    // Check for 'success' in URL
        // eg: .../filephp?success=ABCDE
        if (isset($_GET['success'])) {
            // Assign the value to a variable
            $message = $_GET['success'];
            // Output a message for a register success
            if ($message == "register") {
                echo "<p class=\"text-success\">Registration successful!</p>";
            }
        }
        // Check for 'error' in URL
        // eg: .../filephp?error=ABCDE
        if (isset($_GET['error'])) {
            // Assign the value to a variable
            $message = $_GET['error'];
            // Output a message for a register error
            if ($message == "register") {
                echo "<p class=\"text-danger\">Registration unsuccessful!</p>";
            }
        }
        ?>
        <div class="form-container">
            <form action="register-user.inc.php" method="POST" style="background: #1e2833;">
                <h2 class="text-center" style="color: rgb(255,255,255);"><strong>Create</strong> an account.</h2>
                <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
                <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
                <div class="form-group"><button class="btn btn-primary btn-block" type="submit" style="background: #214a80;">Sign Up</button></div><a class="already" href="index.php" style="font-family: 'Black Ops One', cursive;color: #acbcda;">eRevive.com</a>
            </form>
        </div>
    </div>
    <script src="assets5/js/jquery.min.js"></script>
    <script src="assets5/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>