//company page
  //variaveis globais
  var pubMovie = document.querySelector('#pubMovie');
  var pubPost = document.querySelector('#pubPost');
  var showPost = document.querySelector('#showPost');
  var showMovie = document.querySelector('#showMovies');

  var cadPost = document.querySelector('.cadPost');
  var showPosts = document.querySelector('.showPosts');
  var showMovies = document.querySelector('.showMovies');
  var cadMovie = document.querySelector('.cadMovie');
  var btnShowMore = document.querySelector('.card-body button');
  var movieName = document.querySelector('#movieName');
  var movieGenero = document.getElementById('movieGenero');
  var modal = document.querySelector('.movie');
  modal.innerHTML = 'carregando....';
  var previewPost = document.querySelector('.image-view img');
  var filePost = document.querySelector('#post-image').files[0];

  //Events Listener
  pubPost.addEventListener('click', event => {
    let esconde = [showPosts, showMovies, cadMovie];
    togglePainel(cadPost, ...esconde);
  });
  showPost.addEventListener('click', event => {
    let esconde = [cadPost, showMovies, cadMovie];
    togglePainel(showPosts, ...esconde);
  });
  showMovie.addEventListener('click', event => {
    let esconde = [cadPost,  showPosts, cadMovie];
    togglePainel(showMovies, ...esconde);
  });
  pubMovie.addEventListener('click', event => {
    let esconde = [cadPost, showMovies, showPosts];
    togglePainel(cadMovie, ...esconde);
  });
  btnShowMore.addEventListener('click', event => {


    /**/
  });

  //Funções
  function togglePainel(toShow, ...esconde) {
    toShow.classList.replace('hide','show');
    esconde.map(item => {
      return item.classList.replace('show','hide');
    });
  }

  function previewFile() {
    let preview = document.querySelector('.card img');
    let file = document.querySelector('#moviePoster').files[0];
    let reader = new FileReader();

    reader.addEventListener('load', () => {
      // convert image file to base64 string
      preview.src = reader.result;
    }, false);

    if (file) {
      reader.readAsDataURL(file);
    }
  }

  function previewCard() {
    let titulo = document.querySelector('.card-header strong');
    let genero = document.querySelector('#category');

    titulo.innerHTML = movieName.value;
    genero.innerHTML = movieGenero.value;
  }

  function falaAe(id) {
    console.log(id);

    $.post( "../controller/get.php",
    { ver_mais: "1", id_movie: `${id}` } ).done(function( response ) {
      let movieInfo = JSON.parse(response);
        try {
          modal.innerHTML = `<div class="modal-content">
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
              </div>`
        }catch (error) {
          console.log(`o problema é ${error}`)
        }
    }).fail(function(err) {
      console.log( "error" + err );
    });
  }
