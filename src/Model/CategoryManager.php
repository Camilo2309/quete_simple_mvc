<?php
/**
 * Created by PhpStorm.
 * User: camilo
 * Date: 08/10/18
 * Time: 18:19
 */

namespace Model;

require __DIR__ . '/../../app/db.php';

class CategoryManager
{
    //SELECTIONNE TOUTE LES CATÉGORIES
    public function selectAllCategories()
    {
        $pdo = new \PDO(DSN, USER, PASS);
        $query = "SELECT * FROM category"; // NOM DU TABLEAU
        $res = $pdo->query($query);
        return $res->fetchAll();
    }
    // SELECTIONNE UNE SEUL CATÉGORIE
    public function selectOneCategory(int $id) : array
    {
        $pdo = new \PDO(DSN, USER, PASS);
        $query = "SELECT * FROM category WHERE id = :id";
        $statement = $pdo->prepare($query);
        $statement->bindValue(':id', $id, \PDO::PARAM_INT);
        $statement->execute();
        // contrairement à fetchAll(), fetch() ne renvoie qu'un seul résultat
        return $statement->fetch();
    }
}