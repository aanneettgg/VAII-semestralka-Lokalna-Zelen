<?php

namespace App\Models;

class Review extends \App\Core\Model
{
    public function __construct(
        public int $id = 0,
        public int $productId = 0,
        public string $reviewDescription = "",
        public int $rating = 0,
        public int $likes = 0
    )
    {
    }

    static public function setDbColumns()
    {
        return ['id', 'productId', 'reviewDescription', 'rating', 'likes'];
    }

    static public function setTableName()
    {
        return "review";
    }

}