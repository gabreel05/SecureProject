window.onload = function () {
  $("#loginButton").click(() => {
    createSession();
  });

  function createSession() {
    $("#password_hash").val(CryptoJS.SHA1($("#passwordInput").val()));
    const data = $("#login_form").serialize();

    console.log(data);

    $.ajax({
      type: "POST",
      dataType: "JSON",
      data,
      url: "../../../Backend/src/select.php",
      success: function (res) {
        console.log(res);
      },
    });

    $("#login-form").submit(function (e) {
      return false;
    });
  }
};
