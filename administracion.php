<html>
<head>
	<title>Administracion de Ingreso</title>
</head>
<body>
	<?php 
		include "empleado.php";
		include "fabrica.php";
		$miFabrica = new Fabrica("UTN Empleados S.A.");
		$legajo = $_POST['Legajo'];
		var_dump($_POST);
		echo "LEGAJO ELEGIDO: ".$legajo."<br>";
		if(isset($_POST['Eliminar'])){
			$fabricaArray = $miFabrica->ToArray();
			foreach ($fabricaArray as $empK => $empV) {
				var_dump($empV->getLegajo());
				if (trim($empV->getLegajo()) == $legajo) {
					if($miFabrica->EliminarEmpleado($fabricaArray[$empK])){
						echo "EL EMPLEADO CON EL NUMERO DE LEGAJO ".$legajo." HA SIDO ELIMINADO EXITOSAMENTE";
						Fabrica::Guardar($miFabrica);
					}else{
						echo "NO SE PUDO ELIMINAR AL EMPLEADO";
					}
				}
			}
			echo "<br><br>";	
			echo "<a href=\"mostrar.php\">MOSTRAR REGISTRO</a>";
			echo "<br><br>";
			echo "<a href=\"indexParte2.php\">VOLVER AL INICIO</a>";
		}else if(isset($_POST['Ingreso'])){
			$absPath = getcwd();
			$apellido = $_POST['Apellido'];
			$nombre = $_POST['Nombre'];
			$dni = $_POST['Dni'];
			$sexo = $_POST['Sexo'];
			$sueldo = $_POST['Sueldo'];
			$img = $_POST['ImgURL'];
			$imgExt = "";
			if($img != ""){
				$imgExt = pathinfo($img,PATHINFO_EXTENSION);
				echo $imgExt."<br>";
			}
			$imgOkExts = array("JPG","BMP","GIF","PNG","JPEG",
								"jpg","bmp","gif","png","jpeg");
			if(!is_dir(getcwd()."/fotos/")){
				mkdir(getcwd()."/fotos/");
			}
			$imgLocalPath = getcwd()."/fotos/".$dni."-".$apellido.".".$imgExt;

			if($_POST['Ingreso'] = "Modificar Datos"){
				if(file_exists($imgLocalPath)){
					unlink($imgLocalPath);
				}
			}
			$imgCheck = /*is_file($img) && */!file_exists($imgLocalPath) &&
						in_array($imgExt, $imgOkExts) && filesize($img) <= 1048576;
			//echo "ISFILE: ".var_dump(is_file($img))."<br>";
			// echo "EXISTS: ".var_dump(!file_exists($imgLocalPath))."<br>";
			// echo "IN ARRAY: ".var_dump(in_array($imgExt, $imgOkExts))."<br>";
			// echo "SIZECHECK: ".var_dump(filesize($img) <= 1048576)."<br>";
			if(!$imgCheck){
				echo "LA URL DE LA IMAGEN INGRESADA NO ES CORRECTA";
				echo "<br>";
				echo "<a href=\"indexParte2.php\">VOLVER ATRAS</a>";
			}else{
				file_put_contents($imgLocalPath, file_get_contents($img));
				$emp = new Empleado($nombre,$apellido,$dni,$sexo,$legajo,$sueldo);
				$emp->setPathFoto($img);
				if($miFabrica->ExisteEmpleado($emp)){
					$miFabrica->EliminarEmpleado($emp);
					echo "EMPLEADO MODIFICADO EXITOSAMENTE: <br>".$emp->ToString()."<br>";
				}else{
					echo "EMPLEADO INGRESADO EXITOSAMENTE: <br>".$emp->ToString()."<br>";
				}
				$miFabrica->AgregarEmpleados($emp);
				if(Fabrica::Guardar($miFabrica)){
					echo "FABRICA REGISTRADA CON EXITO EN EL ARCHIVO!";
					echo "<br>";	
					echo "<a href=\"mostrar.php\">MOSTRAR REGISTRO</a>";
				}else{
					echo "ERROR AL ESCRIBIR EL ARCHIVO DE REGISTRO!";
					echo "<br>";
					echo "<a href=\"indexParte2.php\">VOLVER ATRAS</a>";
				}
				// $archivo=fopen("Empleados.txt", "a");
				// $res = fwrite($archivo, $emp->ToString()."\r\n");
				// fclose($archivo);
				// if($res == false){
				// 	echo "ERROR AL ESCRIBIR EL ARCHIVO DE REGISTRO!";
				// 	echo "<br>";
				// 	echo "<a href=\"indexParte2.php\">VOLVER ATRAS</a>";
				// }else{
				// 	echo "EMPLEADO REGISTRADO CON EXITO EN EL ARCHIVO!";
				// 	echo "<br>";	
				// 	echo "<a href=\"mostrar.php\">MOSTRAR REGISTRO</a>";
				// }
			}
		}
	 ?>
</body>
</html>