<?php
	include('funciones.php');
  session_start();
  if (!existeParametro('usuario',$_SESSION)) {
		header("Location: login.php");
		exit;
	}
  $usuario = $_SESSION['usuario'];

	$existeFile = existeFileSinError('imagen');
	$nombre =array_key_exists('nombre',$_POST)&&$_POST['nombre']?$_POST['nombre']: $usuario['nombre'];
	$email = array_key_exists('email',$_POST)&&$_POST['email']?$_POST['email']:$usuario['email'];
	$password = dameValorDeParametro('password',$_POST);

	$infoUsuario = [];
	$usuarioModificado=[];

	$error = false;
	$passwordError = false;

	if (existeParametro('submit',$_POST)) {
		if ($email&&$password&&$nombre&&$existeFile) {
			if (password_verify($password,$usuario['password'])) {
				$infoUsuario=dameInfoUsuarioPorCampo('id',$usuario['id']);
				if ($infoUsuario['existe']) {
					if (esUsuarioUnico($email,$_SESSION['usuario']['id'])) {
						$usuarioModificado=[
								'nombre'=>$nombre,
								'email'=>$email,
								'password'=>password_hash($password,PASSWORD_DEFAULT),
								'id'=>$_SESSION['usuario']['id'],
								'imagen'=>guardarArchivoSubido('imagen')
						];
						modificarUsuario($usuarioModificado,$infoUsuario['posicion']);//guardar en json
						$_SESSION['usuario']=$usuarioModificado;//guardar en sesión
					}else {
						$error=true;
						$errorMailExiste=true;
					}

				}else {
					$error=true;
				}
			}
			else {
				$error=true;
				$passwordError=true;
			}
		}
		else {
			$error=true;
		}
	}
 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<title>Avecino - Modificar Perfil</title>

 	<!-- Metas -->
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">

 	<!-- Scripts -->
 	<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>

 	<!-- Styles -->
 	<link rel="stylesheet" href="css/pruebaStyles.css">
 </head>
 <body>
 	<div class="containerCity containerReg">
 		<div class="transparent">

<!-- HEADER -->
			<header>
				<div class="logo">LOGO</div>
				<?php if (existeParametro('usuario',$_SESSION)): ?>
					<div class="usuarioHeader">
						<a href="perfil.php">
							<label>
								<img src="<?= $usuario['imagen']?>" > <br> <?= $usuario['usuario']?>
							</label>
						</a>
					</div>
					<?php else: ?>
						<a href="login.php"><button id="login-btn">Ingresar</button></a>
				<?php endif; ?>

			</header>
<!-- HEADER END -->

<div class="containerForm registro">

	 <form method="post" enctype="multipart/form-data">
	 
	 <h1>Modificar datos</h1>

		<?php if($error && array_key_exists('existe', $infoUsuario) && !$infoUsuario['existe']): ?>
			<p>
				<span>Error: el usuario no existe en la base de datos</span>
			</p>

		<?php endif; ?>
		<?php if($error && $errorMailExiste): ?>
			<p>
				<span>Error: el usuario/mail ya existe en la base de datos</span>
			</p>

		<?php endif; ?>

		<input type="text" name="nombre" placeholder="Usuario" value="<?= $nombre?>" alt="Usuario">
		<?php if($error && !$nombre):?>
			<span>Ingrese su nombre</span>
		<?php endif; ?>

		<input type="email" name="email" placeholder="Email" value="<?= $email?>">
		<?php if($error && !$email):?>
			<span>Cambie su email</span>
		<?php endif; ?>

		<input type="password" placeholder="Contraseña" name="password">
		<?php if($error && !$password):?>
			<span>Ingrese su password</span>
		<?php endif; ?>

		<label for="imagen" >Insertar imagen:</label>
		<input type="file" name="imagen">
		<?php if($error && !$existeFile):?>
			<span>Cambie su imagen</span>
		<?php endif; ?>

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
