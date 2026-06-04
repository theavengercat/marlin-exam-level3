<?php
declare(strict_types=1);

/**
 * Defensive example for Task 1.
 *
 * Key idea:
 * - do not concatenate user input into SQL queries;
 * - use prepared statements;
 * - use password_hash/password_verify in real applications.
 */

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

$stmt = $pdo->prepare('SELECT id, username, password_hash, role FROM users WHERE username = ? LIMIT 1');
$stmt->execute([$username]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password, $user['password_hash'])) {
    // Authentication successful.
    // Authorization should still be checked separately.
} else {
    // Authentication failed.
}
