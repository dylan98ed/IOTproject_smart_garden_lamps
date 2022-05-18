<?php

class conexion{

    const user='root'; //nombre de usuario
    const pass='';//contrasenia
    const db='iot02'; //nombre de la base de datos
    const servidor='localhost';// nombre del host

    public function conectardb(){
        $conectar = new mysqli(self::servidor, self::user,self::pass,self::db);
        if($conectar->connect_error){
            die("Error en la conexion".$conectar->connect_error);
        }
        return $conectar;
    }   
}

?>

