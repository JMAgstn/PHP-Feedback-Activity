<?php
// Create connection
$conn = new mysqli('localhost', 'root', '', 'db_feedback');
date_default_timezone_set('Asia/Kolkata');

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>