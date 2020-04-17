$(document).ready(() => {
  
})

$(window).scroll(function() {
  if ($(document).scrollTop() > 1400 && $("#myModal").attr("displayed") === "false") {
    $('#myModal').modal('show');
    $("#myModal").attr("displayed", "true");
    }
});