<?php
$servername = "localhost";
$username = "atlas";
$password = "atlas";
$dbname = "panel";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo $conn;
//$conn->close();
 
?>