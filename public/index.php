<?php

session_start();
//à ajouter sur la version en ligne
//Configuration session
/* session_set_cookie_params([
    'lifetime' => 0,
    'path' => '/',
    'secure' => !empty($_SERVER['HTTPS']),
    'httponly' => true,
    'samesite' => 'Lax',
]); 

ini_set('session.use_strict_mode', '1');
*/

//Headers sécurité
header('X-Frame-Options: DENY');
header('X-Content-Type-Options: nosniff');
header('Referrer-Policy: no-referrer');
header("Content-Security-Policy: default-src 'self'; style-src 'self' https://cdn.jsdelivr.net; img-src 'self' data:; script-src 'self'; object-src 'none'; frame-ancestors 'none';");
//import des outils
include '../vendor/autoload.php';
//imports des variables d'environnements
include '../env.php';
//imports des tools
include '../tools/bdd_connect.php';
include '../tools/security.php';
include '../model/category.php';
include '../model/book.php';
include '../model/users.php';
//imports des controllers
include '../controller/home_controller.php';
include '../controller/category_controller.php';
include '../controller/book_controller.php';
include '../controller/security_controller.php';

$url = parse_url($_SERVER['REQUEST_URI']);

//test soit l'url a une route sinon on renvoi à la racine
$path = isset($url['path']) ? $url['path'] : '/';

switch ($path) {
    case '/':
        home();
        break;
    case '/login':
        login();
        break;
    case '/logout':
        logout();
        break;
    case '/register':
        register();
        break;
    case '/category/new':
        add_category();
        break;
    case '/book/new':
        add_book();
        break;
    default:
        echo "erreur 404";
        break;
}