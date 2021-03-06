<?php /** @var Array $data */ ?>

<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 offset-sm-4">
                <?php if ($data['error'] != "") { ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <?= $data['error'] ?>
                    </div>
                <?php } ?>
                <form method="post" action="?c=auth&a=login">
                    <div class="mb-3">
                        <label for="login" class="form-label">Používateľské meno</label>
                        <input type="text" class="form-control" name="login" id="login" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Heslo</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="form-control button" value="Prihlásiť">
                    </div>
                    <div class="mb-3">
                        <p>Nie ste zaregistrovaný? Kliknite <a href="?c=auth&a=registrationForm">tu</a>.</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>