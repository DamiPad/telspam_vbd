<?php 
//require once
include "clases/conexion.php";
$basedatos=new conexion();


if(isset($_POST["noTelefono"])){

	$numerotelefono="";
	//Obtener de un dispositivo de entrada un valor
	//$numerotelefono=$_GET["noTelefono"];
	$numerotelefono=$_POST["noTelefono"];

	//si el numero es alido hay que ir a buscar al archivo si existe una coincidencia
	$regexTelefono='/^\d{10}$/';
	if (! preg_match($regexTelefono, $numerotelefono)){ // Aplicación de validación con expresiones regulares
		$mensaje_al_usuario="Telefono Invalido";
		//Terminar el programa
		
	}
	else{//LEER ARCHIVO Y ALMACENARLO EN UN ARREGLO
		
		$query="SELECT indice FROM tbl_directorio WHERE numero=$numerotelefono";
		$resultado_Consulta=$basedatos->consulta($query);
		
			//exit;
			//limpiamos la información y comparamos
		$resultado=mysqli_fetch_assoc($resultado_Consulta);
		

			 if($resultado==null){
				//mando mensaje--hacer una redirección a PHP--- SI
				header("location:registro.php?encontrado=false&tel=".$numerotelefono);
				exit;
			}
			
			// Si NO lo encontro igual redirecciona
			header("location:registro.php?encontrado=true&tel=".$numerotelefono);
			exit;
			
		
	}
	//Imprimir  en dispositivo de salida el valor de variable

		
		//$numerosRegistrados=file_put_contents('archivoTel.txt',$numerotelefono.PHP_EOL,FILE_APPEND);
	

}
else {
	$mensaje_al_usuario="Por favor ingresa el número de télefono";
}
?>



<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<center>
<h3>Tel-SPAM</h3>


<div>
<form method="POST" action="consulta.php">
 <label>Escriba el número de teléfono</label>
 <input type="text" size="15" name="noTelefono" id="noTelefono" placeholder="Número de Teléfono">
 <br>
 <input type="submit" size="10" value="Consultar">
</form>
<span><?php echo $mensaje_al_usuario?> </span>
</center>
</div>

</body>
</html>


<!--Implementación de html
<form method="GET" action="practica1.php">
<form method="POST" action="consulta.php">
 <label>Escriba el número de teléfono</label>
 <input type="text" size="15" name="noTelefono" id="noTelefono" placeholder="Número de Teléfono">
 <br>
 <input type="submit" size="10" value="Consultar">
</form>
-->

