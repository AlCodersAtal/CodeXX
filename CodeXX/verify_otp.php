<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "healthcare";
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data

$otp = $_POST['otp'];

// Verify OTP
$sql = "SELECT * FROM users WHERE otp = '$otp' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Clear OTP after verification


    // Redirect to prescription page
    header("Location: prescription.php");
    exit();
}

$conn->close();
