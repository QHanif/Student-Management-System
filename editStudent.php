<?php
require 'db_connect.php';

// Get the ID of the student to edit
$id = $_POST['id'];

// Prepare a SQL statement to get the current data of the student
$sql = "SELECT * FROM Students WHERE id = ?";

// Create a prepared statement
$stmt = $conn->prepare($sql);

// Bind the ID to the SQL statement
$stmt->bind_param('i', $id);

// Execute the statement
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Fetch the data
$data = $result->fetch_assoc();

// Close the statement
$stmt->close();

// Check if the form data is present in the POST data
if (!isset($_POST['id']) || !isset($_POST['name']) || !isset($_POST['matricNo']) || !isset($_POST['currentAddress']) || !isset($_POST['homeAddress']) || !isset($_POST['email']) || !isset($_POST['countryCodeMobile']) || !isset($_POST['mobilePhone']) || !isset($_POST['countryCodeHome']) || !isset($_POST['homePhone'])) {
    die('Form data not provided');
}

// Get the form data from the POST data
$id = $_POST['id'];
$name = $_POST['name'];
$matricNo = $_POST['matricNo'];
$currentAddress = $_POST['currentAddress'];
$homeAddress = $_POST['homeAddress'];
$email = $_POST['email'];
$countryCodeMobile = $_POST['countryCodeMobile'];
$mobilePhone = $_POST['mobilePhone'];
$countryCodeHome = $_POST['countryCodeHome'];
$homePhone = $_POST['homePhone'];

    // Prepare a SQL statement to update the student
    
    $sql = "UPDATE Students SET name = ?, matricNo = ?, currentAddress = ?, homeAddress = ?, email = ?, countryCodeMobile = ?, mobilePhone = ?, countryCodeHome = ?, homePhone = ? WHERE id = ?";
    

    // Create a prepared statement
    $stmt = $conn->prepare($sql);

    // Bind the new data to the SQL statement

    $stmt->bind_param('sssssssssi', $name, $matricNo, $currentAddress, $homeAddress, $email, $countryCodeMobile, $mobilePhone, $countryCodeHome, $homePhone, $id);
    

    // Execute the statement
    
    if ($stmt->execute()) {
        header("Location: studentDetailsPage.php?message=Record updated successfully");
        exit;
    }
     else {
        echo "Error updating record: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();


$conn->close();
?>