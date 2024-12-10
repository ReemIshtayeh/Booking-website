<?php
// Include the database connection
include 'DB.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $userId = $_POST['ID'];
    $name = $_POST['Name'];
    $userName = $_POST['userName']; // This should be the email
    $password = $_POST['pass'];
    $dob = $_POST['dob'];
    $phoneNumber = $_POST['phoneNumber'];

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
     
    // Check if the email already exists
    $checkEmailStmt = $conn->prepare("SELECT userName FROM passenger WHERE userName = ?");
    $checkEmailStmt->bind_param("s", $userName);
    $checkEmailStmt->execute();
    $checkEmailStmt->store_result();

    if ($checkEmailStmt->num_rows > 0) {
        // Email already exists
        echo "This email is already registered. Please use a different email.";
    } else {
        // Prepare and bind for insertion
        $stmt = $conn->prepare("INSERT INTO passenger (ID, name, userName, pass, dateOfBirth, phoneNum) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $userId, $name, $userName, $hashedPassword, $dob, $phoneNumber);

        // Execute the statement
        if ($stmt->execute()) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
    // Close the statement and connection
    $checkEmailStmt->close();
    $conn->close();
}
?>