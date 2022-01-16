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
            <form method="post" action="?c=company&a=createCompany" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $data['company']->id ?? ""?>">
                <div class="mb-3">
                    <label for="companyName" class="form-label">Názov firmy</label>
                    <input type="text" class="form-control" name="companyName" id="companyName" value="<?= $data['company']->companyName ?? "" ?>" maxlength="30" placeholder="Názov firmy" required>
                </div>
                <div class="mb-3">
                    <label for="companyDescription" class="form-label">Popis firmy</label>
                    <input type="text" class="form-control" name="companyDescription" id="companyDescription" value="<?= $data['company']->companyDescription ?? "" ?>" maxlength="500" placeholder="Popis firmy" required>
                </div>
                <div class="mb-3">
                    <label for="companyImage" class="form-label">Logo firmy</label>
                    <input type="file" class="form-control" name="companyImage" id="companyImage">
                </div>
                <div class="mb-3">
                    <input type="submit" class="form-control button" id="submit" value="Ulož">
                </div>
            </form>
        </div>
    </div>
</div>