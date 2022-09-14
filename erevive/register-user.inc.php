<?php
include('error-check.inc.php'); // Include error checking file
require('req.php'); // Require database connection file

// ####################################################################
// ####################################################################
// CHECKING IF A USER EXISTS
// WITH A HASHED PASSWORD
// ####################################################################
// ####################################################################

// Get the username and password from the login form
// Escape any special characters in the string
$email = mysqli_real_escape_string($con, $_POST['email']);
$password = mysqli_real_escape_string($con, $_POST['password']);
// Hashing the entered password
$hashedpassword = password_hash($password, PASSWORD_DEFAULT);
$sql_e = "SELECT * FROM users WHERE email='$email'";
$res_e = mysqli_query($con, $sql_e);

if (($email == null || $email == '' || !isset($email)) || ($password == null || $email == '' || !isset($email))) {
    header('location: signup.php?error=emptyfields');
    // Close the db connection
    $con->close();
    exit();}

    else if(mysqli_num_rows($res_e) > 0){
        header('location: signup.php?error=emailtaken');
        $con->close();
    exit();	
  	}
// Prepare a SQL statement, which includes the username and hashed password
$sql = "INSERT INTO users (email, password) VALUES ('$email', '$hashedpassword')";

// Check if the query is executed using the current connection (from the include)
// If so, registration has been successful
if ($con->query($sql)) {
    header('Location: login.php?success=register'); // Send the user to the login page
}
// If the query was not successful, display an error message
else {
    // Display a simple error message
    // echo "Error: " . $sql . "<br>" . $conn->error;
    // You can send the user to another page rather than display an error
    header('Location: signup.php?error=register');
}

// Close the db connection
$con->close();
?>