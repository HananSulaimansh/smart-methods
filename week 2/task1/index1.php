<?php
// Database configuration
$servername = "localhost";
$username = "root";  // Default username for XAMPP
$password = "";      // Default password for XAMPP
$dbname = "robot";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the command from the POST request
$command = $conn->real_escape_string($_POST['command']);

// SQL query to insert the command into the database
$sql = "INSERT INTO direction (direction) VALUES ('$command')";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "Command received: $command";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>

