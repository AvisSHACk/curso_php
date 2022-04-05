<?php 
	if(isset($_GET['token'])) {

		$item = "token";
		$valor = $_GET['token'];
		$usuario = ControladorFormularios::ctrlSeleccionarRegistros($item, $valor);

	// 	echo "<pre>";
	// print_r($valor);
	// echo "</pre>";
	}

 ?>


<div class="d-flex justify-content-center text-center">
	<form class="p-5 bg-light" method="post">
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fas fa-user"></i>
					</span>
				</div>
				<input type="text" class="form-control" placeholder="Escriba su nombre" id="actualizarNombre" name="actualizarNombre" value="<?php echo $usuario["nombre"]?>">
			</div>
		</div>

		<div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fas fa-envelope"></i>
					</span>
				</div>
				<input type="email" class="form-control" placeholder="Escriba su email" id="actualizarEmail" name="actualizarEmail" value="<?php echo $usuario["email"] ?>">
			</div>
		</div>

		<div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fas fa-lock"></i>
					</span>
				</div>
				<input type="password" class="form-control" placeholder="Escriba su password" id="pwd" name="actualizarPassword">
				<input type="hidden" name="passwordActual" value="<?php echo $usuario["password"]?>">
				<input type="hidden" name="tokenUsuario" value="<?php echo $usuario["token"]?>">
			</div>
		</div>

		<?php 

			$actualizar = ControladorFormularios::ctrActualizarRegistro();

	// 		echo "<pre>";
	// print_r($usuario);
	// echo "</pre>";

			if($actualizar == "ok") {
				echo "<script>
					if(window.history.replaceState) {
						window.history.replaceState(null, null, window.location.href);
					}

					let datos = new FormData();
					datos.append('validarToken', '". $usuario["token"] ."' );

					$.ajax({
						url: 'ajax/formularios.ajax.php',
						method: 'POST',
						data: datos,
						cache: false,
						contentType: false,
						processData: false,
						dataType: 'json',
						success: function(respuesta){
							console.log(respuesta)
							$('#actualizarEmail').val(respuesta['email']);
							$('#actualizarNombre').val(respuesta['nombre']);
						}
					});


				</script>";

				echo '
					<div class="alert alert-success">El usuario ha sido actualizado</div>


				';
			}

			if($actualizar == "error") {
				echo "<script>
					if(window.history.replaceState) {
						window.history.replaceState(null, null, window.location.href);
					}

				</script>";

				echo '<div class="alert alert-danger">Error al actualizar el usuario</div>';
			}

		?>

		
		<button type="submit" class="btn btn-primary">Actualizar</button>
	</form>
</div>