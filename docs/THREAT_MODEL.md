# Threat Model

This document describes the educational threat model for the PHP Web CTF Lab.

## System description

The project includes a local PHP web application containing intentionally vulnerable tasks.

The lab is not intended for production use and should run only in an isolated local environment.

## Assets

Educational assets:

- task source code;
- flags;
- documentation;
- examples of vulnerable and safer code;
- learner environment.

Sensitive assets that must not be included:

- real credentials;
- personal data;
- production secrets;
- private keys;
- access tokens;
- third-party system information.

## Intended users

- students;
- teachers;
- CTF learners;
- information security beginners;
- maintainers.

## Out of scope

- attacking real systems;
- public deployment;
- malware development;
- credential theft;
- persistence;
- destructive activity;
- bypassing third-party security controls.

## Main risks

### Public deployment risk

The lab contains intentionally vulnerable code. If deployed publicly, it could be abused.

Mitigation:

- document local-only usage;
- use Docker for isolated local execution;
- include warnings in README and docs.

### Confusion between intended and accidental vulnerabilities

Learners may not know which vulnerabilities are deliberate.

Mitigation:

- document tasks clearly;
- maintain organizer notes;
- keep a security policy;
- add secure fixed examples.

### Unsafe contributions

Contributors may add harmful or inappropriate content.

Mitigation:

- maintain contribution rules;
- use pull request checklists;
- review security-sensitive changes;
- reject harmful content.

## Security goals

- Keep the project educational and defensive.
- Make vulnerabilities understandable and clearly scoped.
- Prevent accidental inclusion of secrets.
- Keep the lab simple to run locally.
- Support safer coding practices through fixed examples.
