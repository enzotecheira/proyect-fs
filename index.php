<?php
session_start();
include('funciones.php');


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Avecino - Home</title>

	<!-- Metas -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Scripts -->
	<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>

	<!-- Styles -->
	<link rel="stylesheet" href="css/pruebaStyles.css">
</head>
<body>
	<div class="container">


		<!-- HEADER -->
		<header>
			<div class="logo">LOGO</div>
			<?php if (existeParametro('usuario',$_SESSION)): ?>
				<?php $usuario = $_SESSION['usuario']; ?>
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



		<!-- BANNER -->
		<div id="banner">
			<form method="GET">
				<div class="line searchOptions">
					<input type="radio" name="searchOption" value="COMPRAR">COMPRAR
					<input type="radio" name="searchOption" value="ALQUILAR">ALQUILAR
				</div>
				<div class="line search">
					<input type="text" name="search" placeholder="Palabras clave">
					<button class="lupa" type="submit" name="submit"><i class="fas fa-search"></i></button>
				</div>
				<div class="line"><a href=""><button class="busquedaAvanzada">Busqueda avanzada</button></a></div>
			</form>
		</div>
		<!-- BANNER END -->




		<!-- CONTENT -->
		<div id="content">
			<h1>¿Por qué Avecino?</h1>
			<ul>
				<li>
					<div class="circle redOne"><img src="./images/properties.png"></div>
					<p>Contamos con miles de bases de datos para que encuentres tu casa ideal</p>
				</li>
				<li>
					<div class="circle yellowOne"><img src="./images/payment.png"></div>
					<p>Administra los servicios de tu casa en un solo lugar sin perder tiempo</p>
				</li>
				<li>
					<div class="circle redOne"><img src="./images/vecinos.png"></div>
					<p>Comunicate con tus vecinos de una forma mas fácil y rápida</p>
				</li>
				<li>
					<div class="circle yellowOne"><img src="./images/transfer.png"></div>
					<p>Recibí los pagos de tus propiedades desde la comodidad de tu casa</p>
				</li>
			</ul>
		</div>
		<!-- CONTENT END -->




		<!-- FOOTER -->
		<div id="footer">
			<div id="parallax"></div>

			<div id="footer-board">
				<div class="logo">LOGO</div>
				<ul>
					<li><a href="login.php">Ingresar</a></li>
					<li><a href="register.php">Registrarse</a></li>
					<li><a href="#">Busqueda Avanzada</a></li>
					<li><a href="faq.php">FAQ</a></li>
					<li><a href="#">Contactar</a></li>
				</ul>
			</div>
		</div>
		<!-- FOOTER END -->

	</div>
</body>
</html>
