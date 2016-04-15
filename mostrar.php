<html>
<head>
	<title>Mostrar Registro</title>
	<script type="text/javascript" src="Funciones.js"></script>
</head>
<body>
<?php 
	include "empleado.php";
	include "fabrica.php";
	echo "EMPLEADOS REGISTRADOS HASTA EL MOMENTO: <br>";
	$miFabrica = new Fabrica("UTN Empleados S.A.");
	$arrayFabrica = $miFabrica->ToArray();
	echo "<table border=5>";
	echo "<th>Apellido</th>
		<th>Nombre</th>
		<th>Sexo</th>
		<th>Dni</th>
		<th>Legajo</th>
		<th>Sueldo</th>
		<th>Foto</th>
		<th>Acción</th>";
	foreach ($arrayFabrica as $empK => $empV) {
		echo "<tr>";
		echo "<td>".$empV->getApellido()."</td>".
			"<td>".$empV->getNombre()."</td>".
			"<td>".$empV->getSexo()."</td>".
			"<td>".$empV->getDni()."</td>".
			"<td>".$empV->getLegajo()."</td>".
			"<td>".$empV->getSueldo()."</td>".
			"<td><img src=".$empV->getPathFoto()." width=100 height=100></td>".
			"<td>
				<input type=\"Button\" name=\"Eliminar\" 
				id=\"btnEliminar\" onclick=\"eliminarEmpleado(".$empV->getLegajo().")\" 
				value=\"Eliminar\">
				<input type=\"Button\" name=\"Modificar\" 
				id=\"btnModificar\" onclick=\"modificarEmpleado(".$empV->getLegajo().")\" 
				value=\"Modificar\">
			</td>";
		echo "</tr>";
	}
	// $archivo=fopen("Empleados.txt", "r");
	// while (!feof($archivo)) {
	// 	$linea=fgets($archivo);
	// 	$dataEmp=explode('|', $linea);
	// 	if($dataEmp[0]!=""){
	// 		$emp = new Empleado($dataEmp[0],$dataEmp[1],$dataEmp[2],
	// 			$dataEmp[3],$dataEmp[4],$dataEmp[5]);
	// 		$emp->setPathFoto($dataEmp[6]);
	// 		echo $emp->ToString()."<br>";
	// 		echo "<img src=\"".($emp->getPathFoto())."\">";
	// 		echo "<br><br>";
	// 	}
	// }
	// fclose($archivo);
	echo "<br><br>";
	echo "<a href=\"indexParte2.php\">VOLVER AL INICIO</a>";
 ?>
</body>
</html>