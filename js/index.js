$(document).ready(() => {
  $(window).scroll(() => {
    window.pageYOffset >= 20 ? 
      $('.navbar').addClass('bg-dark').removeClass("scrollFalse") : 
      $('.navbar').removeClass('bg-dark').addClass("scrollFalse")
  })

  window.width > '991px' ? 
    $('.navbar').removeClass('bg-dark') :
    $('.navbar').addClass('bg-dark')
})