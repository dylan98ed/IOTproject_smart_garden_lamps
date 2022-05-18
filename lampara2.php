<?php
//Este archivo solo actualiza el estado de la lampara 2

//Con esta instruccion hago que vuelva a cargar la pagina actuadores_color.php una vez que hace el envio de los datos
header('Location: /iluminacion-jardin-local/actuadores_color.php');


require_once('conexion.php');


$dispositivo=$_GET['dispositivo'];
$lamp2=$_GET['lamparados'];


$conn=new conexion();


//Hacemos la consulta de SQL para actualizar tabla ESTADO
//$queryUPDATE="UPDATE `estado` SET `lamparados` = '$lamp2' WHERE `estado`.`dispositivo` = '$dispositivo';";
$queryUPDATE="UPDATE `estado` SET `lamparados` = '$lamp2' WHERE `estado`.`dispositivo` = '$dispositivo';";

//primer parametro la conexion, el segundo la consulta
$update= mysqli_query($conn->conectardb(),$queryUPDATE);

?>