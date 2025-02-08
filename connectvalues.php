<?php
// connectvalues.php
// Database connection settings

$host     = 'localhost';
$db       = 'sampledb';
$user     = 'root';
$password = '<password>'; // This placeholder will be replaced by the launch script

// Create a new MySQLi connection
$conn = new mysqli($host, $user, $password, $db);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
