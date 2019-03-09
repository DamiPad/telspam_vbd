<?php 

session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . './telspam_vbd/librerias/securimage/securimage.php';
include "clases/conexion.php";
$basedatos=new conexion();

$error=array("Error en usuario y/o contraseña","Error en captcha");


    if(isset($_POST["userEmail"])){
        $captcha = new Securimage();
        $email=$_POST["userEmail"];
        $password=$_POST["userPassword"];
        print_r($_POST);
        if ($captcha->check($_POST['captcha_code']) == false) {
            echo '<br><div class="alert alert-danger">Error al ingresar al Sistema ...</div>';
        }
        else{
                //Limpiar datos
                $query=" SELECT * FROM tbl_empleado WHERE email='$email'";
                print_r($query);
                $resultado_Consulta=$basedatos->consulta($query);
                print_r($resultado_Consulta);
                if(mysqli_num_rows($resultado_Consulta)>0){
                    $respuesta = $resultado_Consulta->fetch_assoc();

                   print_r($respuesta["nombre"]);

                   
                    $_SESSION["validar"] = true;
                    $_SESSION["usuario"] = $respuesta["nombre"];
                    
                    header("Location:principal.php");  
                }
                else{
                    echo '<br><div class="alert alert-danger">Error al ingresar al Sistema ...</div>';

                }
		
        }      
    }

?>

<!Doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Signin Template · Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="./estilos/style.css">
 
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="css/main.css" rel="stylesheet">
</head>

<body>

<form method="POST" action="ingresar.php"> 
    <div class="container">
        <div class="row">
            <div class="col-md-offset-5 col-md-3">
                <div class="form-login">
                <h4>Bienvenido</h4>
                <input type="text" name="userEmail" class="form-control input-sm chat-input" placeholder="Email" />
                </br>
                <input type="text" name="userPassword" class="form-control input-sm chat-input" placeholder="Contraseña" />
                </br>
                <center>
                <img id="captcha" src="./librerias/securimage/securimage_show.php" alt="CAPTCHA Image" />
                </br>
                <input type="text" name="captcha_code" size="10" maxlength="6" />
                </br>
                <a href="#" onclick="document.getElementById('captcha').src = './librerias/securimage/securimage_show.php?' + Math.random(); return false">[ Different Image ]</a>
                </br>

                </br> </br>
                
                <div class="wrapper">
                    <span class="group-btn">     
                        <button type="submit"  class="btn btn-primary btn-md">Ingresar <i class="fa fa-sign-in"></i>
                    </span>
                </div>
                </center>
            </div>
        </div>
    </div>
</form>          
</body>
</html>
