<html>
<head>
	<title>Administracion de Ingreso</title>
</head>
<body>
	<?php 
		include "empleado.php";
		$apellido = $_POST['Apellido'];
		$nombre = $_POST['Nombre'];
		$dni = $_POST['Dni'];
		$sexo = $_POST['Sexo'];
		$legajo = $_POST['Legajo'];
		$sueldo = $_POST['Sueldo'];

		$emptyCheck = ($apellido == "") || ($nombre == "") ||
		($dni == "") || ($legajo == "") || ($sueldo == "");
		if($emptyCheck){
			echo "SE HA INGRESADO UN DATO VACIO";
		}else{
			$emp = new Empleado($nombre,$apellido,$dni,$sexo,$legajo,$sueldo);
			echo "EMPLEADO INGRESADO EXITOSAMENTE: <br>".$emp->ToString();
		}
			echo "<br>";
			echo "<a href=\"indexParte2.php\">VOLVER ATRAS</a>";
	 ?>
</body>
</html>