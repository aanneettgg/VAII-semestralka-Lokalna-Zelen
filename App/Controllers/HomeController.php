<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Models\Company;

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
        return $this->html();
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