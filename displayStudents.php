<?php
session_start();
require 'db_connect.php';



$sql = "SELECT name, matricNo, currentAddress, homeAddress, email, countryCodeMobile, mobilePhone, countryCodeHome, homePhone FROM Students";
$result = $conn->query($sql);

echo '<table class="table table-bordered">';
echo '<tr><th>Name</th><th>Matric No</th><th>Current Address</th><th>Home Address</th><th>Email</th><th>Mobile Phone</th><th>Home Phone</th></tr>';

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>'.htmlspecialchars($row["name"]).'</td>';
        echo '<td>'.htmlspecialchars($row["matricNo"]).'</td>';
        echo '<td>'.htmlspecialchars($row["currentAddress"]).'</td>';
        echo '<td>'.htmlspecialchars($row["homeAddress"]).'</td>';
        echo '<td>'.htmlspecialchars($row["email"]).'</td>';
        echo '<td>'.htmlspecialchars($row["mobilePhone"]).'</td>';
        echo '<td>'.htmlspecialchars($row["homePhone"]).'</td>';
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="7">No data found</td></tr>';
}

$conn->close();
?>