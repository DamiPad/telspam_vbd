<?php
//include---busca el archivo lo que estoy buscando 
//include_once
//require
//require once
include "clases/conexion.php";

$basedatos=new conexion();
$query="SELECT * FROM tbl_directorio";

$resultado_Consulta=$basedatos->consulta($query);

if (isset($_POST["indice"])){
    //Se almacena en una variable el id del registro a eliminar
    $id = $_POST["indice"];

    //Preparar la consulta
    $query= "DELETE FROM tbl_directorio WHERE indice=$id";

    //Ejecutar la consulta
    $resultado_Consulta=$basedatos->consulta($query);

    //redirigir nuevamente a la página para ver el resultado
    header("location:admon.php");
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

<table>
    <tr>
        <th>ID</th>
        <th>Número</th>
        <th>Entidad</th>
        <th></th>
        <th></th>
    </tr>
    <?php
    while($renglon=mysqli_fetch_assoc($resultado_Consulta))
    {
    extract($renglon); 
   
    echo '<tr>
            <td>'.$indice.'</td>
            <td>'.$entidad.'</td>
            <td>'.$numero.'</td>

            <td> <form method="POST" action="editar.php"> 
            <input type="hidden" name="indice" value="'.$indice.'">
            <input type="submit" value="Editar">
            </form></td>
            <td><form method="POST" action=""> 
            <input type="hidden" name="indice" value="'.$indice.'">
            <input type="submit" value="Eliminar">
            </form></td>
        </tr>';
    }
    ?>
</table>

</body>
</html>





