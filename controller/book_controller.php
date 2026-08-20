<?php

//include '../model/category.php';
include '../model/book.php';

function add_book(): void {
    $categories = get_all_categories();
    
    //gestion du formulaire
    if (isset($_POST["submit"])) {
        //vérifier si les champs existe
        if (
            !empty($_POST["title"]) && 
            !empty($_POST["summary"]) && 
            !empty($_POST["author"]) && 
            !empty($_POST["published_at"]) && 
            !empty($_POST["category_id"])
            ) {
            //nettoyer les données
            $_POST = sanitize_array($_POST);
            //tester si le champs summary est plus petit que 255
            if (strlen($_POST["summary"]) <= 255) {
                //ajouter à la bdd
                if (create_book($_POST) > 0 ) {
                    $message = "Le livre " . $_POST["title"] . " a été ajouté";
                } else {
                    $message = "Erreur d'enregistrement";
                }
            } else {
                $message = "Le résumé est trop long";
            }
        } else {
            $message = "Veuillez remplir tous les champs du formulaire";
        }
    }
    include '../view/template_add_book.php';
}
