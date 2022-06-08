$(document).ready(function () {
  $("#buttonLogin").click(function () {
    $("#passwordHash").val(CryptoJS.SHA256($("#password").val()));
    const key1 = CryptoJS.lib.WordArray.random(256).toString();
    console.log(key1);
    console.log($("#passwordHash").val());
    // $.ajax({
    //   type: "POST",
    //   dataType: "JSON",
    //   url: "../../../Backend/src/PHPLogin.php",
    //   data: $("#formLogin").serialize(),
    //   success: function (data) {
    //     if (data === "Conta encontrada") {
    //       $(location).attr("href", "../Home/home.html");
    //     } else {
    //       alert("Usuário ou senha incorretos");
    //     }
    //   },
    // });
    $("#formLogin").submit(function () {
      return false;
    });
  });
});
