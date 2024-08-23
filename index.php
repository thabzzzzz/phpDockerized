<?php
$servername = getenv('MYSQL_HOST'); // Use environment variables
$username = getenv('MYSQL_USER');
$password = getenv('MYSQL_PASSWORD');
$dbname = getenv('MYSQL_DATABASE');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the first row
$sql = "SELECT * FROM items LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "Item: " . $row["item"] . "<br>";
    echo "Price: " . $row["price"];
} else {
    echo "0 results";
}

$conn->close();
