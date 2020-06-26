
  function togglePainel(toShow, ...esconde) {
    toShow.addClass('visible').removeClass('hidden');
    esconde.map(item => {
     return item.addClass('hidden').removeClass('visible');
    });
  }

  function previewMovie() {
    let titulo = $('.card-header strong');
    let genero = $('#category');
    let movieName = $('#movieName').val();
    let movieGenero = $('#movieGenero').val();

    let preview = document.querySelector('.card img');
    let file = document.querySelector('#moviePoster').files[0];
    let reader = new FileReader();

    titulo.html(movieName);
    genero.html(movieGenero);
    

    reader.addEventListener('load', () => {
      preview.src = reader.result;
    }, false);

    if (file) {
      reader.readAsDataURL(file);
    }
  }

  function previewPost() {
    let postText = $('.postForm textarea[name="post-text"]').val();
    let previeText = $('.title strong');
    
    let preview = document.querySelector('.image-view img');
    let file = document.querySelector('#post-image').files[0];
    let reader =  new FileReader();

    previeText.html(postText);

    reader.addEventListener('load', () => {
      preview.src = reader.result;
    }, false);

    if (file) {
      reader.readAsDataURL(file);
    }
  }

  function insertMovie(id) {
  	let modal = document.querySelector(`.movie${id}`); //pegando cada modal com id

    $.post( "../controller/get.php", { ver_mais: "1", id_movie: `${id}` } ) //ajax com jquery
    .done( response => {
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
    }).fail(err => {
      console.log( "error" + err );
    });
  }

  ( $ => {
    "use strict";
  
    const fullHeight = () => {
      $('.js-fullheight').css('height', $(window).height());
      $(window).resize(function(){
        $('.js-fullheight').css('height', $(window).height());
      });
    };
  
    fullHeight();
  
    $('#sidebarCollapse').on('click', function () {
      $('#sidebar').toggleClass('active');
    });
  
    //show company profile 
    $('#company-profile').on('click', event => {
      let esconde = [
        $('.pub-filme'),
        $('.pub-post'),
        $('.show-movies'),
        $('.show-posts')
      ];
      let show = $('.company-profile');
      togglePainel(show, ...esconde);
    });
  
    //show movie publication
    $('#pub-filme').on('click', event => {
      let esconde = [
        $('.company-profile'),
        $('.pub-post'),
        $('.show-movies'),
        $('.show-posts')
      ];
      let show = $('.pub-filme');
      togglePainel(show, ...esconde);
    });
  
    //show post publication
    $('#pub-post').on('click', event => {
      let esconde = [
        $('.company-profile'),
        $('.pub-filme'),
        $('.show-movies'),
        $('.show-posts')
      ];
      let show = $('.pub-post');
      togglePainel(show, ...esconde);
    });
  
    //show publicated movies
    $('#show-movies').on('click', event => {
      let esconde = [
        $('.company-profile'),
        $('.pub-filme'),
        $('.show-posts'),
        $('.pub-post')
      ];
      let show = $('.show-movies');
      togglePainel(show, ...esconde);
    });
  
    //show publicated posts
    $('#show-posts').on('click', event => {
      let esconde = [
        $('.company-profile'),
        $('.pub-filme'),
        $('.show-movies'),
        $('.pub-post')
      ];
      let show = $('.show-posts');
      togglePainel(show, ...esconde);
    });
  })(jQuery);
