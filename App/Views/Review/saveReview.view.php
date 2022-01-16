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
            <h2 class="subtitle">Nová recenzia</h2>
            <form method="post" action="?c=review&a=createReview">
                <input type="hidden" name="productId" value="<?= $data['product']->id ?>">
                <div class="mb-3">
                    <label for="reviewDescription" class="form-label">Popis</label>
                    <input type="text" class="form-control" name="reviewDescription" id="reviewDescription" maxlength="1000" placeholder="Popis" required>
                </div>
                <div class="mb-3">
                    <label for="rating" class="form-label">Hodnotenie (1 - 5)</label>
                    <input type="number" class="form-control" name="rating" id="rating" min="1" max="5" placeholder="Hodnotenie produktu" required>
                </div>
                <div class="mb-3">
                    <input type="submit" class="form-control button" id="submit" value="Pridať">
                </div>
            </form>
        </div>
    </div>
</div>