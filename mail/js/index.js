function enviar() {
  var dados = $('#form-autenticacao').serialize()

  $.ajax({
    type: 'POST',
    data: dados,
    url: 'php/index.php'
  })
}
