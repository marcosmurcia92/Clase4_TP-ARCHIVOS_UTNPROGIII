<html>
<head>
	<title></title>
</head>
<body>
	<?php 
		include "empleado.php";
		include "fabrica.php";
		$empleado = new Empleado("Juan","Perez",554455,'M',15426,9500);
		echo $empleado->getNombre()."<br>";
		echo $empleado->getApellido()."<br>";
		echo $empleado->getDni()."<br>";
		echo $empleado->getSexo()."<br>";
		echo $empleado->getSueldo()."<br>";
		echo $empleado->getLegajo()."<br>";
		echo $empleado->Hablar("Español")."<br>";
		echo $empleado->ToString();
		echo "<br><br>";
		$fab = new Fabrica("UTNFABRICA S.A.");
		$fab->AgregarEmpleados($empleado);
		$fab->AgregarEmpleados($empleado);
		$emp2 = new Empleado("Pepe","Gomez",115544,'F',11212,15000);
		$fab->AgregarEmpleados($emp2);
		echo $fab->ToString();
		echo "<br><br>";
		echo "EL TOTAL DE LOS SUELDOS ES DE: $".$fab->CalcularSueldos();
		echo "<br><br>";
		$fab->EliminarEmpleado($emp2);
		echo $fab->ToString();

	 ?>
</body>
</html>