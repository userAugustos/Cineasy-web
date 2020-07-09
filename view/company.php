<?php session_start();
if (!$_SESSION['company_log']) {
  header('Location: ../index.php');
  exit();
}
include '../controller/get.php';

$id = $_SESSION['user_id'];
$name = $_SESSION['user_name'];

$get = new GetMetods();
$get->getUser('/empresa/', $id);
$user = $get->userObject[0];
?>
<html lang="pt-br">

<head>
  <title><?= $name ?></title>
  <?php require_once './header.php' ?>
  <!-- Custom CSS -->
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/company-style.css">
</head>

<body>
  <?php

  $url = 'http://localhost:3000/filmes/poster/';
  $urlFoto = 'http://localhost:3000/fotoperfil/';
  $urlPost = 'http://localhost:3000/posts/';

  $get->getMovie('/films/', 8);
  $get->getPost($id, 8);

  ?>

  <div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
      <div class="p-4 pt-5">
        <a href="#" class="img logo rounded-circle mb-5" style="background-image: url('<?= $urlFoto . $user->fotoUser ?>')"></a>
        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#changeProfilePic">Trocar Foto</button>
        <ul class="list-unstyled components mb-5">
          <li>
            <a href="#createMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Publicar</a>
            <ul class="collapse list-unstyled" id="createMenu">
              <li id="pub-filme">
                <a href="#">Filme</a>
              </li>
              <li id="pub-post">
                <a href="#">Post</a>
              </li>
            </ul>
          </li>
          <li id="show-movies">
            <a href="#">Seus Filmes</a>
          </li>
          <li id="show-posts">
            <a href="#">Minhas publicações</a>
          </li>
          <li class="active" id="company-profile">
            <a href="#">Seu Perfil</a>
          </li>
        </ul>

        <div class="footer">
          <!-- adcionar o nome da emrpesa -->
          <p>Cineasy em parceria com <?= $user->razaoSocial ?></p>
          <a href="#">Diretos Autorais</a>
        </div>

      </div>
    </nav>

    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5">

      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

          <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
          </button>
          <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#togglePageNavbar" aria-controls="togglePageNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
          </button>

          <div class="collapse navbar-collapse" id="togglePageNavbar">
            <ul class="nav navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="../">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#duvidas-modal">Duvidas</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <div class="pub-filme hidden">
        <!-- publicar filme -->
        <div class="formMovie">
          <form class="text-center p-5" action="" method="post" id="movie-form">
            <p class="h4 mb-4">Vamos Lançar esse Filme!!</p>
            <div class="form-row mb-4">
              <div class="col">
                <!-- Nome do filme -->
                <label for="movieName">Nome do Filme</label>
                <input type="text" id="movieName" class="form-control" name="movieName" placeholder="ex: 5 Dias de Guerra" onchange="previewMovie()">
              </div>
              <div class="col">
                <!-- nome do Diretor -->
                <label for="directorName">Diretor</label>
                <input type="text" id="directorName" class="form-control" name="directorName" placeholder="ex: Renny Harlin">
              </div>
            </div>
            <div class="form-row mb-4">
              <div class="col">
                <label for="origem">Pais de origem</label>
                <input type="text" name="origem" id="origem" class="form-control">
              </div>
              <div class="col">
                <label for="dataEstreia">Data de Estreia</label>
                <input type="date" id="dataEstreia" class="form-control" name="dataEstreta">
              </div>
            </div>
            <div class="form-row mb-4">
              <div class="col">
                <label for="classificacao">Classificação indicativa</label>
                <input type="number" name="classificacao" id="classificacao" class="form-control" placeholder="para 'Livre' use: 0">
                <small class="form-text text-muted mb-4">apenas a idade</small>
              </div>
              <div class="col">
                <label for="destribuidora">Destribuidora</label>
                <input type="text" id="destribuidora" class="form-control" name="destribuidora">
              </div>
            </div>
            <!-- Id filme -->
            <label for="movieTrailer" style="margin-left: -70%; margin-top: -40px;">Id do trailer</label>
            <div class="col d-flex" style="align-items:center">
              <input type="url" id="movieTrailer" class="form-control mb-3" name="movieTrailer" placeholder="clique no '?' para saber como pegar o ID no youtube">
              <i class="fa fa-question-circle" aria-hidden="true" style="margin-top: -10px;" data-toggle="modal" data-target="#trailer-id-modal"></i>
            </div>
            <!-- Tempo de fime & imagem-->
            <div class="form-row mb-4">
              <div class="col">
                <label for="movieTime">Tempo de duração</label>
                <input type="number" id="movieTime" class="form-control" name="movieTime" aria-describedby="minTime">
                <small id="minTime" class="form-text text-muted mb-4">
                  em minutos ex: 160min
                </small>
              </div>
              <div class="col">
                <label for="movieGenero" style="margin-left: -10%;">Genero</label>
                <input type="text" id="movieGenero" name="movieGenero" class="form-control" onchange="previewMovie()">
              </div>
            </div>
            <div class="d-flex" style="margin: -25px auto 0 auto">
              <label for="" style="margin: auto 5px">Poster</label>
              <input type="file" class="form-control-file" id="moviePoster" onchange="previewMovie()" name="moviePoster">
            </div>
            <div class="d-flex" style="margin: 10px 0">
              <label for="" style="margin: auto 5px">Banner</label>
              <input type="file" class="form-control-file" id="movieBanner" name="movieBanner">
            </div>
            <!-- Sinopse -->
            <label for="movieSinopse" style="margin-left: -80%;">Sinopse</label>
            <textarea class="form-control" rows="4" cols="50" id="movieSinopse" name="movieSinopse" style="resize:none;"></textarea>

            <label for="movieElenco" style="margin-left: -80%;">Elenco</label><br/>
            <textarea name="movieElenco" id="movieElenco" cols="50" rows="2" style="resize:none;" placeholder="recomendamos a inserção apenas das estrelas do filme"></textarea>
            <!-- register movie up button -->
            <button class="btn btn-warning my-4 btn-block" type="submit" name="movieButton">Anunciar Filme</button>
            <hr>
            <!-- Helper -->
            <p>Alguma duvida?
              <a href="" target="_blank">como fazer meu upload</a>
          </form>
        </div>
        <!-- previe filme -->
        <div class="preview">
          <h4>Como Está ficando?</h4>
          <div class="col-sm-12 col-md-7">
            <div class="card" id="card-movie">
              <div class="card-header">
                <strong>Titulo</strong>
              </div>
              <div class="card-img-overlay">
                <a href="" class="btn btn-info" id="category">Genero</a>
              </div>
              <img class="card-img" src="<?= $url . 'base-blank-poster.png' ?>" alt="Imagem do card">
              <div class="card-body d-flex">
                <span id="likes">
                  <a href="#">
                    <i class="fas fa-thumbs-up" style="color: blue;">
                    </i>
                    0
                  </a>
                </span>
                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#filme-preview"> Ver mais </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="pub-post hidden">
        <div class="postForm">
          <form class="text-center p-5" action="#!" method="post">
            <p class="h4 mb-4" style="margin: -20px 0 0 0; border-radius: 1rem;">Cire publicações para engajar sua comunidade</p>
            <div class="form-row mb-4">
              <div class="col d-block">
                <!-- Texto da publicação -->
                <label for="post-text" style="margin: 0 15px 0 -22rem">Texto da publicação</label><br>
                <textarea name="post-text" rows="3" cols="50" style="resize:none;" onchange="previewPost()"></textarea>
              </div>
            </div>
            <div class="" style="margin: 25px auto 0 auto">
              <label for="post-image" style="margin: 0 10px 0 -20rem">Imagem da publicação</label>
              <input type="file" class="form-control-file" id="post-image" onchange="previewPost()" name="post-iamge">
            </div>
            <button class="btn btn-dark" type="submit" id="moviePost" onclick="uploadPost(<?=$id?>)" style="margin-left: -80%; margin-top: 20px;">
              Publicar
            </button>
          </form>
        </div>

        <div class="preview-publicacao">
          <div class="title">
            <img src="<?= $urlFoto . $user->fotoUser ?>" alt="" id="icon">
            <strong class=""></strong>
          </div>
          <div class="image-view">
            <img src="<?= $url . 'base-blank-banner.png' ?>" alt="">
          </div>
          <div class="content">
            <div><i class="fas fa-thumbs-up" style="color: #f2dd3d;"></i><small style="color: #fff;">Curtidas</small></div>
            <div><i class="fas fa-comment" style="color:#f2dd3d"></i><small style="color: #fff;">Comentarios</small></div>
            <div><small style="color: #fff;">0</small><small style="color: #fff;">vizualizações</small></div>
          </div>
        </div>
      </div>
      <div class="show-movies hidden">
          <?php foreach ($get->movieObject as $key => $movie) : ?>
            <div class="col-md-3 col-sm-12">
              <div class="card" id="card-movie">
                <div class="card-header">
                  <strong><?= $movie->nome ?></strong>
                </div>
                <div class="card-img-overlay">
                  <a href="" class="btn btn-info" id="category"><?= $movie->genero ?></a>
                </div>
                <img class="card-img" alt="Imagem do card" src=<?= $url . $movie->foto ?>>
                <div class="card-body d-flex">
                  <span id="likes">
                    <a href="#">
                      <i class="fas fa-thumbs-up"></i>
                    </a>
                  </span>
                  <button type="button" onclick="insertMovie(<?= $movie->id_films ?>)" class="btn btn-outline-danger" data-toggle="modal" data-target="<?= '#movie' . $movie->id_films ?>">
                    Ver mais
                  </button>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
      </div>
      <div class="show-posts hidden">
        
        <?php foreach ($get->postObject as $key => $post) : ?>
          <div class="publicacao col-md-4 col-sm-12" >
            <div class="title d-flex align-items-center" style="margin-bottom: 5px; margin-top: -15px;">
              <img src="<?=$urlFoto . $user->fotoUser?>" alt="">
              <strong style="margin-left: 6px;"><?=$post->note?></strong>
            </div>
            <img src="<?=$urlPost . $post->img_post?>" alt="">
            <div class="content d-flex justify-content-between">
              <div><i class="fas fa-thumbs-up" style="color: #f2dd3d;"></i><small style="color: #fff;">Curtidas</small></div>
              <div><i class="fas fa-comment" style="color:#f2dd3d"></i><small style="color: #fff;">Comentarios</small></div>
            <div><small style="color: #fff;">0</small><small style="color: #fff;">vizualizações</small></div>
          </div>
          </div>
        <?php endforeach;?>
      </div>
      <div class="company-profile visible flex-column w-100 p-3 mr-auto" style="margin-top: 2rem;">
        <h2>Olá
          <?= $user->nome ?>
        </h2>
        <p>Esteja sempre atento as informações da sua comunidade</p>
        <div class="d-flex justify-content-between align-items-center w-100">
          <p>Seus seguidores estão comentando sobre:</p>
          <div class="d-flex" id="movies-on-rise">

          </div>
        </div>
        <section class="content d-flex flex-column justify-content-start p2 w-100">
          <div class="followers">
            <div class="title d-flex justify-content-between align-items-center w-100">
              <h5>Seus Seguidores</h5>
              <p id="followers"></p>
            </div>
            <div class="content d-flex flex-wrap p-2 justify-content-between align-items-start w-100">
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>

  <div class="modal fade" id="changeProfilePic" tabindex="-1" role="dialog" aria-labelledby="changeProfilePic" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="changeProfilePic">Mude sua foto de perfil</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body d-flex flex-column justify-content-between align-items-center w-100" id="modal-profile">
          <div class="preview-profile">
            <img src="../assets/userIcon.png" alt="profile pic">
          </div>
          <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="put" />
            <div class="form-group">
              <input type="file" name="fileData" id="profilePic">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-dark" name="profile_pic" onclick="setProfilePicCompany(<?= $id ?>)">
                Mudar
              </button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-secondary" data-dismiss="modal">
            Cancelar
          </button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="filme-preview" tabindex="-1" role="dialog" aria-labelledby="Modalmovie" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="header-modal">
          <a href="/" class="logo-modal">
            <h3>Nome do filme</h3>
          </a>
          <button type="button" data-dismiss="modal"><img src="../assets/toggle.png" alt=""></button>
        </div>
        <div class="banner-modal">
          <img src="<?=$url. 'base-blank-banner.png'?>" alt="" id="banner">
          <div class="main-modal">
            <h2></h2>
            <p id="sinopse">sinopse</p>
            <span>Dirigido por:</span><p id="diretor">Diretor</p>
            <p id="elenco">Elenco</p>
            <a href="#" class="modal-play"><img src="../assets/play.png" alt="">Ver o Trailer</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="trailer-id-modal" tabindex="-1" role="dialog" aria-labelledby="trailer-id-modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Achando o link do seu video!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Para pegar o ID do filme, Você precisará ir até o video já postado em um canal como Youtube ou outro</p>
        <hr />
        <img src="../assets/get-video-link-example.png" alt="Examplo de video">
        <hr />
        <p>Depois clique em <span id="share">Compartilhar</span></p>
        <hr />
        <img src="../assets/get-link-share-example.png" alt="">
        <hr />
        <p>Copie o link proposto e pronto, cole aqui :)</p>
        <span id="alert">Atenção, não copie o link da barra de url do seu Browser, e sim o fornecido na aba de compartilhamento!</span>
      </div> 
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Entendidod!</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="duvidas-modal" tabindex="-1" role="dialog" aria-labelledby="duvidas-modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Cineasy, o cinema na palma da sua mão</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div> 
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="../node_modules/jquery/dist/jquery.min.js"></script>
  <script src="../node_modules/popper.js/dist/popper.js"></script>
  <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

  <script src="../node_modules/@fortawesome/fontawesome-free/js/all.min.js"></script>
  <script src="../node_modules/alertifyjs/build/alertify.min.js"></script>
  <script src="../node_modules/aos/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <!-- Custom JS -->
  <script src="../js/company.js"></script>
</body>

</html>