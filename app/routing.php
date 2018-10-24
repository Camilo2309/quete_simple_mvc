<?php
// routing.php
$routes = [
    'Item' => [ // Controller
        ['index', '/', 'GET'], // action, url, HTTP method
        ['add', '/item/add', ['GET', 'POST']],  // action, url, HTTP method
        ['show', '/item/{id}', 'GET'], // action, url, HTTP method
        ['deleteItem', '/item/delete/{id:\d+}', 'GET'], // action, url, method
        ['editItem', '/item/edit/{id:\d+}', ['GET', 'POST']],

    ],
    'Category' => [
        ['index', '/categories', 'GET'],
        ['addCategory', '/category/add', ['GET', 'POST']],  // action, url, HTTP method
        ['showCategory', '/category/{id}', 'GET'],
        ['deleteCategory', '/category/delete/{id:\d+}', 'GET'], // action, url, method
        ['editCategory', '/category/edit/{id:\d+}', ['GET', 'POST']],
    ],
];