<?php
$servername = "145.118.6.16";
$username = "089329";
$password = "Ajaxlol16";
$dbname = "data";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
