<!DOCTYPE html>
<html>

<head>
    <title>Lokálna zeleň</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/files/style.css">
    <link rel="icon" href="public/files/images/logo.ico" type="image/gif" sizes="150x153">
    <script src="public/files/js/formPage.js"></script>
</head>

<body>

<?php use App\Config\Configuration;

$page = $_GET['a'] ?? ''; ?>

<header>
    <div class="logo">
        <img src="public/files/images/logo.svg">
        <h1 class="title">Lokálna zeleň</h1>
        <?php if (\App\Auth::isLogged()) { ?>
            <div class="button-user">
                <a class="user-profile fa fa-user" href="?c=user&a=profile"></a>
                <a class="button hov" href="?c=auth&a=logout">Odhlásiť sa</a>
            </div>
        <?php } else { ?>
            <a class="button hov" href="<?= Configuration::LOGIN_URL ?>">Prihlásiť sa</a>
        <?php } ?>
    </div>

    <nav>
        <div class="navbar1" id="navbar">
            <a class="navbar-options hov <?php if($page == '' ){ echo ' current-page"';}?>" href="?c=home&a=index">Domov</a>
            <a class="navbar-options hov <?php if($page == 'about'){ echo ' current-page"';}?>" href="?c=home&a=about">O nás</a>
            <a class="navbar-options hov <?php if($page == 'shop'){ echo ' current-page"';}?>" href="?c=home&a=shop">Obchod</a>
            <a class="navbar-options hov <?php if($page == 'partners'){ echo ' current-page"';}?>" href="?c=home&a=partners">Partneri</a>
            <a class="navbar-options hov <?php if($page == 'contact'){ echo ' current-page"';}?>" href="?c=home&a=contact">Kontakt</a>
            <a href="javascript:void(0);" class="navbar-options navbar-icon index-icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
    </nav>
</header>

<div>
    <?= $contentHTML ?>
</div>

<footer class="footer <?php if($page == 'registrationForm' || $page == 'loginForm' || $page == 'newCompany'){ echo ' footer-bottom"';}?>">
    <ul>
        <a href="https://www.facebook.com/lokalnazelen/" target="_blank"
           class="fa fa-facebook"></a>
        <a href="https://www.instagram.com/lokalna_zelen/" target="_blank"
           class="fa fa-instagram"></a>
    </ul>

    <ul>
        <p class="copyright">©2021 Lokálna zeleň</p>
        <p>Design: Aneta Gábrišová</p>
    </ul>
</footer>

<script>
    function myFunction() {
        var x = document.getElementById("navbar");
        if (x.className === "navbar1") {
            x.className += " responsive";
        } else {
            x.className = "navbar1";
        }
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>