<?php

function connect_bdd(): PDO
{
    return new PDO(
        'mysql:host=' . BDD_HOST . ';dbname=' . BDD_NAME,
        BDD_USERNAME,
        BDD_PASSWORD,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]
    );
}
