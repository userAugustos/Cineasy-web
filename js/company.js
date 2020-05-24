//company page
  //variaveis globais
  var cadBtn = document.querySelector('#showPainel');
  var postBtn = document.querySelector('#showPosts');
  var movieBtn = document.querySelector('#showMovies');

  var cadPost = document.querySelector('.cadPost');
  var showPosts = document.querySelector('.showPosts');
  var showMovies = document.querySelector('.showMovies');

  var movieName = document.querySelector('#movieName');
  var movieGenero = document.getElementById('movieGenero');

  //Events Listener
  cadBtn.addEventListener('click', event => {
    togglePainel(cadPost, showPosts, showMovies, cadBtn, postBtn, movieBtn);
  });
  postBtn.addEventListener('click', event => {
    togglePainel(showPosts, cadPost, showMovies, postBtn, cadBtn, movieBtn);
  });
  movieBtn.addEventListener('click', event => {
    togglePainel(showMovies, cadPost, showPosts, movieBtn, cadBtn, postBtn);
  });

  //Funções
  function togglePainel(toShow, toHide, anotherHide, btnOne, btnTwo, btnTree) {
    toShow.classList.replace('hide','show');
    if (!btnOne.classList.contains('border-dark')) {
      btnOne.classList.add('border-dark','clickEffect');
    }
    toHide.classList.replace('show','hide');
    anotherHide.classList.replace('show','hide');

    if (btnTwo.classList.contains('border-dark')||btnTree.classList.contains('border-dark')) {
      btnTwo.classList.remove('border-dark','clickEffect');
      btnTree.classList.remove('border-dark','clickEffect');
    }
  }

  function previewFile() {
    let preview = document.querySelector('.card img');
    let file = document.querySelector('#moviePoster').files[0];
    let reader = new FileReader();

    reader.addEventListener('load', function () {
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
