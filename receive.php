<?php

//Este archivo envía la información del estado de las lamparas del jardin al servidor.
//Envía la respuesta a la placa del estado de los actuadores y leds.

require_once('connection.php');

$dispositivo=$_GET['dispositivo'];
$lamp1=$_GET['lamparauno'];
$lamp2=$_GET['lamparados'];


$conn=new conexion();


//Hacemos la consulta de SQL para actualizar tabla ESTADO
//$queryUPDATE="UPDATE `estado` SET `lampara1` = '$lamp1', `lampara1` = '$lamp1' WHERE `estado`.`dispositivo` = '$dispositivo';";
//$queryUPDATE="UPDATE `estado` SET `lamparauno` = '$lamp1', `lamparados` = '$lamp2' WHERE `estado`.`dispositivo` = '$dispositivo';";


//UPDATE `estado` SET `lampara1` = '1', `lampara2` = '0' WHERE `estado`.`dispositivo` = 'node1';
//primer parametro la conexion, el segundo la consulta
//$update= mysqli_query($conn->conectardb(),$queryUPDATE);

//Hacemos la consulta de SQL para actualizar tabla HISTORICO
$queryINSERT="INSERT INTO `historico` (`dispositivo`, `lamparauno`, `lamparados`, `fechaRegistro`) VALUES ('$dispositivo', '$lamp1', '$lamp2', NOW());";

//INSERT INTO `historico` (`dispositivo`, `lampara1`, `lampara2`, `fechaRegistro`) VALUES ('node1', '1', '0', '2021-11-02 15:23:19.000000');
//primer parametro la conexion, el segundo la consulta
$insert= mysqli_query($conn->conectardb(),$queryINSERT);



//Hacemos la consulta de SQL para filtrar el estado de la tarjeta
$querySELECT="SELECT`lamparauno`,`lamparados` FROM `estado` WHERE `dispositivo`= 'node1';";

//INSERT INTO `historico` (`dispositivo`, `lampara1`, `lampara2`, `fechaRegistro`) VALUES ('node1', '1', '0', '2021-11-02 15:23:19.000000');
//primer parametro la conexion, el segundo la consulta
$result= mysqli_query($conn->conectardb(),$querySELECT);

//Creo una variable $row (fila) en la cual vamos a guardar la fila que nos da como resultado la consulta SELECT
$row=mysqli_fetch_row($result);
//Esta fila $row va tener las dos posiciones, en la posicion 0 va a estar el valor de lampara1 y en la posicion 1 va a estar el valor de lampara2



//{LAMP1:1,LAMP2:0} Envío esa respuesta ala placa de desarrollo para procesarla
echo "{LAMP1:".$row[0].",LAMP2:".$row[1]."}";

?>