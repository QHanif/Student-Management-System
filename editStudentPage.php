<?php
require 'db_connect.php';

require 'sessionCheck.php';


// Check if the "id" parameter is present in the URL
if (!isset($_POST['id'])) {
    die('No student ID provided');
}
// Get the ID of the student from the URL or somewhere else
$id = $_POST['id'];

// Prepare a SQL statement to select the student data
$stmt = $conn->prepare('SELECT * FROM students WHERE id = ?');

// Bind the student ID to the statement
$stmt->bind_param('i', $id);

// Execute the statement
$stmt->execute();

// Get the result of the statement
$result = $stmt->get_result();

// Fetch the student data and assign it to $data
$data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>
    <h1>Edit Student</h1>
    <form action="editStudent.php" method="post" onsubmit="return validateForm()">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
        <div class="form-container">
            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" pattern="[A-Za-z\s]+" value="<?php echo $data['name']; ?>">
            </div>
            <div>
                <label for="matricNo">Matric No:</label>
                <input type="text" id="matricNo" name="matricNo" pattern="\d{5,10}" value="<?php echo $data['matricNo']; ?>">
            </div>
            <div>
                <label for="currentAddress">Current Address:</label>
                <input type="text" id="currentAddress" name="currentAddress" value="<?php echo $data['currentAddress']; ?>">
            </div>
            <div>
                <label for="homeAddress">Home Address:</label>
                <input type="text" id="homeAddress" name="homeAddress" value="<?php echo $data['homeAddress']; ?>">
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" pattern=".+@gmail.com" title="Please enter a Gmail account" value="<?php echo $data['email']; ?>">
            </div>
            <div>
                <label for="mobilePhone">Mobile Phone No:</label>
                <input type="text" id="countryCodeMobile" name="countryCodeMobile" placeholder="Country Code" pattern="\+\d{1,3}" value="<?php echo $data['countryCodeMobile']; ?>">
                <span>-</span>
                <input type="text" id="mobilePhone" name="mobilePhone" pattern="\d{10,15}" value="<?php echo $data['mobilePhone']; ?>">
            </div>
            <div>
                <label for="homePhone">Home Phone No (Emergency):</label>
                <input type="text" id="countryCodeHome" name="countryCodeHome" placeholder="Country Code" pattern="\+\d{1,3}" value="<?php echo $data['countryCodeHome']; ?>">
                <span>-</span>
                <input type="text" id="homePhone" name="homePhone" pattern="\d{10,15}" value="<?php echo $data['homePhone']; ?>">
            </div>
        </div>
        <input type="submit" value="Submit">
    </form>
</body>
</html>