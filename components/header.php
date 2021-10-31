<?php $page = basename($_SERVER['PHP_SELF']); ?>

<header>
        <div class="logo">
            <img src="images/logo.svg">
            <h1 class="title">Lokálna zeleň</h1>
            <button class="button hov" type="button">Prihlásiť sa</button>
        </div>
        
        <nav>
            <div class="navbar1" id="navbar">
                <a class="navbar-options hov <?php if($page == 'index.php'){ echo ' current-page"';}?>" href="index.php">Domov</a>
                <a class="navbar-options hov <?php if($page == 'o-nas.php'){ echo ' current-page"';}?>" href="o-nas.php">O nás</a>
                <a class="navbar-options hov <?php if($page == 'obchod.php'){ echo ' current-page"';}?>" href="obchod.php">Obchod</a>
                <a class="navbar-options hov <?php if($page == 'partneri.php'){ echo ' current-page"';}?>" href="partneri.php">Partneri</a>
                <a class="navbar-options hov <?php if($page == 'kontakt.php'){ echo ' current-page"';}?>" href="kontakt.php">Kontakt</a>
                <a href="javascript:void(0);" class="navbar-options navbar-icon index-icon" onclick="myFunction()">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
        </nav>
    </header>