<?php

require 'sessionCheck.php';
require 'db_connect.php';

// Check if the "id" parameter is present in the URL
if (!isset($_POST['email'])) {
    die('No student email provided');
}

$email = $_POST['email'];
$stmt = $conn->prepare('SELECT * FROM students WHERE email = ?');
$stmt->bind_param('s', $email);
$stmt->execute();

$result = $stmt->get_result();
$data = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Student</h1>
        <form action="editStudent.php" method="post" onsubmit="return validateForm()">
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" pattern="[A-Za-z\s]+" value="<?php echo $data['name']; ?>">
            </div>
            <div class="form-group">
                <label for="matricNo">Matric No:</label>
                <input type="text" class="form-control" id="matricNo" name="matricNo" pattern="\d{5,10}" value="<?php echo $data['matricNo']; ?>">
            </div>
            <div class="form-group">
                <label for="currentAddress">Current Address:</label>
                <input type="text" class="form-control" id="currentAddress" name="currentAddress" value="<?php echo $data['currentAddress']; ?>">
            </div>
            <div class="form-group">
                <label for="homeAddress">Home Address:</label>
                <input type="text" class="form-control" id="homeAddress" name="homeAddress" value="<?php echo $data['homeAddress']; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" pattern=".+@gmail.com" title="Please enter a Gmail account" value="<?php echo $data['email']; ?>">
            </div>
            <div class="form-group">
                <label for="mobilePhone">Mobile Phone No:</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="countryCodeMobile" name="countryCodeMobile" placeholder="Country Code" pattern="\+\d{1,3}" value="<?php echo $data['countryCodeMobile']; ?>">
                    <div class="input-group-append">
                        <span class="input-group-text">-</span>
                    </div>
                    <input type="text" class="form-control" id="mobilePhone" name="mobilePhone" pattern="\d{9,12}" value="<?php echo $data['mobilePhone']; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="homePhone">Home Phone No (Emergency):</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="countryCodeHome" name="countryCodeHome" placeholder="Country Code" pattern="\+\d{1,3}" value="<?php echo $data['countryCodeHome']; ?>">
                    <div class="input-group-append">
                        <span class="input-group-text">-</span>
                    </div>
                    <input type="text" class="form-control" id="homePhone" name="homePhone" pattern="\d{9,12}" value="<?php echo $data['homePhone']; ?>">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>