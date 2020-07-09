function togglePainel(toShow, ...esconde) {
  toShow.addClass("visible").removeClass("hidden");
  esconde.map((item) => {
    return item.addClass("hidden").removeClass("visible");
  });
}

function previewMovie() {
  let titulo = $(".card-header strong");
  let genero = $("#category");
  let movieName = $("#movieName").val();
  let movieGenero = $("#movieGenero").val();

  let preview = document.querySelector(".card img");
  let file = document.querySelector("#moviePoster").files[0];
  let reader = new FileReader();

  titulo.html(movieName);
  genero.html(movieGenero);

  reader.addEventListener(
    "load",
    () => {
      preview.src = reader.result;
    },
    false
  );

  if (file) {
    reader.readAsDataURL(file);
  }
}

function previewPost() {
  let postText = $('.postForm textarea[name="post-text"]').val();
  let previeText = $(".title strong");

  let preview = document.querySelector(".image-view img");
  let file = document.querySelector("#post-image").files[0];
  let reader = new FileReader();

  previeText.html(postText);

  reader.addEventListener(
    "load",
    () => {
      preview.src = reader.result;
    },
    false
  );

  if (file) {
    reader.readAsDataURL(file);
  }
}

function previewModalMovie(){
  let titleMovie = $('.header-modal h3');
  let sinopse = $('.main-modal #sinopse');
  let diretor = $('.main-modal #diretor')
  let elenco = $('.main-modal #elenco');

  $('input[name="movieName"]').change(event => titleMovie.html(event.currentTarget.value))
  $('form #movieSinopse').change(event => sinopse.html(event.currentTarget.value))
  $('input[name="directorName"]').change(event => diretor.html('Dirigido por: '+event.currentTarget.value))
  $('form #movieElenco').change(event => elenco.html('Estrelando: '+event.currentTarget.value))

  $('#movieBanner').change(function(){
    const file = $(this)[0].files[0];
    const fileReader = new FileReader;
  
    fileReader.onloadend = () => {
      $('.banner-modal img#banner').attr('src', fileReader.result)
    }
    fileReader.readAsDataURL(file);
  })
}
previewModalMovie();

function insertMovie(id) {
  let modal = document.querySelector(`.movie${id}`); //pegando cada modal com id

  $.post("../controller/get.php", { ver_mais: "1", id_movie: `${id}` }) //ajax com jquery
    .done((response) => {
      let movieInfo = JSON.parse(response);
      modal.innerHTML = `
      	<div class="modal-content">
          <div class="header-modal">
            <a href="/" class="logo-modal"><h3>${movieInfo[0].nome}</h3></a>
            <button type="button" data-dismiss="modal"><img src="../assets/toggle.png" alt=""></button>
          </div>
          <div class="banner-modal">
           	<img src="../assets/sonic-banner.jpg" alt="">
            <div class="main-modal">
            	<h2></h2>
            	<p>${movieInfo[0].sinopse}</p>
            	<p>diretor: ${movieInfo[0].diretor}</p>
              <a href="#" class="modal-play"><img src="../assets/play.png" alt="">Ver o Trailer</a>
            </div>
          </div>
        </div>`;
    })
    .fail((err) => {
      console.log("error" + err);
    });
}

(($) => {
  "use strict";

  const fullHeight = () => {
    $(".js-fullheight").css("height", $(window).height());
    $(window).resize(function () {
      $(".js-fullheight").css("height", $(window).height());
    });
  };

  fullHeight();

  $("#sidebarCollapse").on("click", function () {
    $("#sidebar").toggleClass("active");
  });

  //show company profile
  $("#company-profile").on("click", (event) => {
    let esconde = [
      $(".pub-filme"),
      $(".pub-post"),
      $(".show-movies"),
      $(".show-posts"),
    ];
    let show = $(".company-profile");
    togglePainel(show, ...esconde);
  });

  //show movie publication
  $("#pub-filme").on("click", (event) => {
    let esconde = [
      $(".company-profile"),
      $(".pub-post"),
      $(".show-movies"),
      $(".show-posts"),
    ];
    let show = $(".pub-filme");
    togglePainel(show, ...esconde);
  });

  //show post publication
  $("#pub-post").on("click", (event) => {
    let esconde = [
      $(".company-profile"),
      $(".pub-filme"),
      $(".show-movies"),
      $(".show-posts"),
    ];
    let show = $(".pub-post");
    togglePainel(show, ...esconde);
  });

  //show publicated movies
  $("#show-movies").on("click", (event) => {
    let esconde = [
      $(".company-profile"),
      $(".pub-filme"),
      $(".show-posts"),
      $(".pub-post"),
    ];
    let show = $(".show-movies");
    togglePainel(show, ...esconde);
  });

  //show publicated posts
  $("#show-posts").on("click", (event) => {
    let esconde = [
      $(".company-profile"),
      $(".pub-filme"),
      $(".show-movies"),
      $(".pub-post"),
    ];
    let show = $(".show-posts");
    togglePainel(show, ...esconde);
  });

  const baseProfileUrl = 'https://cineasy.herokuapp.com/fotoperfil/';

  const followersQtd = [
    { nome: "Cinemark", fotoperfil: "1590959529725-cinr.jpg", id: 1 },
    { nome: "Kaiquinho", fotoperfil: "avatarperfil.png", id: 2 },
    { nome: "Thaiz Reis", fotoperfil: "avatarperfil.png", id: 3 },
    {nome: 'Max vrau', fotoperfil: '1591477595958-image-ce4a303e-ae42-4641-bd97-5e0d2e0c491e.jpg', id: 4}
  ];

  const moviesRiseQtd = [
    { nome: "Coringa", id: 1 },,
  ];

  $(".title #followers").html(`${followersQtd.length} seguidores`);

  moviesRiseQtd.map((movie) => {
    $(".company-profile #movies-on-rise").append(`
      <div class="movie-on-rise align-items-center justify-content-center" id="${movie.id}">
        <strong>${movie.nome}</strong>
      </div>
    `);
  });

  followersQtd.map((follower) => {
    $(".followers .content").append(`
        <div class="follower justify-content-between align-items-center" id="${follower.id}">
          <img src="${baseProfileUrl+follower.fotoperfil}" alt="User profile pic">
          <strong class="followe-name">${follower.nome}</strong>
        </div>
    `);
  });

  $(function(){
    $('#modal-profile input[name="fileData"]').change(function(){
      const file = $(this)[0].files[0];
      const fileReader = new FileReader;
    
      fileReader.onloadend = () => {
        $('#modal-profile .preview-profile img').attr('src', fileReader.result)
      }
      fileReader.readAsDataURL(file);
    })
  })
})(jQuery);

