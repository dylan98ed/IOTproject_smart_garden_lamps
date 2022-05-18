<?php
//Este archivo solo actualiza el estado de la lampara 2

//Con esta instruccion hago que vuelva al index.php una vez que envia de los datos
header('Location: /iluminacion-jardin-local/IOTproject_smart_garden_lamps/index.php');


require_once('connection.php');


$dispositivo=$_GET['dispositivo'];
$lamp2=$_GET['lamparados'];


$conn=new conexion();


//Hacemos la consulta de SQL para actualizar tabla ESTADO
//$queryUPDATE="UPDATE `estado` SET `lamparados` = '$lamp2' WHERE `estado`.`dispositivo` = '$dispositivo';";
$queryUPDATE="UPDATE `estado` SET `lamparados` = '$lamp2' WHERE `estado`.`dispositivo` = '$dispositivo';";

//primer parametro la conexion, el segundo la consulta
$update= mysqli_query($conn->conectardb(),$queryUPDATE);

?>