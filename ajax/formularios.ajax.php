<?php 

	require_once "../controladores/formularios.controlador.php";
	require_once "../modelos/formularios.modelo.php";

	/*Clase de ajax*/

	class AjaxFormularios {
		public $validarEmail;

		public function ajaxValidarEmail() {
			$item = "email";
			$valor = $this -> validarEmail;

			$respuesta = ControladorFormularios::ctrlSeleccionarRegistros($item, $valor);

			// echo "<pre>";
			echo json_encode($respuesta);
			// echo "</pre>";
		}

		public $validarToken;

		public function ajaxValidarToken() {
			$item = "token";
			$valor = $this -> validarToken;

			$respuesta = ControladorFormularios::ctrlSeleccionarRegistros($item, $valor);

			// echo "<pre>";
			echo json_encode($respuesta);
			// echo "</pre>";
		}
	}

	/*Objeto de ajax que recibe la variable post*/

	if(isset($_POST["validarEmail"])) {
		$valEmail = new AjaxFormularios();
		$valEmail -> validarEmail = $_POST["validarEmail"];
		$valEmail -> ajaxValidarEmail();
	}

	if(isset($_POST["validarToken"])) {
		$valToken = new AjaxFormularios();
		$valToken -> validarToken = $_POST["validarToken"];
		$valToken -> ajaxValidarToken();
	}

