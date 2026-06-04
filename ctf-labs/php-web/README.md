# PHP Web CTF Lab

This is a local educational PHP web security lab for CTF-style learning.

The lab contains intentionally vulnerable tasks designed for defensive cybersecurity education, secure code review practice, and classroom demonstrations.

> ⚠️ Run this lab only in a local, isolated environment. Do not deploy it to a public server.

## Tasks

| Task | Topic | Goal |
|---|---|---|
| Task 1 | SQL Injection | Bypass a vulnerable login form |
| Task 2 | IDOR | Access data without proper authorization checks |
| Task 3 | Insecure client-side trust | Understand why unsigned cookies are not authorization |
| Task 4 | Path Traversal | Read a local training flag through unsafe file access |

## Quick start with Docker

```bash
cd ctf-labs/php-web
docker compose up --build
```

Open:

```text
http://localhost:8080
```

## Quick start without Docker

Requires PHP 8.x with SQLite support.

```bash
cd ctf-labs/php-web
php -S localhost:8080 -t public
```

Open:

```text
http://localhost:8080
```

## Educational purpose

This lab is intended to help learners understand:

- why string concatenation in SQL queries is dangerous;
- why object IDs are not access control;
- why client-side data must not be trusted for authorization;
- why file paths must be validated and restricted;
- how to document intentionally vulnerable training code.

## Safety

The vulnerabilities in this lab are intentionally simple and local. They are included for legal, defensive, and educational training only.

Do not use these techniques against systems you do not own or do not have explicit permission to test.
