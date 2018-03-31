<?php

	include('funciones.php');

	session_start();

	if (!existeParametro('usuario',$_SESSION)) {
		header("Location: login.php");
		exit;
	}

	$usuario = $_SESSION['usuario'];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Perfil de usuario</title>
</head>
<body>

	<h1>Bienvenido: <?= $usuario['nombre']?></h1>

	<p>
		<img src="<?= $usuario['imagen']?>" style="max-width: 200px;">
	</p>

	<a href="./logout.php">Cerrar sesión</a>
	<br>
	<a href="./modificar.php">Modifica tu perfil</a>

</body>
</html>
