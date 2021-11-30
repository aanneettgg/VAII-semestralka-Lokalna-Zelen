<?php /** @var Array $data */ ?>
<div class="wrapper">
    <div class="container">
        <h2 class="subtitle">Váš profil</h2>
        <h3 class="subsubtitle">Používateľské meno</h3>
        <p class="contact">
            <?= $data['user']->username ?>
        </p>
        <h3 class="subsubtitle">Heslo</h3>
        <p class="contact">
            <?= $data['user']->password ?>
        </p>
        <h3 class="subsubtitle">Meno</h3>
        <p class="contact">
            <?= $data['user']->name ?>
        </p>
        <h3 class="subsubtitle">Priezvisko</h3>
        <p class="contact">
            <?= $data['user']->surname ?>
        </p>
        <h3 class="subsubtitle">Email</h3>
        <p class="contact">
            <?= $data['user']->email ?>
        </p>
        <div class="button-profile">
            <a href="?c=user&a=update" class="button hov">
                Upraviť profil
            </a>
            <a href="?c=user&a=deleteUser&id=<?= $data['user']->id ?>" class="button hov">
                Vymazať profil
            </a>
        </div>
    </div>

</div>
