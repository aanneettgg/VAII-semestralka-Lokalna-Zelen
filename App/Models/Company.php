<?php

namespace App\Models;

class Company extends \App\Core\Model
{
    public function __construct(
        public int    $id = 0,
        public string $companyName = "",
        public string $companyDescription = "",
        public string $companyImage = ""
    )
    {
    }

    static public function setDbColumns()
    {
        return ['id', 'companyName', 'companyDescription', 'companyImage'];
    }

    static public function setTableName()
    {
        return "company";
    }

}