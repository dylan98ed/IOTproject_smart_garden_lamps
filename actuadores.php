<?php

//Con esta instruccion hago que vuelva a cargar la pagina actuadores.html una vez que hace el envio de los datos
//https://electronicaaplicadaiot-dylanquiroga.000webhostapp.com/iluminacion-jardin/actuadores.html'
//header('Location: https://electronicaaplicadaiot-dylanquiroga.000webhostapp.com/iluminacion-jardin/actuadores.html');
//


header('Location: https://electronicaaplicadaiot-dylanquiroga.000webhostapp.com/iluminacion-jardin/actuadores.php');
require_once('conexion.php');


$dispositivo=$_GET['dispositivo'];
$lamp1=$_GET['lamparauno'];
$lamp2=$_GET['lamparados'];
//$lamp1=$_GET['lampara1'];


$conn=new conexion();


//Hacemos la consulta de SQL para actualizar tabla ESTADO
//$queryUPDATE="UPDATE `estado` SET `lampara1` = '$lamp1',`lampara2` = '$lamp2' WHERE `estado`.`dispositivo` = '$dispositivo';";
$queryUPDATE="UPDATE `estado` SET `lamparauno` = '$lamp1',`lamparados` = '$lamp2' WHERE `estado`.`dispositivo` = '$dispositivo';";

//UPDATE `estado` SET `lampara1` = '1', `lampara2` = '0' WHERE `estado`.`dispositivo` = 'node1';
//primer parametro la conexion, el segundo la consulta
$update= mysqli_query($conn->conectardb(),$queryUPDATE);


//Hacemos la consulta de SQL para filtrar el estado de la tarjeta
$querySELECT="SELECT`lamparauno`, `lamparados` FROM `estado` WHERE `dispositivo`= 'node1';";

//SELECT`lampara1`, `lampara2` FROM `estado` WHERE `dispositivo`= 'node1';
//primer parametro la conexion, el segundo la consulta
$result= mysqli_query($conn->conectardb(),$querySELECT);

//Creo una variable $row (fila) en la cual vamos a guardar la fila que nos da como resultado la consulta SELECT
$row=mysqli_fetch_row($result);
//Esta fila $row va tener las dos posiciones, en la posicion 0 va a estar el valor de lampara1 y en la posicion 1 va a estar el valor de lampara2



//{LAMP1:1,LAMP2:0} Envío esa respuesta ala placa de desarrollo para procesarla
//echo "{LAMP1:".$row[0].",LAMP2:".$row[1]."}";
echo "{LAMP1:".$row[0].",LAMP2:".$row[1]."}";


?>