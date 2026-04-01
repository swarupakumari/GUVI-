<?php
include 'redis.php';
include 'mongo.php';

$session_id = $_POST['session_id'];

// 🔥 Check Redis session
$user_id = $redis->get("session:$session_id");

if (!$user_id) {
    echo "Unauthorized";
    exit;
}

// Save profile data
$age = $_POST['age'];
$dob = $_POST['dob'];
$contact = $_POST['contact'];

$collection->updateOne(
    ["user_id" => (int)$user_id],
    ['$set' => [
        "age" => $age,
        "dob" => $dob,
        "contact" => $contact
    ]],
    ["upsert" => true]
);

echo "Profile Saved Successfully";
?>