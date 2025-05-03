<?php
$servername='localhost';
$username='u259202658_project2user';
$password='Password#KK8910';
$dbname = "u259202658_project2";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>