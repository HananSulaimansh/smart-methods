
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Robot Last Direction</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(202, 241, 202);
            padding: 20px;
            color: #333; 
            text-align: center; /* Center-align content */
        }
        h1 {
            color: green; 
        }
        p {
            font-size: 18px;
            color: #D67E5D; 
        }
    </style>
</head>
<body>
    <h1>Last Direction</h1>
    <?php
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'robot');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch the last direction based on the highest id
    $sql = "SELECT direction FROM directions ORDER BY id DESC LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<p>The last direction was: <strong>" . $row['direction'] . "</strong></p>";
    } else {
        echo "<p>No directions recorded yet.</p>";
    }

    $conn->close();
    ?>

</body>
</html>