<?php 
	include "persona.php";
	class Empleado extends Persona{
		protected $_legajo = 0;
		protected $_sueldo = 0;

		function __construct($nombre,$apellido,$dni,$sexo,$legajo,$sueldo){
			parent::__construct($nombre,$apellido,$dni,$sexo);
			$this->_legajo = $legajo;
			$this->_sueldo = $sueldo;
		}

		function getLegajo(){
			return $this->_legajo;
		}

		function getSueldo(){
			return $this->_sueldo;
		}

		function Hablar($idioma){
			return "El empleado habla ".$idioma;
		}

		function ToString(){
			return parent::ToString()." - ".
					"Legajo: ".$this->_legajo." - ".
					"Sueldo: $".$this->_sueldo;
		}
	}
 ?>