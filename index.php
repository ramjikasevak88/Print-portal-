<?php
include('../includes/config.php');

// Start the session
session_start();

// Destroy the session
session_destroy();

// Clear cookies by setting them to expire in the past
setcookie(session_name(), '', time() - 3600, '/');

// Clear cache by setting appropriate headers
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Redirect to the login page
header('Location: login.php');
exit();
?>
