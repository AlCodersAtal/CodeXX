<?php
// Include the Twilio PHP Library

// Database connection
$conn = new mysqli("localhost", "root", "", "healthcare");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$uhid = $_POST['uhid'];
$name = $_POST['name'];
$phone = $_POST['phone'];

// Verify user data
$sql = "SELECT * FROM users WHERE uhid='$uhid' AND name='$name' AND phone='$phone'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Generate OTP


    // Update OTP in database

    echo "<h2>OTP has been sent to $phone .</h2>";
    echo "<form action='verify_otp.php' method='POST'>
                  
                    <label for='otp'>Enter OTP:</label>
                    <input type='text' id='otp' name='otp' required><br><br>
                    <input type='submit' value='Verify OTP'>
                  </form>";
} else {
    echo "User not found. Please check your details.";
}

$conn->close();
