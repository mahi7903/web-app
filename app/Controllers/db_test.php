<?php

$hostname = 'localhost'; // Change this to your XAMPP database host if needed
$username = 'root'; // Default XAMPP MySQL username
$password = ''; // Default XAMPP MySQL password (empty)
$database = 'db2309398'; // Your database name

// Create connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
} else {
    echo "✅ Database connected successfully!";
}

$conn->close();

?>