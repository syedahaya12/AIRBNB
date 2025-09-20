<?php
$servername = "localhost";
$username = "uannmukxu07nw";
$password = "nhh1divf0d2c";
$dbname = "dbg5a0p2zelbgu";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
