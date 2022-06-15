$(document).ready(function () {
  $.ajax({
    type: 'POST',
    dataType: 'JSON',
    url: '../../../Backend/src/hasSession.php',
    success: function (data) {
      if (data.includes('Não tem sessão')) {
        window.location.href = '../Login/login.html';
      }
    }
  });

  $.ajax({
    type: 'GET',
    dataType: 'JSON',
    url: '../../../Backend/src/getVacancies.php',
    success: function (data) {
      const cardVacancyContent =
        `<div class='card-body mx-auto'>` +
        `<div class='col-md-12'>` +
        `<div class='card-body'>` +
        `<h5 class='card-title vacancyBrand'></h5>` +
        `<p class='card-text vacancyDescription'></p>` +
        `<a href='#' class='btn btn-outline-secondary'>Ver vaga completa</a>` +
        `</div>` +
        `</div>` +
        `</div>`;

      for (let i = 0; i < data.length; i++) {
        const cardVacancyContent =
          `<div class='card-body mx-auto'>` +
          `<div class='col-md-12'>` +
          `<div class='card-body'>` +
          `<h5 class='card-title vacancyBrand'>${data[i].vacancy_brand}</h5>` +
          `<p class='card-text vacancyDescription'>${data[i].vacancy_description}</p>` +
          `<a href='#' class='btn btn-outline-secondary'>Ver vaga completa</a>` +
          `</div>` +
          `</div>` +
          `</div>`;

        $('#cardVacancy').append(cardVacancyContent);
      }
    }
  });

  $('#buttonLogout').click(function () {
    $.ajax({
      type: 'POST',
      dataType: 'JSON',
      url: '../../../Backend/src/logout.php',
      success: function (data) {
        if (data.includes('Session destroyed')) {
          window.location.href = '../Login/login.html';
        }
      }
    });
  });
});
