<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "monitoring";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE lib_user SET lib_ID ='WVSUPCL0019178' WHERE id=2";
$sql = "UPDATE lib_user SET name ='paul' WHERE id=2";
if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>