<?php /** @var Array $data */ ?>

<?php use App\Config\Configuration; ?>

<div class="wrapper">
    <div class="filter">
        <select class="form-select" name="productTypeFilter" id="productTypeFilter" aria-label="Default select example">
            <option selected>Vyberte filter produktov</option>
            <option value="Všetko">Všetko</option>
            <option value="Potraviny">Potraviny</option>
            <option value="Kozmetika">Kozmetika</option>
            <option value="Oblečenie">Oblečenie</option>
            <option value="Ručné práce">Ručné práce</option>
            <option value="Iné">Iné</option>
        </select>
        <br>
        <br>
    </div>
    <div class="card-background row">
        <?php if (\App\Auth::isLogged()) { ?>
            <div class="card col-sm-12 col-md-6 col-lg-3">
                <a href="?c=product&a=saveProduct">
                    <img src=" <?= Configuration::IMAGES_PATH . "plus.png" ?>" alt="Avatar" style="width:100%">
                    <div class="container link-decoration">
                        <h4 class="subsubtitle"><b>Pridať produkt</b></h4>
                    </div>
                </a>
            </div>
        <?php } ?>

        <?php foreach ($data['companies'] as $company) { ?>
            <?php foreach ($data['products'] as $product) { ?>
                    <?php if ((!\App\Auth::isLogged() && $product->companyId == $company->id ?? -1) || (\App\Auth::isLogged() && $product->companyId == $company->id ?? -1)) { ?>
                        <div class="card col-sm-12 col-md-6 col-lg-3">
                            <a href="?c=product&a=index&id=<?= $product->id?>">
                                <img src=" <?= Configuration::IMAGES_PATH . $product->productImage ?>" alt="Avatar" style="width:100%">
                                <div class="container link-decoration">
                                    <h4 class="subsubtitle"><b><?= $product->productName ?></b></h4>
                                    <p class="ellipsis"><?= $product->productDescription ?></p>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>
</div>