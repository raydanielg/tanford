<?php
// Redirect all requests to Laravel's public/ directory when the document root
// points to the project root instead of /public.

// Optional: prevent caching of the redirect response
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');

// Redirect to the public folder (web server will serve public/index.php)
header('Location: public/');
exit;
