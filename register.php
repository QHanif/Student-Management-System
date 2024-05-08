<?php
require 'db_connect.php';



$currentAddress = $_POST['currentAddress'];
$homeAddress = $_POST['homeAddress'];
$email = $_POST['email'];
$countryCodeMobile = $_POST['countryCodeMobile'];
$mobilePhone = $_POST['mobilePhone'];
$countryCodeHome = $_POST['countryCodeHome'];
$homePhone = $_POST['homePhone'];

// Check if "Users" table exists, if not, create it
$sql = "CREATE TABLE IF NOT EXISTS Users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(20) NOT NULL DEFAULT 'user',
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === FALSE) {
    echo "Error creating table: " . $conn->error;
}


// Validate and insert data
$name = $_POST['name'];
if (!preg_match("/^[A-Za-z\s]+$/", $name)) {
    die("Invalid name");
}

$matricNo = $_POST['matricNo'];
if (!preg_match("/^\d{5,10}$/", $matricNo)) {
    die("Invalid matric number");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = 'user'; // Set the role for the new user

    // Check if the email is already in use
    $sql = "SELECT * FROM Users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();




    if ($result->num_rows > 0) {
        echo "<script type='text/javascript'>alert('Email is already in use'); window.location.href = 'registerPage.html';</script>";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO Users (email, password, role) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $email, $hashed_password, $role);
        if ($stmt->execute() === TRUE) {
            echo "<script type='text/javascript'>alert('New user registered successfully'); window.location.href = 'loginPage.html';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $sql = "INSERT INTO Students (name, matricNo, currentAddress, homeAddress, email, countryCodeMobile, mobilePhone, countryCodeHome, homePhone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssss", $name, $matricNo, $currentAddress, $homeAddress, $email, $countryCodeMobile, $mobilePhone, $countryCodeHome, $homePhone);
        

        if ($stmt->execute() === TRUE) {
            echo "<script type='text/javascript'>alert('New user registered successfully'); window.location.href = 'loginPage.html';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}


$conn->close();
?>