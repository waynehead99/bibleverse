<?php
// Database credentials
$host = '10.0.248.15;
$db   = 'bible_verses';
$user = 'sqlsev';
$pass = 'Gamma99Quest';


// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch name and email
$sql = "SELECT verse, application FROM bible_verses";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple MySQL Fetch</title>
</head>
<body>
    <h1>Users List</h1>
    <table border="1">
        <tr>
            <th>Verse</th>
            <th>Application</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["verse"] . "</td><td>" . $row["application"] . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No results found</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
