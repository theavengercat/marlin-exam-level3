<?php
declare(strict_types=1);
require __DIR__ . '/bootstrap.php';

page_header('Task 1: Login bypass');

echo '<p>Goal: log in as <code>admin</code> without knowing the admin password.</p>';
echo '<p>Training topic: unsafe SQL query construction.</p>';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    /*
     * Intentionally vulnerable code for CTF training.
     * Do not copy this pattern into real applications.
     */
    $sql = "SELECT id, username, role FROM users WHERE username = '$username' AND password = '$password' LIMIT 1";
    $result = $pdo->query($sql);
    $user = $result ? $result->fetch(PDO::FETCH_ASSOC) : false;

    if ($user && $user['role'] === 'admin') {
        $message = '<div class="success">Welcome, admin. Flag: <code>FLAG{php_sqli_login_lab_2026}</code></div>';
    } elseif ($user) {
        $message = '<div class="notice">Logged in as ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . ', but this is not the admin account.</div>';
    } else {
        $message = '<div class="error">Invalid credentials.</div>';
    }
}

echo $message;

echo '<form method="post" class="panel">';
echo '<label>Username <input name="username" autocomplete="off"></label>';
echo '<label>Password <input name="password" type="password"></label>';
echo '<button type="submit">Log in</button>';
echo '</form>';

echo '<details><summary>Source review hint</summary>';
echo '<p>Look at how the SQL query is built. What happens if user input changes query logic?</p>';
echo '</details>';

page_footer();
