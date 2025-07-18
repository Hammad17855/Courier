<?php
session_start();  // Start the session

// Destroy the session variables
session_unset();  // Unset all session variables
session_destroy();  // Destroy the session

// Redirect to the login page
header("Location: ../login.php");
exit();  // Ensure no further code is executed
?>
