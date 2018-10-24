<?php
/**
 * Created by PhpStorm.
 * User: camilo
 * Date: 08/10/18
 * Time: 18:05
 */

namespace Controller;

use Model\CategoryManager;
use Model\Category;

class CategoryController extends AbstractController
{

    public function index()
    {

        $categoryManager = new CategoryManager($this->pdo);
        $categories = $categoryManager->selectAll();
        return $this->twig->render('Category/categories.html.twig', ['categories' => $categories]);
    }

    public function showCategory(int $id)
    {
        $categoryManager = new CategoryManager($this->pdo);
        $category = $categoryManager->selectOneById($id);

        return $this->twig->render('Category/category.html.twig', ['category' => $category]);

    }

    public function addCategory()
    {
        if (!empty($_POST)) {


            $this->validator->sendData($_POST);
            $this->validator->isAlpha('name');
            $this->validator->isNotEmpty('name');

            // Si il n'y as pas d'erreurs
            if (empty($this->validator->getErrors())){

                $category = new Category();
                $category->setName($_POST['name']);
                $categoryManager = new CategoryManager($this->pdo);
                $categoryManager->insertCategory($category);
                header('Location: /');
                exit();

            }else {
                foreach ($this->validator->getErrors() as $error){
                    echo $error;
                }
            }

        }
        // le formulaire HTML est affiché (vue à créer)
        return $this->twig->render('Category/addCategory.html.twig');
    }


    public function deleteCategory(int $id)
    {
        $categoryManager = new CategoryManager($this->pdo);
        $deleteCategory = $categoryManager->deleteCategory($id);
    }

    public function editCategory(int $id): string
    {
        $categoryManager = new CategoryManager($this->pdo);
        $category = $categoryManager->selectOneById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $this->validator->sendData($_POST);
            $this->validator->isAlpha('name');
            $this->validator->isNotEmpty('name');

            if (empty($this->validator->getErrors())){

                $category->setName($_POST['name']);
                $categoryManager->updateCategory($category);
                header('location: /categories');
            }
            else{
                foreach ($this->validator->getErrors() as $error) {
                    echo $error;
                }
            }
        }
        return $this->twig->render('Category/editCategory.html.twig', ['category' => $category]);
    }
}
