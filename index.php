<?php
$servername = getenv('MYSQL_HOST');
$username = getenv('MYSQL_USER');
$password = getenv('MYSQL_PASSWORD');
$dbname = getenv('MYSQL_DATABASE');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve all rows
$sql = "SELECT * FROM items";
$result = $conn->query($sql);

// Debug: Output the number of rows
echo "Number of rows: " . $result->num_rows . "<br><br>";

// Check if there are results
if ($result->num_rows > 0) {
    // Output data for each row
    while ($row = $result->fetch_assoc()) {
        echo "Item: " . $row["item"] . "<br>";
        echo "Price: " . $row["price"] . "<br><br>";
    }
} else {
    echo "0 results";
}
echo 'new tesssssssssst';
echo 'another';

$conn->close();
?>
