<?php
require 'sessionCheck.php';
if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    // CSRF token does not match, reject the form submission
    die('Invalid CSRF token');
}
require 'db_connect.php';


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
    
    $stmt = $conn->prepare($sql);

    $stmt->bind_param('sssssssssi', $name, $matricNo, $currentAddress, $homeAddress, $email, $countryCodeMobile, $mobilePhone, $countryCodeHome, $homePhone, $id);
    
    if ($stmt->execute()) {
         
        if ($_SESSION['role'] == 'admin') {
            header("Location: studentDetailsPage.php?message=Record updated successfully");
        } else {
            header("Location: userPage.php");
        }
        // header("Location: studentDetailsPage.php?message=Record updated successfully");
        exit;
    }
     else {
        echo "Error updating record: " . $stmt->error;
    }

   
    $stmt->close();

$conn->close();
?>