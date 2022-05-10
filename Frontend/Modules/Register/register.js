window.onload = function () {
  debugger;

  const numbers = /[0-9]/;
  const minLenght = /[a-zA-Z0-9]{6}/;
  const lowerCharacters = /[a-z]/;
  const upperCharacters = /[A-Z]/;
  const specialCharacters = /['"!@#$%¨&*()/;\.,<>º{}|\\]/;

  const inputPassword = $("#inputPassword");
  const inputName = $("#nome");
  const inputCPF = $("#cpf");
  const inputAddress = $("#endereço");
  const inputPhone = $("#telefone");
  const inputEmail = $("#e-mail");
  const inputGender = $('.controls input[type="radio"]').val();
  const inputCountry = $("#pais option:selected").val();

  const weakPassword = $("#weakPassword");

  var accounts = [];

  $("#telefone").mask("(00) 00000-0000");
  $("#cpf").mask("000.000.000-00");

  function saveAccount() {
    accounts.push({
      name: inputName.val(),
      CPF: inputCPF.val(),
      address: inputAddress.val(),
      phone: inputPhone.val(),
      email: inputEmail.val(),
      gender: inputGender,
      country: inputCountry,
      password: inputPassword.val(),
    });

    window.localStorage.setItem("accounts", JSON.stringify(accounts));
  }

  function handleValidatePassword() {
    if (
      !numbers.exec(inputPassword.val()) &&
      inputPassword.val() < 6 &&
      !lowerCharacters.exec(inputPassword.val()) &&
      !upperCharacters.exec(inputPassword.val()) &&
      !specialCharacters.exec(inputPassword.val())
    ) {
      weakPassword.html(
        "A sua senha precisa ter números <br> A sua senha precisa ter pelo menos 6 caracteres <br> A sua senha precisa ter caracteres minúsculos <br> A sua senha precisa ter caracteres maiúsculos <br> A sua senha precisa ter caracteres especiais"
      );

      return false;
    } else if (
      !numbers.exec(inputPassword.val()) &&
      inputPassword.val() < 6 &&
      !lowerCharacters.exec(inputPassword.val()) &&
      !upperCharacters.exec(inputPassword.val())
    ) {
      weakPassword.html(
        "A sua senha precisa ter números <br> A sua senha precisa ter pelo menos 6 caracteres <br> A sua senha precisa ter caracteres minúsculos <br> A sua senha precisa ter caracteres maiúsculos"
      );

      return false;
    } else if (
      !numbers.exec(inputPassword.val()) &&
      inputPassword.val() < 6 &&
      !lowerCharacters.exec(inputPassword.val()) &&
      !upperCharacters.exec(inputPassword.val())
    ) {
      weakPassword.html(
        "A sua senha precisa ter números <br> A sua senha precisa ter pelo menos 6 caracteres <br> A sua senha precisa ter caracteres minúsculos <br> A sua senha precisa ter caracteres maiúsculos"
      );

      return false;
    } else if (!numbers.exec(inputPassword.val()) && inputPassword.val() < 6) {
      weakPassword.html(
        "A sua senha precisa ter números <br> A sua senha precisa ter pelo menos 6 caracteres"
      );

      return false;
    }

    if (!numbers.exec(inputPassword.val())) {
      weakPassword.html("A sua senha precisa ter números");

      return false;
    }

    if (inputPassword.val() < 6) {
      weakPassword.html("A sua senha precisa ter pelo menos 6 caracteres");

      return false;
    }

    if (!lowerCharacters.exec(inputPassword.val())) {
      weakPassword.html("A sua senha precisa ter caracteres minúsculos");

      return false;
    }

    if (!upperCharacters.exec(inputPassword.val())) {
      weakPassword.html("A sua senha precisa ter caracteres maiúsculos");

      return false;
    }

    if (!specialCharacters.exec(inputPassword.val())) {
      weakPassword.html("A sua senha precisa ter caracteres especiais");

      return false;
    }

    return true;
  }

  function createSession(params) {
    $.ajax({
      dataType: "json",
      type: "POST",
      url: "../../../Backend/src/session.php",
      data: {
        data: params,
      },
      success: (response) => {
        console.log(response);
      },
    });
  }

  function sendParams() {
    createSession($("#e-mail").val());
  }

  $("#buttonRegister").click(() => {
    if (handleValidatePassword()) {
      $("#registerConfirmation").html("<h1>Sucesso!</h1>");

      saveAccount();

      sendParams();
    }
  });
};
