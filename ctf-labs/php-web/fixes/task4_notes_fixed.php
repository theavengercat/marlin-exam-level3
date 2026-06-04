<?php
declare(strict_types=1);

/**
 * Defensive example for Task 4.
 *
 * Key idea:
 * - use an allowlist for readable files;
 * - never append unrestricted user input to filesystem paths.
 */

$allowedFiles = [
    'welcome.txt' => __DIR__ . '/../public/notes/welcome.txt',
    'rules.txt' => __DIR__ . '/../public/notes/rules.txt',
];

$requestedFile = $_GET['file'] ?? 'welcome.txt';

if (!array_key_exists($requestedFile, $allowedFiles)) {
    http_response_code(404);
    exit('File not found');
}

$path = $allowedFiles[$requestedFile];

if (!is_readable($path)) {
    http_response_code(404);
    exit('File not readable');
}

echo htmlspecialchars(file_get_contents($path), ENT_QUOTES, 'UTF-8');
