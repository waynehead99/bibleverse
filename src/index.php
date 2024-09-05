<?php
// Database credentials
$host = '10.0.248.15';
$db   = 'bible_verses';
$user = 'sqlsev';
$pass = 'Gamma99Quest';

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch the verse and application
$sql = "SELECT verse, application FROM bible_verses";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bible Verse Dashboard</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            color: #333;
        }

        .verse-container {
            text-align: center;
            margin-bottom: 30px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            width: 100%;
        }

        .verse {
            font-size: 3rem;
            font-weight: bold;
            font-style: italic;
            color: #2c3e50;
        }

        .application {
            font-size: 1.5rem;
            color: #7f8c8d;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="verse-container">
        <?php
        if ($result->num_rows > 0) {
            // Output the first row as the featured verse
            $row = $result->fetch_assoc();
            echo "<div class='verse'>" . $row["verse"] . "</div>";
            echo "<div class='application'>" . $row["application"] . "</div>";
        } else {
            echo "<div class='verse'>No verses found.</div>";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>
