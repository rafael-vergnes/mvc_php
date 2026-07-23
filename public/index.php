<?php

//imports des variables d'environnements

//imports des tools

//imports des controllers

$url = parse_url($_SERVER['REQUEST_URI']);

//test soit l'url a une route sinon on renvoi à la racine
$path = isset($url['path']) ? $url['path'] : '/';

switch ($path) {
    case '/':
        home();
        break;
    case '/login':
        echo "connexion";
        break;
    case '/logout':
        echo "déconnexion";
    default:
        echo "erreur 404";
        break;
}