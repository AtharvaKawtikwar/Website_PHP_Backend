
<!DOCTYPE html>
<html>
<head>
<title>Sports Form Application</title>
<link rel="stylesheet" href="footballform.css">
<style>
  body {
  font-family: Arial, sans-serif;
  background-color: #f5f5f5;
  margin: 0;
  padding: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

form {
  background-color: #fff;
  border: 1px solid #ccc;
  border-radius: 5px;
  padding: 20px;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
  max-width: 600px; /* Increased width */
  width: 100%;
  margin: 20px;
}

label {
  display: block;
  margin: 10px 0;
  font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="tel"],
input[type="text"],
textarea {
  width: 100%;
  padding: 10px;
  margin: 5px 0;
  border: 1px solid #ccc;
  border-radius: 3px;
  box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="tel"]:focus,
input[type="text"]:focus,
textarea:focus {
  border-color: #007bff;
  outline: 0;
  box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
}

textarea {
  height: 120px;
}

input[type="submit"] {
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 3px;
  padding: 10px 20px;
  cursor: pointer;
  transition: background-color 0.2s;
  width: 100%; /* Make the button width 100% */
}

input[type="submit"]:hover {
  background-color: #0056b3;
}

</style>
</head>
<body>

<form action="footballform.php" method="post" onsubmit="return validateForm()">


<label
 
for="name">Name:</label>

<input
 
type="text"
 
name="name"
 
id="name"
 
required>


<label
 
for="email">Email:</label>

<input
 
type="email"
 
name="email"
 
id="email"
 
required>


<label
 
for="phone">Phone:</label>

<input
 
type="tel"
 
name="phone"
 
id="phone"
 
required>


<label
 
for="event">Sport:</label>
<input type="text" name="event" id="event" required>

<label for="agegroup">Age Group:</label>
<input type="text" name="agegroup" id="agegroup" required>

<label for="message">Message:</label>
<textarea name="message" id="message" required></textarea>

<input type="submit" value="Submit">

</form>
<script lang="javascript" >
  <script>
  
  function validateForm() {
    // Get form input values
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;
    var message = document.getElementById("message").value;

    // Validate name (limited to 50 characters)
    if (name.length > 50) {
      alert("Name should be limited to 50 characters");
      return false;
    }

    // Validate email (must contain @)
    if (email.indexOf("@") === -1) {
      alert("Email must contain the @ symbol");
      return false;
    }

    // Validate phone number (must have 10 digits)
    if (phone.length !== 10 || isNaN(phone)) {
      alert("Phone number must have 10 digits");
      return false;
    }

    // Validate message (limited to 50 words)
    var words = message.trim().split(/\s+/);
    if (words.length > 50) {
      alert("Message should be limited to 50 words");
      return false;
    }

    // Form is valid
    return true;
  }
</script>

</script>


<?php

  if($_SERVER["REQUEST_METHOD"] == "POST"){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $event = $_POST['event'];
  $agegroup = $_POST['agegroup'];
  $message = $_POST['message'];

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "sportsregistration";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);


  // Check connection

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
     
   

  // Insert the form data into the database

  $query = "INSERT INTO applications (name, email, phone, event, agegroup, message) VALUES ('$name', '$email', '$phone', '$event', '$agegroup', '$message')";

  // Execute the query and close the connection


  $conn->query($query);
  $conn->close();

  }

?>




</body>
</html>