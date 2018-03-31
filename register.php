<?php
	include('funciones.php');

	session_start();

	if (existeParametro('usuario',$_SESSION)) {
		header("Location: perfil.php");
		exit;
	}

	$usuario = dameValorDeParametro('usuario',$_POST);
	$nombre = dameValorDeParametro('nombre',$_POST);
	$email = dameValorDeParametro('email',$_POST);
	$password = dameValorDeParametro('password',$_POST);
	$password2 = dameValorDeParametro('password2',$_POST);
	$existeFile = existeFileSinError('imagen');

	$infoUsuario = [];

	$error = false;
	$errorReingresoPassword=false;


	if (existeParametro('submit', $_POST)) {
		if ($nombre && $usuario && $email && $password && $existeFile && $password2) {
			if ($password==$password2) {
				$infoUsuario = dameInfoUsuarioPorCampo('email',$email);
				if ($infoUsuario['existe']) {
					$error = true;
				} else{
					guardarUsuario([
						'usuario' =>$usuario,
						'nombre'=>$nombre,
						'email' => $email,
						'password' => password_hash($password,PASSWORD_DEFAULT),
						'id' => $infoUsuario['proximoId']+1,
						'imagen' => guardarArchivoSubido('imagen')
					]);
					header("Location: login.php");
					exit;
				}
			}
			$error = true;
			$errorReingresoPassword=true;
		} else {
			$error = true;
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>

	<!-- Metas -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Scripts -->
	<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>

	<!-- Styles -->
	<link rel="stylesheet" href="css/pruebaStyles.css">
</head>
<body>
	<div class="containerReg">
		<div class="transparent">
<!-- HEADER -->
			<header>
				<div class="logo">LOGO</div>
				<a href="login.php"><button id="login-btn">Ingresar</button></a>
			</header>
<!-- HEADER END -->

<!-- CONTENT -->
				<div class="registro">
					<form method="post" enctype="multipart/form-data">

					<h1>Registro</h1>

					<?php if($error && array_key_exists('existe', $infoUsuario) && $infoUsuario['existe']): ?>
						<label style="color:red">Error: el usuario ya existe en la base de datos</label>
					<?php endif; ?>

<!-- Usuario Input -->

					<?php if($error && !$usuario):?>
						<input style="background-color:red" type="text" name="usuario" placeholder="* Ingrese un usuario" value="<?=$usuario?>">
						<?php else: ?>
						<input type="text" name="usuario" placeholder="Usuario" value="<?=$usuario?>">
					<?php endif; ?>

<!-- Nombre Input -->

					<?php if($error && !$nombre):?>
						<input style="background-color:red" type="text" name="nombre" placeholder="* Ingrese su nombre" value="<?=$nombre?>">
						<?php else: ?>
					<input type="text" name="nombre" placeholder="Nombre completo" value="<?=$nombre?>">
					<?php endif; ?>

<!-- Email Input -->
					<?php if($error && !$email):?>
						<input style="background-color:red" type="email" name="email" placeholder="* Ingrese su email" value="<?=$email?>">
					<?php else: ?>
						<input type="email" name="email" placeholder="Email" value="<?=$email?>">
					<?php endif; ?>

<!-- Password Input -->
					<?php if($error && !$password):?>
							<input style="background-color:red" type="password" placeholder="* Ingrese su contraseña" name="password">
						<?php else: ?>
							<input type="password" placeholder="Contraseña" name="password">
					<?php endif; ?>

<!-- Password Input 2 -->

					<?php if($error && !$password2):?> <!--validacion de password2-->
						<input style="background-color:red" type="password" placeholder="* Confirme su password" name="password2">
					<?php else: ?>
						<?php if ($error && $errorReingresoPassword) :?>
							<input style="background-color:red" type="password" placeholder="Las contraseñas no coinciden" name="password2">
						<?php else: ?>
							<input type="password" placeholder="Repetir contraseña" name="password2">
						<?php endif;  ?>
					<?php endif; ?>

<!-- Imagen Input -->

					<?php if($error && !$existeFile):?> <!--validacion de Insertar imagen-->
							<label for="imagen" style="color:red" >* Insertar imagen:</label>
						<?php else: ?>
							<label for="imagen" >Insertar imagen:</label>
					<?php endif; ?>
					<input type="file" name="imagen">

					<button type="submit" name="submit">Enviar</button>
				</form>
			</div>
<!-- CONTENT END -->

<!-- FOOTER -->
				<div id="footer">

					<div id="footer-board">
						<div class="logo">LOGO</div>
						<ul>
							<li><a href="login.php">Ingresar</a></li>
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
