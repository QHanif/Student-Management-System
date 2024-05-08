<?php
require 'sessionCheck.php';
require 'db_connect.php';

$email = $_POST['email'];

// Prepare a SQL statement to delete the student from Students table
$sql = "DELETE FROM Students WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $email);

// Execute the statement
if ($stmt->execute()) {
    // Prepare a SQL statement to delete the user from Users table
    $sql = "DELETE FROM Users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);

    // Execute the statement
    if ($stmt->execute()) {
        header("Location: studentDetailsPage.php?message=Record deleted successfully");
    } else {
        echo "Error deleting record from Users: " . $stmt->error;
    }
} else {
    echo "Error deleting record from Students: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>