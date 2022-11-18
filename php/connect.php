<?php
session_start();

$servername = "185.135.102.27";
$username = //
$password = //
$db = //

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  
  die("Connection failed: " . $conn->connect_error);
}

?>

