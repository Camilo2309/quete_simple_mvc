<?php
/**
 * Created by PhpStorm.
 * User: camilo
 * Date: 08/10/18
 * Time: 18:05
 */

namespace Controller;

use Model\CategoryManager;

class CategoryController
{
    public function index()
    {

        $categoryManager = new CategoryManager();
        $categories = $categoryManager->selectAllCategories();
        require __DIR__ . '/../View/Category/category.php';
    }
    public function show(int $id)
    {
        $categoryManager = new CategoryManager();
        $category = $categoryManager->selectOneCategory($id);

        require __DIR__ . '/../View/Category/show.php';
    }
}