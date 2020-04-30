function verSenha() {
  $('.btnVerSenha').toggleClass("fa-eye fa-eye-slash");
  if ($('.inputSenha').attr("type") == "password") {
    $('.inputSenha').attr("type", "text")
  } else {
    $('.inputSenha').attr("type", "password")
  }
}

$(".inputSenha").keyup(() => {
  var tamanho = $('.inputSenha').val().length;
  if (tamanho < 8 || tamanho > 14) {
    $(".helperPassword").html("A senha deve conter no mínimo 8 caracteres e no máximo 14")
    $(".form-group-password").removeClass('mb-4')
  } else if (tamanho == 0) {
    $(".helperPassword").html(null)
    $(".form-group-password").addClass('mb-4')
  } else {
    $(".helperPassword").html(null)
    $(".form-group-password").addClass('mb-4')
  }
});