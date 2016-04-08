<?php 
	class Fabrica{
		private $_empleados = array();
		private $_razonSocial = "";

		function __construct(string $razonSocial){
			$this->_razonSocial = $_razonSocial;
		}

		function AgregarEmpleados(Empleado $persona){
			array_push($_empleados, $persona);
		}

		function CalcularSueldos(){
			$total = 0;
			foreach ($_empleados as $empK => $empV) {
				$total = $total + $empV->getSueldo();
			}
			return $total;
		}

		function EliminarEmpleado(Empleado $persona){
			foreach ($_empleados as $empK => $empV) {
				if($empV->getDni() == $persona->getDni(){
					unset($_empleados[$empK]);
					return true;
				}
			}
			return false;
		}

		private function EliminarEmpleadosRepetidos(){
			$_empleados = array_unique($_empleados);
		}

		function ToString(){
			$stringTotal = "Razon Social: ".$_razonSocial." - EMPLEADOS: ";
			foreach ($_empleados as $empK => $empV) {
				$stringTotal .= " - ".$empV->ToString();
			}
			return $stringTotal;
		}
	}
 ?>