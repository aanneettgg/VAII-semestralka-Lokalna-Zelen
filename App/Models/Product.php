<?php

namespace App\Models;

class Product extends \App\Core\Model
{
    public function __construct(
        public int $id = 0,
        public int $companyId = 0,
        public string $productName = "",
        public string $productType = "",
        public string $productPrice = "",
        public string $productDescription = "",
        public string $productImage = ""
    )
    {
    }

    static public function setDbColumns()
    {
        return ['id', 'companyId', 'productName', 'productType', 'productPrice', 'productDescription', 'productImage'];
    }

    static public function setTableName()
    {
        return "product";
    }

}