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
				<form action="../controller/post.php" class="register-form text-light animated fadeIn show" id="user" method="post">

					<a href="/" class="text-light"><i class="fas fa-chevron-left"></i> Voltar</a>

					<h2 class="my-3">
						Pronto para o mundo do Cinema?
					</h2>

					<div class="form-group mb-4">
						<input type="text" class="form-control" placeholder="Nome completo" name="nome" required>
					</div>
					<div class="form-group mb-4">
						<input type="email" class="form-control" placeholder="Email" name="email" required>
					</div>
					<div class="form-group mb-4 form-group-password">
						<input type="password" class="form-control inputSenha" placeholder="Senha" name="senha" required>
						<span class="fa fa-fw fa-eye btnVerSenha float-right text-dark" onclick="verSenha()"></span>
						<small class="form-text text-danger helperPassword"></small>
					</div>
					<input type="submit" name="cadastrarUser" class="btn btn-outline-light btn-block" value="Cadastrar">
					<p class="d-flex justify-content-center my-3">
						<hr class="bg-white">
					</p>
					<p class="text-center">
						Já tem uma conta ? <a href="./login.php" class="link">Entrar</a>
					</p>
					<button type="button"class="btn btn-outline-light btn-block" id="log-as-company">Entrar como Rede de Cinema</button>
				</form>
				<form action="../controller/post.php" class="register-form text-light animated fadeIn hide" id="company" method="post">

					<a href="/" class="text-light"><i class="fas fa-chevron-left"></i> Voltar</a>

					<h2 class="my-3">
						Seu público lhe espera!
					</h2>

					<div class="form-group mb-4">
						<input type="text" class="form-control" placeholder="nome Fantasia" name="nome" required>
					</div>
					<div class="form-group mb-4">
						<input type="text" class="form-control" placeholder="Razão Social" name="razao-social" required>
					</div>
					<div class="form-group mb-4">
						<input type="email" class="form-control" placeholder="Email de contato" name="email" required>
					</div>
					<div class="form-group mb-4">
						<input type="text" class="form-control" placeholder="Cnpj" name="cnpj" required>
					</div>
					<div class="form-group mb-4 form-group-password">
						<input type="password" class="form-control inputSenha" placeholder="Senha de Login" name="senha" required>
						<span class="fa fa-fw fa-eye btnVerSenha float-right text-dark" onclick="verSenha()"></span>
						<small class="form-text text-danger helperPassword"></small>
					</div>
					<input type="submit" name="cadastraCompany" class="btn btn-outline-light btn-block" value="Cadastrar">
					<p class="d-flex justify-content-center my-3">
						<hr class="bg-white">
					</p>
					<p class="text-center">
						Já tem uma conta ? <a href="./login.php" class="link">Entrar</a>
					</p>
					<button type="button" class="btn btn-outline-light btn-block" id="log-as-user">Entrar como Usuario Padrão</button>
				</form>
			</div>
		</div>
	</div>


<?php require_once '../view/footer.php' ?>

	<!-- Custom JS -->
	<script src="../js/cadastro.js"></script>

	<script type="text/javascript">
		var status_register = "<?= $_SESSION['status_register'] ?>";

		if (!status_register) {
			alertify.error('Impossivel validar as inforamções inseridas!', 2000);
		}
	</script>

</body>
<?php unset($_SESSION['status_register']); ?>

</html>