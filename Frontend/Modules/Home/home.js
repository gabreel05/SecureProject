$(document).ready(function () {
  $.ajax({
    type: "POST",
    dataType: "JSON",
    url: "../../../Backend/src/hasSession.php",
    success: function (data) {
      if (data.includes("Não tem sessão")) {
        window.location.href = "../Login/login.html";
      }
    },
  });
});
