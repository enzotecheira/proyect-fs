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
 	<title>Registro de usuarios</title>
 </head>
 <body>

 	<form method="post" enctype="multipart/form-data">
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

		<p>
 			<label for="nombre">Nombre</label>
 			<input type="text" name="nombre" value="<?= $nombre?>">
 			<?php if($error && !$nombre):?>
 				<span>Ingrese su nombre</span>
 			<?php endif; ?>
 		</p>

 		<p>
 			<label for="email">Email</label>
 			<input type="email" name="email" value="<?= $email?>">
 			<?php if($error && !$email):?>
 				<span>Cambie su email</span>
 			<?php endif; ?>
 		</p>

		<p>
 			<label for="imagen">Imagen</label>
 			<input type="file" name="imagen">
 			<?php if($error && !$existeFile):?>
 				<span>Cambie su imagen</span>
 			<?php endif; ?>
 		</p>

 		<p>
 			<label for="password">Ingrese su Password para confirmar</label>
 			<input type="password" name="password">
 			<?php if($error && !$password):?>
 				<span>Ingrese su password</span>
 			<?php endif; ?>
 		</p>


 		<p>
 			<input type="submit" name="submit">
 		</p>

 	</form>

 </body>
 </html>
