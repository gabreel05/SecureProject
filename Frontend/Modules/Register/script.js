$(document).ready(function () {
  $("#phone").mask("(00) 00000-0000")
  $("#document").mask("000.000.000-00")

  $("#password").focus(function () {
    $("#passwordMessage").css("display", "block")
  })
  $("#password").blur(function () {
    $("#passwordMessage").css("display", "none")
  })

  $("#password").keyup(function () {
    if ($("#password").val().match(/[a-z]/g)) {
      $("#lowercase").removeClass("invalid")
      $("#lowercase").addClass("valid")
    } else {
      $("#lowercase").removeClass("valid")
      $("#lowercase").addClass("invalid")
    }

    if ($("#password").val().match(/[A-Z]/g)) {
      $("#uppercase").removeClass("invalid")
      $("#uppercase").addClass("valid")
    } else {
      $("#uppercase").removeClass("valid")
      $("#uppercase").addClass("invalid")
    }

    if ($("#password").val().match(/[0-9]/g)) {
      $("#number").removeClass("invalid")
      $("#number").addClass("valid")
    } else {
      $("#number").removeClass("valid")
      $("#number").addClass("invalid")
    }

    if ($("#password").val().length >= 6) {
      $("#length").removeClass("invalid")
      $("#length").addClass("valid")
    } else {
      $("#length").removeClass("valid")
      $("#length").addClass("invalid")
    }
  })

  $("#buttonRegister").click(function () {
    $("#passwordHash").val(CryptoJS.SHA256($("#password").val()))

    const key1 = CryptoJS.lib.WordArray.random(256)
    const salt = CryptoJS.lib.WordArray.random(128 / 8)

    const key256Bits1000Iterations = CryptoJS.PBKDF2(key1, salt, {
      keySize: 256 / 32,
      iterations: 1000,
    })

    const message = JSON.stringify($("#formRegister").serialize()).toString()
    const iv = CryptoJS.lib.WordArray.random(16)

    const encryptedMessage = CryptoJS.AES.encrypt(
      key256Bits1000Iterations,
      salt,
      {
        iv: CryptoJS.enc.Utf8.parse(iv),
        mode: CryptoJS.mode.CBC,
        padding: CryptoJS.pad.ZeroPadding,
      }
    )

    const encodedMessage = btoa(encryptedMessage)

    const crypto = new JSEncrypt()
    crypto.setPublicKey("")

    const encryptedData = crypto.encrypt(encodedMessage).toString()

    fetch("public_key.pem")
      .then(response => response.arrayBuffer())
      .then(arrayBuffer => console.log(arrayBuffer.toString()))

    // $.ajax({
    //   type: "POST",
    //   dataType: "JSON",
    //   data: $("#formRegister").serialize(),
    //   url: "../../../Backend/src/RegisterPHP.php",
    //   success: function (response) {
    //     if (response === "Data inserted successfuly") {
    //       $(location).attr("href", "../Login/login.html");
    //     } else {
    //       alert("Erro inesperado. Por favor tente novamente");
    //     }
    //   },
    // });
  })
})
