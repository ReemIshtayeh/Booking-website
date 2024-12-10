<?php
// Include the session management file
include 'session.php';

// Display user information
echo "Welcome, " . htmlspecialchars($_SESSION['userName']) . "!";
echo "<br>ID: " . htmlspecialchars($_SESSION['ID']) . "";
?>