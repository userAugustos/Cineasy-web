<?php session_start(); ?>
<html lang="pt-br">
<head>
  <title>Cineasy</title>
  <?php require_once './view/header.php'; ?>
  <link rel="stylesheet" href="../css/default.css">
  <link rel="stylesheet" href="../css/style.css">
</head>

<?php require './controller/get.php'; ?>

<body>
<?php
  $get = new GetMetods();

  $get->getMovie('/listaemalta/', 8); //pegando cartaz
  function logOut() {
    unset($_SESSION['status_log']);
    unset($_SESSION['status_register']);
  }

  if (isset($_GET['logout'])) {
    logOut();
  }
?>
  <!--Menu-->
  <nav class="navbar-custom">
    <ul class="navbar-nav-custom">
      <li class="navbar-custom-logo">
        <a class="nav-custom-link">

          <img src="../assets/Nome.png" width="50%" alt="" class="nav-custom-logo">
          <img src="../assets/Ingresso.png" height="28px" alt="" class="navbar-custom-logo-fixed">
        </a>
      </li>

      <li class="nav-custom-item">
        <a href="/" class="nav-custom-link">
          <i class="fas fa-home"></i>
          <span class="nav-custom-link-text">Home</span>
        </a>
      </li>
<?php
  if ((isset($_SESSION['status_log']))||(isset($_SESSION['status_register']))):
?>
      <li class="nav-custom-item">
        <a href="./view/profile.php" class="nav-custom-link">
          <i class="fas fa-user"></i>
          <span class="nav-custom-link-text"><?=$_SESSION['user_name']?></span>
        </a>
      </li>
      <li class="nav-custom-item">
        <a href="/?logout=true" class="nav-custom-link">
          <i class="fas fa-power-off"></i>
          <span class="nav-custom-link-text">Sair</span>
        </a>
      </li>
<?php else :?>
        <li class="nav-custom-item">
          <a href="./view/login.php" class="nav-custom-link">
            <i class="fas fa-sign-in-alt"></i>
            <span class="nav-custom-link-text">Login</span>
          </a>
        </li>
        <li class="nav-custom-item">

          <a href="./view/cadastro.php" class="nav-custom-link">
            <i class="fas fa-user-plus"></i>
            <span class="nav-custom-link-text">Cadastro</span>
          </a>
        </li>
    <?php endif;?>
    </ul>
  </nav>

  <!--content-->

  <main>
    <!--App AD-->
    <section class="home d-flex align-items-center">
      <div class="container">
        <div class="row animated fadeIn">
          <div class="col-md-6 col-sm-12 align-self-center" id="AppAD">
            <h2>Descontos exclusivos integrados na plataforma</h2>
            <p>Com o App da Cineasy você tem acesso a comunidades exclusivas do mundo do cinema, a ingressos de cinema,
              combos e
              mimos, além de descontos progressivos em ingressos.</p>
            <p> Eai, tá esperando o que para baixar e virar assinante? Disponível em</p>
            <button type="button" class="btn btn-dark mr-2">
              <i class="fab fa-google-play mr-1"></i> Play Store
            </button>
            <button type="button" class="btn btn-dark">
              <i class="fab fa-app-store-ios mr-1"></i> App Store
            </button>
            <span class="mx-2 d-small-off">ou</span>

            <a href="./view/cadastro.php" class="btn btn-outline-dark d-small-off">

              Cadastre - se
            </a>
          </div>
          <div class="col-md-6 col-sm-12 d-flex justify-content-center" id="image" data-aos="fade-right">

            <img src="../assets/CelularCine.png" alt="">

          </div>
        </div>
      </div>
    </section>

    <h4> Filmes Mais acessados </h4>

    <!--Movies Cards-->
  <section class="filmes row align-items-center">
