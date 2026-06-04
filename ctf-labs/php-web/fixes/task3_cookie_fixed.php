<?php
declare(strict_types=1);

/**
 * Defensive example for Task 3.
 *
 * Key idea:
 * - do not trust unsigned client-controlled authorization data;
 * - prefer server-side sessions for roles and permissions;
 * - if a token is used, protect integrity with a strong signature.
 */

function sign_payload(string $payload, string $secret): string
{
    return hash_hmac('sha256', $payload, $secret);
}

function create_signed_cookie(array $profile, string $secret): string
{
    $payload = base64_encode(json_encode($profile, JSON_THROW_ON_ERROR));
    $signature = sign_payload($payload, $secret);

    return $payload . '.' . $signature;
}

function read_signed_cookie(string $cookie, string $secret): ?array
{
    $parts = explode('.', $cookie, 2);

    if (count($parts) !== 2) {
        return null;
    }

    [$payload, $signature] = $parts;
    $expectedSignature = sign_payload($payload, $secret);

    if (!hash_equals($expectedSignature, $signature)) {
        return null;
    }

    $decoded = json_decode(base64_decode($payload, true) ?: '', true);

    return is_array($decoded) ? $decoded : null;
}

// In production, store secrets securely outside source code.
