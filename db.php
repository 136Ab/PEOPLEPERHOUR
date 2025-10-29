<?php
$host = "localhost";
$user = "uvr4xjng8qjzg";
$pass = "xj9uwxc8g9xg";
$dbname = "dboci5dz2ixzo8";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}
?>
