<?php 
	class Fabrica{
		private $_empleados = array();
		private $_razonSocial = "";

		function __construct($razonSocial){
			$this->_razonSocial = $razonSocial;
			$this->_empleados = array();
		}

		function AgregarEmpleados(Empleado $persona){
			array_push($this->_empleados, $persona);
			$this->EliminarEmpleadosRepetidos();
		}

		function CalcularSueldos(){
			$total = 0;
			foreach ($this->_empleados as $empK => $empV) {
				$total = $total + $empV->getSueldo();
			}
			return $total;
		}

		function EliminarEmpleado(Empleado $persona){
			foreach ($this->_empleados as $empK => $empV) {
				if($empV->getDni() == $persona->getDni()){
					unset($this->_empleados[$empK]);
					return true;
				}
			}
			return false;
		}

		private function EliminarEmpleadosRepetidos(){
			$this->_empleados = array_unique($this->_empleados,SORT_REGULAR);
		}

		function ToString(){
			$stringTotal = "Razon Social: ".$this->_razonSocial." - EMPLEADOS: ";
			foreach ($this->_empleados as $empK => $empV) {
				$stringTotal .= " - ".$empV->ToString();
			}
			return $stringTotal;
		}
	}
 ?>