function EnviarDatos () {
	var stringError = "";
	var errorArray = [];

	if(!ValidarCadena(document.getElementById('txtNombre').value)){
		stringError += "EL NOMBRE es requerido!" + "\n"; 
		errorArray.push('errNombre');
	}
	if(!ValidarCadena(document.getElementById('txtApellido').value)){
		stringError += "EL APELLIDO es requerido!" + "\n"; 
		errorArray.push('errApellido');
	}
	if(!ValidarCadena(document.getElementById('txtImagen').value)){
		stringError += "LA FOTO es requerida!" + "\n"; 
		errorArray.push('errImagen');
	}
	if(!ValidarCadena(document.getElementById('txtLegajo').value)){
		stringError += "EL LEGAJO es requerido!" + "\n"; 
		errorArray.push('errLegajo');
	}else if(!ValidarNumero(document.getElementById('txtLegajo').value)){
		stringError += "EL LEGAJO debe ser NUMERICO!" + "\n"; 
		errorArray.push('errLegajo');
	}
	if(!ValidarCadena(document.getElementById('txtDni').value)){
		stringError += "EL DNI es requerido!" + "\n"; 
		errorArray.push('errDni');
	}else if(!ValidarNumero(document.getElementById('txtDni').value)){
		stringError += "EL DNI debe ser NUMERICO!" + "\n"; 
		errorArray.push('errDni');
	}
	if(!ValidarCadena(document.getElementById('txtSueldo').value)){
		stringError += "EL SUELDO es requerido!" + "\n"; 
		errorArray.push('errSueldo');
	}else if(!ValidarNumero(document.getElementById('txtSueldo').value)){
		stringError += "EL SUELDO debe ser NUMERICO!" + "\n"; 
		errorArray.push('errSueldo');
	}

	if (stringError == "") {
		document.forms['FormIngreso'].submit();
	}else{
		alert(stringError);
		MostrarErrores(errorArray);
	}
}

function ValidarCadena(cadenaAValidar){
	return (cadenaAValidar != null && cadenaAValidar != "");
}

function ValidarNumero(valor){
	return !isNaN(parseInt(valor));
}

function MostrarErrores(arrayIdsErrores){
	var todosArray = ["errNombre","errApellido","errSueldo","errDni","errImagen","errLegajo"];
	for (var i = 0; i < todosArray.length; i++) {
		document.getElementById(todosArray[i]).style.display = "none";
	}

	for (var i = 0; i < arrayIdsErrores.length; i++) {
		document.getElementById(arrayIdsErrores[i]).style.color = "#f50056";
		document.getElementById(arrayIdsErrores[i]).style.display = "inline";
	}

}

function eliminarEmpleado(legajoEliminar){
	alert("ELIMINAR A "+legajoEliminar);
}

function modificarEmpleado(legajoModificar){
	alert("MODIFICAR A "+legajoModificar);
}