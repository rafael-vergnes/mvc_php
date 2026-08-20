<?php

function is_users_exists_by_email(string $email): bool {
    try {
        //1 écrire la requête
        $sql = "SELECT u.id FROM users AS u WHERE u.email = ?";
        //2 se connecter à la BDD
        $bdd = connect_bdd();
        //3 préparer la requête
        $request = $bdd->prepare($sql);
        //4 assigner le paramètre
        $request->bindValue(1, $email, PDO::PARAM_STR);
        //5 exécuter la requête 
        $request->execute();
        $data = $request->fetch(PDO::FETCH_ASSOC);  
        //6 récupérer la réponse  
        if(!$data)  return false;
    } catch(Exception $e)  {
        echo $e->getMessage();
    }
    return true;
}

function create_user(array $users): void {
    try {
        //1 écrire la requête
        $sql = "INSERT INTO users(firstname, lastname, email, `password`) VALUE(?,?,?,?)";
        //2 se connecter à la BDD
        $bdd = connect_bdd();
        //3 préparer la requête
        $request = $bdd->prepare($sql);
        //4 assigner le paramètre
        $request->bindValue(1, $users["firstname"], PDO::PARAM_STR);
        $request->bindValue(2, $users["lastname"], PDO::PARAM_STR);
        $request->bindValue(3, $users["email"], PDO::PARAM_STR);
        $request->bindValue(4, $users["password"], PDO::PARAM_STR);
        //5 exécuter la requête 
        $request->execute();       
    } catch(Exception $e) {
        echo $e->getMessage();
    }
}

function get_users_by_email(string $email): array {
    try {
        //1 écrire la requête
        $sql = "SELECT u.id, u.firstname, u.lastname, u.email, u.password FROM users AS u WHERE u.email = ?";
        //2 se connecter à la BDD
        $bdd = connect_bdd();
        //3 préparer la requête
        $request = $bdd->prepare($sql);
        //4 assigner le paramètre
        $request->bindValue(1, $email, PDO::PARAM_STR);
        //5 exécuter la requête 
        $request->execute();
        //6 récupérer la réponse  
        $user = $request->fetch(PDO::FETCH_ASSOC);  
        if (!$user) $user = [];
     } catch(Exception $e)  {
        echo $e->getMessage();
    }
   return $user;
}