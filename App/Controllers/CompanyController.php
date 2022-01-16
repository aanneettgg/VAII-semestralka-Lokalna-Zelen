<?php

namespace App\Controllers;

use App\Auth;
use App\Config\Configuration;
use App\Models\Company;
use App\Validation;

class CompanyController extends AControllerRedirect
{

    public function index()
    {
        $company = Company::getOne($this->request()->getValue('id'));

        return $this->html(
            [
                'company' => $company
            ]
        );
    }

    public function createCompany()
    {
        if (!Auth::isLogged()) {
            $this->redirect("home");
        }

        if($this->request()->getValue('id') == "")
        {
            $company = new Company;
            $companies = Company::getAll();
        }
        else
        {
            $company = Company::getOne($this->request()->getValue('id'));
            $companies = Company::getAll('id <> ?', [$company->id]);
        }

        $isDuplicatedCompanyName = false;
        $isDuplicatedImage = false;

        $company = $this->setCompanyValues($company);

        foreach ($companies as $companyDB)
        {
            if ($companyDB->companyName == $company->companyName)
            {
                $isDuplicatedCompanyName = true;
            }
            if ($companyDB->companyImage == $company->companyImage)
            {
                $isDuplicatedImage = true;
            }
        }
        if ($isDuplicatedCompanyName && $isDuplicatedImage)
        {
            $this->redirect('company', 'saveCompany', ['error' => 'Duplicitný názov firmy a názov obrázka.']);
        }
        else if ($isDuplicatedCompanyName && !$isDuplicatedImage)
        {
            $this->redirect('company', 'saveCompany', ['error' => 'Duplicitný názov firmy.']);
        }
        else if (!$isDuplicatedCompanyName && $isDuplicatedImage)
        {
            $this->redirect('company', 'saveCompany', ['error' => 'Duplicitný názov obrázka.']);
        }
        else
        {
            $company->save();
            $this->redirect('home', 'partners');
        }
    }

    public function deleteCompany()
    {
        if (!Auth::isLogged()) {
            $this->redirect("home");
        }

        $company = Company::getOne($this->request()->getValue('id'));
        unlink(Configuration::IMAGES_PATH . $company->companyImage);
        $company->delete();

        $this->redirect('home', 'partners');
    }

    public function saveCompany()
    {
        if (!Auth::isLogged()) {
            $this->redirect("home");
        }

        if(is_null($this->request()->getValue('id')))
        {
            return $this->html(
                [
                    'error' => $this->request()->getValue('error')
                ]
            );
        }

        $company = Company::getOne($this->request()->getValue('id'));

        return $this->html(
            [
                'error' => $this->request()->getValue('error'),
                'company' => $company
            ]
        );
    }

    private function setCompanyValues($company)
    {
        $company->userId = Validation::test_input($_SESSION["id"]);
        $company->companyName = Validation::test_input($this->request()->getValue('companyName'));
        $company->companyDescription = Validation::test_input($this->request()->getValue('companyDescription'));
        if ( $_FILES['companyImage']['size'] > 0)
        {
            move_uploaded_file($_FILES['companyImage']['tmp_name'], Configuration::IMAGES_PATH . basename($_FILES['companyImage']['name']));
            $company->companyImage = Validation::test_input(basename($_FILES['companyImage']['name']));
        }

        return $company;
    }
}