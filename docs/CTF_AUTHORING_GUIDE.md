# CTF Task Authoring Guide

This guide explains how to add new educational tasks to the project.

## Task requirements

Every task should include:

- clear title;
- learning objective;
- topic;
- local-only scope;
- flag;
- source review hint;
- defensive takeaway;
- optional fixed version.

## Good task topics

Suitable topics include:

- input validation;
- SQL injection basics;
- XSS basics;
- IDOR;
- insecure file upload;
- path traversal;
- insecure configuration;
- authentication mistakes;
- authorization mistakes;
- logging and monitoring basics.

## Avoid

Do not add:

- malware;
- credential theft;
- persistence;
- destructive payloads;
- real-world exploitation chains;
- attacks against third-party services;
- real secrets or personal data.

## Suggested task template

```text
Task name:
Topic:
Goal:
Vulnerable behavior:
Intended flag:
Defensive takeaway:
Fixed version:
Safety notes:
```

## Review before merging

- Is the task legal and educational?
- Is the vulnerability intentionally documented?
- Is the flag local to the lab?
- Is the task simple enough for learners?
- Is the defensive lesson clear?