<?php foreach ($get->movieObject as $key => $movie): ?>
      <div class="col-md-3 col-sm-12">
        <div class="card" id="card-movie">
          <div class="card-header">
            <strong><?=$movie->nome?></strong>
          </div>
          <div class="card-img-overlay">
            <a href="" class="btn btn-info" id="category"><?=$movie->genero ?></a>
          </div>
          <img class="card-img" src=<?=$movie->foto ?> alt="Imagem do card">
          <div class="card-body d-flex">
            <span id="likes">
              <a href="#">
                <i class="fas fa-thumbs-up"></i>
              </a>
            </span>
            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="<?='#movie'.$movie->id_films?>">
              Ver mais</button>
          </div>
        </div>
      </div>
<?php endforeach; ?>
    </section>

    <!--Plans Cards-->

  <h4 id="plans-title">Pacotes Cineasy</h4>

    <div class="card-deck">
      <div class="card" id="card-plans" data-aos="fade-left">

        <img class="card-img-top" src="../assets/harley.png">
        <div class="card-body card-plans">
          <h5 class="card-title">Plano Free</h5> <h4>Gratuito</h4>
          <p class="card-text"> O plano free não lhe oferece nenhum beneficio na plataforma</p>
          <p class="card-text">
            você será um usuario padrão, com isso você poder
          </p>

          <ul>
            <li>Avaliar Filmes na plataforma</li>
            <li>Acesso as comunidades de publicações</li>
            <li>Chance de ganhar cupons em sorteios</li>
          </ul>
        </div>
      </div>
      <div class="card" id="card-plans" data-aos="fade-up">

        <img class="card-img-top" src="../assets/tchala.png">

        <div class="card-body card-plans">

          <h5 class="card-title">Plano Hero</h5> <h4>R$ 18,00</h4>
          <p class="card-text">Com o plano hero você tem acesso a tudo que teria no planos free</p>
          <p class="card-text">e os seguintes beneficios:</p>
          <ul>
            <li>Dois Descontos garantidos para ingressos</li>
            <li>Participará de sorteios extras para ganhar cupons</li>
            <li>Seus descontos irão variar entre 30% e 40%</li>
		  <li>Desconto na primeira assinatura do pacote Hero</li>
          </ul>

        </div>
      </div>
      <div class="card" id="card-plans" data-aos="fade-right">

        <img class="card-img-top" src="../assets/darth_vader.png">

        <div class="card-body cad-plans">
          <h5 class="card-title">Plano Super Hero</h5> <h4>R$22,00</h4>
          <p class="card-text">Com o plano Super Hero, você tem acesso a tudo dos planos free e Hero</p>
          <p class="card-text">e os seguintes beneficios:</p>
          <ul>
            <li>4 descontos garantidoss para ingressos</li>
            <li>Participará de sorteios extras</li>
            <li>Descontos especiaias para acompanhantes</li>
            <li>Seus descotnos irão variar entre 45% e 60%</li>
		  <li>Desconto na primeira assinatura do pacote Super Hero</li>
          </ul>
        </div>
      </div>
    </div>

  </main>
      <!-- Footer -->
      <footer class="page-footer font-small unique-color-dark" >
        <div style="background-color: black; color: white">
          <div class="container">
            <div class="row py-4 d-flex align-items-center">
              <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
                <h6 class="mb-0">Veja mais sobre nós nas nossas redes sociais!</h6>
              </div>
              <div class="col-md-6 col-lg-7 text-center text-md-right">
                <!-- Facebook -->
                <a href="#" class="" style="color: white">
                  <i class="fab fa-facebook-f white-text mr-4"></i>
                </a>
                <!-- Twitter -->
                <a href="#" class="" style="color: white">
                  <i class="fab fa-twitter white-text mr-4"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="container text-center text-md-left mt-5">
          <div class="row mt-3">
            <div class="col-sm-3 col-lg-4 col-xl-3 mx-auto mb-4">
              <h6 class="text-uppercase font-weight-bold">Cineasy</h6>
              <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
              <p>Cineasy é uma iniciativa para mudar o jeito que você experiência o cinema, você pode aproveitar tudo que a cineasy lhe dispões, assinando os planos Cineasy e baixando o App</p>
            </div>
            <div class="col-sm-3 col-lg-2 col-xl-2 mx-auto mb-4">
              <h6 class="text-uppercase font-weight-bold">Planos</h6>
              <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
              <p>
                <a href="#">Free</a>
              </p>
              <p>
                <a href="#">Hero</a>
              </p>
              <p>
                <a href="#">Super Hero</a>
              </p>
            </div>
            <div class="col-sm-3 col-lg-2 col-xl-2 mx-auto mb-4">
              <h6 class="text-uppercase font-weight-bold">Empresas parceiras</h6>
              <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
              <p>
                <a href="#">Cinemark</a>
              </p>
              <p>
                <a href="#">Moviecom</a>
              </p>
              <p>
                <a href="#">Não sei brother</a>
              </p>
              <p>
                <a href="#">Outra empresa</a>
              </p>
            </div>
            <div class="col-sm-1 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
              <h6 class="text-uppercase font-weight-bold">Baixe o App</h6>
              <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
              <p>
                <a href="#" style="color: black">
                  <i class="fab fa-google-play mr-1"></i>Play Store</p>
                </a>
              <p>
                <a href="#" style="color: black">
                  <i class="fab fa-app-store-ios mr-1"></i> Apple Store</p>
                </a>
              <p>
            </div>
          </div>
        </div>
      </footer>


    <!-- Modais -->

    <!-- Modal poderoso chefão-->
    <div class="modal fade" id="modalPlanos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" displayed="false">
    <div class="modal-dialog" role="document">
      <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
      <div class="conteudo-modal">
        <div id="plans">
          <h5>Assine os planos Cineasy, com os planos você terá acesso a vantagens unicas dentro do website e
            aplicativo mobile. </h5>
          <h5>Você poderá teracesso a desontos únicos e pacotes especias </h5>

          <button class="btn btn-danger" data-dismiss="modal" aria-label="Fechar">Planos</button>
        </div>
        <div id="phrase">
          <h4>
            Eu irei fazer uma oferta que você não poderá recusar
          </h4>
          <span>Poderoso Chefão - 1972</span>
        </div>
      </div>
  </div>

  <!--Modal ver mais movies-->
