$(function () {
  // форма регистрации
  $('#signUp').on('click', function (event) {
    event.preventDefault();
    $(".first").slideUp('slow', function () {
      $(".second").slideDown('slow');
    })
  });

  $('#signIn').on('click', function (event) {
    event.preventDefault();
    $(".second").slideUp('slow', function () {
      $(".first").slideDown('slow');
    })
  })
});

