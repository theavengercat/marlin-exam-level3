# Organizer Notes

This document is intended for teachers, maintainers, and CTF organizers.

Do not share this file with participants before the exercise if you want the flags to remain hidden.

## Flags

| Task | Flag |
|---|---|
| Task 1 | `FLAG{php_sqli_login_lab_2026}` |
| Task 2 | `FLAG{idor_is_access_control_failure}` |
| Task 3 | `FLAG{client_side_role_is_not_auth}` |
| Task 4 | `FLAG{path_traversal_needs_strict_path_validation}` |

## Suggested hints

### Task 1

- Look at the login query.
- What characters can change SQL logic?
- How would prepared statements change this code?

### Task 2

- Is the database query the problem?
- Who is allowed to read each profile?
- Where is the authorization check?

### Task 3

- Is base64 encryption?
- Who controls the cookie?
- How should the server verify authorization state?

### Task 4

- How is the requested file path built?
- Is the file parameter limited to known filenames?
- Can path segments move outside the notes directory?

## Maintenance checklist

- Keep the lab local-only.
- Do not add real credentials.
- Keep intentionally vulnerable code clearly documented.
- Avoid adding harmful real-world exploitation tooling.
- Prefer simple educational examples over complex attack chains.
- Add safer fixed examples in future versions.