function setProfilePicCompany(id) {
  let profilePic = $("form #profilePic")[0];
  let picName = profilePic.files[0].name;
  let formatPic = picName.split(".")[1];
  
  var formData = new FormData();
  
  formData.append("fileData", profilePic.files[0]);
  if (formatPic == "jpg" || formatPic == "png" || formatPic == "svg") {
    $.ajax({
      url: `http://localhost:3000/empresa/fotoempresa/${id}`,
      type: 'PUT',
      data: formData,
      contentType: false,
      cache: false,
      processData: false,
      success: () =>{ alert('Imagem trocada')}
    }).fail(function(err) {
      alert( "error" + err);
    })
  }else{
    alert('Formato de imagem não surpotado');
  }

}
function uploadMovie(){

  var formData = new FormData();

  let movieName = $('input[name="movieName"]');
  formData.append('nome', movieName.val());
  formData.append('nome_ori', movieName.val());

  let directorName = $('.input[name="directorName"]');
  formData.append('diretor', directorName.val())

  let origem = $('input[name="origem"]');
  formData.append('pais_ori', origem.val())

  let dataEstreta = $('input[name="dataEstreta"]');
  formData.append('data_estreia', dataEstreta.val())

  let classificacao = $('input[name="classificacao"]');
  formData.append('class', classificacao.val());

  let destribuidora = $('input[name="destribuidora"]');
  formData.append('distribuidor', destribuidora.val())

  let movieTrailer = $('input[name="movieTrailer"]');
  formData.append('trailer', movieTrailer.val())

  let movieTime = $('input[name="movieTime"]');
  formData.append('duracao', movieTime.val())

  let movieGenero = $('input[name="movieGenero"]');
  formData.append('genero', movieGenero.val())

  let moviePoster = $('input[name="moviePoster"]')[0];
  formData.append('img', moviePoster.files[0])
  let movieBanner = $('input[name="movieBanner"]')[0];
  formData.append('img', movieBanner.files[0])

  let movieSinopse = $('#movieSinopse');
  formData.append('sinopse', movieSinopse.val())

  let movieElenco = $('#movieElenco');
  
  let formatPoster = moviePoster.files[0].name.split(".")[1];
  let formatBanner = movieBanner.files[0].name.split('.')[1];
  let movieLink = movieTrailer.val().split('.be/')[1];

  let imagesArray =[moviePoster.files[0], movieBanner.files[0]]
  if(formatPoster == "jpg" || formatPoster == "png" || formatPoster == "svg" || formatPoster == "jpeg" && formatBanner == 'jpg' || formatBanner == 'png' || formatBanner == 'svg' || formatBanner == 'jpeg'){
  $.ajax({
    url: 'http://localhost:3000/filmes/',
    type: 'POST',
    data: formData,
    contentType: false,
    cache: false,
    processData: false,
    success: () =>{ alertify.alert('Filme Lançado', 'Seu Público Agradece').set({ onclosing:function(){ alertify.success('Confira seu filme na aba de filmes.')}}) }
    }).fail(err => {alertify.set('notifier','position', 'top-center'); alertify.error('Ouve um erro com os campos digitados, por favor confira') })
  }else{
    alertify.error('Para fazer o upload de filme, é necessario inserir uma imagem valida')
  }

  $('form#movie-form')[0].reset()
}

function uploadPost(id) {
    let postText = $('.postForm textarea[name="post-text"]').val();
    let postImage = $('input#post-image')[0];

      let formatImage =  postImage.files[0].name.split('.')[1];

    var formData = new FormData();
    formData.append('note', postText);
    formData.append('img', postImage.files[0]);
    formData.append('fk_usuario', id);

    if(formatImage == "jpg" || formatImage == "png" || formatImage == "svg" || formatImage == "jpeg"){
    $.ajax({
      url: 'http://localhost:3000/posts/',
      type: 'POST',
      data: formData,
      contentType: false,
      cache: false,
      processData: false,
      success: () =>{ alertify.alert('Publicação Feita', 'Veja a interação do seu público na sua publicação').set({ onclosing:function(){ alertify.success('Veja sua publicação na aba de publicação.')}}); $('.postForm form')[0].reset(); }
      }).fail(err => {alertify.set('notifier','position', 'top-center'); alertify.error('Ouve um erro com os campos digitados, por favor confira') })
    }else{
      alertify.error('Para fazer o upload de um post, é necessario inserir uma imagem valida')
    }
}
$('form#movie-form').on('submit', event =>{ 
  event.preventDefault();
  uploadMovie();
});

$('.postForm form').on('submit', event => {event.preventDefault();})