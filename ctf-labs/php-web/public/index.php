<?php
declare(strict_types=1);
require __DIR__ . '/bootstrap.php';

echo '<!doctype html><html lang="en"><head>';
echo '<meta charset="utf-8">';
echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
echo '<title>PHP Web CTF Lab</title>';
echo '<link rel="stylesheet" href="/assets/style.css">';
echo '</head><body><main class="container">';
echo '<h1>PHP Web CTF Lab</h1>';
echo '<p>This local lab contains intentionally vulnerable PHP tasks for defensive cybersecurity education.</p>';
echo '<div class="warning">Run locally only. Do not deploy this lab to a public server.</div>';

echo '<section class="cards">';
echo '<a class="card" href="/task1_login.php"><strong>Task 1:</strong><br>Login bypass</a>';
echo '<a class="card" href="/task2_profile.php?user=2"><strong>Task 2:</strong><br>Profile access</a>';
echo '<a class="card" href="/task3_cookie.php"><strong>Task 3:</strong><br>Cookie role</a>';
echo '<a class="card" href="/task4_notes.php"><strong>Task 4:</strong><br>Training notes</a>';
echo '</section>';

echo '<h2>Rules</h2>';
echo '<ul>';
echo '<li>Everything is local to this lab.</li>';
echo '<li>Find the flags by reviewing behavior and source code.</li>';
echo '<li>Do not attack systems outside your own lab environment.</li>';
echo '</ul>';

echo '</main></body></html>';
