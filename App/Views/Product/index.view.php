<?php /** @var Array $data */

use App\Config\Configuration; ?>

<div class="wrapper">
    <div class="row">
        <div class="col">
            <p> <?= $data['product']->productType ?> </p>
            <h2 class="subtitle"><?= $data['product']->productName ?></h2>
            <h3 class="subsubtitle"><?= $data['company']->companyName ?></h3>
            <br>
            <br>
            <h1><?= $data['product']->productPrice ?> €</h1>
            <p>
                <br>
                <br>
                <?= $data['product']->productDescription ?>
            </p>
        </div>
        <div class="col">
            <img class="productPosition" src="<?= Configuration::IMAGES_PATH . $data['product']->productImage ?>">
        </div>
    </div>
    <?php if (\App\Auth::isLogged()) { ?>
    <div class="button-profile">
        <a class="button hov" href="?c=product&a=saveProduct&id=<?= $data['product']->id ?>">Upraviť produkt</a>
        <a class="button hov" href="?c=product&a=deleteProduct&id=<?= $data['product']->id ?>">Vymazať produkt</a>
    </div>
    <?php } ?>
    <br>
    <h3 class="subsubtitle">Recenzie <a class="button hov" href="?c=review&a=saveReview&id=<?= $data['product']->id ?>">Pridať recenziu</a></h3>
    <br>
    <div class="review-width">

        <?php if (count($data['reviews']) > 0) { ?>
            <hr class="solid">
            <?php foreach ($data['reviews'] as $review) { ?>

                <p><?= $review->reviewDescription ?></p>
                <p>Hodnotenie produktu: <?= $review->rating ?></p>
                <hr class="solid">
            <?php } ?>
        <?php } else { ?>
            <hr class="solid">
            <p>Tento produkt zatiaľ nemá žiadne recenzie.</p>
        <?php } ?>
    </div>
</div>