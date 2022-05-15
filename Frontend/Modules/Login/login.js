$(document).ready(function () {
  $('#buttonLogin').click(function () {
    $('#passwordHash').val(CryptoJS.SHA1($('#password').val()))
    $.ajax({
      type: 'POST',
      dataType: 'JSON',
      url: '../../../Backend/src/login.php',
      data: $('#formLogin').serialize(),
      success: function (data) {
        if (data === 'Conta encontrada') {
          $(location).attr('href', '../TwoFactor/two_factor.html')
        } else {
          alert('Usuário ou senha incorretos')
        }
      }
    })
    $('#formLogin').submit(function () {
      return false
    })
  })
})
