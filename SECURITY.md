# Security Policy

## Educational security project

This repository is related to cybersecurity education and may contain intentionally vulnerable examples for training, CTF-style exercises, or secure code review practice.

The goal of the project is defensive learning: understanding insecure patterns, documenting risks, improving code quality, and helping learners develop practical information security skills.

## Supported versions

At this stage, the project is maintained as an educational open-source repository. The current public version is the only supported version.

## Intended vs accidental vulnerabilities

Some insecure patterns may be intentional and used as training material.

However, accidental vulnerabilities, unsafe defaults, unclear security behavior, dependency risks, or undocumented dangerous behavior should be reported.

Examples of issues worth reporting:

- unintended authentication bypasses;
- unsafe file upload behavior;
- SQL injection not marked as an exercise;
- XSS not marked as an exercise;
- command injection;
- insecure session handling;
- hardcoded secrets;
- unsafe dependencies;
- missing input validation;
- misleading or dangerous setup instructions.

## Reporting a vulnerability

Please report security issues by opening a GitHub issue with the `security` label if the issue is not sensitive.

If the issue is sensitive and should not be disclosed publicly, contact the maintainer privately.

When reporting, please include:

- affected file or component;
- short description of the issue;
- steps to reproduce;
- expected and actual behavior;
- whether you believe the issue is intentional training behavior or an accidental flaw;
- suggested mitigation, if available.

## Responsible disclosure

Please do not use this project to attack systems you do not own or do not have permission to test.

This project is intended for legal, ethical, educational, and defensive security work only.

## Maintainer response

The maintainer will review reports, clarify whether the behavior is intentional or accidental, document training cases, and fix or mitigate unintended vulnerabilities when appropriate.
