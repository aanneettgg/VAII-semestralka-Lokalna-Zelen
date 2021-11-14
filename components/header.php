<?php $page = basename($_SERVER['PHP_SELF']); ?>

<header>
    <div class="logo">
        <img src="images/logo.svg">
        <h1 class="title">Lokálna zeleň</h1>
        <button class="button hov" data-bs-toggle="modal" data-bs-target="#login-modal" type="button">Prihlásiť sa</button>
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

<div class="modal fade" id="login-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Prihlásenie</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Emailová adresa</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Heslo</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="form-text">Nie ste reigstrovaný? Kliknite tu.</div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zavrieť</button>
        <button type="button" class="btn btn-primary">Prihlásiť sa</button>
      </div>
    </div>
  </div>
</div>