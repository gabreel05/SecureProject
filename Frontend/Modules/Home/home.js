$(document).ready(function () {
  const creationTime = new Date();
  const expirationTime = creationTime.setSeconds(
    creationTime.getSeconds() + 10
  );

  const urlSearchParams = new URLSearchParams(window.location.search);
  const params = Object.fromEntries(urlSearchParams.entries());

  console.log(params);

  $.ajax({
    type: "POST",
    dataType: "JSON",
    url: "../../../Backend/src/home.php",
    data: {
      creationTime,
      expirationTime,
      isFromTwoFactor: params.isFromTwoFactor ? params.isFromTwoFactor : null,
    },
    success: function (data) {
      if (data != "Sessão criada") {
        window.location.href = "../Login/login.html";
      }
    },
  });

  setInterval(() => {
    $.ajax({
      type: "POST",
      dataType: "JSON",
      url: "../../../Backend/src/home.php",
      success: function (data) {
        if (data != "Sessão criada") {
          window.location.href = "../Login/login.html";
        }
      },
    });
  }, 5000);
});
