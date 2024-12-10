
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost"; // Change if your database server is different
$username = "root"; // Your database username
$password = "pro1122334455"; // Your database password
$dbname = "flight_booking"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>