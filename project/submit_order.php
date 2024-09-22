<?php
// Connect to the MySQL database
$servername = "localhost";
$username = "root";  // Default username for XAMPP
$password = "";  // Leave blank for XAMPP default
$dbname = "library";  // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get customer and cart details from the POST request
$name = $_POST['name'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$subscription = $_POST['subscription'];
$address = isset($_POST['address']) ? $_POST['address'] : null;
$cart_items = $_POST['cart_items'];  // This will be sent as a JSON string

// Prepare the SQL query to insert the order
$sql = "INSERT INTO orders (name, mobile, email, subscription, address, cart_items)
VALUES ('$name', '$mobile', '$email', '$subscription', '$address', '$cart_items')";

if ($conn->query($sql) === TRUE) {
    echo "Order submitted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
