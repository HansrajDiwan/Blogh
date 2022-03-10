<?php

session_start();

$host = "localhost";
$username = "root";
$password = "";
$db_name = "internship";

$conn = new mysqli($host, $username, $password, $db_name);

// Checking for connection...
if ($conn -> connect_error) {
    die("Connection failed: " . $conn -> connect_error);
}

// echo "Connected to the database";

?>