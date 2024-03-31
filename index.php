<!DOCTYPE html>
<html>
  <head>
    <title>Registration Page</title>
  <style>
      body {
        background-color: #051431;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
      }

      .container {
        width: 100%;
        display: flex;
        justify-content: center;
      }

      .panel {
        background-color: #fff;
        width: 100%;
        max-width: 400px;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
      }

      .panel-heading {
        text-align: center;
        background-color: #051431;
        color: #fff;
        padding: 10px 0;
        border-radius: 8px 8px 0 0;
      }

      .panel-heading h1 {
        font-size: 24px;
      }

      .form-group {
        margin-bottom: 20px;
      }

      label {
        font-weight: 600;
        font-size: 16px;
      }

      .form-control {
        width: 100%;
        height: 40px;
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 10px;
        font-size: 16px;
      }

      .radio-group {
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
      }

      .radio-group label {
        display: flex;
        align-items: center;
      }

      .radio-group input[type="radio"] {
        margin-right: 5px;
      }

      .btn-primary {
        background-color: #051431;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        font-size: 18px;
        cursor: pointer;
      }

      .btn-primary:hover {
        background-color: #051431;
      }
    </style>
      </head>

  <body>
    <div class="container">
      <div class="row col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
          <div class="panel-heading text-center">
            <h1>Registration Form</h1>
          </div>
          <div class="panel-body">
            <form action="index.php" method="post" onsubmit="return validateForm()">
              <div class="form-group">
                <label for="firstName">First Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="firstName"
                  name="firstName"
                  required
                  maxlength="20"
                />
              </div>
              <div class="form-group">
                <label for="lastName">Last Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="lastName"
                  name="lastName"
                  required
                  maxlength="20"
                />
              </div>
              <div class="form-group">
                <label for="gender">Gender</label>
                <div>
                  <label for="male"
                    ><input
                      type="radio"
                      name="gender"
                      value="male"
                      id="male"
                    />Male</label
                  >
                  <label for="female"
                    ><input
                      type="radio"
                      name="gender"
                      value="female"
                      id="female"
                    />Female</label
                  >
                </div>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input
                  type="text"
                  class="form-control"
                  id="email"
                  name="email"
                  required
                  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                />
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input
                  type="text"
                  class="form-control"
                  id="password"
                  name="password"
                  required
                  pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$"
                />
              </div>
              <div class="form-group">
                <label for="number">Phone Number</label>
                <input
                  type="tel"
                  class="form-control"
                  id="number"
                  name="number"
                  required
                  pattern="^\d{10}$"
                />
              </div>
              <input type="submit" class="btn btn-primary" />
              <div class="input-box button">
      </div>
      <div class="text">
        <h3>Already have an account? <a href="index2.php">Login now</a></h3>
      </div>
            </form>
          </div>
          <div class="panel-footer text-right"></div>
        </div>
      </div>
    </div>

    <script>
      function validateForm() {
        // First Name and Last Name length validation
        const firstName = document.getElementById("firstName").value;
        const lastName = document.getElementById("lastName").value;
        if (firstName.length > 20 || lastName.length > 20) {
          alert("First and Last Name must be 20 characters or less.");
          return false;
        }

        // Gender validation
        const maleGender = document.getElementById("male").checked;
        const femaleGender = document.getElementById("female").checked;
        if (!(maleGender || femaleGender)) {
          alert("Please select Male or Female for gender.");
          return false;
        }

        const firstName = document.getElementById("number").value;
        if(number>10 or number <10){
          alert("Enter in proper format")
        }

        // Email validation (pattern attribute already handles this)

        // Password validation (pattern attribute already handles this)

        // Phone Number validation (pattern attribute already handles this)

        return true; // Form is valid, proceed with submission
      }
    </script>


<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$number = $_POST['number'];


  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "test";
	// Database connection
  $conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
     
   

  // Insert the form data into the database

  $query = "INSERT INTO registration (firstName, lastName, gender, email, password, number) VALUES ('$firstName', '$lastName', '$gender', '$email', '$password', '$number')";

  // Execute the query and close the connection


  $conn->query($query);
  $conn->close();
}
?>

  </body>
</html>
