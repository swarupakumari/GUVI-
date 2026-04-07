<?php
require __DIR__ . '/../vendor/autoload.php';

$mongo_uri = getenv("MONGO_URI");

try {
    $client = new MongoDB\Client($mongo_uri);

    // database
    $db = $client->selectDatabase("mydb");

    // collection
    $collection = $db->profiles;

} catch (Exception $e) {
    die("MongoDB Error: " . $e->getMessage());
}
?>