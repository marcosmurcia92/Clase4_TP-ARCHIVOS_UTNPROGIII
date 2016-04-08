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
			return $this->_apellido;
		}

		function getDni(){
			return $this->_dni;
		}

		function getNombre(){
			return $this->_nombre;
		}

		function getSexo(){
			return $this->_sexo;
		}

		function Hablar($idioma){
			return "";
		}

		function ToString(){
			return $this->_nombre.
					" | ".$this->_apellido." |  ".
					$this->_dni." | ".$this->_sexo;
		}
	}

 ?>