<?php
  session_start();
  if ((isset($_SESSION['status_log']) && $_SESSION['status_log'] == false ) || (isset($_SESSION['status_register']) && $_SESSION['status_register'] == false )) {
    header('Location: ../');
    exit();
  }
  require_once '../controller/get.php';

  $get = new GetMetods();

  if(isset($_SESSION['company_log']) && $_SESSION['company_log'] == true){
    $get->getUser('empresa/',$_SESSION['user_id']);
  }else{
    $get->getUser('usuarios/',$_SESSION['user_id']);
  }
  $user = $get->userObject[0];
?>
<html lang="pt-br">
<head>
  <title><?=$user->nome?></title>
  <?php require_once './header.php' ?>
  <link rel="stylesheet" type="text/css" href="../css/perfil.css">
</head>

<body>
<?php
  $url = 'http://localhost:3000/fotoperfil/';
?>
  <div class="cover-container">
    <div class="cover-picture" style="background-image: url(<?=$url.$user->capaUser?>)"></div>
    <div class="cover-profile-picture" style="background-image: url(<?=$url.$user->fotoUser?>)"></div>
    <span class="cover-description">
      <?php if ($user->frase) {
        echo $user->frase;
      }else {
        echo 'Você ainda não definiu uma frase de perfil';
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
          <div id="general" class="active">
            Usuario: <?=$user->nome?>
          </div>
          <div id="history">

          </div>
          <div id="informations">

          </div>
          <div id="retrieve-codes">

          </div>
          <div id="profile">
            
          </div>
        </div>
      </div>
    </div>
  </main>

  <?php require_once './footer.php'?>
  <script src="/js/perfil.js"></script>
</body>
</html>