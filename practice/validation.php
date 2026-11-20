<?php
declare(strict_types=1);

function validateRegistration(array $input): array
{
    $errors = [];
    $name = is_string($input['name'] ?? null) ? trim($input['name']) : '';
    $email = is_string($input['email'] ?? null) ? trim($input['email']) : '';
    $password = is_string($input['password'] ?? null) ? $input['password'] : '';
    if ($name === '' || strlen($name) > 120) $errors['name'] = 'Name is required, up to 120 bytes.';
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) $errors['email'] = 'Invalid email.';
    if (strlen($password) < 12 || strlen($password) > 72) $errors['password'] = 'Password must be 12–72 bytes.';
    return $errors;
}

function escapeHtml(string $text): string
{
    return htmlspecialchars($text, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
