<?php
declare(strict_types=1);
require __DIR__ . '/bootstrap.php';

page_header('Task 3: Cookie role');

echo '<p>Goal: become admin by understanding why client-side authorization data must not be trusted.</p>';
echo '<p>Training topic: unsigned and untrusted cookies.</p>';

if (isset($_POST['reset'])) {
    setcookie('ctf_profile', '', time() - 3600, '/');
    header('Location: /task3_cookie.php');
    exit;
}

if (!isset($_COOKIE['ctf_profile'])) {
    $guestProfile = base64_encode(json_encode([
        'username' => 'guest',
        'role' => 'guest'
    ], JSON_THROW_ON_ERROR));

    setcookie('ctf_profile', $guestProfile, time() + 3600, '/');
    header('Location: /task3_cookie.php');
    exit;
}

$rawCookie = $_COOKIE['ctf_profile'];
$decoded = json_decode(base64_decode($rawCookie, true) ?: '', true);
$username = is_array($decoded) && isset($decoded['username']) ? (string)$decoded['username'] : 'unknown';
$role = is_array($decoded) && isset($decoded['role']) ? (string)$decoded['role'] : 'unknown';

echo '<div class="panel">';
echo '<p><strong>Current cookie:</strong></p>';
echo '<pre>' . htmlspecialchars($rawCookie, ENT_QUOTES, 'UTF-8') . '</pre>';
echo '<p><strong>Decoded profile:</strong></p>';
echo '<pre>' . htmlspecialchars(json_encode($decoded, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES), ENT_QUOTES, 'UTF-8') . '</pre>';
echo '<p>User: <code>' . htmlspecialchars($username, ENT_QUOTES, 'UTF-8') . '</code></p>';
echo '<p>Role: <code>' . htmlspecialchars($role, ENT_QUOTES, 'UTF-8') . '</code></p>';

if ($role === 'admin') {
    echo '<div class="success">Admin role accepted. Flag: <code>FLAG{client_side_role_is_not_auth}</code></div>';
} else {
    echo '<div class="notice">Only admin can see the flag.</div>';
}

echo '<form method="post"><button name="reset" value="1">Reset cookie</button></form>';
echo '</div>';

echo '<details><summary>Source review hint</summary>';
echo '<p>Encoding is not signing. If the server trusts client-controlled role data, the role can be changed.</p>';
echo '</details>';

page_footer();
