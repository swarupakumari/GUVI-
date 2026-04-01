<?php
$conn = new mysqli("localhost", "root", "", "user_auth", 3307);

if ($conn->connect_error) {
    die("Connection failed");
}
?>