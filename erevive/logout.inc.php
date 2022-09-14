<?php
session_start(); // Start sessions (so that we can unset and destroy)
session_unset(); // Unset all sessions
session_destroy(); // Remove all sessions from memory
//session_destroy($_SESSION['username']); // To remove a single session
header("Location: index.php"); // Send user to index page after logging out