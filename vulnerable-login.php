<?php
$conn = new mysqli("localhost", "root", "", "cybersecurity");

// Check connection
if ($conn->connect_error) {
	# code...
	die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	# code...
	echo "Login sucessful!";
} else {
	echo "Invalid username or password";
}


$conn->close();
?>