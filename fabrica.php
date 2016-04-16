<?php 
	class Fabrica{
		private $_empleados = array();
		private $_razonSocial = "";

		function __construct($razonSocial){
			$this->_razonSocial = $razonSocial;
			$this->_empleados = array();
			$this->ObtenerEmpleadosTxt();
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
				if(trim($empV->getLegajo()) == trim($persona->getLegajo())){
					unset($this->_empleados[$empK]);
					return true;
				}
			}
			return false;
		}

		function ExisteEmpleado(Empleado $persona){
			foreach ($this->_empleados as $empK => $empV) {
				if(trim($empV->getLegajo()) == trim($persona->getLegajo())){
					return true;
				}
			}
			return false;
		}

		private function EliminarEmpleadosRepetidos(){
			$this->_empleados = array_unique($this->_empleados,SORT_REGULAR);
		}

		static function Guardar($f){
			$archivo=fopen("Empleados.txt", "w");
			foreach ($f->_empleados as $empK => $empV) {
				$res = fwrite($archivo, $empV->ToString()."\r\n");
				if($res == false){
					fclose($archivo);
					return false;
				}
			}
			fclose($archivo);
			return true;
		}

		private function ObtenerEmpleadosTxt(){
			$archivo=fopen("Empleados.txt", "r");
			while (!feof($archivo)) {
				$linea=fgets($archivo);
				$dataEmp=explode('|', $linea);
				//var_dump($dataEmp);
				//echo "<br>";
				if(trim($dataEmp[0])!=""){
					$emp = new Empleado($dataEmp[0],$dataEmp[1],$dataEmp[2],
						$dataEmp[3],$dataEmp[4],$dataEmp[5]);
					$emp->setPathFoto($dataEmp[6]);
					$this->AgregarEmpleados($emp);
				}
			}
			fclose($archivo);
		}

		function ToArray(){
			return $this->_empleados;
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