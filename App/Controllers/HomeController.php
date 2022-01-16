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
        $filter = $this->request()->getValue('productTypeFilter');
        if ($filter == 'Všetko' || $filter == null)
        {
            $products = Product::getAll();
        }
        else
        {
            $products = Product::getAll('productType = ?', [$filter]);
        }

        if (isset($_SESSION["id"]))
        {
            $companies = Company::getAll("userId = ?", [$_SESSION["id"]]);
        }
        else
        {
            $companies = Company::getAll();
        }

        return $this->html(
            [
                'products' => $products,
                'companies' => $companies
            ]
        );
    }

    public function dropdownCompanyName()
    {
        $companyName = '%' . $this->request()->getValue('companyName') . '%';
        $companies = Company::getAll('companyName LIKE ?', [$companyName]);

        return $this->json($companies);
    }

    public function partners()
    {
        $companies = Company::getAll();

        return $this->html(
            [
                'companies' => $companies
            ]);
    }
}