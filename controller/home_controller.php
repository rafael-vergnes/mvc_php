<?php

//Gérer l'affichage de la page d'accueil
function home(): void {
    if (isset($_GET["nom"])) {
        $nom = $_GET["nom"];
    }

    //Test si le formulaire est soumis
    if (isset($_POST["submit"])) {
        $prenom = $_POST["prenom"];
        $_SESSION["prenom"] = $prenom;
    }
    //importer la page d'accueil
    include '../view/template_home.php';
}