// function pra alternar entre o login e o recuperar senha
$('.toggleLogin').click(e => {
  e.preventDefault()
  $('.formRecupera').toggleClass('hide')
  $('.formLogin').toggleClass('hide')
})

function verSenha() {
  $('.btnVerSenha').toggleClass("fa-eye fa-eye-slash");
  if ($('.inputSenha').attr("type") == "password") {
    $('.inputSenha').attr("type", "text")
  } else {
    $('.inputSenha').attr("type", "password")
  }
}