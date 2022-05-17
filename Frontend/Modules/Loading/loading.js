$(document).ready(function () {
  const creationTime = new Date();
  const expirationTime = creationTime.setSeconds(
    creationTime.getSeconds() + 10
  );

  $.ajax({
    type: "POST",
    dataType: "JSON",
    url: "../../../Backend/src/home.php",
    data: {
      TOKEN: "TOKEN",
      creationDate: creationTime,
      expirationDate: expirationTime,
    },
    success: function (data) {
      if (data == "Sessão criada") {
        window.location.href = "../Home/home.html";
      }
    },
  });
});
