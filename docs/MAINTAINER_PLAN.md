# Maintainer Plan

This document explains how the project is maintained as an open-source cybersecurity education repository.

## Maintainer role

The maintainer is responsible for:

- reviewing changes;
- improving documentation;
- checking security-sensitive code;
- separating intended training vulnerabilities from accidental flaws;
- keeping examples local, legal, and educational;
- preparing small releases and changelog entries;
- responding to issues and security education notes.

## Maintenance priorities

1. Keep the project safe for learners.
2. Keep the project easy to run locally.
3. Clearly document intentionally vulnerable examples.
4. Add safer fixed examples.
5. Improve tests and CI checks.
6. Support classroom and self-study use.

## Review checklist

Before merging changes, check:

- Does the change support education or maintenance?
- Is the vulnerable behavior intentional and documented?
- Are there any real secrets or personal data?
- Is the code understandable for beginners?
- Does the change avoid harmful real-world tooling?
- Does the PHP syntax check pass?

## Release approach

The project can use small tagged releases for educational milestones:

- `v0.1.0` — documentation and initial PHP CTF lab;
- `v0.2.0` — fixed examples and tests;
- `v0.3.0` — additional tasks and guided lessons.

## How Codex can support maintenance

Codex and API-based automation can help with:

- security review;
- test generation;
- documentation drafts;
- issue triage;
- safer refactoring;
- code explanations for learners;
- release preparation.
