<html>
<head>
	<title>Ingreso de Empleado</title>
	<link rel="stylesheet" href="estilo.css">
	<link rel="stylesheet" href="animacion.css">
	<script type="text/javascript" src="Funciones.js"></script>
</head>
<body>
	<div class="CajaUno animated flipInX">
	<h1>INGRESO DE EMPLEADO: </h1>
	<form id="FormIngreso" action="administracion.php" method="POST">
		<?php
		if(isset($_POST['Modificar'])){
			include "empleado.php";
			include "fabrica.php";
			$miFabrica = new Fabrica("UTN Empleados S.A.");
			$fabricaArray = $miFabrica->ToArray();
			$legajo = $_POST['Legajo'];
			$nombre = "";
			$apellido = "";
			$dni = "";
			$sexo = "";
			$foto = "";
			$sueldo = "";
			foreach ($fabricaArray as $empK => $empV) {
				if(trim($empV->getLegajo()) == trim($legajo)){
					$nombre = $empV->getNombre();
					$apellido = $empV->getApellido();
					$dni = $empV->getDni();
					$sexo = $empV->getSexo();
					$foto = $empV->getPathFoto();
					$sueldo = $empV->getSueldo();
				}
			}
		}else{
			$nombre = "";
			$apellido = "";
			$dni = "";
			$legajo = "";
			$sexo = "";
			$foto = "";
			$sueldo = "";
		}

		echo "<input type=\"text\" name=\"Nombre\" id=\"txtNombre\" placeholder=\"Nombre del Empleado\" value=".$nombre."> <span id=\"errNombre\" style=\"display:none\" > * </span> <br>";
		echo "<input type=\"text\" name=\"Apellido\" id=\"txtApellido\" placeholder=\"Apellido del Empleado\" value=".$apellido."> <span id=\"errApellido\" style=\"display:none\" > * </span><br>";
		echo "<input type=\"text\" name=\"Dni\" id=\"txtDni\" placeholder=\"DNI del Empleado\" value=".$dni."> <span id=\"errDni\" style=\"display:none\" > * </span><br>";
		echo "<h3> Sexo:</h3>";
		echo "<select name=\"Sexo\" id=\"txtSexo\">";
		echo "	<option value=\"M\">Masculino</option>";
		if(trim($sexo) == "F"){
			echo "	<option value=\"F\" selected>Femenino</option>";
		}else{
			echo "	<option value=\"F\">Femenino</option>";
		}
		echo "</select>";
		echo "<input type=\"text\" name=\"Legajo\" id=\"txtLegajo\" placeholder=\"Nº de Legajo del Empleado\" value=".$legajo."> <span id=\"errLegajo\" style=\"display:none\" > * </span><br>";
		echo "<input type=\"text\" name=\"Sueldo\" id=\"txtSueldo\" placeholder=\"Sueldo del Empleado\" value=".$sueldo."> <span id=\"errSueldo\" style=\"display:none\" > * </span><br>";
		echo "<input type=\"text\" name=\"ImgURL\" id=\"txtImagen\" placeholder=\"URL de Foto del Empleado\" value =".$foto."> <span id=\"errImagen\" style=\"display:none\" > * </span><br>";
		
		if(isset($_POST['Modificar'])){
			echo "<input type=\"hidden\" name=\"Ingreso\" value=\"Modificar\">";
			echo "<input class=\"MiBotonUTN animated flipInY\" type=\"Button\" name=\"btnIngreso\" id=\"btnEnviar\" onclick=\"EnviarDatos()\" value=\"Modificar Datos\">";
		}else{
			echo "<input type=\"hidden\" name=\"Ingreso\" value=\"Ingresar\">";
			echo "<input class=\"MiBotonUTN animated flipInY\" type=\"Button\" name=\"btnIngreso\" id=\"btnEnviar\" onclick=\"EnviarDatos()\" value=\"Enviar Datos\">";
		}
		?>
		
		
	</form>
	</div>
</body>
</html>