$(document).ready(() => {
  
})

$(window).scroll(function() {
  if ($(document).scrollTop() > 1400 && $("#modalPlanos").attr("displayed") === "false") {
    $('#modalPlanos').modal('show');
    $("#modalPlanos").attr("displayed", "true");
    }
});