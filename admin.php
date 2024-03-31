<!DOCTYPE html>
<html>
<head>
  <title>View Event Details</title>
  <style>
    body {
  font-family: Arial, sans-serif;
  background-color: #f2f2f2;
  margin: 0;
  padding: 0;
}

.container {
  max-width: 800px;
  margin: 0 auto;
  background-color: #fff;
  border: 1px solid #ccc;
  padding: 20px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  border-radius: 8px;
  margin-top: 20px;
}

h1 {
  text-align: center;
  color: #007BFF;
}

form {
  text-align: center;
}

label {
  display: block;
  margin-top: 10px;
}

select {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 16px;
}

input[type="submit"] {
  background-color: #007BFF;
  color: #fff;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  font-size: 16px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #0056b3;
}

  </style>
</head>
<body>
  <h1>Select an Event</h1>
  <form action="admin.php" method="get">
    <label for="event_id">Enter an Event:</label>
    <input type="text" name="event" id="event" required>
    <input type="submit" value="View Details">
  </form>
  
<?php
   
   // Check if the form is submitted
   if (isset($_GET['event'])) {
     // Retrieve the search term from the form
     $searchTerm = $_GET['event'];
 
     // Establish a database connection (You need to replace these values with your actual database credentials)
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "sportsregistration";
 
     $conn = new mysqli($servername, $username, $password, $dbname);
 
     // Check the connection
     if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
     }
 
     // Create and execute a SQL query
     $sql = "SELECT * FROM applications WHERE event LIKE '%" . $searchTerm . "%'";
     $result = $conn->query($sql);

     if ($result->num_rows > 0) {
      // Output the data in a table
      echo "<div class='container'>";
      echo "<table>";
      echo "<tr><th>Player Name</th><th>AgeGroup</th></tr>";
      while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row['NAME'] . "</td><td>" . $row['agegroup'] . "</td></tr>";
      }
      echo "</table>";
      echo "</div>";
    } else {
      echo "No events found.";
    }

    // Close the database connection
    $conn->close();
  }
  ?>
</body>






</html>
