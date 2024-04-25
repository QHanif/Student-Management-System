# INFO4345 WEB APPLICATION SECURITY | Class Assignment - Input Validation (Client & Server Side)
 
 This is a simple input validation project that prompt user details then validates the input before submitting it to the database. For client-side, HTML and JavaScript is used for the input validation to get multi layer of validations. Then in server-side, another layer of validation implemented in the php code before the data submited to the database. 
<!-- 
## How it works 

- form.html is used to create the form structure. In-line Regex are implemented for every items in the form.

- When user submits the form, validation.js will validate the input again using the built-in regex function.

- After the validation in client-side complete, the data will be validated once again by the server through submit.php code which also uses built-in regex function with the similar pattern.

- Then the data will successfully submited to the database adn the page will display "New record created successfully" message. -->
# Student Management System

This is a simple student management system built with PHP and MySQL. It allows users to register, log in, and view student details.

## Files

- `registerPage.html`: This is the registration page where users can create a new account. It contains a form with fields for the user's email and password, which are validated using Regex when the user submits the registration form.

- `register.php`: This is the server-side script that handles the registration process. It receives the data from the registration form, validates it again using Regex, and then inserts it into the database.

- `loginPage.html`: This is the login page where users can log in to their account. It contains a form with fields for the user's email and password.

- `login.php`: This is the server-side script that handles the login process. It receives the data from the login form, checks it against the database, and starts a session if the user's credentials are correct. It also stores the user's email in the session.

- `studentDetailsPage.php`: This is the page that users see after they log in. It is protected by a session-based authentication system, so only logged-in users can access it. It displays the student details from the database.

- `displayStudents.php`: This is the server-side script that fetches the student details from the database and returns them as a PHP array. It is included in `studentDetailsPage.php` to display the student details directly on the page.

- `userPage.php`: This is the user profile page where users can view and update their details. It fetches the user's details from the database using their email stored in the session and displays them in a form. If the form is submitted, the user's details are updated in the database.

- `db_connect.php`: This file contains the code for connecting to the database. It is included in `register.php`, `login.php`, `displayStudents.php`, and `userPage.php`.

## App Navigation

- User will first register a new account at 'registerPage.html'. The data entered in the form is validated using inline Regex for initial client-side validation. 

- After the form is submitted, 'validation.js' validates the input again using built-in regex functions for additional client-side validation.

- The data is then sent to the server and validated once more by the 'register.php' script, which also uses built-in regex functions for server-side validation.

- If the registration is successful, the system will redirect the user to the 'loginPage.html'.

- The user enters their credentials, which are then validated by the 'login.php' script. If the credentials are correct, a new session is started for the user and their email is stored in the session.

- After the user successfully logs in, the system will display the 'studentDetailsPage.php'. This page is protected by session-based authentication, so only logged-in users can access it.

- The user can also navigate to their profile page at 'userPage.php' to view and update their details.