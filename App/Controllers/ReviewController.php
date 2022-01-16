<?php

namespace App\Controllers;

use App\Config\Configuration;
use App\Models\Product;
use App\Models\Review;
use App\Validation;

class ReviewController extends AControllerRedirect
{

    public function index()
    {
        // TODO: Implement index() method.
    }

    public function createReview()
    {
        $review = new Review;

        $review = $this->setReviewValues($review);

        $review->save();
        $this->redirect('product', 'index', ['id' => $review->productId]);
    }

    public function saveReview()
    {
        $product = Product::getOne($this->request()->getValue('id'));
        return $this->html(
            [
                'error' => $this->request()->getValue('error'),
                'product' => $product
            ]
        );
    }


    private function setReviewValues($review)
    {
        $review->productId = Validation::test_input($this->request()->getValue('productId'));
        $review->reviewDescription = Validation::test_input($this->request()->getValue('reviewDescription'));
        $review->rating = Validation::test_input($this->request()->getValue('rating'));

        return $review;
    }
}