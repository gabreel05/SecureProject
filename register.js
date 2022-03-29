window.onload = function () {
  const numbers = /[0-9]/;
  const minLenght = /[a-zA-Z0-9]{6}/;
  const lowerCharacters = /[a-z]/;
  const upperCharacters = /[A-Z]/;
  const specialCharacters = /['"!@#$%¨&*()/;\.,<>º{}|\\]/;

  const inputPassword = document.getElementById("inputPassword");
  const buttonRegister = document.getElementById("buttonRegister");
  const registerConfirmation = document.getElementById("registerConfirmation");

  function handleValidatePassword() {
    if (!numbers.exec(inputPassword.value)) {
      alert("A sua senha precisa ter números");

      return false;
    }

    if (!minLenght.exec(inputPassword.value)) {
      alert("A sua senha precisa ter pelo menos 6 caracteres");

      return false;
    }

    if (!lowerCharacters.exec(inputPassword.value)) {
      alert("A sua senha precisa ter caracteres minúsculos");

      return false;
    }

    if (!upperCharacters.exec(inputPassword.value)) {
      alert("A sua senha precisa ter caracteres maiúsculos");

      return false;
    }

    if (!specialCharacters.exec(inputPassword.value)) {
      alert("A sua senha precisa ter caracteres especiais");

      return false;
    }

    return true;
  }

  function confirmRegister() {
    if (handleValidatePassword()) {
      registerConfirmation.innerHTML = "<p>Sucesso!</p>";
    }
  }

  buttonRegister.onclick = confirmRegister;
};
