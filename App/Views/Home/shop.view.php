<?php /** @var Array $data */ ?>

<?php use App\Config\Configuration; ?>

<div class="wrapper">

    <div class="card-background row">
        <?php foreach ($data['products'] as $product) { ?>
        <div class="card col-sm-12 col-md-6 col-lg-3">
            <img src="<?= Configuration::IMAGES_PATH . $product->productImage ?>" alt="Avatar" style="width:100%">
            <div class="container">
                <h4 class="subsubtitle"><b><?= $product->productName ?></b></h4>
                <p><?= $product->productDescription ?></p>
            </div>
        </div>
        <?php } ?>
    </div>
</div>