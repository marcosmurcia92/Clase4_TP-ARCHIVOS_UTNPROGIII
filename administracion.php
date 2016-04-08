<html>
<head>
	<title>Administracion de Ingreso</title>
</head>
<body>
	<?php 
		include "empleado.php";
		$absPath = getcwd();
		$apellido = $_POST['Apellido'];
		$nombre = $_POST['Nombre'];
		$dni = $_POST['Dni'];
		$sexo = $_POST['Sexo'];
		$legajo = $_POST['Legajo'];
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

		$emptyCheck = ($apellido == "") || ($nombre == "") ||
		($dni == "") || ($legajo == "") || ($sueldo == "") || ($img == "");

		$imgCheck = /*is_file($img) && */!file_exists($imgLocalPath) &&
					in_array($imgExt, $imgOkExts) && filesize($img) <= 1048576;
		//echo "ISFILE: ".var_dump(is_file($img))."<br>";
		// echo "EXISTS: ".var_dump(!file_exists($imgLocalPath))."<br>";
		// echo "IN ARRAY: ".var_dump(in_array($imgExt, $imgOkExts))."<br>";
		// echo "SIZECHECK: ".var_dump(filesize($img) <= 1048576)."<br>";
		if($emptyCheck){
			echo "SE HA INGRESADO UN DATO VACIO";
			echo "<br>";
			echo "<a href=\"indexParte2.php\">VOLVER ATRAS</a>";
		}else if(!$imgCheck){
			echo "LA URL DE LA IMAGEN INGRESADA NO ES CORRECTA";
			echo "<br>";
			echo "<a href=\"indexParte2.php\">VOLVER ATRAS</a>";
		}else{
			file_put_contents($imgLocalPath, file_get_contents($img));
			$emp = new Empleado($nombre,$apellido,$dni,$sexo,$legajo,$sueldo);
			$emp->setPathFoto($img);
			echo "EMPLEADO INGRESADO EXITOSAMENTE: <br>".$emp->ToString()."<br>";
			$archivo=fopen("Empleados.txt", "a");
			$res = fwrite($archivo, $emp->ToString()."\r\n");
			fclose($archivo);
			if($res == false){
				echo "ERROR AL ESCRIBIR EL ARCHIVO DE REGISTRO!";
				echo "<br>";
				echo "<a href=\"indexParte2.php\">VOLVER ATRAS</a>";
			}else{
				echo "EMPLEADO REGISTRADO CON EXITO EN EL ARCHIVO!";
				echo "<br>";	
				echo "<a href=\"mostrar.php\">MOSTRAR REGISTRO</a>";
			}
		}
	 ?>
</body>
</html>