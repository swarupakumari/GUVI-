<?php
$redis_url = getenv('REDIS_URL');

$parts = parse_url($redis_url);

$redis = new Redis();

// Connect to Railway Redis
$redis->connect($parts['host'], $parts['port']);

// Authenticate if needed
if (isset($parts['pass'])) {
    $redis->auth($parts['pass']);
}
?>