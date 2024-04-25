<?php
session_start();
require 'db_connect.php';

// Check if the user is logged in
if (!isset($_SESSION['useremail'])) {
    die('You are not logged in');
}

// Get the user's details from the database
$sql = "SELECT id, name, matricNo, currentAddress, homeAddress, email, countryCodeMobile, mobilePhone, countryCodeHome, homePhone FROM Students WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $_SESSION['useremail']);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    die('User not found');
}


// If the form is submitted, update the user's details
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $matricNo = $_POST['matricNo'];
    $currentAddress = $_POST['currentAddress'];
    $homeAddress = $_POST['homeAddress'];
    $email = $_POST['email'];
    $countryCodeMobile = $_POST['countryCodeMobile'];
    $mobilePhone = $_POST['mobilePhone'];
    $countryCodeHome = $_POST['countryCodeHome'];
    $homePhone = $_POST['homePhone'];

    $sql = "UPDATE Students SET name = ?, matricNo = ?, currentAddress = ?, homeAddress = ?, email = ?, countryCodeMobile = ?, mobilePhone = ?, countryCodeHome = ?, homePhone = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssi", $name, $matricNo, $currentAddress, $homeAddress, $email, $countryCodeMobile, $mobilePhone, $countryCodeHome, $homePhone, $_SESSION['userid']);

    if ($stmt->execute()) {
        echo "Details updated successfully";
    } else {
        echo "Error updating details";
    }
}

$conn->close();
?>

<form action="" method="post">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>"><br>
    <!-- Add more fields here -->
    <input type="submit" value="Update">
</form>