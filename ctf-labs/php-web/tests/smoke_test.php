<?php
declare(strict_types=1);

/**
 * Basic smoke test for the local PHP Web CTF Lab.
 *
 * This test intentionally does not solve tasks. It only checks that key files
 * exist and that the lab structure is present.
 */

$root = dirname(__DIR__);
$requiredFiles = [
    $root . '/public/index.php',
    $root . '/public/bootstrap.php',
    $root . '/public/task1_login.php',
    $root . '/public/task2_profile.php',
    $root . '/public/task3_cookie.php',
    $root . '/public/task4_notes.php',
    $root . '/public/assets/style.css',
    $root . '/public/notes/welcome.txt',
    $root . '/public/notes/rules.txt',
    $root . '/flags/task4.txt',
    $root . '/docs/CTF_TASKS.md',
    $root . '/docs/ORGANIZER_NOTES.md',
];

$missing = [];

foreach ($requiredFiles as $file) {
    if (!is_file($file)) {
        $missing[] = $file;
    }
}

if ($missing !== []) {
    fwrite(STDERR, "Missing required files:\n" . implode("\n", $missing) . "\n");
    exit(1);
}

echo "PHP Web CTF Lab smoke test passed.\n";
