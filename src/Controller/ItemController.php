<?php

namespace Controller;

use Model\ItemManager;
use Model\Item;


class ItemController extends AbstractController
{


    public function index()
    {

        $itemManager = new ItemManager($this->pdo);
        $items = $itemManager->selectAll();
        return $this->twig->render('Item/item.html.twig', ['items' => $items]);
    }

    public function show(int $id)
    {
        $itemManager = new ItemManager($this->pdo);
        $item = $itemManager->selectOneById($id);

        return $this->twig->render('Item/itemOne.html.twig', ['item' => $item]);
    }

    public function add()
    {
        if (!empty($_POST)) {


            $this->validator->sendData($_POST);
            $this->validator->isAlpha('title');
            $this->validator->isNotEmpty('title');

            // Si il n'y as pas d'erreurs
            if (empty($this->validator->getErrors())){

                $item = new Item();
                $item->setTitle($_POST['title']);
                $itemManager = new ItemManager($this->pdo);
                $itemManager->insert($item);
                header('Location: /');
                exit();

            }else {
                foreach ($this->validator->getErrors() as $error){
                    echo $error;
                }

                // $this->validator->getErrors();

            }

        }
        // le formulaire HTML est affiché (vue à créer)
        return $this->twig->render('Item/add.html.twig');
    }

    public function deleteItem(int $id)
    {
        $itemManager = new ItemManager($this->pdo);
        $deleteItem = $itemManager->delete($id);
    }

    public function editItem(int $id): string
    {
        $itemManager = new ItemManager($this->pdo);
        $item = $itemManager->selectOneById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $this->validator->sendData($_POST);
            $this->validator->isAlpha('title');
            $this->validator->isNotEmpty('title');

            if (empty($this->validator->getErrors())){
                $item->setTitle($_POST['title']);
                $itemManager->update($item);
                header('location: /');
            }
            else {
                foreach ($this->validator->getErrors() as $error) {
                    echo $error;
                }
            }
        }
        return $this->twig->render('Item/edit.html.twig', ['item' => $item]);
    }


}
