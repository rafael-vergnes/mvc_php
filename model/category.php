<?php

//méthode pour ajouter une categorie
function create_category(array $category): void {
    try {
        //1 écrire la requête
        $sql = "INSERT INTO category(category_name) VALUE(?)";
        //2 se connecter à la BDD
        $bdd = connect_bdd();
        //3 préparer la requête
        $request = $bdd->prepare($sql);
        //4 assigner le paramètre
        $request->bindValue(1, $category["category_name"], PDO::PARAM_STR);
        //5 exécuter la requête 
        $request->execute();       
    } catch(Exception $e) {
        echo $e->getMessage();
    }
}

//méthode qui test si la category existe
function is_category_exists(string $category): bool {
    try {
        //1 écrire la requête
        $sql = "SELECT c.id FROM category AS c WHERE c.category_name = ?";
        //2 se connecter à la BDD
        $bdd = connect_bdd();
        //3 préparer la requête
        $request = $bdd->prepare($sql);
        //4 assigner le paramètre
        $request->bindValue(1, $category, PDO::PARAM_STR);
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