<?php

function sanitize(string $str) : string {
    return htmlentities(
        htmlspecialchars(
            strip_tags(
                trim($str)
            )
        ), ENT_DISALLOWED, 'ISO-8859-15'
    );
}
