<?php
//Este archivo solo actualiza el estado de la lampara 1

//Con esta instruccion hago que vuelva a cargar la pagina actuadores_color.php una vez que hace el envio de los datos
header('Location: /iluminacion-jardin-local/IOTproject_smart_garden_lamps/actuadores_color.php');


require_once('conexion.php');


$dispositivo=$_GET['dispositivo'];
$lamp1=$_GET['lamparauno'];


$conn=new conexion();


//Hacemos la consulta de SQL para actualizar tabla ESTADO
//$queryUPDATE="UPDATE `estado` SET `lamparauno` = '$lamp1' WHERE `estado`.`dispositivo` = '$dispositivo';";
$queryUPDATE="UPDATE `estado` SET `lamparauno` = '$lamp1' WHERE `estado`.`dispositivo` = '$dispositivo';";

//primer parametro la conexion, el segundo la consulta
$update= mysqli_query($conn->conectardb(),$queryUPDATE);

?>