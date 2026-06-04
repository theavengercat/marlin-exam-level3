<?php
declare(strict_types=1);
require __DIR__ . '/bootstrap.php';

page_header('Task 4: Training notes');

echo '<p>Goal: find a flag stored outside the public notes directory.</p>';
echo '<p>Training topic: path traversal through unsafe file path handling.</p>';

$file = $_GET['file'] ?? 'welcome.txt';

/*
 * Intentionally vulnerable code for CTF training.
 * The application joins user input into a filesystem path without validation.
 */
$path = __DIR__ . '/notes/' . $file;

echo '<div class="panel">';
echo '<p>Available notes:</p>';
echo '<ul>';
echo '<li><a href="/task4_notes.php?file=welcome.txt">welcome.txt</a></li>';
echo '<li><a href="/task4_notes.php?file=rules.txt">rules.txt</a></li>';
echo '</ul>';

echo '<p><strong>Requested file:</strong> <code>' . htmlspecialchars($file, ENT_QUOTES, 'UTF-8') . '</code></p>';

if (is_readable($path)) {
    echo '<pre>' . htmlspecialchars(file_get_contents($path), ENT_QUOTES, 'UTF-8') . '</pre>';
} else {
    echo '<p class="error">File not found or not readable.</p>';
}

echo '</div>';

echo '<details><summary>Source review hint</summary>';
echo '<p>Check how the final filesystem path is built. Is the file parameter restricted to the notes directory?</p>';
echo '</details>';

page_footer();
