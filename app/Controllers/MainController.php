<?php

namespace App\Controllers;

use App\Models\Category;

class MainController extends CoreController
{
    public function home()
    {
        $categories = Category::findAllHomepage();

        // $products = Products::findAllHomePage();

        $this->show('main/home', [
            'categories' => $categories,
            // 'products' => $products
        ]);
    }
}