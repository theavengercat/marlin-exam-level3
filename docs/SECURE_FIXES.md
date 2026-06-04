# Secure Fixes and Defensive Takeaways

This document explains how the intentionally vulnerable PHP CTF tasks should be fixed in real applications.

## Task 1: SQL Injection

Vulnerable pattern:

- user input is concatenated into an SQL query.

Safer approach:

- use prepared statements;
- never build SQL logic by concatenating raw user input;
- use password hashing for real authentication;
- log suspicious authentication attempts.

Example defensive pattern:

```php
$stmt = $pdo->prepare('SELECT id, username, role FROM users WHERE username = ? LIMIT 1');
$stmt->execute([$username]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
```

## Task 2: IDOR

Vulnerable pattern:

- the application checks whether an object exists, but not whether the current user is allowed to access it.

Safer approach:

- perform server-side authorization checks;
- verify ownership or role permissions;
- avoid exposing sensitive fields by default;
- add access control tests.

Example defensive idea:

```php
if ($profileOwnerId !== $currentUserId && $currentUserRole !== 'admin') {
    http_response_code(403);
    exit('Forbidden');
}
```

## Task 3: Client-side role trust

Vulnerable pattern:

- the server trusts a role value controlled by the client.

Safer approach:

- store authorization state server-side;
- use signed tokens only when appropriate;
- verify permissions on each protected action;
- never rely on base64 as a security mechanism.

## Task 4: Path Traversal

Vulnerable pattern:

- user input is appended directly to a filesystem path.

Safer approach:

- use an allowlist of filenames;
- reject path separators and traversal sequences;
- resolve real paths and check base directory boundaries;
- keep secrets outside readable paths.

Example defensive pattern:

```php
$allowedFiles = ['welcome.txt', 'rules.txt'];

if (!in_array($file, $allowedFiles, true)) {
    http_response_code(404);
    exit('File not found');
}
```
