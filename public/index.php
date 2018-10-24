<?php
/*
$controller = new \Controller\ItemController();

$controller->index();*/

// Chargement de toutes les classes
require __DIR__ . '/../vendor/autoload.php';

// Chargement de toutes la configurations
require __DIR__ . '/../app/config.php';

// Connexion à la base de données
require __DIR__ . '/../app/db.php';

// Appel des routes
require __DIR__ . '/../app/dispatcher.php';

