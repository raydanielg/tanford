<?php
// Simple front controller at project root to forward to Laravel public/index.php

$publicIndex = __DIR__ . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'index.php';

if (! file_exists($publicIndex)) {
    http_response_code(500);
    echo 'Laravel public/index.php not found.';
    exit;
}

require $publicIndex;
