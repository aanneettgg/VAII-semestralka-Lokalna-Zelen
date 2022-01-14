<?php /** @var Array $data */ ?>

<div class="wrapper">
    <div class="container">
        <div class="col-sm-4 offset-sm-4">
            <?php if ($data['error'] != "") { ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <?= $data['error'] ?>
                </div>
            <?php } ?>
            <form method="post" action="?c=product&a=createProduct" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $data['product']->id ?? "" ?>">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Názov produktu</label>
                    <input type="text" class="form-control" name="productName" value="<?= $data['product']->productName ?? "" ?>" maxlength="30" placeholder="Názov produktu" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Typ produktu</label>
                    <input type="text" class="form-control" name="productType" value="<?= $data['product']->productType ?? "" ?>" maxlength="30" placeholder="Typ produktu" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Cena produktu</label>
                    <input type="text" class="form-control" id="productPrice" onkeyup="validateNumber()" name="productPrice" value="<?= $data['product']->productPrice ?? "" ?>" maxlength="30" placeholder="Cena produktu" required>
                    <div id="errorNumber"></div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Názov prislúchajúcej firmy</label>
                    <input type="text" class="form-control" name="companyName" value="<?= $data['company']->companyName ?? "" ?>" maxlength="30" placeholder="Názov firmy" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Popis produktu</label>
                    <input type="text" class="form-control" name="productDescription" value="<?= $data['product']->productDescription ?? "" ?>" maxlength="500" placeholder="Popis produktu" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Obrázok produktu</label>
                    <input type="file" class="form-control" name="productImage" value="<?= $data['product']->productImage ?? "" ?>">
                </div>
                <div class="mb-3">
                    <input type="submit" class="form-control button" id="submit" value="Ulož">
                </div>
            </form>
        </div>
    </div>
</div>