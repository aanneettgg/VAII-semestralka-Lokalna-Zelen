<?php

namespace App\Controllers;

use App\Auth;
use App\Config\Configuration;
use App\Models\Company;
use App\Models\Product;
use App\Models\Review;
use App\Validation;

class ProductController extends AControllerRedirect
{
    public function index()
    {
        $product = Product::getOne($this->request()->getValue('id'));
        $company = Company::getOne($product->companyId);
        $reviews = Review::getAll('productId = ?', [$product->id]);

        return $this->html(
            [
                'product' => $product,
                'company' => $company,
                'reviews' => $reviews
            ]
        );
    }

    public function createProduct()
    {
        $this->loginValidation();

        if($this->request()->getValue('id') == "")
        {
            $product = new Product();
            $products = Product::getAll();
        }
        else
        {
            $product = Product::getOne($this->request()->getValue('id'));
            $company = Company::getOne($product->companyId);

            if ($_SESSION["id"] != $company->userId)
            {
                $this->redirect('home', 'shop');
                exit();
            }

            $products = Product::getAll('id <> ?', [$product->id]);
        }

        $isDuplicatedProductName = false;
        $isDuplicatedImage = false;

        $product = $this->setCompanyValues($product);

        foreach ($products as $productDB)
        {
            if ($productDB->productName == $product->productName)
            {
                $isDuplicatedProductName = true;
            }
            if ($productDB->productImage == $product->productImage)
            {
                $isDuplicatedImage = true;
            }
        }
        if ($isDuplicatedProductName && $isDuplicatedImage)
        {
            $this->redirect('product', 'saveProduct', ['error' => 'Duplicitný názov produktu a názov obrázka.']);
        }
        else if ($isDuplicatedProductName && !$isDuplicatedImage)
        {
            $this->redirect('product', 'saveProduct', ['error' => 'Duplicitný názov produktu.']);
        }
        else if (!$isDuplicatedProductName && $isDuplicatedImage)
        {
            $this->redirect('product', 'saveProduct', ['error' => 'Duplicitný názov obrázka.']);
        }
        else
        {
            $id = $product->save();
            $this->redirect('product', 'index', ['id' => $id]);
        }
    }

    public function deleteProduct()
    {
        $this->loginValidation();

        $product = Product::getOne($this->request()->getValue('id'));
        $company = Company::getOne($product->companyId);

        if ($_SESSION["id"] != $company->userId)
        {
            $this->redirect('home', 'shop');
            exit();
        }

        $reviews = Review::getAll('productId <> ?', [$product->id]);
        unlink(Configuration::IMAGES_PATH . $product->productImage);
        $product->delete();
        foreach ($reviews as $review)
        {
            $review->delete();
        }

        $this->redirect('home', 'shop');
    }

    public function saveProduct()
    {
        $this->loginValidation();

        if(is_null($this->request()->getValue('id')))
        {
            return $this->html(
                [
                    'error' => $this->request()->getValue('error')
                ]
            );
        }

        $product = Product::getOne($this->request()->getValue('id'));
        $company = Company::getOne($product->companyId);

        if ($_SESSION["id"] != $company->userId)
        {
            $this->redirect('home', 'shop');
            exit();
        }

        return $this->html(
            [
                'error' => $this->request()->getValue('error'),
                'product' => $product,
                'company' => $company
            ]
        );
    }

    private function setCompanyValues($product)
    {
        $company = Company::getAll("companyName = ?", [$this->request()->getValue('companyName')]);
        $product->companyId = Validation::test_input($company[0]->id);
        $product->productType = Validation::test_input($this->request()->getValue('productType'));
        $product->productPrice = Validation::test_input($this->request()->getValue('productPrice'));
        $product->productName = Validation::test_input($this->request()->getValue('productName'));
        $product->productDescription = Validation::test_input($this->request()->getValue('productDescription'));
        if ($_FILES['productImage']['size'] > 0)
        {
            move_uploaded_file($_FILES['productImage']['tmp_name'], Configuration::IMAGES_PATH . basename($_FILES['productImage']['name']));
            $product->productImage = Validation::test_input(basename($_FILES['productImage']['name']));
        }

        return $product;
    }
}