<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Models\Company;
use App\Models\Product;
use App\Models\User;

/**
 * Class HomeController
 * Example of simple controller
 * @package App\Controllers
 */
class HomeController extends AControllerBase
{

    public function index()
    {
        return $this->html();
    }

    public function contact()
    {
        return $this->html();
    }

    public function about()
    {
        return $this->html();
    }

    public function shop()
    {
        $products = Product::getAll();
        $companies = Company::getAll("userId = ?", [$_SESSION["id"]]);

        return $this->html(
            [
                'products' => $products,
                'companies' => $companies
            ]
        );
    }

    public function partners()
    {
        $companies = Company::getAll();
        $user = User::getOne($_SESSION["id"]);

        return $this->html(
            [
                'companies' => $companies,
                'user' =>$user
            ]);
    }
}