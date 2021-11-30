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
                <form method="post" action="?c=user&a=createUser">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Používateľské meno (maximálne 10 znakov)</label>
                        <input type="text" class="form-control" name="username" maxlength="10" placeholder="Používateľské meno" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Meno</label>
                        <input type="text" class="form-control" name="name" maxlength="20" placeholder="Meno" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Priezvisko</label>
                        <input type="text" class="form-control" name="surname" maxlength="30" placeholder="Priezvisko" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Heslo (aspoň 8 znakov, veľké písmeno a číslo)</label>
                        <input type="password" class="form-control" id="password" onkeyup="validatePassword()" name="password" maxlength="15" placeholder="Heslo" required>
                        <div id="errorLength"></div>
                        <div id="errorUpperCase"></div>
                        <div id="errorNumber"></div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" maxlength="30" placeholder="Email" required>
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="form-control button" id="submit" value="Registrovať sa">
                    </div>
                </form>
            </div>
    </div>
</div>
