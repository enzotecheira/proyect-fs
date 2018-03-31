<?php
session_start();
include('funciones.php');


 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="./css/styles.css"> -->
    <!-- Scripts -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="css/pruebaStyles.css">
    <title>FAQ Avecino</title>
  </head>
  <body>
    <div class="containerFaq">
      <div class="transparentFaq">

<!-- HEADER -->
    		<header class="headerFaq">
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

        <section class="preguntas">
          <h1>Preguntas Frecuentes</h1>
          <div class="pregunta">
            <h2>Que puedo hacer en el sitio?</h2>
            <p>Es un sitio dedicado a la compra, venta, alquiler de inmuebles, administracion de los servicion relacionados con el inmueble y antes de comprar o alquilar podes saber que opinan los vecinos sobre el barrio.</p>
          </div>
          <div class="pregunta">
            <h2>Que servicios puedo administrar?</h2>
            <p>se pueden administrar todos los servicios relacionados con los inmbuebles, por ej sercio de telefonia, internet, luz, agua, gaz, etc.</p>
          </div>
          <div class="pregunta">
            <h2>Puedo realizar una reserva de un inmbueble por la pagina?</h2>
            <p>si, peudes realizar por medio de nuestra plataforma de pagos, pero antes debes de estar registrado.</p>
          </div>
          <div class="pregunta">
            <h2>¿como tengo que hacer para publicar un inmueble?</h2>
            <p>primero debes estar registrado en la plataforma y debes de completar todos los datos requeridos
              una vez verificados los datos, sera habilitado el usuario.</p>
            </div>
            <div class="pregunta">
              <h2>Clase de Publicaciones</h2>
              <p>Contamos con 3 opciones de publicaciones, Gratuita, Oro y Platino.</p>
            </div>
            <div class="pregunta">
              <h2>Duracion de las publicaciones</h2>
              <p>La publicacion Gratuita, tiene una duracion de 30 dias, la oro de 60 dias y la platino de 90 dias.</p>
            </div>
            <div class="pregunta">
              <h2>Que diferencia hay entre las publicaciones</h2>
              <p>Publicaciones Platino tendras maxima explosicion y saldras en las primeras paginas, podras cargar 10 fotos y un video.</p><br>
              <p>Publicaciones Oro tu aviso sera resaltado y el primer mes expuesto dentro de las 10 primeras paginas, podras cargar 10 fotos.</p><br>
              <p>Publicacion Gratuita, tendras la opcion de cargar 6 fotos.</p>
            </div>
            <div class="pregunta">
              <h2>Costo de publicacion</h2>
              <p>Publicacion Gratuita 0 costo, publicacion Oro $500 por los 60 dias y publicacion Platino $ 900 por los 90 dias.</p>
            </div>
          </section>
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
