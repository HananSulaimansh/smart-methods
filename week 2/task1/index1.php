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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Robot Controller</title>
    <style>
        body {
            background-color: rgb(202, 241, 202);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .container {
            text-align: center;
        }
        .btn {
            background-color: green;
            color: white;
            border: none;
            padding: 15px 30px;
            margin: 10px;
            font-size: 16px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: darkgreen;
        }
    </style>

    <script >
       
            function moveRobot(direction) {
                const xhr = new XMLHttpRequest();
                xhr.open("POST", "index1.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        console.log(xhr.responseText);
                    }
                };
                xhr.send("command=" + direction);
            }
    </script>

</head>
<body>
    <div class="container">
        <h1>Robot Controller</h1>
        <button  class="btn" onclick="moveRobot('Forward')">Forward</button><br>
        <button  class="btn" onclick="moveRobot('Left')">Left</button>
        <button  class="btn" onclick="moveRobot('Stop')">Stop</button>
        <button  class="btn" onclick="moveRobot('Right')">Right</button><br>
        <button  class="btn" onclick="moveRobot('Backward')">Backward</button>
    </div>
</body>
</html>

