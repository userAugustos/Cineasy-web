<?php
session_start();
// if (!$_SESSION['company_log']) {
//   header('Location: ../index.php');
//   exit();
// }
$_SESSION['company_name'] = 'CineDev';
?>
<html lang="pt-br">

<head>
  <title><?= $_SESSION['company_name'] ?></title>
  <?php require_once './header.php' ?>
  <!-- Custom CSS -->
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/company-style.css">

  <?php include '../controller/get.php' ?>
</head>

<body>
  <?php
  $url = 'http://localhost:3000/filmes/poster/';
  $get = new GetMetods();

  $get->getMovie('/listaemalta/', 8);
  ?>

  <div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
      <div class="p-4 pt-5">
        <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(images/logo.jpg);"></a>
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
          <p>Cineasy em parceria com <?= $_SESSION['company_name'] ?></p>
          <span>diretos autorais</span>
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
          <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Duvidas</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <div class="pub-filme hidden">
        <!-- publicar filme -->
        <div class="formMovie">
          <form class="text-center p-5" action="#!" method="post">
            <p class="h4 mb-4">Vamos Lançar esse Filme!!</p>
            <div class="form-row mb-4">
              <div class="col">
                <!-- Nome do filme -->
                <label for="movieName">Nome do Filme</label>
                <input type="text" id="movieName" class="form-control" name="movieName" placeholder="ex: Anaconda e elas " onchange="previewCard()">
              </div>
              <div class="col">
                <!-- nome do Diretor -->
                <label for="directorName">Diretor</label>
                <input type="text" id="directorName" class="form-control" name="directorName" placeholder="ex: João Pindoia">
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
                <input type="number" name="classificacao" id="classificacao" class="form-control">
                <small class="form-text text-muted mb-4">apenas a idade</small>
              </div>
              <div class="col">
                <label for="destribuidora">Destribuidora</label>
                <input type="text" id="destribuidora" class="form-control" name="destribuidora">
              </div>
            </div>
            <!-- Id filme -->
            <label for="movieTrailer" style="margin-left: -70%; margin-top: -40px;">Id do trailer</label>
            <input type="url" id="movieTrailer" class="form-control mb-4" name="movieTrailer" placeholder="clique no '?' para saber como pegar o ID no youtube">
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
                <input type="text" id="movieGenero" name="movieGenero" class="form-control" onchange="previewCard()">
              </div>
            </div>
            <div class="d-flex" style="margin: -25px auto 0 auto">
              <label for="" style="margin: auto 5px">Poster</label>
              <input type="file" class="form-control-file" id="moviePoster" onchange="previewFile()" name="moviePoster">
            </div>
            <div class="d-flex" style="margin: 10px 0">
              <label for="" style="margin: auto 5px">Banner</label>
              <input type="file" class="form-control-file" id="movieBanner" name="movieBanner">
            </div>
            <!-- Sinopse -->
            <label for="movieSinopse" style="margin-left: -80%;">Sinopse</label>
            <textarea class="form-control" rows="4" cols="50" id="movieSinopse" name="movieSinopse" style="resize:none;"></textarea>
            <!-- register movie up button -->
            <button class="btn btn-warning my-4 btn-block" type="submit">Anunciar Filme</button>
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
                <a href="" class="btn btn-info" id="category">Categoria</a>
              </div>
              <img class="card-img" src="../1585614116047-ailhadafantasia.jpg" alt="Imagem do card">
              <div class="card-body d-flex">
                <span id="likes">
                  <a href="#">
                    <i class="fas fa-thumbs-up" style="color: blue;">
                    </i>
                    0
                  </a>
                </span>
                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#filme"> Ver mais </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="pub-post hidden">
        <p>publicar post</p>
      </div>
      <div class="show-movies hidden">
        <p>Ver meus filmes</p>
      </div>
      <div class="show-posts hidden">
        <p>ver meus posts</p>
      </div>
      <div class="company-profile visible">
        <p>perfil da empresa</p>
      </div>
    </div>
  </div>

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="../node_modules/jquery/dist/jquery.min.js"></script>
  <script src="../node_modules/popper.js/dist/popper.js"></script>
  <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

  <script src="../node_modules/@fortawesome/fontawesome-free/js/all.min.js"></script>

  <script src="../node_modules/aos/dist/aos.js"></script>
  <script>
    var id = <?= $movie->id_films ?>;
    AOS.init();
  </script>
  <!-- Custom JS -->
  <script src="../js/company.js"></script>
</body>

</html>