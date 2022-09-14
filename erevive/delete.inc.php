<?php
session_start(); // Start sessions

// Check if URL contains an id and if the user is logged in
if (isset($_GET['id']) && isset($_SESSION['user_id'])) {
    require('req.php'); // Require database connection file
    // Store the id from the URL
    $itemid = mysqli_real_escape_string($con, $_GET['id']);

    // Prepares delete query
    $sql = "DELETE FROM products WHERE item_id = ? AND user_id = ?";
    //Initialise statement
    $stmt = mysqli_stmt_init($con);
    // If statement can't be prepared, send error msg
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location: manageitems.php?error=sqlerror');
        $stmt->close();
        exit();
    }
    // If statement can be prepared
    else {
        // Bind parameters
        mysqli_stmt_bind_param($stmt, "si", $itemid, $_SESSION['user_id']);
        // Execute the statement
        mysqli_stmt_execute($stmt);
        // If previous statement have affected > 1 row (will be 1 or 0), then item has been deleted
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            header('location: manageitems.php?success=itemdeleted');
            $stmt->close();
            exit();
        }
        // If there are 0 affected rows, then the statement did not do anything
        // This means user may be logged in, but has manually changed the URL query
        else {
            header('location: manageitems.php?error=unauthorised');
            $stmt->close();
            exit();
        }
    }
}
// The URL doesn't contain an id, or the user is not logged in
else {
    header('location: index.php?error=somethingwentwrong');
    exit();
}
?>