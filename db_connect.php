<?php
$servername = "localhost";
$username = "Student Management System";
$password = "wasasg";
$dbname = "inputval";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>