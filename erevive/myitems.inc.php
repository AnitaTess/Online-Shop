<?php
require('req.php'); // Require database connection file
// Prepares select query
$sql = "SELECT * FROM products WHERE user_id = ?";
// Initialise statement
$stmt = mysqli_stmt_init($con);
// If statement can't be prepared, send error msg
if (!mysqli_stmt_prepare($stmt, $sql)) {
    header('location: manageitems.php?error=sqlerror');
    exit();
}
// If statement can be prepared
else {
    // Bind paramaters to prepared statement
    mysqli_stmt_bind_param($stmt, "i", $_SESSION['user_id']);
    // Execute prepared statement
    mysqli_stmt_execute($stmt);
    // Store results in a variable
    $results = mysqli_stmt_get_result($stmt);

    // Loop through results, displaying values from each row in a card
    // Result is saved as an associative array in the $row variable
    while ($row = mysqli_fetch_assoc($results)) {
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
        // Sends a GET request in the URL query which includes this product's id, this can be retrieved by the delete script
        echo '<a href="delete.inc.php?id=' . $row['item_id'] . '" class="btn btn-dark px-4">Delete</a>&nbsp;';
        echo '<a href="edititem.php?id=' . $row['item_id'] . '" class="btn btn-dark px-4">Edit</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    $stmt->close();
    exit();
}
?>