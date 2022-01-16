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
                    <label for="productName" class="form-label">Názov produktu</label>
                    <input type="text" class="form-control" name="productName" id="productName" value="<?= $data['product']->productName ?? "" ?>" maxlength="30" placeholder="Názov produktu" required>
                </div>
                <div class="mb-3">
                    <label for="productType" class="form-label">Typ produktu</label>
                    <select class="form-select" name="productType" id="productType" aria-label="Default select example" required>
                        <option value="" disabled selected hidden><?= $data['product']->productType ?? "Vyberte typ produktu" ?></option>
                        <option value="Potraviny">Potraviny</option>
                        <option value="Kozmetika">Kozmetika</option>
                        <option value="Oblečenie">Oblečenie</option>
                        <option value="Ručné práce">Ručné práce</option>
                        <option value="Iné">Iné</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="productPrice" class="form-label">Cena produktu</label>
                    <input type="text" class="form-control" id="productPrice" onkeyup="validateNumber()" name="productPrice" value="<?= $data['product']->productPrice ?? "" ?>" maxlength="30" placeholder="Cena produktu" required>
                    <div id="errorNumber"></div>
                </div>
                <div class="mb-3">
                    <label for="companyName" class="form-label">Názov prislúchajúcej firmy</label>
                    <input type="text" class="form-control" id="companyName" name="companyName" value="<?= $data['company']->companyName ?? "" ?>" maxlength="30" placeholder="Názov firmy" autocomplete="off" required>
                    <ul class="dropdown-menu" id="dropdownMenu" aria-labelledby="dropdownMenu"></ul>
                </div>
                <div class="mb-3">
                    <label for="productDescription" class="form-label">Popis produktu</label>
                    <input type="text" class="form-control" name="productDescription" id="productDescription" value="<?= $data['product']->productDescription ?? "" ?>" maxlength="500" placeholder="Popis produktu" required>
                </div>
                <div class="mb-3">
                    <label for="productImage" class="form-label">Obrázok produktu</label>
                    <input type="file" class="form-control" name="productImage" id="productImage">
                </div>
                <div class="mb-3 mobile-submit">
                    <input type="submit" class="form-control button" id="submit" value="Ulož">
                </div>
            </form>
        </div>
    </div>
</div>