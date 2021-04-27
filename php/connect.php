<?php
session_start();
$servername = "localhost";
$username = "ilenia";
$password = "Ilenia99!";
$db = "ltw";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  
  die("Connection failed: " . $conn->connect_error);
}

?>

