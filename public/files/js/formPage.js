function validatePassword()
{
    var password = document.getElementById('password').value;
    var submit = document.getElementById('submit');
    var errorLength = document.getElementById('errorLength');
    var errorUpperCase = document.getElementById('errorUpperCase');
    var errorNumber = document.getElementById('errorNumber');
    const regexLetter = /[A-Z]/g;
    const regexNumber = /[0-9]/g;

    submit.disabled = false;

    if (password.length < 8) {
        errorLength.innerText = "Vaše heslo je príliš krátke! Musí obsahovať aspoň 8 znakov.";
        errorLength.classList.add('text-danger');
        submit.disabled = true;
    } else {
        errorLength.innerText = "";
    }
    if (password.match(regexLetter) == null) {
        errorUpperCase.innerText = "Vaše heslo neobsahuje žiadne veľké písmeno! Musí obsahovať aspoň jedno.";
        errorUpperCase.classList.add('text-danger');
        submit.disabled = true;
    } else {
        errorUpperCase.innerText = "";
    }
    if (password.match(regexNumber) == null) {
        errorNumber.innerText = "Vaše heslo neobsahuje žiadne číslo! Musí obsahovať aspoň jedno.";
        errorNumber.classList.add('text-danger');
        submit.disabled = true;
    } else {
        errorNumber.innerText = "";
    }
}

function validateNumber()
{
    var number = document.getElementById('productPrice').value;
    var submit = document.getElementById('submit');
    var errorNumber = document.getElementById('errorNumber');
    var regexNumber = /^[0-9]*\.?[0-9]*$/;

    submit.disabled = false;

    if (number.match(regexNumber)) {
        errorNumber.innerText = "Zlý formát ceny, príklad správneho: 0.99 alebo 10.01.";
        errorNumber.classList.add('text-danger');
        submit.disabled = true;
    } else {
        errorNumber.innerText = "";
    }
}