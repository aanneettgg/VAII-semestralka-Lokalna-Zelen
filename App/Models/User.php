<?php

namespace App\Models;

class User extends \App\Core\Model
{
    public function __construct(
        public int $id = 0,
        public ?string $username = null,
        public ?string $name = null,
        public ?string $surname = null,
        public ?string $password = null,
        public ?string $email = null
    )
    {
    }

    static public function setDbColumns()
    {
        return ['id','username', 'name', 'surname', 'password','email'];
    }

    static public function setTableName()
    {
        return "user";
    }

}