<?php
//actualiza el estado de la lampara 1

header('Location: /iluminacion-jardin-local/IOTproject_smart_garden_lamps/index.php');

require_once('connection.php');

$dispositivo=$_GET['dispositivo'];
$lamp1=$_GET['lamparauno'];

$conn=new conexion();

$queryUPDATE="UPDATE `estado` SET `lamparauno` = '$lamp1' WHERE `estado`.`dispositivo` = '$dispositivo';";
$update= mysqli_query($conn->conectardb(),$queryUPDATE);

?>