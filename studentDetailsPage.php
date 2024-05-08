<?php
require 'sessionCheck.php';
?>
<!DOCTYPE html>
<html>
<head>
    
   
    <title>Student Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .form-container div {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        .form-container div label {
            margin-right: 10px;
            min-width: 200px;
        }
        .form-container div input[type="text"], .form-container div input[type="email"] {
            flex-grow: 1;
        }

        .styled-table {
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 0.9em;
        font-family: sans-serif;
        min-width: 400px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }
    .styled-table thead tr {
        background-color: #009879;
        color: #ffffff;
        text-align: left;
    }
    .styled-table th,
    .styled-table td {
        padding: 12px 15px;
    }
    .styled-table tbody tr {
        border-bottom: 1px solid #dddddd;
    }
    .styled-table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
    }
    .styled-table tbody tr:last-of-type {
        border-bottom: 2px solid #009879;
    }
    .logout-button {
            position: absolute;
            top: 10px;
            right: 10px;
        }
    </style>
</head>
<body>
<p>Welcome, <?php echo $_SESSION['role']; echo "<br>session_id(): ".session_id();?>!</p>
    <form action="logout.php" method="post" class="logout-button">
        <input type="submit" value="Logout">
    </form>
    <!-- <script src="js/validation.js"></script>
    <h1>Student Details</h1>
    <form action="addStudent.php" method="post" onsubmit="return validateForm()">
        <div class="form-container">
            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" pattern="[A-Za-z\s]+">
            </div>
            <div>
                <label for="matricNo">Matric No:</label>
                <input type="text" id="matricNo" name="matricNo" pattern="\d{5,10}">
            </div>
            <div>
                <label for="currentAddress">Current Address:</label>
                <input type="text" id="currentAddress" name="currentAddress">
            </div>
            <div>
                <label for="homeAddress">Home Address:</label>
                <input type="text" id="homeAddress" name="homeAddress">
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" pattern=".+@gmail.com" title="Please enter a Gmail account">
            </div>
            <div>
                <label for="mobilePhone">Mobile Phone No:</label>
                <input type="text" id="countryCodeMobile" name="countryCodeMobile" placeholder="Country Code" pattern="\+\d{1,3}">
                <span>-</span>
                <input type="text" id="mobilePhone" name="mobilePhone" pattern="\d{10,15}">
            </div>
            <div>
                <label for="homePhone">Home Phone No (Emergency):</label>
                <input type="text" id="countryCodeHome" name="countryCodeHome" placeholder="Country Code" pattern="\+\d{1,3}">
                <span>-</span>
                <input type="text" id="homePhone" name="homePhone" pattern="\d{10,15}">
            </div>
        </div>
        <input type="submit" value="Submit">
    </form> -->
 
<section id="section2">
    <h1 style="text-align: center;margin: 50px 0;" > Student Details Table</h1>
    <div class="container">
        <table class="styled-table" style="width: 100%; border-collapse: collapse;">
            <!-- <thead>
                <tr style="background-color: #f2f2f2;">
                    <th>Name</th>
                    <th>Matric No</th>
                    <th>Current Address</th>
                    <th>Home Address</th>
                    <th>Email</th>           
                    <th>Mobile Phone</th>                  
                    <th>Home Phone</th>
                </tr>
            </thead> -->
            <tbody id="data-container" style="text-align: center;">
                <script>
                    fetch('displayStudents.php')
                        .then(response => response.text())
                        .then(html => document.getElementById('data-container').innerHTML = html)
                        .catch(error => console.error('Error loading the data:', error));
                </script>
            </tbody>
        </table>
    </div>
</section>
<?php if (isset($_GET['message'])): ?>
    <div id="message" style="background-color: #dff0d8; color: #3c763d; padding: 10px; margin-bottom: 15px;">
        <?php echo htmlspecialchars($_GET['message']); ?>
    </div>
    <script>
        setTimeout(function() {
            document.getElementById('message').style.display = 'none';
        }, 3000);
    </script>
<?php endif; ?>

</body>
</html>