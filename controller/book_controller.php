<?php

//include '../model/category.php';
include '../model/book.php';

function add_book() {
    $categories = get_all_categories();
    
    //gestion du formulaire
    if (isset($_POST["submit"])) {
        //vérifier si les champs existe
        //nettoyer les données
        //tester si le champs summary est plus petit que 255
        //ajouter à la bdd
        //afficher un message
        $message = "";
    }
    include '../view/template_add_book.php';
}
