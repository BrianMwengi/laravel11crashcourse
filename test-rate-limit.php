<?php

$url = 'http://127.0.0.1:8000/test-rate-limit';
$totalRequests = 5;
for ($i = 0; $i < $totalRequests; $i++) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, false);
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    echo "Request " . ($i + 1) . ": HTTP Status Code: " . $httpCode .
    "\n";
    echo "Response: " . $response . "\n\n";
    // No delay between requests to trigger rate limit
}
