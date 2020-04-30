$(document).ready(() => {
  var play = document.querySelector('.modal-play');
  var close = document.querySelector('.modal-close');

  play.onclick = toggle;
  close.onclick = toggle;

  function toggle() {
    var trailer = document.querySelector('.trailer');

    trailer.classList.toggle('active');
  }
})

$(window).scroll(function() {
  if ($(document).scrollTop() > 1400 && $("#modalPlanos").attr("displayed") === "false") {
    $('#modalPlanos').modal('show');
    $("#modalPlanos").attr("displayed", "true");
    }
});