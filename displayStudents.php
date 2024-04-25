<?php
session_start();
require 'db_connect.php';

$sql = "SELECT id, name, matricNo, currentAddress, homeAddress, email, countryCodeMobile, mobilePhone, countryCodeHome, homePhone FROM Students";
$result = $conn->query($sql);

echo '<table class="table table-bordered">';
echo '<tr><th>Name</th><th>Matric No</th><th>Current Address</th><th>Home Address</th><th>Email</th><th>Mobile Phone</th><th>Home Phone</th><th>Edit</th><th>Delete</th></tr>';

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>'.htmlspecialchars($row["name"]).'</td>';
        echo '<td>'.htmlspecialchars($row["matricNo"]).'</td>';
        echo '<td>'.htmlspecialchars($row["currentAddress"]).'</td>';
        echo '<td>'.htmlspecialchars($row["homeAddress"]).'</td>';
        echo '<td>'.htmlspecialchars($row["email"]).'</td>';   
        echo '<td>'.htmlspecialchars($row["countryCodeMobile"].$row["mobilePhone"]).'</td>';
        echo '<td>'.htmlspecialchars($row["countryCodeHome"].$row["homePhone"]).'</td>';    
        echo "<td>
                <form action='editStudentPage.php' method='post'>
                    <input type='hidden' name='id' value='" . $row['id'] . "'>
                    <input type='submit' value='Edit'>
                </form>
              </td>";
        echo "<td>
                <form action='deleteStudent.php' method='post'>
                    <input type='hidden' name='id' value='" . $row['id'] . "'>
                    <input type='submit' value='Delete'>
                </form>
              </td>";
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="9">No data found</td></tr>';
}

$conn->close();
?>