<?php
// Start the session
session_start();

// Check if the user is logged in
if (isset($_SESSION['user_logged_in'])) {
    // User is logged in, redirect to dashboard
    header('Location: dashboard.php');
    exit;
} else {
    // User is not logged in, redirect to login page
    header('Location: login.html');
    exit;
}
?>