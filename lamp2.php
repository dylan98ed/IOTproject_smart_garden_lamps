<?php
//actualiza el estado de la lampara 2

header('Location: /iluminacion-jardin-local/IOTproject_smart_garden_lamps/index.php');

require_once('connection.php');

$dispositivo=$_GET['dispositivo'];
$lamp2=$_GET['lamparados'];

$conn=new conexion();

$queryUPDATE="UPDATE `estado` SET `lamparados` = '$lamp2' WHERE `estado`.`dispositivo` = '$dispositivo';";
$update= mysqli_query($conn->conectardb(),$queryUPDATE);

?>