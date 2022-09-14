<?php
session_start(); // Enable sessions
include('error-check.inc.php'); // Include error checking file
require('req.php'); // Require database connection file

// Get the username and password from the login form
// Escape any special characters in the string
$email = mysqli_real_escape_string($con, $_POST['email']);
$password = mysqli_real_escape_string($con, $_POST['password']);

// If the username or password are null, empty or not set...
// ...then send user to login page
if (($email == null || $email == '' || !isset($email)) || ($password == null || $email == '' || !isset($email))) {
    header('location: login.php?error=emptyfields');
    // Close the db connection
    $con->close();
    exit();
} else {
    // Get SQL statement ready
    $sql = "SELECT * FROM users WHERE email = ?";
    // Initialise statement which will use our connection
    $stmt = mysqli_stmt_init($con);

    // If statement can't be prepared, redirect with error msg
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location: index.php?error=sqlerror');
        $stmt->close();
        exit();
    }
    // Statement can be prepared
    else {
        // Bind parameters to the statement ("s" means string)
        mysqli_stmt_bind_param($stmt, "s", $email);
        // Execute the statement
        mysqli_stmt_execute($stmt);
        // Store result (should only be one)
        $result = mysqli_stmt_get_result($stmt);

        //If there is a result, save as a variable named row
        if ($row = mysqli_fetch_assoc($result)) {
            //Check the entered password against password in database
            $passwordcheck = password_verify($password, $row['password']);

            //If password is incorrect, redirect user with error message
            if ($passwordcheck == false) {
                header('location: login.php?error=login');
                // Close the db connection
                $stmt->close();
                exit();
            }
            // If password is correct
            // THIS is where we can create some sessions - when a login is successful
            else if ($passwordcheck == true) {
                // Assign the id and username values from DB to sessions with the names id and username
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['email'] = $row['email'];
                // Redirect with success message
                header('Location: manageitems.php?success=login');
                // Close the db connection
                $stmt->close();
                exit();
            }
            //If unspecified error, redirect user with success message
            else {
                header('Location: login.php?error=login');
                // Close the db connection
                $stmt->close();
                exit();
            }
        }
        //If no results from query, user doesn't exist - redirect with error message
        else {
            header('Location: login.php?error=login');
            // Close the db connection
            $stmt->close();
            exit();
        }
    }
}
?>
