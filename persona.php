<?php 
	abstract class Persona{
		private $_apellido = '';
		private $_dni = 0;
		private $_nombre = '';
		private $_sexo = '';

		function __construct($nombre,$apellido,$dni,$sexo){
			$this->_nombre = $nombre;
			$this->_dni = $dni;
			$this->_apellido = $apellido;
			$this->_sexo = $sexo;
		}

		function getApellido(){
			return $_apellido;
		}

		function getDni(){
			return $_dni;
		}

		function getNombre(){
			return $_nombre;
		}

		function getSexo(){
			return $_sexo;
		}

		function Hablar($idioma){
			return "";
		}

		function ToString(){
			return "Nombre: ".$_nombre.
					" - Apellido: ".$_apellido." - Dni: ".
					$_dni." - Sexo: ".$_sexo;
		}
	}

 ?>