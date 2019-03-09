<?php
include "clases/conexion.php";
$basedatos=new conexion();

if(isset($_POST["indice"])){

    $id=$_POST["indice"];
    
       $query=$query="SELECT numero, entidad FROM tbl_directorio WHERE indice=$id";
       $resultado_Consulta=$basedatos->consulta($query);
       
	   $resultado=mysqli_fetch_assoc($resultado_Consulta);
       $tel=$resultado["numero"];
       $entid=$resultado["entidad"];


       
}
else{
    header("location:admon.php");
	exit;
}


function actualizar($id){
    $tel=$_POST["noTelefono"];
    $entid=$_POST["entidad"];
    
    $query="UPDATE tbl_directorio SET numero='$tel', entidad='$entid' WHERE indice=$id";
    $resultado_Consulta=$basedatos->consulta($query);
    
    header("location:admon.php");
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
<form method="POST" action="registro.php">

 <input type="text" size="15" name="noTelefono"  id="noTelefono" value="<?php echo $tel;?>">
 <br>
 <input type="text"  size="15" name="entidad" id="entidad" value="<?php echo $entid;?>">
 <br>
 <input type="submit" size="10" value="Actualizar">
</form>

</center>
</div>

</body>
</html>