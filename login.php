<?php
session_start();
require 'db_connect.php';
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT id, password, role FROM Users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        // Set the session variable
        $_SESSION['userid'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['useremail'] = $email;

        // Redirect based on role
        if ($user['role'] == 'admin') {
            header("Location: studentDetailsPage.php");
        } else {
            header("Location: userPage.php");
        }
        exit;
    } else {
        echo "Invalid email or password";
    }
}

$conn->close();
?>