<?php
//import des outils
include '../vendor/autoload.php';
//imports des variables d'environnements
include '../env.php';
//imports des tools
include '../tools/bdd_connect.php';
include '../tools/security.php';

//imports des controllers
include '../controller/home_controller.php';
include '../controller/category_controller.php';
include '../controller/book_controller.php';

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