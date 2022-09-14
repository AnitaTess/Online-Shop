<?php
// Save connection variable
$host = "localhost"; // Hosting server
$username = "root";
$password = "root";
$dbname = "erevive"; // Database name

// Create connection string using the above variables
$con = new mysqli(
    $host,
    $username,
    $password,
    $dbname
);

// Check connection for errors
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>