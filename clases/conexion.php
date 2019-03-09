<?php
    class conexion
    { 
        //variable que guarda la conexión
        var $con=null;
        var $host="localhost";
        var $usuario="root";
        var $contrasena="";
        var $bdnombre="spam_db";
        var $registrosAfectados=null;


        
        public function __construct(){
            //intancia de la clase--crear un hijito
            $this->con=new mysqli($this->host,$this->usuario,$this->contrasena,$this->bdnombre);
            if($this->con->connect_error){
                die('Error de conexión ('.$this->con->connect_errno.')'.$this->con->connect_error);
            }
        }

        /*Ejecuta una consulta a la base de datos*/

        public function consulta($sql){
            $resp= $this->con->query($sql);
            if(strtoupper(explode(' ',$sql)[0])!="SELECT")
            $this->regristrosAfectados=mysqli_affected_rows($this->con);
            else 
            $this->regristrosAfectados=mysqli_num_rows($resp);
            return $resp;
        }

        public function RegresaNoFilas($registros){


        }

    }

?>