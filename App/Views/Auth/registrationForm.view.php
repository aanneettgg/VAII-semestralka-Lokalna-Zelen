<div class="container">
    <div class="row">
        <div class="col-sm-4 offset-sm-4">
            <form method="post" action="?c=user&a=createUser">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Používateľské meno</label>
                    <input type="text" class="form-control" name="username" maxlength="10" placeholder="Používateľské meno">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Meno</label>
                    <input type="text" class="form-control" name="name" maxlength="20" placeholder="Meno">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Priezvisko</label>
                    <input type="text" class="form-control" name="surname" maxlength="30" placeholder="Priezvisko">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Heslo</label>
                    <input type="password" class="form-control" name="password" maxlength="15" placeholder="Heslo">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" maxlength="30" placeholder="Email">
                </div>
                <div class="mb-3">
                    <input type="submit" class="form-control button" value="Registrovať sa">
                </div>
            </form>
        </div>
    </div>
</div>
