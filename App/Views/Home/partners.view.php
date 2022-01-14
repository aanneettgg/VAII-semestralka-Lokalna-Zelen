<?php /** @var Array $data */ ?>

<?php use App\Config\Configuration; ?>

<div class="wrapper">

    <div class="card-background row">
        <?php if (\App\Auth::isLogged()) { ?>
            <div class="card col-sm-12 col-md-6 col-lg-3">
                <a href="?c=company&a=saveCompany">
                <img src=" <?= Configuration::IMAGES_PATH . "plus.png" ?>" alt="Avatar" style="width:100%">
                <div class="container">
                    <h4 class="subsubtitle"><b>Pridať partnera</b></h4>
                </div>
                </a>
            </div>

        <?php } ?>
        <?php foreach ($data['companies'] as $company) { ?>
            <?php if (!\App\Auth::isLogged() || \App\Auth::isLogged() && $company->userId == $_SESSION['id'] ?? -1) { ?>
                <div class="card col-sm-12 col-md-6 col-lg-3">
                    <a href="?c=company&a=index&id=<?= $company->id?>">
                        <img src=" <?= Configuration::IMAGES_PATH . $company->companyImage ?>" alt="Avatar" style="width:100%">
                        <div class="container">
                            <h4 class="subsubtitle"><b><?= $company->companyName ?></b></h4>
                            <p class="ellipsis"><?= $company->companyDescription ?></p>
                        </div>
                    </a>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</div>
