<?php
session_start();

// Check if add book form has been submitted with button
if (isset($_POST['submitit'])) {
    require('req.php'); // Require database connection file

    $name = $_POST['name'];
    $category = $_POST['category'];
    $brand = $_POST['brand'];
    $age = $_POST['age'];
    $price = $_POST['price'];
    // Retrieve any files from the request
    // $filename = $_FILES['book-image']['name'];
    // As above, but removes any spaces (replaces spaces with empty string) and makes the file name fully lowercase
    $filename = str_replace(' ', '', strtolower(basename($_FILES["image"]["name"])));

    // Specify an upload location (for later use)
    $targetdirectory = "images/items/";
    // Specify a variable which will indicate if upload has 'passed our checks'
    $uploadstatus = 1;

    // If the request contains an image and there are no errors...
    // ...then an upload attempt has occured
    // if (isset($_FILES['book-image']) && $_FILES['book-image']['error'] == 0) {
    if (isset($_FILES['image']) && !empty($filename)) {
        // Get the file type - eg, "image/jpeg" or "image/png"
        $filetype = $_FILES["image"]["type"];

        // Get the file size (this is in Bytes)
        // An image size of 1 MB (Megabyte) is 1024 kB (kilobytes)
        // 1024 kB is 1048576 Bytes
        $filesize = $_FILES["image"]["size"];

        // Specify file types which we will allowin an associative array
        // key => value
        $allowedtypes = array(
            "jpg" => "image/jpg",
            "jpeg" => "image/jpeg",
            "gif" => "image/gif",
            "png" => "image/png"
        );

        // Get the file extension - eg, .jpg, .png
        $fileextension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        // Declare the max file size we want - 2 MB maximum in our case
        // 1024 Bytes * 1024 Bytes = 1048576 Bytes, or 1024 kB, or 1 MB
        // This x 2 = 2097152 Bytes, or 2048 kB, or 2 MB
        $maxfilesize = 2 * 1024 * 1024;

        // Check if the file matches our allowed file types
        if (!array_key_exists($fileextension, $allowedtypes)) {
            $uploadstatus = 0; // Error = set to 0
            exit;
        }

        // Check if the file to be uploaded exceeds our specified maximum of 2 MB
        if ($filesize > $maxfilesize) {
            $uploadstatus = 0; // Error = set to 0
        }

        // Verify MIME type of the file
        // Check it actually is a jpg, png, etc and isn't a file with fake extension
        if (!in_array($filetype, $allowedtypes)) {
            $uploadstatus = 0; // Error = set to 0
        }

        // At least one check was unsuccessful (upload status = 0)
        if ($uploadstatus == 0) {
            // Sends user back to partially completed form
            header('location: edititem.php?error=upload&name=' . $name);
            $con->close();
            exit();
        }
        // All checks are successful (upload status = 1)
        else {
            // Prepend the current time onto the filename - fairly unique!
            $filename = time() . $filename;
            // Moves the successfully uploaded file from the temporary location...
            // ..to the specified location - images/books/ and concatenates with file name
            move_uploaded_file($_FILES["image"]["tmp_name"], $targetdirectory . $filename); // eg, images/books/myimage.jpg

            // Checks for empty fields
            if (empty($name) || empty($category) || empty($brand) || empty($age) || empty($price)) {
                // Sends user back to partially completed form
                header('location: edititem.php?error=emptyfields&name=' . $name);
                $con->close();
                exit();
            }
            // Checks characters entered into model field
            else if (!preg_match("/^[a-zA-Z0-9- ]*$/", $name)) {
                // Sends user back to partially completed form
                header('location: edititem.php?error=invalidname&name=' . $name);
                $con->close();
                exit();
            }
            else if (is_nan($price)|| $price > 99999999.99) {
                // Sends user back to partially completed form
                header('location: edititem.php?error=invalidprice&name=' . $name);
                $con->close();
                exit();
            }
            // All checks are successful

        else{
        // Define the prepared update statement
        $sql = "UPDATE products SET name = ?, brand = ?, category = ?, age = ?, price = ?, image = ? WHERE item_id = ? AND user_id = ?;";
        // Initialise statement
        $stmt = mysqli_stmt_init($con);
        // If statement can't be prepared, send user an error
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header('location: edititem.php?error=sqlerror');
            $stmt->close();
            exit();
        }
        // If statement can be prepared
        else {
            // Bind params to prepared statement - filename, book id and user id
            mysqli_stmt_bind_param($stmt, "ssssdsii", $name, $brand, $category, $age, $price, $filename, $_POST['id'], $_SESSION['user_id']);
            // Execute prepared statement
            mysqli_stmt_execute($stmt);
            // Redirect user with success message
            header('location: manageitems.php?success=updated');
            $stmt->close();
            exit();
        }
    }
    }
    }
    else {
        // Checks for empty fields
        if (empty($name) || empty($category) || empty($brand) || empty($age) || empty($price)) {
            // Sends user back to partially completed form
            header('location: edititem.php?error=emptyfields&name=' . $name);
            $con->close();
            exit();
        }
        // Checks characters entered into model field
        else if (!preg_match("/^[a-zA-Z0-9- ]*$/", $name)) {
            // Sends user back to partially completed form
            header('location: edititem.php?error=invalidname&name=' . $name);
            $con->close();
            exit();
        }
        else{
            // Define the prepared update statement
            $sql = "UPDATE products SET name = ?, brand = ?, category = ?, age = ?, price = ? WHERE item_id = ? AND user_id = ?;";
            // Initialise statement
            $stmt = mysqli_stmt_init($con);
            // If statement can't be prepared, send user an error
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header('location: edititem.php?error=sqlerror');
                $stmt->close();
                exit();
            }
            else {
                // Bind params to prepared statment
                mysqli_stmt_bind_param($stmt, "ssssdii", $name, $brand, $category, $age, $price, $_POST['id'], $_SESSION['user_id']);
                // Execute prepared statement
                mysqli_stmt_execute($stmt);
                
                // Redirect user with success message
                header('location: manageitems.php?success=itemedited');
                $stmt->close();
                exit(); 
}
        }
    }
}

// Add book form hasn't been submitted or the submission didn't include a file
else {
    header('location: edititem.php');
    exit();
}
?>
