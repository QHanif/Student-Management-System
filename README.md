# INFO4345 WEB APPLICATION SECURITY | Class Assignment - Input Validation (Client & Server Side)
 
 This is a simple input validation project that prompt user details then validates the input before submitting it to the database. For client-side, HTML and JavaScript is used for the input validation to get multi layer of validations. Then in server-side, another layer of validation implemented in the php code before the data submited to the database. 

# How it works 
form.html is used to create the form structure. In-line Regex are implemented for every items in the form.

When user submits the form, validation.js will validate the input again using the built-in regex function.

After the validation in client-side complete, the data will be validated once again by the server through submit.php code which also uses built-in regex function with the similar pattern.

Then the data will successfully submited to the database adn the page will display "New record created successfully" message.
