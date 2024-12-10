<?php
// Include the database connection
include 'DB.php';

// Start the session only if it hasn't been started yet
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    echo "You must be logged in to book a trip.";
    header("Location: login.php");
    exit;
}

$userName = $_SESSION['userName']; // Get the logged-in user's email


// // Check if the session variable is set
// if (isset($_SESSION['userName'])) {
//     $userName = $_SESSION['userName']; // Get the logged-in user's email
//     echo "User  email: " . $userName . "<br>";
// } else {
//     echo "User  email is not set in the session.<br>";
//     exit; // Exit if the user email is not set
// }

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Debugging: Print the $_POST array
    // print_r($_POST); // This will show you what data is being sent
   

    // Check if required fields are set
    if (isset($_POST['location'], $_POST['travellers'], $_POST['leaveDate'], $_POST['arriveDate'])) {
        // Get the form data
        $location = $_POST['location'];
        $travellers = $_POST['travellers'];
        $leaveDate = $_POST['leaveDate']; // Make sure this matches your form field name
        $arriveDate = $_POST['arriveDate']; // Make sure this matches your form field name
       
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO trips (travellers, destination, leaveDate, arriveDate, userName) VALUES (?, ?, ?, ?, ?)");

        if ($stmt  === false) {
            die("Prepare failed: " . htmlspecialchars($conn->error));
        }

        $stmt->bind_param("issss", $travellers, $location, $leaveDate, $arriveDate, $userName);

        // Execute the statement
        if ($stmt->execute()) {
            // echo "<script>alert('Trip booked successfully!'); window.location.href='index.php';</script>";
            // header("Location: index.php");
        } else {
            echo "Error: " . $stmt->error ;
        }

        // Get the last inserted trip ID
        $tripID = $stmt->insert_id;
        $bookingStmt = $conn->prepare("INSERT INTO booking (tripNum, passengerEmail) VALUES (?, ?)");
       if ($bookingStmt === false) {
           die("Prepare failed: " . htmlspecialchars($conn->error));
       }
       $bookingStmt->bind_param("is", $tripID, $userName);
      
      // Execute the booking insert
if ($bookingStmt->execute()) {
    echo "<script>alert('Booking created successfully!'); window.location.href='manage_bookings.php';</script>";
} else {
    echo "Error inserting into booking table: " . $bookingStmt->error; // Debugging line
}
       
        

        // Close the statement and connection
        $bookingStmt->close();
        $stmt->close();
    } else {
        echo "Please fill in all required fields.";
    }
    $conn->close();
}
?>