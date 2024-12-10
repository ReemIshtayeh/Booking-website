<?php
// Include the database connection
include 'DB.php';
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    header("Location: login.php");
    exit;
}

// Get the logged-in user's email
$userName = $_SESSION['userName'];

// Check if the booking ID is provided
if (isset($_GET['id'])) {
    $bookingId = $_GET['id'];

    // Delete the booking
    $stmt = $conn->prepare("DELETE FROM trips WHERE tripID = ? AND userName = ?");
    $stmt->bind_param("is", $bookingId, $userName);

    if ($stmt->execute()) {
        echo "<script>alert('Booking deleted successfully!'); window.location.href='manage_bookings.php';</script>";
    } else {
        echo "Error deleting booking: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "No booking ID provided.";
}

$conn->close();
?>