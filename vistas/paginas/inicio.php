<?php 

	if(!isset($_SESSION['validarIngreso'])){
		echo "<script>
				window.location = 'ingreso';
			</script>";
		return;
	} else {
		if($_SESSION['validarIngreso'] !== "ok") {

			echo "<script>
					window.location = 'ingreso';
				</script>";
			
			return;

		}
	}
	
	$usuarios = ControladorFormularios::ctrlSeleccionarRegistros(null, null);
	// echo "<pre>";
	// print_r($usuarios);
	// echo "</pre>"
?>

<table class="table table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th>Nombre</th>
			<th>Email</th>
			<th>Fecha</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>

		<?php foreach ($usuarios as $key => $value): ?>
		<tr>
			<td><?php echo ($key + 1) ?></td>
			<td><?php echo $value["nombre"] ?></td>
			<td><?php echo $value["email"] ?></td>
			<td><?php echo $value["fecha"] ?></td>
			<td>
				<div class="btn-group">

					<div class="px-1">
						<a href="index.php?pagina=editar&token=<?php echo $value["token"] ?>" class="btn btn-warning"><i class="fa fa-pencil-alt"></i></a>
					</div>
					<form method="post">
						<input type="hidden" value="<?php echo $value["token"]?>" name="eliminarRegistro">
						<button class="btn btn-danger"><i class="fa fa-trash-alt"></i></button>

						<?php 

							$eliminar = new ControladorFormularios();
							$eliminar -> ctrEliminarRegistro();

						?>
					</form>
				</div>
			</td>
		</tr>
		<?php endforeach ?>
		
	</tbody>
</table>