<?php

use App\Controllers\MainController;

require_once '../vendor/autoload.php';

// session_start();

$router = new AltoRouter();

if (array_key_exists('BASE_URI', $_SERVER)) {
    $router->setBasePath($_SERVER['BASE_URI']);
} else {
    $_SERVER['BASE_URI'] = '/';
}

$router->map(
    'GET',
    '/',
    [
        'method' => 'home',
        'controller' => MainController::class
    ],
    'main-home'
);


//? #Region "Category"

    // Route pour afficher le formulaire de gestion des catégories
    $router->map(
        'GET',
        '/category/manage',
        [
            'method' => 'homeDisplay',
            'controller' => CategoryController::class       
        ],
        'category-manage'
    );

    // Route pour faire le traitement le formulaire de gestion des catégories
    $router->map(
        'POST',
        '/category/manage',
        [
            'method' => 'homeSelect',
            'controller' => CategoryController::class      
        ],
        'category-select'
    );

    $router->map(
        'GET',
        '/category/list',
        [
            'method' => 'listCategories',
            'controller' => CategoryController::class
        ],
        'category-list'
    );

    // Route pour afficher le formulaire d'ajout d'une catégorie
    $router->map(
        'GET',
        '/category/add-update',
        [
            'method' => 'addCategory',
            'controller' => CategoryController::class
        ],
        'category-add'
    );

    // Route pour faire le traitement du formulaire et créer une nouvelle catégorie
    $router->map(
        'POST',
        '/category/add-update',
        [
            'method' => 'createOrUpdateCategory',
            'controller' => CategoryController::class
        ],
        'category-create'
    );

    // Route pour afficher le formulaire de modification d'une catégorie
    $router->map(
        'GET',
        '/category/add-update/[i:id]',
        [
            'method' => 'editCategory',
            'controller' => CategoryController::class
        ],
        'category-edit'
    );

    // Route pour faire le traitement du formulaire et créer une nouvelle catégorie
    $router->map(
        'POST',
        '/category/add-update/[i:id]',
        [
            'method' => 'createOrUpdateCategory',
            'controller' => CategoryController::class
        ],
        'category-update'
    );

    $router->map(
        'GET',
        '/category/[i:id]/delete',
        [
        'method' => 'delete',
        'controller' => CategoryController::class
        ],
        'category-delete'
    );
//? #End Region

// //? #Region "Product"
//     $router->map(
//         'GET',
//         '/product/list',
//         [
//             'method' => 'listProducts',
//             'controller' => ProductController::class
//         ],
//         'product-list'
//     );

//     // Affichage du form
//     $router->map(
//         'GET',
//         '/product/add-update',
//         [
//             'method' => 'addProduct',
//             'controller' => ProductController::class
//         ],
//         'product-add'
//     );

//     // Traitement du form
//     $router->map(
//         'POST',
//         '/product/add-update',
//         [
//             'method' => 'createOrUpdateProduct',
//             'controller' => ProductController::class
//         ],
//         'product-create'
//     );

//     // Route pour afficher le formulaire de modification d'un produit
//     $router->map(
//         'GET',
//         '/product/add-update/[i:id]',
//         [
//             'method' => 'editProduct',
//             'controller' => ProductController::class
//         ],
//         'product-edit'
//     );

//     // Route pour faire le traitement du formulaire et créer un nouveau produit
//     $router->map(
//         'POST',
//         '/product/add-update/[i:id]',
//         [
//             'method' => 'createOrUpdateProduct',
//             'controller' => ProductController::class
//         ],
//         'product-update'
//     );

//     $router->map(
//         'GET',
//         '/product/[i:id]/delete',
//         [
//         'method' => 'delete',
//         'controller' => ProductController::class
//         ],
//         'product-delete'
//     );
// //? #End Region

// //? #Region "User"
//     // Affichage du form user
//     $router->map(
//         'GET',
//         '/user/login',
//         [
//             'method' => 'login',
//             'controller' => AppUserController::class
//         ],
//         'user-login'
//     );

//     // Traitement du form user
//     $router->map(
//         'POST',
//         '/user/login',
//         [
//             'method' => 'loginUser',
//             'controller' => AppUserController::class
//         ],
//         'user-check'
//     );

//     // Affichage de la liste des user
//     $router->map(
//         'GET',
//         '/user/user-list',
//         [
//             'method' => 'userList',
//             'controller' => AppUserController::class
//         ],
//         'user-list'
//     );

//     $router->map(
//         'GET',
//         '/user/add-update',
//         [
//             'method' => 'addUser',
//             'controller' => AppUserController::class
//         ],
//         'user-add'
//     );

//     // Traitement du form
//     $router->map(
//         'POST',
//         '/user/add-update',
//         [
//             'method' => 'createOrUpdateUser',
//             'controller' => AppUserController::class
//         ],
//         'user-create'
//     );

//     $router->map(
//         'GET',
//         '/user/add-update/[i:id]',
//         [
//             'method' => 'editUser',
//             'controller' => AppUserController::class
//         ],
//         'user-edit'
//     );

//     $router->map(
//         'GET',
//         '/user/add-update/[i:id]',
//         [
//             'method' => 'createOrUpdateUser',
//             'controller' => AppUserController::class
//         ],
//         'user-update'
//     );

//     $router->map(
//         'GET',
//         '/user/logout',
//         [
//             'method' => 'logoutUser',
//             'controller' => AppUserController::class
//         ],
//         'user-logout'
//     );
// //? #End Region

/* -------------
--- DISPATCH ---
--------------*/

// On demande à AltoRouter de trouver une route qui correspond à l'URL courante
$match = $router->match();

//dump($match);

// Ensuite, pour dispatcher le code dans la bonne méthode, du bon Controller
// On délègue à une librairie externe : https://packagist.org/packages/benoclock/alto-dispatcher
// 1er argument : la variable $match retournée par AltoRouter
// 2e argument : le "target" (controller & méthode) pour afficher la page 404
$dispatcher = new Dispatcher($match, '\App\Controllers\ErrorController::err404');
// Une fois le "dispatcher" configuré, on lance le dispatch qui va exécuter la méthode du controller
$dispatcher->dispatch();
