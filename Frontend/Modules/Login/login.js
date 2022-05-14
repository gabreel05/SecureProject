$(document).ready(function () {
  $('#buttonLogin').click(function () {
    $('#inputPasswordHash').val(CryptoJS.SHA1($('#inputPassword').val()))
    $.ajax({
      type: 'POST',
      dataType: 'JSON',
      url: 'select.php',
      data: $('#formLogin').serialize(),
      success: function (data) {}
    })
    $('$formLogin').submit(function () {
      return false
    })
  })
})
