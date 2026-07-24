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

