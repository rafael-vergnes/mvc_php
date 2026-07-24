<?php

function create_book(array $book): int {
    try {
        //1 Ecrire la requête
        $sql = "INSERT INTO book(title, summary, author, published_at, category_id)
        VALUE(?,?,?,?,?)";
        //2 Connection à la BDD
        $bdd = connect_bdd();
        //3 Préparer la requête
        $request = $bdd->prepare($sql);
        //4 Assigner les paramètres
        $request->bindValue(1, $book["title"], PDO::PARAM_STR);
        $request->bindValue(2, $book["summary"], PDO::PARAM_STR);
        $request->bindValue(3, $book["author"], PDO::PARAM_STR);
        $request->bindValue(4, $book["published_at"], PDO::PARAM_STR);
        $request->bindValue(5, $book["category_id"], PDO::PARAM_INT);
        //5 Exécuter la requête
        $request->execute();
        //Récupérer l'id de l'enregistrement
        $id = $bdd->lastInsertId();
    } catch(Exception $e) {
        echo $e->getMessage();
    }
    return $id ?? 0;
}