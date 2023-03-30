<?php

namespace App\Controllers;

class CoreController
{
    public function show(string $viewName, $viewData = [])
    {
        global $router; //TODO !!!!!!!

        $viewData['currentPage'] = $viewName;

        $viewData['assetsBaseUri'] = $_SERVER['BASE_URI'] . 'assets/';

        $viewData['baseUri'] = $_SERVER['BASE_URI'];

        extract($viewData);

        require_once __DIR__ . '/../views/layout/header.tpl.php';
        require_once __DIR__ . "/../views/{$viewName}.tpl.php";
        require_once __DIR__ . '/../views/layout/header.tpl.php';

    }
}