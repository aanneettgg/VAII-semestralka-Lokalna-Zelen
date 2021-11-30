<?php /** @var Array $data */ ?>
<div class="wrapper">
    <h2 class="subtitle">Váš profil</h2>
    <div class="container">
        <form method="post" action="?c=user&a=updateUser&id">
            <input type="hidden" name="id" value="<?= $data['user']->id ?? 0 ?>">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Používateľské meno</label>
                <input type="text" class="form-control" name="username" maxlength="10" placeholder="Používateľské meno" value="<?= $data['user']->username ?? "" ?>">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Meno</label>
                <input type="text" class="form-control" name="name" maxlength="20" placeholder="Meno" value="<?= $data['user']->name ?? "" ?>">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Priezvisko</label>
                <input type="text" class="form-control" name="surname" maxlength="30" placeholder="Priezvisko" value="<?= $data['user']->surname ?? "" ?>">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Heslo</label>
                <input type="password" class="form-control" name="password" maxlength="15" placeholder="Heslo" value="<?= $data['user']->password ?? "" ?>">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" maxlength="30" placeholder="Email" value="<?= $data['user']->email ?? "" ?>">
            </div>
            <div class="mb-3">
                <input type="submit" class="form-control button" value="Uložiť zmeny">
            </div>
        </form>
    </div>
</div>