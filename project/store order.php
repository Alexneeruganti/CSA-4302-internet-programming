<?php
// Database connection
$host = "localhost";
$dbname = "library"; // your database name
$username = "root"; // your XAMPP/MySQL username
$password = ""; // your XAMPP/MySQL password

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the request is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $subscription = $_POST['subscription'];
    $address = $_POST['address'];
    $cart = $_POST['cart']; // JSON data of books

    // Insert order details into database
    $sql = "INSERT INTO orders (name, mobile, email, subscription, address, cart_details) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $name, $mobile, $email, $subscription, $address, $cart);

    if ($stmt->execute()) {
        echo "Order submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}
$conn->close();
?>
