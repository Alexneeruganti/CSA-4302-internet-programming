<?php
// Connect to the MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all orders from the database
$sql = "SELECT * FROM orders";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Order ID: " . $row["id"]. " - Name: " . $row["name"]. " - Mobile: " . $row["mobile"]. " - Email: " . $row["email"]. " - Subscription: " . $row["subscription"]. " - Address: " . $row["address"] . " - Cart Items: " . $row["cart_items"] . "<br>";
    }
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>
