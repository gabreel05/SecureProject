$(document).ready(function () {
  $('#buttonAuthenticate').click(function () {
    $.ajax({
      type: 'GET',
      dataType: 'JSON',
      data: {
        code: $('#code').val()
      },
      url: '../../../Backend/src/twoFactorCode.php',
      onSuccess: function (data) {
        console.log(data);
      }
    });
  });
});
