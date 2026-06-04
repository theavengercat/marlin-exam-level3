# PHP Web CTF Tasks

This document describes the educational goals of the PHP Web CTF Lab.

## Task 1: Login bypass

**Topic:** SQL Injection  
**Goal:** Understand why user input must not be concatenated into SQL queries.

Learners review a login form and identify that the SQL query is built by combining strings with user-controlled input.

Defensive takeaway:

- use prepared statements;
- validate input;
- avoid displaying database errors;
- log suspicious authentication behavior;
- use proper password hashing in real applications.

## Task 2: Profile access

**Topic:** IDOR / missing authorization  
**Goal:** Understand that object IDs are not access control.

Learners access profiles by changing an ID parameter and observe that the application checks whether the object exists, but not whether the visitor may access it.

Defensive takeaway:

- enforce authorization checks server-side;
- verify ownership or role permissions;
- avoid exposing sensitive fields unnecessarily;
- write tests for access control.

## Task 3: Cookie role

**Topic:** Insecure client-side trust  
**Goal:** Understand why client-controlled cookies must not be trusted for authorization.

Learners inspect a base64-encoded cookie and discover that the server accepts the role value without integrity protection.

Defensive takeaway:

- never trust client-side role data;
- store authorization state server-side or use signed tokens;
- validate permissions on every protected action;
- separate authentication from authorization.

## Task 4: Training notes

**Topic:** Path Traversal  
**Goal:** Understand why user-controlled file paths must be restricted.

Learners inspect a notes viewer and identify that the file parameter is appended to a filesystem path without validation.

Defensive takeaway:

- use allowlists for filenames;
- normalize and validate paths;
- avoid exposing arbitrary file reads;
- keep secrets outside readable application paths;
- test path handling carefully.
