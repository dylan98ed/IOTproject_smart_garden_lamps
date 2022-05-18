<?php
//enviar información del estado de las lamparas del jardin al servidor y al dispositivo.

require_once('connection.php');

$dispositivo=$_GET['dispositivo'];
$lamp1=$_GET['lamparauno'];
$lamp2=$_GET['lamparados'];


$conn=new conexion();

//filtrar el estado de la tarjeta
$querySELECT="SELECT`lamparauno`,`lamparados` FROM `estado` WHERE `dispositivo`= 'node1';";
$result= mysqli_query($conn->conectardb(),$querySELECT);
$row=mysqli_fetch_row($result);
//$row va tener las dos posiciones, en la posicion 0 va a estar el valor de lampara1 y en la posicion 1 va a estar el valor de lampara2
//formato del mensaje a enviar al dispositivo: {LAMP1:1,LAMP2:0}
echo "{LAMP1:".$row[0].",LAMP2:".$row[1]."}";

?>