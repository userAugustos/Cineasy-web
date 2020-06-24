function verSenha() {
  $('.btnVerSenha').toggleClass("fa-eye fa-eye-slash");
  if ($('.inputSenha').attr("type") == "password") {
    $('.inputSenha').attr("type", "text")
  } else {
    $('.inputSenha').attr("type", "password")
  }
}

function toggleForm(toShow, toHide){
  toShow.removeClass('hide');
  toShow.addClass('show');

  toHide.removeClass('show');
  toHide.addClass('hide');
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

$('#log-as-company').on('click', () => {
  let user = $('#user');
  let company = $('#company');
  toggleForm(company, user)
})
$('#log-as-user').on('click', () => {
  let user = $('#user');
  let company = $('#company');
  toggleForm(user, company)
});