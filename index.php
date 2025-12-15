<?php

// Simple front controller at project root to forward to the real Laravel entry point.
// This is useful on hosts where the document root cannot be set to the /public directory.

$publicIndex = __DIR__ . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'index.php';

if (! file_exists($publicIndex)) {
    http_response_code(500);
    echo 'Laravel public/index.php not found.';
    exit;
}

require $publicIndex;
