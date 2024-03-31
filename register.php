<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registration Page </title> 

    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
body{
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background: #051431;
}
.wrapper{
  position: relative;
  max-width: 430px;
  width: 100%;
  background: #fff;
  padding: 34px;
  border-radius: 6px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.2);
}
.wrapper h2{
  position: relative;
  font-size: 22px;
  font-weight: 600;
  color: #333;
}
.wrapper h2::before{
  content: '';
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 28px;
  border-radius: 12px;
  background: #051431;
}
.wrapper form{
  margin-top: 30px;
}
.wrapper form .input-box{
  height: 52px;
  margin: 18px 0;
}
form .input-box input{
  height: 100%;
  width: 100%;
  outline: none;
  padding: 0 15px;
  font-size: 17px;
  font-weight: 400;
  color: #333;
  border: 1.5px solid #F5C735;
  border-bottom-width: 2.5px;
  border-radius: 6px;
  transition: all 0.3s ease;
}
.input-box input:focus,
.input-box input:valid{
  border-color: #051431;
}
form .policy{
  display: flex;
  align-items: center;
}
form h3{
  color: #707070;
  font-size: 14px;
  font-weight: 500;
  margin-left: 10px;
}
.input-box.button input{
  color: #fff;
  letter-spacing: 1px;
  border: none;
  background: #051431;
  cursor: pointer;
}
.input-box.button input:hover{
  background: #051431;
}
form .text h3{
 color: #333;
 width: 100%;
 text-align: center;
}
form .text h3 a{
  color: #051431;
  text-decoration: none;
}
form .text h3 a:hover{
  text-decoration: underline;
}

button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
    </style>
   </head>
<body>
  <div class="wrapper">
    <h2>Registration</h2>
    <form onsubmit="return validateForm()">
      <div class="input-box">
        <input type="text" placeholder="Enter your name" name="name" id="name"                   maxlength="20"
        required>
        
      </div>
      <div class="input-box">
        <input type="email" placeholder="Enter your email" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
        required>
        
      </div>
      <div class="input-box">
        <input type="password" placeholder="Create password" name="create" id="create"                   pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$"
        required>
        
      </div>
      <div class="input-box">
        <input type="password" placeholder="Confirm password" name="confirm" id="confirm"                   pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$"
        required>
        
      </div>
      
      <div class="input-box button">
<input type="submit" class="btn-primary">       </div>
      <div class="text">
        <h3>Already have an account? <a href="login.php">Login now</a></h3>
      </div>
    </form>
  </div>
  <script>
    function validateForm() {
        // First Name and Last Name length validation
        const Name = document.getElementById("name").value;
        if (Name>20) {
          alert("Name must be 20 characters or less.");
          return false;
        }

       

        // Email validation (pattern attribute already handles this)

        // Password validation (pattern attribute already handles this)

        // Phone Number validation (pattern attribute already handles this)

        return true; // Form is valid, proceed with submission
      }
  </script>







<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["create"];
        $checkpass = $_POST["confirm"];
        $password_pattern = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{8,16}$/';

        $servername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "login";
        
        
        $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

        if(!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM login_details WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);

        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
          echo "Error: Email already exists in the database.";
        }
        else {
          
        if (preg_match($password_pattern, $password)) {
          if($password == $checkpass) {
            $sql = "INSERT INTO `Login_details` (`Name`, `Email`, `Password`) VALUES ('$username', '$email', '$password');";
            $result = mysqli_query($conn, $sql); 
            if(!$result) {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
             header('Location: login.php');
          }
          else
          {
            echo("Passwords do not match " . mysqli_error($conn));
          }
        }
        else {
          echo("Password must contain atleast 1 uppercase, 1 lowercase, 1 number and must be between 8-16 characters long");
        }
        mysqli_close($conn);
    }
  }
?>

</body>
</html>