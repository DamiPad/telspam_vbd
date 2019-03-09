<?php
include "clases/conexion.php";
$basedatos=new conexion();


if(isset($_GET["encontrado"])){

    $encontradoEnConsulta=$_GET['encontrado'];
    $tel=$_GET['tel'];
    //echo $encontradoEnConsulta;
    //echo $tel;
    if($encontradoEnConsulta=='true'){
        //Mostramos el telefono  y descripción
        $mensaje_al_usuario="El número de télefono es SPAM";
        //$mostrarpantallaresgistro="false";
        $mostrar="none";
        
        

    }else{
        //Mostramos otra caja para que puedar guardar el registro
        $mensaje_al_usuario="No existe en nuestra base de datos, Si gusta puede registrar el número telefonico";
       // $mostrarpantallaresgistro="true";
       $mostrar="inline";
       $entidad=$_POST["entidad"];
       $query="INSERT INTO tbl_directorio (indice, entidad, numero) VALUES (NULL, $entidad, $tel)";
	    $resultado_Consulta=$basedatos->consulta($query);
		
			//exit;
			//limpiamos la información y comparamos
		
    }


}
else{
    header("location:consulta.php");
	exit;
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
<span><?php echo $mensaje_al_usuario?> </span>
 <input type="text" size="15" name="noTelefono"  id="noTelefono" value="<?php echo $tel;?>">
 <br>
 <input type="text" style="display: <?php echo $mostrar;?>;" size="15" name="entidad" id="entidad" placeholder="Escribe quien te llamo">
 <br>
 <input type="submit" style="display: <?php echo $mostrar;?>;" size="10" value="Registrar">
</form>

</center>
</div>

</body>
</html>




