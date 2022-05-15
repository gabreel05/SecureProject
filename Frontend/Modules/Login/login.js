$(document).ready(function () {
  $('#buttonLogin').click(function () {
    $('#passwordHash').val(CryptoJS.SHA1($('#password').val()))
    $.ajax({
      type: 'POST',
      dataType: 'JSON',
      url: '../../../Backend/src/select.php',
      data: $('#formLogin').serialize(),
      success: function (data) {
        console.log(data)
      }
    })
    $('#formLogin').submit(function () {
      return false
    })
  })
})
