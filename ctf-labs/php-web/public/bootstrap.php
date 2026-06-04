<?php
declare(strict_types=1);

/**
 * Local CTF bootstrap.
 *
 * This file creates a small SQLite database for educational tasks.
 * It is intentionally simple and should not be used as production code.
 */

$storageDir = __DIR__ . '/../storage';
if (!is_dir($storageDir)) {
    mkdir($storageDir, 0775, true);
}

$dbPath = $storageDir . '/ctf.sqlite';
$isNewDatabase = !file_exists($dbPath);

$pdo = new PDO('sqlite:' . $dbPath);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($isNewDatabase) {
    $pdo->exec("
        CREATE TABLE users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            username TEXT NOT NULL UNIQUE,
            password TEXT NOT NULL,
            role TEXT NOT NULL
        );

        CREATE TABLE profiles (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            display_name TEXT NOT NULL,
            about TEXT NOT NULL,
            private_note TEXT NOT NULL
        );
    ");

    $insertUser = $pdo->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
    $insertUser->execute(['admin', 'not_shared_in_task', 'admin']);
    $insertUser->execute(['student', 'student123', 'student']);
    $insertUser->execute(['guest', 'guest', 'guest']);

    $insertProfile = $pdo->prepare("INSERT INTO profiles (display_name, about, private_note) VALUES (?, ?, ?)");
    $insertProfile->execute([
        'Admin',
        'Main maintainer profile.',
        'FLAG{idor_is_access_control_failure}'
    ]);
    $insertProfile->execute([
        'Student',
        'Regular learner profile.',
        'No flag here. Keep looking.'
    ]);
    $insertProfile->execute([
        'Guest',
        'Public demo profile.',
        'No flag here either.'
    ]);
}

function page_header(string $title): void
{
    echo '<!doctype html><html lang="en"><head>';
    echo '<meta charset="utf-8">';
    echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
    echo '<title>' . htmlspecialchars($title, ENT_QUOTES, 'UTF-8') . '</title>';
    echo '<link rel="stylesheet" href="/assets/style.css">';
    echo '</head><body><main class="container">';
    echo '<p><a href="/">← Back to tasks</a></p>';
    echo '<h1>' . htmlspecialchars($title, ENT_QUOTES, 'UTF-8') . '</h1>';
}

function page_footer(): void
{
    echo '</main></body></html>';
}
