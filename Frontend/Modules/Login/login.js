window.onload = function () {
  const inputEmail = $("#emailInput");

  $("#loginButton").click(() => {
    createSession(inputEmail.val());
  });

  function createSession(params) {
    const accounts = JSON.parse(window.localStorage.getItem("accounts"));

    const account = accounts.find(
      (element) => element.email === inputEmail.val()
    );

    // caso não ache o email ele retorna undefined a const account
    $.ajax({
      dataType: "JSON",
      type: "POST",
      data: {
        email: params,
      },
      url: "../../../Backend/src/select.php",
      success: function (res) {
        console.log(res);
      },
    });

    //
  }
};
