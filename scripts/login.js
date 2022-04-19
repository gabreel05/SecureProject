window.onload = function () {
  $("#loginButton").click(function () {
    sendRequest($("#emailInput").val());

    //window.location.href = "../pages/two-factor.html";
  });

  function sendRequest(params) {
    $.ajax({
      dataType: "JSON",
      type: "POST",
      data: {
        email: params,
      },
      url: "../php/token.php",
      success: function (response) {
        sendEmail();
      },
    });
  }

  function sendEmail() {
    $.ajax({
      dataType: "JSON",
      type: "POST",
      data: {
        email: params,
      },
      url: "../php/email.php",
      success: function (response) {
        console.log(response);
      },
    });
  }
};
