<?php
session_start();
if ((isset($_SESSION['status_log']) && $_SESSION['status_log'] == false) || (isset($_SESSION['status_register']) && $_SESSION['status_register'] == false)) {
  header('Location: ../');
  exit();
}
require_once '../controller/get.php';

$get = new GetMetods();

if (isset($_SESSION['company_log']) && $_SESSION['company_log'] == true) {
  $get->getUser('empresa/', $_SESSION['user_id']);
} else {
  $get->getUser('usuarios/', $_SESSION['user_id']);
}
$user = $get->userObject[0];
$id = $_SESSION['user_id'];
?>
<html lang="pt-br">

<head>
  <title>Cineasy</title>

  <link href="../node_modules/mdbootstrap/css/mdb.min.css" rel="stylesheet">

  <?php require_once './header.php' ?>
  <link rel="stylesheet" type="text/css" href="../css/perfil.css">
</head>

<body>
  <?php
  $url = 'http://localhost:3000/fotoperfil/';
  ?>
  <div class="cover-container">
    <div class="cover-picture" style="background-image: url(<?= $url . $user->capaUser ?>)"></div>
    <div class="cover-profile-picture" style="background-image: url(<?= $url . $user->fotoUser ?>)"></div>
    <span class="cover-description">
      <?php if ($user->frase) {
        echo $user->frase;
      } else {
        echo 'Você ainda não definiu uma frase';
      } ?>
    </span>
  </div>

  <main class="container-fluid profile-main">
    <div class="row">
      <div class="profile-sidebar col-12">
        <ul class="profile-menu">
          <li class="profile-menu__item">
            <a data-item-type="general" class="active" href="#">Geral</a>
          </li>
          <li class="profile-menu__item">
            <a data-item-type="history" href="#">Historico Compras</a>
          </li>
          <li class="profile-menu__item">
            <a data-item-type="informations" href="#">Informações Pessoais</a>
          </li>
          </li>
          <li class="profile-menu__item">
            <a data-item-type="retrieve-codes" href="#">Resgatar Código</a>
          </li>
          <li class="profile-menu__item">
            <a data-item-type="profile" href="#">Atualizar Perfil</a>
          </li>
        </ul>
      </div>

      <div class="col-12">
        <div class="content-holder">
          <div id="general d-flex justify-content-between aligm-items-center" class="active">
            <h4>Bem vindo <?= $user->nome ?></h4>
	    <a href="../">Home</a>
          </div>
          <div id="history">

          </div>
          <div id="informations">

          </div>
          <div id="retrieve-codes">

          </div>
          <div id="profile">
            <strong>Altere a foto de perfil</strong>
            <div class="profile-pic">
              <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="put" />
                <div class="btn btn-dark btn-sm float-left">
                  <span><i class="fa fa-file" aria-hidden="true" style="margin-left: -20px; color: #ffec40; width: 20px;"></i></span>
                  <input type="file" name="profilePic" id="profilePic">
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-dark" name="profile_pic" onclick="setProfilePicUser(<?= $id ?>)">
                    <i class="fa fa-upload" aria-hidden="true"></i>
                  </button>
                </div>
              </form>
              <div class="preview">
                <p>Preview da imagem</p>
                <img src="../assets/userIcon.png" alt="">
              </div>
            </div>
            <div class="profile-phrase">
              Altere a frase de perfil
              <div class="phrase">
                <form class="" action="../controller/put.php" method="POST" id="phrase-form" enctype="multipart/form-data">
                  <input type="hidden" name="_method" value="put" />
                  <div class="">
                    <span></span>
                    <input type="text" name="phrase" id="phrase">
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-dark" name="phrase-profile" >
                      alterar
                    </button>
                  </div>
                </form>
                <span>Dica: Existe um live preview do seu texto bem a baixo da sua foto ali em cima :)</span>
              </div>
            </div>
            <div class="profile-banner">
              <strong>Altere o seu banner</strong>
              <div class="banner">
                <form class="" action="" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="_method" value="put" />
                  <div class="btn btn-dark btn-sm float-left">
                    <span><i class="fa fa-file" aria-hidden="true" style="margin-left: -20px; color: #ffec40; width: 20px;"></i></span>
                    <input type="file" name="bannerPic" id="bannerPic">
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-dark" name="profile_pic" onclick="setBannerPicUser(<?= $id ?>)">
                      <i class="fa fa-upload" aria-hidden="true"></i>
                    </button>
                  </div>
                </form>
                <div class="preview">
                  <p>Preview da imagem</p>
                  <img src="../assets/userIcon.png" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <?php require_once './footer.php' ?>
  <script src="../js/perfil.js"></script>
  <script src="../node_modules/mdbootstrap/js/mdb.min.js"></script>
  <script>
  </script>
</body>

</html>