<?php

namespace App\Controllers;

class MainController extends CoreController
{
    public function home()
    {
        $categories = Category::findAllHomePage();

        $products = Products::findAllHomePage();

        $this->show('main/home', [
            'categories' => $categories,
            'products' => $products
        ]);
    }
}