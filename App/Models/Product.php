<?php

namespace App\Models;

class Product extends \App\Core\Model
{
    public function __construct(
        public int $id,
        public int $companyId,
        public string $productName,
        public string $productType,
        public string $productDescription,
        public string $productImage
    )
    {
    }

    static public function setDbColumns()
    {
        return ['id', 'companyId', 'productName', 'productType', 'productDescription', 'productImage'];
    }

    static public function setTableName()
    {
        return "product";
    }

}