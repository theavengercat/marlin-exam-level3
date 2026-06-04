<?php
declare(strict_types=1);
require __DIR__ . '/bootstrap.php';

page_header('Task 2: Profile access');

echo '<p>Goal: find the private note that should belong only to the admin profile.</p>';
echo '<p>Training topic: IDOR / missing authorization checks.</p>';

$profileId = (int)($_GET['user'] ?? 2);

/*
 * This query uses a prepared statement, but the task is still vulnerable:
 * it checks whether the profile exists, not whether the current visitor
 * is allowed to access it.
 */
$stmt = $pdo->prepare('SELECT id, display_name, about, private_note FROM profiles WHERE id = ?');
$stmt->execute([$profileId]);
$profile = $stmt->fetch(PDO::FETCH_ASSOC);

echo '<div class="panel">';
echo '<p>Try profiles: <a href="/task2_profile.php?user=1">1</a> · <a href="/task2_profile.php?user=2">2</a> · <a href="/task2_profile.php?user=3">3</a></p>';

if ($profile) {
    echo '<h2>' . htmlspecialchars($profile['display_name'], ENT_QUOTES, 'UTF-8') . '</h2>';
    echo '<p>' . htmlspecialchars($profile['about'], ENT_QUOTES, 'UTF-8') . '</p>';
    echo '<p><strong>Private note:</strong> <code>' . htmlspecialchars($profile['private_note'], ENT_QUOTES, 'UTF-8') . '</code></p>';
} else {
    echo '<p class="error">Profile not found.</p>';
}

echo '</div>';

echo '<details><summary>Source review hint</summary>';
echo '<p>Prepared statements prevent SQL injection, but they do not replace authorization checks.</p>';
echo '</details>';

page_footer();
