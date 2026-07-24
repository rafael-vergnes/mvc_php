<?php
//import du model (category)
include '../model/category.php';

function add_category(): void {
    //test si le formulaire est submit
    if (isset($_POST["submit"])) {
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
    }
    include '../view/template_add_category.php';
}