<?php
  foreach ($get->movieObject as $key => $movie):
  $get->getDetalhes($movie->id_films);
  $info = $get->detalhes[0];

?>
  <div class="modal fade" id="<?='movie'.$movie->id_films?>" tabindex="-1" role="dialog" aria-labelledby="Modalmovie" aria-hidden="true">
    <div class="modal-dialog" role="document">
    </div>
      <div class="modal-content">
      <div class="header-modal">
        <a href="/" class="logo-modal"><h3><?=$info['nome']?></h3></a>
        <button type="button" data-dismiss="modal"><img src="././assets/toggle.png" alt=""></button>
      </div>
      <div class="banner-modal">
        <img src="./assets/sonic-banner.jpg" alt="">
        <div class="main-modal">
          <h2></h2>
          <p><?=$info['sinopse']?></p>
          <p>diretor: <?=$info['diretor']?></p>
          <a href="#" class="modal-play"><img src="./assets/play.png" alt="">Ver o Trailer</a>
        </div>
      </div>
    </div>
    <div class="trailer">

      <iframe width="560" height="315" src="https://www.youtube.com/embed/zQEjE_M2Esw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      <img src="./assets/close.png" class="modal-close" alt="">
    </div>
  </div>
<?php endforeach; ?>


  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="node_modules/jquery/dist/jquery.min.js"></script>
  <script src="node_modules/popper.js/dist/popper.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

  <script src="node_modules/@fortawesome/fontawesome-free/js/all.min.js"></script>

  <script src="node_modules/aos/dist/aos.js" ></script>
  <script>
    AOS.init();
  </script>

  <!-- Custom JS -->
  <script src="./js/index.js"></script>
</body>

</html>
