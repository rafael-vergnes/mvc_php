<?php

function register(): void
{
    //Test si le formulaire est soumis
    if (isset($_POST["submit"])) {
        //Test si le token est valide
        if (isset($_POST["csrf_token"]) && isCsrfTokenValid($_POST)) {
            //test si les 4 champs sont remplis
            if (
                !empty($_POST["firstname"]) &&
                !empty($_POST["lastname"]) &&
                !empty($_POST["email"]) &&
                !empty($_POST["password"]) &&
                !empty($_POST["confirm-password"])
            ) {
                //nettoyer les entrées 
                $_POST = sanitize_array($_POST);
                //test si les 2 mots de passe sont identiques
                if ($_POST["password"] == $_POST["confirm-password"]) {
                    //test si l'email est valide
                    if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                        //Tester si le compte 
                        if (!is_users_exists_by_email($_POST["email"])) {
                            //hash du mot de passe
                            $_POST["password"] = password_hash($_POST["password"], PASSWORD_DEFAULT);
                            //Ajouté en BDD
                            create_user($_POST);
                            $message = "Le compte " . $_POST["email"] . " a été ajouté";
                        }
                    } else {
                        $message = "Le mail est invalide";
                    }
                } else {
                    $message = "Les 2 mots de passe ne sont pas identiques";
                }
            } else {
                $message = "Veuillez remplir les champs";
            }
        } else {
            $message = "Le token csrf est invalide";
        }
    }
    include '../view/template_register.php';
}

function login(): void
{
    if (isset($_POST["csrf_token"]) && isCsrfTokenValid($_POST)) {
    }
    if (isset($_POST["submit"])) {
        if (isset($_POST["csrf_token"]) && isCsrfTokenValid($_POST)) {
            //test si les 2 champs sont remplis
            if (
                !empty($_POST["email"]) &&
                !empty($_POST["password"])
            ) {
                $_POST = sanitize_array($_POST);
                //Récupération du compte
                $users = get_users_by_email($_POST["email"]);
                //Test si le compte existe
                if (!empty($users)) {
                    //Test si le mot de passe est valide
                    if (password_verify($_POST["password"], $users["password"])) {
                        //Création des super globales de session
                        $_SESSION["status"] = true;
                        $_SESSION["email"] = $users["email"];
                        $_SESSION["firstname"] = $users["firstname"];
                        $_SESSION["lastname"] = $users["lastname"];
                        $_SESSION["id"] = $users["id"];
                        //redirection
                        header('Location: /');
                    } else {
                        $message = "Les informations de connexion ne sont pas correctes";
                    }
                } else {
                    $message = "Les informations de connexion ne sont pas correctes";
                }
            } else {
                $message = "Veuillez remplir les 2 champs";
            }
        } else {
            $message = "Le token csrf est invalide";
        }
    }
    include '../view/template_login.php';
}

function logout(): void
{
    session_destroy();
    header('Location: /');
}
