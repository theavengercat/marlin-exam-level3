<?php
declare(strict_types=1);

/**
 * Defensive example for Task 2.
 *
 * Key idea:
 * - prepared statements are not enough;
 * - authorization must be enforced server-side.
 */

$requestedProfileId = (int)($_GET['user'] ?? 0);

// Example values normally taken from a trusted session.
$currentUserId = 2;
$currentUserRole = 'student';

$stmt = $pdo->prepare('SELECT id, owner_user_id, display_name, about FROM profiles WHERE id = ?');
$stmt->execute([$requestedProfileId]);
$profile = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$profile) {
    http_response_code(404);
    exit('Profile not found');
}

$isOwner = (int)$profile['owner_user_id'] === $currentUserId;
$isAdmin = $currentUserRole === 'admin';

if (!$isOwner && !$isAdmin) {
    http_response_code(403);
    exit('Forbidden');
}

// Safe to render profile after authorization.
