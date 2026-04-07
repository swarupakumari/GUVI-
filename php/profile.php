<?php
// include 'redis.php';  // ❌ Redis disabled for now
include 'mongo.php';

// 🔴 Redis session part (disabled for now)
/*
$session_id = $_POST['session_id'];
$user_id = $redis->get("session:$session_id");

if (!$user_id) {
    echo "Unauthorized";
    exit;
}
*/

// ✅ Get form data safely
$age = $_POST['age'] ?? '';
$dob = $_POST['dob'] ?? '';
$contact = $_POST['contact'] ?? '';

try {
    // ✅ Save data in MongoDB
    $collection->updateOne(
        ["contact" => $contact],  // using contact as unique identifier
        ['$set' => [
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