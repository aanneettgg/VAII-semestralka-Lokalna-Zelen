<?php /** @var Array $data */ ?>

<?php use App\Config\Configuration; ?>

<div class="wrapper">

    <div class="card-background row">
        <?php foreach ($data['companies'] as $company) { ?>
        <div class="card col-sm-12 col-md-6 col-lg-3">
            <img src=" <?= Configuration::IMAGES_PATH . $company->companyImage ?>" alt="Avatar" style="width:100%">
            <div class="container">
                <h4 class="subsubtitle"><b><?= $company->companyName ?></b></h4>
                <p><?= $company->companyDescription ?></p>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
