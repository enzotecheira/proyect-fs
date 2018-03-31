<?php
	include('funciones.php');

	session_start();

	if (existeParametro('usuario',$_SESSION)) {
		header("Location: perfil.php");
		exit;
	}

	$email = dameValorDeParametro('email',$_POST);
  $codigo= rand(1,50000);

	$infoUsuario = [];

	$error = false;

	if (existeParametro('submit', $_POST)) {
		if($email) {
			$infoUsuario = dameInfoUsuarioPorCampo('email',$email);
			if ($infoUsuario['existe']) {
          mail($email, 'Codigo', $codigo);
					header("Location: renuevaPassword2.php");
					exit;
			} else {
				$error = true;
			}
		} else {
			$error = true;
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Renová tu contraseña</title>

	<!-- Metas -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Scripts -->
	<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>

	<!-- Styles -->
	<link rel="stylesheet" href="css/pruebaStyles.css">
</head>
<body>
	<div class="containerLog">
		<div class="transparentLog">
			<!-- HEADER -->
			<header>
				<div class="logo">LOGO</div>
				<a href="register.php"><button id="login-btn">Registrarse</button></a>
			</header>
			<!-- HEADER END -->

			<!-- CONTENT -->
				<div class="login">
					<form method="post">
							<h1>Password</h1>

								<!-- Email Input -->
							<?php if($error && !$email):?>
								<input style="background-color:red" type="email" name="email" placeholder="Ingrese su email" value="<?= $email ?>">
								<?php else: ?>
									<?php if($error && array_key_exists('existe', $infoUsuario) && !$infoUsuario['existe']): ?>
										<input style="background-color:red" type="email" name="email" placeholder="Email incorrecto. Reingrese">
										<?php else: ?>
											<input type="email" name="email" placeholder="Email">
									<?php endif; ?>
							<?php endif; ?>

            <label>Ingrese su mail y reciba el código</label>




					<button type="submit" name="submit">Enviar</button>

					</form>
</div>
			<!-- CONTENT END -->

			<!-- FOOTER -->
				<div id="footer">

					<div id="footerLog-board">
						<div class="logo">LOGO</div>
						<ul>
							<li><a href="register.php">Registrarse</a></li>
							<li><a href="index.php">Inicio</a></li>
							<li><a href="faq.php">FAQ</a></li>
							<li><a href="#">Contactar</a></li>
						</ul>
					</div>
				</div>
			<!-- FOOTER END -->


		</div>
	</div>

</body>
</html>
