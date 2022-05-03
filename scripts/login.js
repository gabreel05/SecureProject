window.onload = function () {
  const inputEmail = $("#emailInput");
  
  $("#loginButton").click(() => {
    createSession(inputEmail.val());
  });

  function createSession(params) {
    const accounts  = JSON.parse(window.localStorage.getItem("accounts"));

    const account = accounts.find(element => element.email === inputEmail.val());


// caso não ache o email ele retorna undefined a const account
    if (account != null) {
      $.ajax({
        dataType: "JSON",
        type: "POST",
        data: {
          email: params,
        },
        url: "../php/session.php",
      });

      window.location.href = "../pages/home.html";
    }
  }
};
