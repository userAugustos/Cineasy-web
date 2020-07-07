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
function changeProfilePic(id) {
  $.post("../controller/put.php", { profile_pic: "1", id: id }).done(
    (response) => {
      console.log(response);
    }
  );
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
    { nome: "Kaiquinho Grau", fotoperfil: "avatarperfil.png", id: 2 },
    { nome: "Thaizinha quebra", fotoperfil: "avatarperfil.png", id: 3 },
    {nome: 'Maxx vrau', fotoperfil: '1591477595958-image-ce4a303e-ae42-4641-bd97-5e0d2e0c491e.jpg', id: 4}
  ];

  const moviesRiseQtd = [
    { nome: "Coringa", id: 1 },
    { nome: "Malévola 2: dona do mal", id: 2 },
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
