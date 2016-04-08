<html>
<head>
	<title>Mostrar Registro</title>
</head>
<body>
<?php 
	include "empleado.php";
	echo "EMPLEADOS REGISTRADOS HASTA EL MOMENTO: <br>";
	$archivo=fopen("Empleados.txt", "r");
	while (!feof($archivo)) {
		$linea=fgets($archivo);
		$dataEmp=explode('|', $linea);
		if($dataEmp[0]!=""){
			$emp = new Empleado($dataEmp[0],$dataEmp[1],$dataEmp[2],
				$dataEmp[3],$dataEmp[4],$dataEmp[5]);
			$emp->setPathFoto($dataEmp[6]);
			echo $emp->ToString()."<br>";
			echo "<img src=\"".($emp->getPathFoto())."\">";
			echo "<br><br>";
		}
	}
	fclose($archivo);
	echo "<br><br>";
	echo "<a href=\"indexParte2.php\">VOLVER AL INICIO</a>";
 ?>
</body>
</html>