<?php
// Database connection settings
$servername = "localhost"; // Usually localhost
$username = "root"; // Default username for XAMPP
$password = ""; // Default password for XAMPP (usually empty)
$dbname = "healthcare"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Prepare SQL statement to fetch the first user data
$query = "SELECT name, otp, report FROM users LIMIT 1";
$result = $conn->query($query);

// Check if any results were returned
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc(); // Fetch the row as an associative array

  // Display user details
  echo "Welcome to CodeX, " . $row['name'] . "!<br>";
  echo "Here is your prescription link: <a href='" . $row['report'] . "'>View Prescription</a><br>";
} else {
  echo "No users found in the database.";
}

// Close connection
$conn->close();
