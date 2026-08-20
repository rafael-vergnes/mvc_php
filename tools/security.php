<?php

function sanitize(string $str) : string {
    return 
        htmlspecialchars(
            strip_tags(
                trim($str)
            ), ENT_COMPAT
        );
}

function sanitize_array(array $tab): array{
    foreach ($tab as $key => $value) {
        if (gettype($value) != 'array') {
            $tab[$key] = sanitize($value);
        }
    }
    return $tab;
}

function sanitize_array_v2(array &$tab): void{
    foreach ($tab as $key => $value) {
        if (gettype($value) != 'array' || $key != 'submit') {
            $tab[$key] = sanitize($value);
        }
    }
}

function is_granted(): void {
    if (!isset($_SESSION["status"])) header('Location: /');
}


function getCsrfToken(): string
{
    if (empty($_SESSION["csrf_token"])) {
        $_SESSION["csrf_token"] = bin2hex(random_bytes(32));
    }

    return $_SESSION["csrf_token"];
}

function isCsrfTokenValid(array $post): bool
{
    $token = $post["csrf_token"] ?? "";
    $sessionToken = $_SESSION["csrf_token"] ?? "";

    return !empty($token) && !empty($sessionToken) && hash_equals($sessionToken, $token);
}