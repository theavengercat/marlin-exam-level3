# Security Review Checklist

This checklist is used for reviewing changes to the project.

## Repository safety

- [ ] No real credentials are committed.
- [ ] No private keys are committed.
- [ ] No access tokens are committed.
- [ ] No personal data is committed.
- [ ] No production URLs, internal IPs, or private infrastructure details are exposed.

## Educational scope

- [ ] The change has a clear educational purpose.
- [ ] Intentionally vulnerable code is documented.
- [ ] Defensive takeaways are included where appropriate.
- [ ] The change does not encourage unauthorized testing.
- [ ] The content is suitable for a local lab.

## PHP security review

- [ ] SQL queries use prepared statements unless intentionally vulnerable.
- [ ] Output is escaped where appropriate.
- [ ] File paths are validated or clearly marked as training examples.
- [ ] Authorization checks are documented.
- [ ] Cookies and tokens are not trusted blindly unless intentionally vulnerable.
- [ ] Error messages do not leak unnecessary sensitive details.

## Documentation

- [ ] README or docs are updated.
- [ ] Task purpose is clear.
- [ ] Setup instructions still work.
- [ ] Safety warnings are present.
- [ ] Fixed examples are updated when needed.

## CI and tests

- [ ] PHP syntax check passes.
- [ ] Smoke test passes.
- [ ] Docker build passes.
