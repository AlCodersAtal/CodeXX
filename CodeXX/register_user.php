<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New User</title>
</head>
<link rel="stylesheet" href="dataCreatorV2.css">

<body>

    <h2>Add New User</h2>
    <form method="POST" action="">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="phone">Phone:</label><br>
        <input type="phone" id="phone" name="phone" required><br><br>

        <label for="uhid">Uhid:</label><br>
        <input type="text" id="uhid" name="uhid" required><br><br>

        <label for="otp">otp:</label><br>
        <input type="text" id="otp" name="otp" required placeholder="Only Numbers"><br><br>

        <label for="report">Report:</label><br>
        <input type="url" id="report" name="report" required><br><br>

        <input type="submit" value="Add User">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Database connection parameters
        $servername = "localhost";
        $username = "root"; // default MySQL username
        $password = "";     // default MySQL password (usually empty)
        $dbname = "healthcare";

        // Create a new database connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check if the connection is successful
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve user input from the form
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $uhid = $_POST['uhid'];
        $otp = $_POST['otp'];
        $report = $_POST['report'];

        // Prepare the SQL statement to insert the new user
        $stmt = $conn->prepare("INSERT INTO users (name, uhid, phone, otp, report) VALUES (?, ?, ?,?,?)");
        $stmt->bind_param("sssss", $name, $uhid, $phone, $otp, $report);

        // Execute the statement and check for success
        if ($stmt->execute()) {
            echo "<p>User added successfully!</p>";
        } else {
            echo "<p>Error: " . $stmt->error . "</p>";
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    }
    ?>

</body>

</html>