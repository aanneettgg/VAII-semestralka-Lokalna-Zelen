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