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
			echo "<br>";
			echo "<a href=\"indexParte2.php\">VOLVER ATRAS</a>";
		}else{
			$emp = new Empleado($nombre,$apellido,$dni,$sexo,$legajo,$sueldo);
			echo "EMPLEADO INGRESADO EXITOSAMENTE: <br>".$emp->ToString()."<br>";
			$archivo=fopen("Empleados.txt", "a");
			$res = fwrite($archivo, $emp->ToString()."\r\n");
			fclose($archivo);
			if($res == false){
				echo "ERROR AL ESCRIBIR EL ARCHIVO DE REGISTRO!";
				echo "<br>";
				echo "<a href=\"indexParte2.php\">VOLVER ATRAS</a>";
			}else{
				echo "EMPLEADO REGISTRADO CON EXITO EN EL ARCHIVO!";
				echo "<br>";	
				echo "<a href=\"mostrar.php\">MOSTRAR REGISTRO</a>";
			}
		}
	 ?>
</body>
</html>