<?php

include('connection.php');
$sql = "UPDATE users SET is_active=0 WHERE username='". $_SESSION['username'] . "'";	// Changing is_active to 0
$result1 = $conn -> query($sql);
session_destroy();	// Closing session
header("Location: index.php");

?>