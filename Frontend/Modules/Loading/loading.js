$(document).ready(function () {
  const date = new Date()
  const creationTime = date.getSeconds()
  // const expirationTime = creationTime + 10

  // const data = {
  //   creationTime,
  //   expirationTime
  // }

  // const encryptedData = encrypt(JSON.stringify(data))

  $.ajax({
    type: 'GET',
    dataType: 'JSON',
    url: '../../../Backend/src/home.php',
    // data: {
    //   message: encryptedData
    // },
    success: function (data) {
      if (data.includes('Sessão criada')) {
        window.location.href = '../Home/home.html'
      }
    }
  })
})
