<?php /** @var Array $data */

use App\Config\Configuration; ?>

<div class="wrapper">
    <div class="row">
        <div class="col">
            <h2 class="subtitle"><?= $data['company']->companyName ?></h2>
            <p>
                <br>
                <br>
                <?= $data['company']->companyDescription ?>
            </p>
        </div>
        <div class="col">
            <img class="productPosition" src="<?= Configuration::IMAGES_PATH . $data['company']->companyImage ?>">
        </div>
    </div>
    <?php if (\App\Auth::isLogged()) { ?>
        <div class="button-profile">
            <a class="button hov" href="?c=company&a=saveCompany&id=<?= $data['company']->id ?>">Upraviť firmu</a>
            <a class="button hov" href="?c=company&a=deleteCompany&id=<?= $data['company']->id ?>">Vymazať firmu</a>
        </div>
    <?php } ?>
</div>