<?php
include 'redis.php';   // ✅ Redis enabled
include 'mongo.php';

// 🔥 Get session
$session_id = $_POST['session_id'] ?? '';

$user_id = $redis->get("session:$session_id");

if (!$user_id) {
    echo json_encode([
        "status" => "fail",
        "message" => "Unauthorized"
    ]);
    exit;
}

// ✅ Get form data
$age = $_POST['age'] ?? '';
$dob = $_POST['dob'] ?? '';
$contact = $_POST['contact'] ?? '';

try {
    // ✅ Save data in MongoDB (linked with user_id)
    $collection->updateOne(
        ["user_id" => (int)$user_id],
        ['$set' => [
            "user_id" => (int)$user_id,
            "age" => $age,
            "dob" => $dob,
            "contact" => $contact,
            "updated_at" => new MongoDB\BSON\UTCDateTime()
        ]],
        ["upsert" => true]
    );

    echo json_encode([
        "status" => "success",
        "message" => "Profile Saved Successfully"
    ]);

} catch (Exception $e) {
    echo json_encode([
        "status" => "fail",
        "error" => $e->getMessage()
    ]);
}
?>