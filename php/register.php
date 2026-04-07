<?php
include 'config.php';

// Handle empty POST safely
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Hash password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// ✅ Insert WITHOUT id (let DB handle it)
$stmt = $conn->prepare("INSERT INTO users (id, name, email, password) VALUES (NULL, ?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $hashedPassword);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Registered Successfully"]);
} else {
    echo json_encode(["status" => "error", "message" => "Email already exists"]);
}

$stmt->close();
$conn->close();
?>