<?php

$conn = new mysqli("localhost", "root", "", "cybersecurity");

// Check connection
if ($conn->connect_error) {
	# code...
	die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

// Secure SQL query using prepared statements
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
	# code...
	echo "Login successful!";
} else {
	echo "Invalid username or password.";
}

$stmt->close();
$stmt->close();
?>