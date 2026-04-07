<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$email = $_POST['email'];
$password = $_POST['password'];
include 'config.php';
//include 'redis.php';

// ✅ Prepared Statement
$stmt = $conn->prepare("SELECT id, password FROM users WHERE email=?");
$stmt->bind_param("s", $email);
$stmt->execute();

$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {

    if (password_verify($password, $row['password'])) {

        // 🔥 Generate session ID
        $session_id = bin2hex(random_bytes(16));

        // 🔥 Store in Redis
        $redis->set("session:$session_id", $row['id']);

        echo json_encode([
            "status" => "success",
            "session_id" => $session_id
        ]);

    } else {
        echo json_encode(["status" => "fail"]);
    }

} else {
    echo json_encode(["status" => "fail"]);
}
?>