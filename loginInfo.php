<?php
// Include the database connection
include 'DB.php';
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $userName = $_POST['email']; // Use email as userName
    $password = $_POST['password'];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT userName, pass FROM passenger WHERE userName = ?");
    if ($stmt === false) {
        die("Prepare failed: " . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("s", $userName);

    // Execute the statement
    if (!$stmt->execute()) {
        die("Execute failed: " . htmlspecialchars($stmt->error));
    }

    $stmt->store_result();

    // Check if the user exists
    if ($stmt->num_rows > 0) {
        // User exists, now fetch the ID and hashed password
        $stmt->bind_result($userId, $hashedPassword);
        $stmt->fetch();

        // Verify the password
        if (password_verify($password, $hashedPassword)) {
            // Password is correct, login successful
            $_SESSION['user_logged_in'] = true; // Set session variable
            $_SESSION['ID'] = $userId; // Store user ID
            $_SESSION['userName'] = $userName; // Store user email

            // Redirect to index.php
            echo "<script>alert('Welcome to our website'); window.location.href='index.php';</script>";
            exit; // Make sure to exit after redirection
        } else {
            // Password is incorrect
            echo "<script>alert('Invalid password. Please try again.!'); window.location.href='login.php';</script>";
        }
    } else {
        // User does not exist
        echo "<script>alert('No account found with that email.'); window.location.href='login.php';</script>";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>