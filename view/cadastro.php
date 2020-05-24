<?php session_start(); ?>
<html lang="pt-br">
<head>
	<title>Cadastre-se</title>
	<?php require_once './header.php'; ?>
	<link rel="stylesheet" href="../css/default.css">
	<link rel="stylesheet" href="../css/cadastro.css">
</head>
<body>
	<div class="limiter">
		<div class="container-register">
			<div class="register-image"></div>

			<div class="register-content">
				<form action="../controller/post.php" class="register-form text-light animated fadeIn" method="post">

					<a href="/" class="text-light"><i class="fas fa-chevron-left"></i> Voltar</a>

					<h2 class="my-3">
						Cadastre - se
					</h2>

					<div class="form-group mb-4">
						<input type="text" class="form-control" placeholder="Nome completo" name="nome">
					</div>
					<div class="form-group mb-4">
						<input type="email" class="form-control" placeholder="Email" name="email">
					</div>
					<div class="form-group mb-4 form-group-password">
						<input type="password" class="form-control inputSenha" placeholder="Senha" name="senha">
						<span class="fa fa-fw fa-eye btnVerSenha float-right text-dark" onclick="verSenha()"></span>
						<small class="form-text text-danger helperPassword"></small>
					</div>
					<div class="form-group mb-4">
						<input type="tel" class="form-control" placeholder="Telefone" name="telefone">
					</div>
					<input type="submit" name="cadastrar" class="btn btn-outline-light btn-block" value="Cadastrar">
					<p class="d-flex justify-content-center my-3">
						<hr class="bg-white">
					</p>
					<p class="text-center">
						Já tem uma conta ? <a href="./login.php" class="link">Entrar</a>
					</p>

				</form>
			</div>
		</div>
	</div>


	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="../node_modules/jquery/dist/jquery.min.js"></script>
	<script src="../node_modules/popper.js/dist/popper.min.js"></script>
	<script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

	<script src="../node_modules/@fortawesome/fontawesome-free/js/all.min.js"></script>
	<script src="../node_modules/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
	<script src="../node_modules/alertifyjs/build/alertify.min.js" ></script>

	<!-- Custom JS -->
	<script src="../js/cadastro.js"></script>

	<script type="text/javascript">
		var status_register = "<?=$_SESSION['status_register']?>";

		if (!status_register) {
			  alertify.error('Impossivel validar as inforamções inseridas!', 2000);
		}
	</script>

</body>
	<?php unset($_SESSION['status_register']); ?>
</html>
