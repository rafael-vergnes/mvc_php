<?php


function add_category(): void {
    is_granted();
    //test si le formulaire est submit
    if (isset($_POST["submit"])) {
        if (isset($_POST["csrf_token"]) && isCsrfTokenValid($_POST)) {
            //test si le champs est rempli
            if (!empty($_POST["category_name"])) {
                //nettoyer
                $_POST["category_name"] = sanitize($_POST["category_name"]);
                if (!is_category_exists($_POST["category_name"])) {
                    //Ajouter la categorie en BDD
                    create_category($_POST);
                    $message = "La categorie " . $_POST["category_name"] . " a été ajouté en BDD";
                } else {
                    $message = "La categorie existe déja";
                }
            } else {
                $message =  "Le champs est vide";
            }
        } else {
            $message = "Le token csrf est invalide";
        }
    }
    include '../view/template_add_category.php';
}
