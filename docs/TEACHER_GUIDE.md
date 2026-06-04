# Teacher Guide

This guide explains how to use the PHP Web CTF Lab in a classroom, workshop, or mentoring session.

## Audience

The lab is suitable for:

- beginner information security learners;
- students studying web application security;
- CTF beginners;
- developers learning secure coding basics;
- teachers who need practical examples for cybersecurity lessons.

## Suggested lesson format

Recommended duration: 45–90 minutes.

### Part 1: Introduction

Explain:

- what a local CTF lab is;
- why the lab must not be deployed publicly;
- the difference between legal training and unauthorized testing;
- the goal of learning defensive security.

### Part 2: Individual task solving

Students review each task, observe behavior, and inspect source code.

Suggested order:

1. Task 1 — SQL Injection
2. Task 2 — IDOR
3. Task 3 — Cookie trust
4. Task 4 — Path Traversal

### Part 3: Defensive discussion

After each task, discuss:

- what went wrong;
- why the vulnerability exists;
- how an attacker could abuse it in a real application;
- how to fix it safely;
- what should be logged and monitored.

### Part 4: Secure coding comparison

Use the files in `ctf-labs/php-web/fixes/` to compare vulnerable and safer implementations.

## Assessment ideas

Learners can be assessed by asking them to:

- explain the vulnerability in their own words;
- identify the vulnerable line of code;
- propose a fix;
- describe a real-world impact;
- write a short defensive checklist.

## Safety rules for students

- Work only inside the local lab.
- Do not test payloads on real websites.
- Do not collect or share credentials.
- Do not attack networks or systems without permission.
- Focus on understanding and prevention.
