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

// Handle form submission to insert new data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newItem = $_POST["item"];
    $newPrice = $_POST["price"];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO items (item, price) VALUES (?, ?)");
    $stmt->bind_param("sd", $newItem, $newPrice);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully<br>";
    } else {
        echo "Error: " . $stmt->error . "<br>";
    }

    $stmt->close();
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

<!-- HTML Form to insert new item and price -->
<form method="POST" action="">
    <label for="item">Item:</label>
    <input type="text" id="item" name="item" required><br><br>
    <label for="price">Price:</label>
    <input type="number" step="0.01" id="price" name="price" required><br><br>
    <input type="submit" value="Add Item">
</form>
