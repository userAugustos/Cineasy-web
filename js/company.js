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

  var movieName = document.querySelector('#movieName');
  var movieGenero = document.getElementById('movieGenero');

  var previewPost = document.querySelector('.image-view img');
  var filePost = document.querySelector('#post-image').files[0];

  //Events Listener
  pubPost.addEventListener('click', event => {
    togglePainel(cadPost, showPosts, showMovies, cadMovie);

    // previewFile(previewPost, filePost);
  });
  showPost.addEventListener('click', event => {
    togglePainel(showPosts, cadPost, showMovies, cadMovie);
  });
  showMovie.addEventListener('click', event => {
    togglePainel(showMovies, cadPost, showPosts, cadMovie);
  });
  pubMovie.addEventListener('click', event => {
    togglePainel(cadMovie, showMovies, cadPost, showPosts);
  });
  //Funções
  function togglePainel(toShow, hideOne, hideTwo, hideTree) {
    toShow.classList.replace('hide','show');
    hideOne.classList.replace('show','hide');
    hideTwo.classList.replace('show','hide');
    hideTree.classList.replace('show','hide');
  }

  function previewFile() {
    let previewMovie = document.querySelector('.card img');
    let fileMovie = document.querySelector('#moviePoster').files[0];
    let reader = new FileReader();

    reader.addEventListener('load', function (){
      // convert image file to base64 string
      previewMovie.src = reader.result;
    }, false);

    if (fileMovie) {
      reader.readAsDataURL(fileMovie);
    }
  }

  function previewCard() {
    let titulo = document.querySelector('.card-header strong');
    let genero = document.querySelector('#category');

    titulo.innerHTML = movieName.value;
    genero.innerHTML = movieGenero.value;
  }
