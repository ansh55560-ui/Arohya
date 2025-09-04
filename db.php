<?php
$host = "localhost";
$user = "root";   // change if you set MySQL password
$pass = "";
$db   = "arohya2";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}
?>
