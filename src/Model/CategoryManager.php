<?php
/**
 * Created by PhpStorm.
 * User: camilo
 * Date: 08/10/18
 * Time: 18:19
 */

namespace Model;


class CategoryManager extends AbstractManager
{

    const TABLE = 'category';


    public function __construct(\PDO $pdo)
    {
        parent::__construct(self::TABLE, $pdo);
    }


    public function insertCategory(Category $category): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`name`) VALUES (:name)");
        $statement->bindValue('name', $category->getName(), \PDO::PARAM_STR);
        if ($statement->execute()) {
            return $this->pdo->lastInsertId();
        }
    }

    public function deleteCategory($id)
    {
        $statement = $this->pdo->prepare("DELETE FROM $this->table WHERE id = :id");
        $statement->execute([':id'=> $id]);

        return header('Location: ' .  $_SERVER['HTTP_REFERER']);
    }

    public function updateCategory(Category $category):int
    {

        // prepared request
        $statement = $this->pdo->prepare("UPDATE $this->table SET `name` = :name WHERE id=:id");
        $statement->bindValue('id', $category->getId(), \PDO::PARAM_INT);
        $statement->bindValue('name', $category->getName(), \PDO::PARAM_STR);


        return $statement->execute();
    }
}