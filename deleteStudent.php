<?php
require 'db_connect.php';

// Get the ID of the student to delete
$id = $_POST['id'];

// Prepare a SQL statement to delete the student
$sql = "DELETE FROM Students WHERE id = ?";

// Create a prepared statement
$stmt = $conn->prepare($sql);

// Bind the ID to the SQL statement
$stmt->bind_param('i', $id);

// Execute the statement
if ($stmt->execute()) {
    header("Location: studentDetailsPage.php?message=Record deleted successfully");
} else {
    echo "Error deleting record: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>