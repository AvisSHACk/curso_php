<?php session_start()?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script> -->

	<!-- Popper JS -->
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

	<!-- Font Awesome 6 -->
	<script src="https://kit.fontawesome.com/df1d66b85d.js" crossorigin="anonymous"></script>
</head>
<body>
	<!--=====================================
	LOGOTIPO
	======================================-->

	<div class="container-fluid">
		
		<h3 class="text-center py-3">LOGO</h3>

	</div>

	<!--=====================================
	BOTONERA
	======================================-->

	<div class="container-fluid  bg-light">
		
		<div class="container">

			<ul class="nav nav-justified py-2 nav-pills">

				<?php if (isset($_GET["pagina"])): ?>

					<?php if ($_GET['pagina'] === "registro"): ?>

						<li class="nav-item">
							<a class="nav-link active" href="registro">Registro</a>
						</li>

					<?php else: ?>

						<li class="nav-item">
							<a class="nav-link" href="registro">Registro</a>
						</li>

					<?php endif ?>

					<?php if ($_GET['pagina'] === "ingreso"): ?>

						<li class="nav-item">
							<a class="nav-link active" href="ingreso">Ingreso</a>
						</li>

					<?php else: ?>

						<li class="nav-item">
							<a class="nav-link" href="ingreso">Ingreso</a>
						</li>
						
					<?php endif ?>

					<?php if ($_GET['pagina'] === "inicio"): ?>

						<li class="nav-item">
							<a class="nav-link active" href="inicio">Inicio</a>
						</li>

					<?php else: ?>

						<li class="nav-item">
							<a class="nav-link" href="inicio">Inicio</a>
						</li>
						
					<?php endif ?>

					<?php if ($_GET['pagina'] === "salir"): ?>

						<li class="nav-item">
							<a class="nav-link active" href="salir">Salir</a>
						</li>

					<?php else: ?>

						<li class="nav-item">
							<a class="nav-link" href="salir">Salir</a>
						</li>
						
					<?php endif ?>

					<?php else: ?>

						<!-- GET: $_GET["variable"] Variables que se pasan como parámetros Vía URL ( También conocido como cadena de consulta a través de la URL) 
						Cuando es la primera variable se separa con ?
						las que siguen a continuación se separan con &
						-->

						<li class="nav-item">
							<a class="nav-link active" href="registro">Registro</a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="ingreso">Ingreso</a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="inicio">Inicio</a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="salir">Salir</a>
						</li>						
					
				<?php endif ?>

				

			</ul>

		</div>

	</div>

	<!--=====================================
	CONTENIDO
	======================================-->

	<div class="container-fluid">
		
		<div class="container py-5">

			<?php 

			#ISSET: isset() Determina si una variable está definida y no es NULL

			if(isset($_GET['pagina'])) {

				if($_GET['pagina'] === "registro" ||
				   $_GET['pagina'] === "ingreso" ||
				   $_GET['pagina'] === "inicio" ||
				   $_GET['pagina'] === "editar" ||
				   $_GET['pagina'] === "salir") {

					include "paginas/" . $_GET["pagina"] . ".php";
				} else {
					include "paginas/error404.php";	
				}

			} else {
				include "paginas/registro.php";
			}

			 ?>

		</div>

	</div>

	<script src="vistas/js/script.js"></script>
</body>
</html>