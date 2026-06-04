# Secure Fix Examples

This folder contains safer example implementations for the vulnerable training tasks.

These examples are intended for defensive learning and code review discussion.

They are not a full production framework. They demonstrate the core idea of each mitigation in a simple way.

## Included examples

- `task1_login_fixed.php` — prepared statements and password verification pattern;
- `task2_profile_fixed.php` — server-side authorization idea;
- `task3_cookie_fixed.php` — signed cookie example;
- `task4_notes_fixed.php` — filename allowlist.

## How to use

Compare each vulnerable task in `public/` with the corresponding safer example in this folder.

Focus on:

- root cause;
- impact;
- mitigation;
- what tests should be added;
- what logs or monitoring would help.
