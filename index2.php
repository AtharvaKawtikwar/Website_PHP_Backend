<!DOCTYPE html>
<html>
  <head>
    <title>Login Page</title>
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
            <h1>Login Form</h1>
          </div>
          <div class="panel-body">
            <form action="index2.php" method="post">
              <div class="form-group">
                <label for="email">Email</label>
                <input
                  type="text"
                  class="form-control"
                  id="email"
                  name="email"
                  required
                />
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input
                  type="password"
                  class="form-control"
                  id="password"
                  name="password"
                  required
                />
              </div>
              <input type="submit" class="btn btn-primary" />
            </form>
          </div>
          <div class="panel-footer text-right"></div>
        </div>
      </div>
    </div>

    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";

    // Database connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the email and password exist in the database (replace 'users' with your actual table name)
    $query = "SELECT * FROM registration WHERE email='$email' AND password='$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Login successful, redirect to the home page
        header("Location: home.html");
        exit; // Make sure to exit to prevent further execution
    } else {
        echo "Login Failed: Email or password is incorrect.";
    }

    $conn->close();
}
?>


  </body>
</html>
