<?php
// Database connection settings (same as Step 2)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testmarks";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>
