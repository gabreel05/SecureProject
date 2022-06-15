$(document).ready(function () {
  $('#buttonLogin').click(function () {
    $('#passwordHash').val(CryptoJS.SHA256($('#password').val()));

    const formData = {
      email: $('#email').val(),
      password: $('#passwordHash').val(),
      captcha: $('#g-recaptcha-response').val()
    };

    const encryptedData = encrypt(JSON.stringify(formData));

    $.ajax({
      type: 'POST',
      dataType: 'JSON',
      url: '../../../Backend/src/PHPLogin.php',
      data: {
        message: encryptedData
      },
      success: function (data) {
        if (data === 'Conta encontrada') {
          $(location).attr('href', '../Loading/loading.html');
        } else if (data === 'Nenhum resultado') {
          $('#noResult').html('Conta não existe.');
        } else if (data === 'Por favor responda o reCAPTCHA corretamente') {
          $('#noResult').html('Por favor responda o reCAPTCHA corretamente.');
        } else {
          $('#noResult').html('Erro inesperado. Tente novamente.');
        }
      }
    });
    $('#formLogin').submit(function () {
      return false;
    });
  });
});
