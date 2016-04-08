<?php 
	include "persona.php";
	class Empleado extends Persona{
		protected $_legajo = 0;
		protected $_sueldo = 0;
		protected $_pathFoto = "";

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

		function getPathFoto(){
			return $this->_pathFoto;
		}

		function setPathFoto($foto){
			$this->_pathFoto = $foto;
		}

		function Hablar($idioma){
			return "El empleado habla ".$idioma;
		}

		function ToString(){
			return parent::ToString()." | ".
					$this->_legajo." | ".
					$this->_sueldo. " | ".
					$this->_pathFoto;
		}
	}
 ?>