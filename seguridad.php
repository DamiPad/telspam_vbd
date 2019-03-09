<?php

	if(!isset($_SESSION)) 
    { 
		session_start(); 
		if(!$_SESSION['validar']){
			header("Location:ingresar.php");
			exit();
		}
		else 
		include "principal.php";

    }
   
	else
	session_destroy();

?>