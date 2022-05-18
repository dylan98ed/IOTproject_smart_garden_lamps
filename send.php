<?php
//enviar información del estado de las lamparas del jardin al servidor y al dispositivo.

require_once('connection.php');

$dispositivo=$_GET['dispositivo'];
$lamp1=$_GET['lamparauno'];
$lamp2=$_GET['lamparados'];


$conn=new conexion();


//actualizar tabla ESTADO
//$queryUPDATE="UPDATE `estado` SET `lamparauno` = '$lamp1', `lamparados` = '$lamp2' WHERE `estado`.`dispositivo` = '$dispositivo';";
//$update= mysqli_query($conn->conectardb(),$queryUPDATE);

//actualizar tabla HISTORICO
$queryINSERT="INSERT INTO `historico` (`dispositivo`, `lamparauno`, `lamparados`, `fechaRegistro`) VALUES ('$dispositivo', '$lamp1', '$lamp2', NOW());";
$insert= mysqli_query($conn->conectardb(),$queryINSERT);



//filtrar el estado de la tarjeta
$querySELECT="SELECT`lamparauno`,`lamparados` FROM `estado` WHERE `dispositivo`= 'node1';";
$result= mysqli_query($conn->conectardb(),$querySELECT);
$row=mysqli_fetch_row($result);
//$row va tener las dos posiciones, en la posicion 0 va a estar el valor de lampara1 y en la posicion 1 va a estar el valor de lampara2
//formato del mensaje a enviar al dispositivo: {LAMP1:1,LAMP2:0}
echo "{LAMP1:".$row[0].",LAMP2:".$row[1]."}";

?>