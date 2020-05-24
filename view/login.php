<?php session_start(); ?>
<html lang="pt-br">
<head>
	<title>Cineasy</title>
  <?php require_once './header.php'; ?>
	<!-- Custom CSS -->
	<link rel="stylesheet" href="../css/default.css">
	<link rel="stylesheet" href="../css/login.css">

</head>
<body>
  <div class="limiter">
    <div class="container-login">
      <div class="login-content">

        <form action="../controller/post.php" class="formLogin animated fadeIn" method="post">
          <a href="/" class="text-dark"><i class="fas fa-chevron-left"></i> Voltar</a>

          <h2 class="title my-3">Faça seu logon</h2>
          <div class="form-group mb-4">
            <input type="email" class="form-control" placeholder="Email" name="email">
          </div>
          <div class="form-group mb-4 text-right">
            <input type="password" class="form-control inputSenha" placeholder="Senha" name="senha">
            <span class="fa fa-fw fa-eye btnVerSenha float-right" onclick="verSenha()"></span>
            <a href="" class="toggleLogin">Esqueceu sua senha?</a>
          </div>
          <input type="submit" name="logar" class="btn btn-outline-dark btn-block" value="Logar">
          <p class="d-flex justify-content-center my-3">
            <hr class="bg-white">
          </p>
          <p class="text-center">
            Não tem uma conta ? <a href="./cadastro.php" class="link">Cadastre - se</a>
          </p>
        </form>

        <form action="../controller/post.php" class="formRecupera animated fadeIn hide" method="post">
          <a href="/" class="text-dark"><i class="fas fa-chevron-left"></i> Voltar</a>

          <h2 class="title my-3">Esqueci minha senha</h2>
          <p>Relaxa! Insira o seu email de cadastro e enviaremos instruções para você.</p>
          <div class="form-group mb-4 text-right">
            <input type="email" class="form-control" name="email" placeholder="Email">
            <a href="" class="toggleLogin">Lembrei minha senha</a>
          </div>
          <button type="button" class="btn btn-outline-dark btn-block">Enviar</button>
        </form>
      </div>
    </div>
  </div>

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="../node_modules/jquery/dist/jquery.min.js"></script>
  <script src="../node_modules/popper.js/dist/popper.min.js"></script>
  <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

  <script src="../node_modules/@fortawesome/fontawesome-free/js/all.min.js"></script>
  <script src="../node_modules/alertifyjs/build/alertify.min.js" ></script>

  <!-- Custom JS -->
  <script src="../js/login.js"></script>

  <script type="text/javascript">
		var status_log = "<?=$_SESSION['status_log']?>";
		var reset_email = "<?=$_SESSION['reset_send']?>";

		if (!status_log) {
			alertify.error('Email e/ou senha incorretos!', 2000);
			alertify.warning('Por favor tente de novo', 2000);
		}
		else {
			console.log('ok');
		}
		if (reset_email) {
			alertify.alert('Tudo Certo, confira o seu email');
		}
  </script>

	<?php unset($_SESSION['status_log']); ?>
</body>

</html>
