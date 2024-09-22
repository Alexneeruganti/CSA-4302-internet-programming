<?php
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "library";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get JSON input
$data = json_decode(file_get_contents("php://input"), true);

$name = $conn->real_escape_string($data['name']);
$mobile = $conn->real_escape_string($data['mobile']);
$email = $conn->real_escape_string($data['email']);
$subscription = $conn->real_escape_string($data['subscription']);
$address = $conn->real_escape_string($data['address']);
$books = implode(', ', $data['books']); // Convert book array to string

$sql = "INSERT INTO login (name, mobile, email, subscription, address, books) VALUES ('$name', '$mobile', '$email', '$subscription', '$address', '$books')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "error" => $conn->error]);
}

$conn->close();
?>
