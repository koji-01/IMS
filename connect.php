<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'simpleinventory';

// Create connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
?>
