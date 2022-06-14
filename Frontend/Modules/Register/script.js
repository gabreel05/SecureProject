$(document).ready(function () {
  $('#phone').mask('(00) 00000-0000')
  $('#document').mask('000.000.000-00')

  $('#password').focus(function () {
    $('#passwordMessage').css('display', 'block')
  })
  $('#password').blur(function () {
    $('#passwordMessage').css('display', 'none')
  })

  $('#password').keyup(function () {
    if ($('#password').val().match(/[a-z]/g)) {
      $('#lowercase').removeClass('invalid')
      $('#lowercase').addClass('valid')
    } else {
      $('#lowercase').removeClass('valid')
      $('#lowercase').addClass('invalid')
    }

    if ($('#password').val().match(/[A-Z]/g)) {
      $('#uppercase').removeClass('invalid')
      $('#uppercase').addClass('valid')
    } else {
      $('#uppercase').removeClass('valid')
      $('#uppercase').addClass('invalid')
    }

    if ($('#password').val().match(/[0-9]/g)) {
      $('#number').removeClass('invalid')
      $('#number').addClass('valid')
    } else {
      $('#number').removeClass('valid')
      $('#number').addClass('invalid')
    }

    if ($('#password').val().length >= 6) {
      $('#length').removeClass('invalid')
      $('#length').addClass('valid')
    } else {
      $('#length').removeClass('valid')
      $('#length').addClass('invalid')
    }
  })

  $('#buttonRegister').click(function () {
    $('#passwordHash').val(CryptoJS.SHA256($('#password').val()))

    const formData = {
      name: $('#name').val(),
      document: $('#document').val(),
      address: $('#address').val(),
      phone: $('#phone').val(),
      email: $('#email').val(),
      password: $('#passwordHash').val(),
      gender: $('input[name=gender]:checked').val(),
      country: $('#country option:selected').val()
    }

    const encryptedData = encrypt(JSON.stringify(formData))

    $.ajax({
      type: 'POST',
      dataType: 'JSON',
      data: {
        message: encryptedData
      },
      url: '../../../Backend/src/RegisterPHP.php',
      success: function (response) {
        if (response === 'Data inserted successfuly') {
          $(location).attr('href', '../Login/login.html')
        } else {
          alert('Erro inesperado. Por favor tente novamente')
        }
      }
    })
  })
})
