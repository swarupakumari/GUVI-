<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'config.php';

// Prevent undefined warnings
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// ✅ Prepared Statement
$stmt = $conn->prepare("SELECT id, password FROM users WHERE email=?");
$stmt->bind_param("s", $email);
$stmt->execute();

$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {

    if (password_verify($password, $row['password'])) {

        // ✅ Generate session ID (store in browser localStorage)
        $session_id = bin2hex(random_bytes(16));

        echo json_encode([
            "status" => "success",
            "session_id" => $session_id,
            "user_id" => $row['id']
        ]);

    } else {
        echo json_encode(["status" => "fail"]);
    }

} else {
    echo json_encode(["status" => "fail"]);
}

$stmt->close();
$conn->close();
?>