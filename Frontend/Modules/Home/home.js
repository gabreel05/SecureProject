$(document).ready(function () {
  $.ajax({
    type: 'POST',
    dataType: 'JSON',
    url: '../../../Backend/src/hasSession.php',
    success: function (data) {
      if (data.includes('Não tem sessão')) {
        window.location.href = '../Login/login.html'
      }
    }
  })

  $.ajax({
    type: 'GET',
    dataType: 'JSON',
    url: '../../../Backend/src/getVacancies.php',
    success: function (data) {
      for (let i = 0; i < data.length; i++) {
        const cardVacancyContent =
          `<h5 class='card-title vacancyBrand'>${data[i].vacancy_brand}</h5>` +
          `<p class='card-text vacancyDescription'>${data[i].vacancy_description}</p>` +
          `<button type='button' class='btn btn-outline-secondary' id='registerForVacancy${i}'>Se inscrever para vaga</button>`

        $('#cardVacancy').append(cardVacancyContent)

        $(`#registerForVacancy${i}`).click(function () {
          $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: '../../../Backend/src/registerForVacancy.php',
            data: {
              vacancy: data[i].vacancy_id
            },
            success: function (data) {
              if (data === 'Data inserted successfuly') {
                $(`#registerForVacancy${i}`).text('Inscrito com sucesso')
                $(`#registerForVacancy${i}`).prop('disabled', true)
              }
            }
          })
        })
      }
    }
  })

  $.ajax({
    type: 'GET',
    dataType: 'JSON',
    url: '../../../Backend/src/getRecommendedVacancies.php',
    success: function (data) {
      for (let i = 0; i < data.length; i++) {
        const cardRecommendedVacancyContent =
          `<h5 class='card-title vacancyBrand'>${data[i].vacancy_brand}</h5>` +
          `<p class='card-text vacancyDescription'>${data[i].vacancy_description}</p>` +
          `<button href='#' class='btn btn-outline-secondary' id='registerForRecommendedVacancy${i}'>Se inscrever para vaga</button>`

        $('#cardRecommendedVacancy').append(cardRecommendedVacancyContent)

        $(`#registerForRecommendedVacancy${i}`).click(function () {
          $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: '../../../Backend/src/registerForVacancy.php',
            data: {
              vacancy: data[i].vacancy_id
            },
            success: function (data) {
              if (data === 'Data inserted successfuly') {
                $(`#registerForRecommendedVacancy${i}`).text(
                  'Inscrito com sucesso'
                )
                $(`#registerForRecommendedVacancy${i}`).prop('disabled', true)
              }
            }
          })
        })
      }
    }
  })

  $('#buttonLogout').click(function () {
    $.ajax({
      type: 'POST',
      dataType: 'JSON',
      url: '../../../Backend/src/logout.php',
      success: function (data) {
        if (data.includes('Session destroyed')) {
          window.location.href = '../Login/login.html'
        }
      }
    })
  })
})
