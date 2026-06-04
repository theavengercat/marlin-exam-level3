# Lesson Plan: Web Security Basics with PHP CTF Lab

## Topic

Basic web application vulnerabilities and defensive coding practices.

## Duration

60–90 minutes.

## Learning objectives

By the end of the lesson, learners should be able to:

- explain what SQL injection is;
- explain why IDOR is an access control problem;
- explain why client-controlled data cannot be trusted for authorization;
- explain how path traversal happens;
- describe basic secure coding mitigations.

## Required setup

- Local machine with Docker, or PHP 8.x with SQLite support.
- The `ctf-labs/php-web` lab from this repository.

## Lesson flow

### 1. Safety and ethics

Discuss legal boundaries and defensive purpose.

### 2. Run the lab

```bash
cd ctf-labs/php-web
docker compose up --build
```

Open:

```text
http://localhost:8080
```

### 3. Solve tasks

Students solve tasks individually or in small groups.

### 4. Review vulnerable code

The teacher shows vulnerable code snippets and explains the root cause.

### 5. Compare with secure fixes

Use `ctf-labs/php-web/fixes/`.

### 6. Reflection

Ask learners:

- What was the root cause?
- What would be the impact in production?
- What is the safest fix?
- How can this be tested in the future?

## Homework ideas

- Write a short vulnerability report for one task.
- Create a secure version of one task.
- Add a test for an access control rule.
- Write a checklist for reviewing PHP web code.
