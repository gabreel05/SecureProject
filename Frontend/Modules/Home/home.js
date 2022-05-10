$(document).ready(function () {
  $.ajax({
    dataType: "JSON",
    type: "POST",
    url: "../../../Backend/src/home.php",
    success: function () {},
  });
});
