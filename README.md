# Marlin Exam Level 3

**Marlin Exam Level 3** is an open-source educational cybersecurity project focused on practical web security, PHP application security, and CTF-style learning.

The repository contains a local PHP Web CTF Lab with intentionally vulnerable tasks, defensive explanations, secure fix examples, teacher materials, security review documentation, and maintainer workflows.

> ⚠️ This project is intended for educational and defensive security purposes only. Do not deploy it in production environments.

## What is included

- Local PHP Web CTF Lab
- Beginner-friendly web security tasks
- Intentionally vulnerable examples for training
- Secure fix examples for each task
- Docker-based local setup
- Teacher guide and lesson plan
- Security review checklist
- Threat model
- Maintainer plan
- GitHub Actions checks
- Dependabot configuration

## CTF Lab

The main training lab is located in:

```text
ctf-labs/php-web/
```

It currently includes four beginner-friendly tasks:

| Task | Topic | Goal |
|---|---|---|
| Task 1 | SQL Injection | Understand unsafe SQL query construction |
| Task 2 | IDOR | Understand missing authorization checks |
| Task 3 | Insecure client-side trust | Understand why unsigned cookies are not authorization |
| Task 4 | Path Traversal | Understand unsafe file path handling |

Each task is intentionally simple and designed for source-code review, classroom explanation, and defensive discussion.

## Quick start

### Run with Docker

```bash
cd ctf-labs/php-web
docker compose up --build
```

Open:

```text
http://localhost:8080
```

### Run without Docker

Requires PHP 8.x with SQLite support.

```bash
cd ctf-labs/php-web
php -S localhost:8080 -t public
```

Open:

```text
http://localhost:8080
```

## Local checks

From the repository root:

```bash
make php-lint
make lab-test
```

Or manually:

```bash
find . -name "*.php" -print0 | xargs -0 -n1 php -l
php ctf-labs/php-web/tests/smoke_test.php
```

## Secure fix examples

Safer example implementations are located in:

```text
ctf-labs/php-web/fixes/
```

These examples explain how the vulnerable patterns should be fixed in real applications.

Included examples:

- prepared statements for SQL queries;
- server-side authorization checks;
- signed cookie example;
- filename allowlist for safe file access.

See also:

```text
docs/SECURE_FIXES.md
```

## Documentation

Important documentation:

```text
docs/TEACHER_GUIDE.md
docs/LESSON_PLAN_WEB_SECURITY_BASICS.md
docs/THREAT_MODEL.md
docs/SECURITY_REVIEW_CHECKLIST.md
docs/MAINTAINER_PLAN.md
docs/RELEASE_PROCESS.md
docs/CTF_AUTHORING_GUIDE.md
docs/OPENAI_CODEX_USAGE.md
docs/PROJECT_SCOPE.md
docs/ROADMAP.md
```

## Maintainer background

The project is maintained by a security-focused maintainer with a background in:

- Computer Security bachelor's degree;
- information security education;
- CTF-style practice and cybersecurity competitions;
- Linux server administration;
- backend systems;
- monitoring and incident response;
- DDoS protection and infrastructure hardening;
- anti-cheat and abuse-prevention systems;
- practical cybersecurity training.

## Purpose

This repository is designed to support:

- practical web security learning;
- PHP security review exercises;
- CTF-style tasks and guided vulnerability analysis;
- secure coding practice;
- documentation of common web application weaknesses;
- classroom demonstrations;
- training for students and beginner information security specialists.

## Repository structure

```text
.
├── .github/              # CI, issue templates, PR template, Dependabot
├── ctf-labs/php-web/     # Local PHP Web CTF Lab
│   ├── public/           # Vulnerable training tasks
│   ├── fixes/            # Secure fix examples
│   ├── docs/             # Lab-specific documentation
│   ├── tests/            # Smoke tests
│   ├── Dockerfile
│   └── docker-compose.yml
├── docs/                 # Project documentation and maintainer materials
├── README.md             # Project overview
├── SECURITY.md           # Security policy and reporting
├── CONTRIBUTING.md       # Contribution guidelines
├── CODE_OF_CONDUCT.md    # Community rules
├── CHANGELOG.md          # Project changes
├── Makefile              # Local helper commands
└── LICENSE               # Open-source license
```

## Security and educational scope

Some parts of this project contain intentionally vulnerable or insecure patterns for learning purposes.

Intended training examples should be clearly documented. Accidental vulnerabilities, unsafe defaults, unclear behavior, dependency risks, or dangerous documentation should be reported and fixed.

See [SECURITY.md](SECURITY.md) for details.

## Suggested use cases

- classroom demonstrations;
- individual cybersecurity practice;
- CTF preparation;
- PHP/web security review training;
- secure coding discussions;
- vulnerability documentation exercises;
- secure code review practice.

## Contributing

Contributions are welcome, especially in the following areas:

- documentation improvements;
- security notes and explanations;
- safe refactoring;
- test coverage;
- setup instructions;
- educational task descriptions;
- vulnerability writeups for defensive learning;
- secure fix examples.

Please read [CONTRIBUTING.md](CONTRIBUTING.md) before submitting changes.

## Planned Codex usage

Codex and API credits can support this project through:

- security review;
- test generation;
- vulnerable-code analysis;
- documentation improvement;
- issue triage;
- safe refactoring;
- release preparation;
- learner-friendly code explanations.

See:

```text
docs/OPENAI_CODEX_USAGE.md
```

## License

This project is released under the MIT License. See [LICENSE](LICENSE).

## Disclaimer

This repository is provided for educational and defensive security purposes only. The maintainer is not responsible for misuse of the project or any damage caused by using the code outside of a controlled learning environment.
