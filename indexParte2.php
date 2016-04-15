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
		<input type="text" name="Nombre" id="txtNombre" placeholder="Nombre del Empleado"> <span id="errNombre" style="display:none" > * </span> <br>
		<input type="text" name="Apellido" id="txtApellido" placeholder="Apellido del Empleado"> <span id="errApellido" style="display:none" > * </span><br>
		<input type="text" name="Dni" id="txtDni" placeholder="DNI del Empleado"> <span id="errDni" style="display:none" > * </span><br>
		<h3> Sexo:</h3>
		<select name="Sexo" id="txtSexo">
			<option value="M">Masculino</option>
			<option value="F">Femenino</option>
		</select>
		<input type="text" name="Legajo" id="txtLegajo" placeholder="Nº de Legajo del Empleado"> <span id="errLegajo" style="display:none" > * </span><br>
		<input type="text" name="Sueldo" id="txtSueldo" placeholder="Sueldo del Empleado"> <span id="errSueldo" style="display:none" > * </span><br>
		<input type="text" name="ImgURL" id="txtImagen" placeholder="URL de Foto del Empleado"> <span id="errImagen" style="display:none" > * </span><br>
		<input class="MiBotonUTN animated flipInY" type="Button" name="Ingreso" id="btnEnviar" onclick="EnviarDatos()" value="Enviar Datos">
	</form>
	</div>
</body>
</html>