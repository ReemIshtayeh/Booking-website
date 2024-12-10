<?php
// Include the database connection
include 'DB.php';
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    header("Location: login.php");
    exit;
}

// Check if the booking ID is provided
if (isset($_GET['id'])) {
    $bookingId = $_GET['id'];

    // Fetch the booking details
    $stmt = $conn->prepare("SELECT travellers, destination, leaveDate, arriveDate FROM trips WHERE tripID = ? AND userName = ?");
    $stmt->bind_param("is", $bookingId, $_SESSION['userName']);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the booking exists
    if ($result->num_rows === 0) {
        echo "No booking found.";
        exit;
    }

    // Fetch the booking data
    $booking = $result->fetch_assoc();
} else {
    echo "No booking ID provided.";
    exit;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $travellers = $_POST['travellers'];
    $destination = $_POST['destination'];
    $leaveDate = $_POST['leaveDate'];
    $arriveDate = $_POST['arriveDate'];

    // Update the booking
    $updateStmt = $conn->prepare("UPDATE trips SET travellers = ?, destination = ?, leaveDate = ?, arriveDate = ? WHERE tripID = ? AND userName = ?");
    $updateStmt->bind_param("isssis", $travellers, $destination, $leaveDate, $arriveDate, $bookingId, $_SESSION['userName']);

    if ($updateStmt->execute()) {
        echo "<script>alert('Booking updated successfully!'); window.location.href='manage_bookings.php';</script>";
    } else {
        echo "Error updating booking: " . $updateStmt->error;
    }

    $updateStmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Booking</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Edit Booking</h1>
    <form action="edit_booking.php?id=<?php echo $bookingId; ?>" method="POST">
        <label for="travellers">Number of Travellers:</label>
        <input type="number" id="travellers" name="travellers" value="<?php echo htmlspecialchars($booking['travellers']); ?>" required>

        <label for="destination">Destination:</label>
        <input type="text" id="destination" name="destination" value="<?php echo htmlspecialchars($booking['destination']); ?>" required>

        <label for="leaveDate">Leave Date:</label>
        <input type="date" id="leaveDate" name="leaveDate" value="<?php echo htmlspecialchars($booking['leaveDate']); ?>" required>

        <label for="arriveDate">Arrive Date:</label>
        <input type="date" id="arriveDate" name="arriveDate" value="<?php echo htmlspecialchars($booking['arriveDate']); ?>" required>

        <button type="submit">Update Booking</button>
    </form>
</body>
</html>