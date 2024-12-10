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

// Fetch bookings for the logged-in user
$stmt = $conn->prepare("SELECT tripID, travellers, destination, leaveDate, arriveDate FROM trips WHERE userName = ?");
$stmt->bind_param("s", $userName);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Bookings</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <h1>Your Bookings</h1>
    <table>
        <tr>
            <th>Travellers</th>
            <th>Destination</th>
            <th>Leave Date</th>
            <th>Arrive Date</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['travellers']); ?></td>
            <td><?php echo htmlspecialchars($row['destination']); ?></td>
            <td><?php echo htmlspecialchars($row['leaveDate']); ?></td>
            <td><?php echo htmlspecialchars($row['arriveDate']); ?></td>
            <td>
    <a href="edit_booking.php?id=<?php echo $row['tripID']; ?>" title="Edit Booking"><i class="fas fa-edit"></i></a>
    <a href="delete_booking.php?id=<?php echo $row['tripID']; ?>" title="Delete Booking" onclick="return confirm('Are you sure you want to delete this booking?');"><i class="fas fa-trash-alt"></i></a>
        </td>
        </tr>
        <?php endwhile; ?>

        <!-- Return to Index Button -->
    <div >
        <a href="index.php" class="btnRE">Return to HOME </a>
    </div>
    </table>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>