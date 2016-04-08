<html>
<head>
	<title>Ingreso de Empleado</title>
	<link rel="stylesheet" href="estilo.css">
	<link rel="stylesheet" href="animacion.css">
</head>
<body>
	<div class="CajaUno animated flipInX">
	<h1>INGRESO DE EMPLEADO: </h1>
	<form id="FormIngreso" action="administracion.php" method="POST">
		<input type="text" name="Nombre" placeholder="Nombre del Empleado"><br>
		<input type="text" name="Apellido" placeholder="Apellido del Empleado"><br>
		<input type="text" name="Dni" placeholder="DNI del Empleado"><br>
		<h3> Sexo:</h3>
		<select name="Sexo">
			<option value="M">Masculino</option>
			<option value="F">Femenino</option>
		</select>
		<input type="text" name="Legajo" placeholder="Nº de Legajo del Empleado"><br>
		<input type="text" name="Sueldo" placeholder="Sueldo del Empleado"><br>
		<input type="text" name="ImgURL" placeholder="URL de Foto del Empleado"><br>
		<input class="MiBotonUTN animated flipInY" type="Submit" name="Ingresar" value="Enviar Datos">
	</form>
	</div>
</body>
</html>