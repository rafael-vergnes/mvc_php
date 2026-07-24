<?php

function add_book() {
    $categories = get_all_categories();
    
    //gestion du formulaire
    if (isset($_POST["submit"])) {
        //vérifier si les champs existent
        if (!empty($_POST["title"]) &&
        !empty($_POST["summary"]) &&
        !empty($_POST["author"]) &&
        !empty($_POST["published_at"]) &&
        !empty($_POST["category_id"])) {
        //nettoyer les données
            $_POST["title"] = sanitize($_POST["title"]);
            $_POST["summary"] = sanitize($_POST["summary"]);
            $_POST["author"] = sanitize($_POST["author"]);
            $_POST["published_at"] = sanitize($_POST["published_at"]);
            $_POST["category_id"] = sanitize($_POST["category_id"]);
        //tester si le champs summary est plus petit que 255
                if (strlen($_POST["summary"]) > 255) {
                    $message = "Le résumé est trop long";
                    } else {
        //ajouter à la bdd
                    create_book($_POST);
        //afficher un message
                    $message = "Le livre " . $_POST["title"] . " a été ajouté en BDD";
            }
        }
    }
    include '../view/template_add_book.php';
}



