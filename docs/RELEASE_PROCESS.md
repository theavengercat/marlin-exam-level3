# Release Process

This document describes a simple release workflow for the project.

## Release goals

Releases should be small, understandable, and focused on educational value.

## Suggested versioning

The project can use semantic-style version tags:

- `v0.1.0` — initial documentation and PHP CTF lab;
- `v0.2.0` — secure fixed examples and tests;
- `v0.3.0` — additional tasks and lesson materials.

## Before release

Check:

- README is up to date;
- changelog is updated;
- security policy is present;
- no secrets are committed;
- PHP syntax check passes;
- smoke test passes;
- Docker build passes.

## Local checks

```bash
make php-lint
make lab-test
```

## Create a tag

```bash
git tag -a v0.1.0 -m "Initial educational PHP Web CTF Lab"
git push origin v0.1.0
```

## Release notes

Release notes should include:

- what was added;
- educational topics covered;
- safety notes;
- known limitations;
- next steps.
