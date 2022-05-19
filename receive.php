<?php

header('Location: /iluminacion-jardin-local/IOTproject_smart_garden_lamps/index.php');

require_once('connection.php');


$conn=new conexion();

diference($conn);

function diference($conn){
    $dispositivo='node1';
    if(isset($_GET['button_l1_on'])){
        $row=readSQL($conn);
        $lamp1='1';
        $lamp2=$row[1];
        $dispositivo='node1';
        updateLamp1($conn, $lamp1, $dispositivo);
        insertHistorical($conn, $lamp1, $lamp2, $dispositivo);
    }
    if(isset($_GET['button_l1_off'])){
        $row=readSQL($conn);
        $lamp1='0';
        $lamp2=$row[1];
        $dispositivo='node1';
        updateLamp1($conn, $lamp1, $dispositivo);
        insertHistorical($conn, $lamp1, $lamp2, $dispositivo);
    }

    if(isset($_GET['button_l2_on'])){
        $row=readSQL($conn);
        $lamp1=$row[0];
        $lamp2='1';
        $dispositivo='node1';
        updateLamp2($conn, $lamp2, $dispositivo);
        insertHistorical($conn, $lamp1, $lamp2, $dispositivo);
    }
    if(isset($_GET['button_l2_off'])){
        $row=readSQL($conn);
        $lamp1=$row[0];
        $lamp2='0';
        $dispositivo='node1';
        updateLamp2($conn, $lamp2, $dispositivo);
        insertHistorical($conn, $lamp1, $lamp2, $dispositivo);
    }
}

function updateLamp1($conn, $lamp1, $dispositivo){
    $queryUPDATE="UPDATE `estado` SET `lamparauno` = '$lamp1' WHERE `estado`.`dispositivo` = '$dispositivo';";
    $update= mysqli_query($conn->conectardb(),$queryUPDATE);
}

function updateLamp2($conn, $lamp2, $dispositivo){
    $queryUPDATE="UPDATE `estado` SET `lamparados` = '$lamp2' WHERE `estado`.`dispositivo` = '$dispositivo';";
    $update= mysqli_query($conn->conectardb(),$queryUPDATE);
}

//actualizar tabla HISTORICO
function insertHistorical($conn, $lamp1, $lamp2, $dispositivo){
    $queryINSERT="INSERT INTO `historico` (`dispositivo`, `lamparauno`, `lamparados`, `fechaRegistro`) VALUES ('$dispositivo', '$lamp1', '$lamp2', NOW());";
    $insert= mysqli_query($conn->conectardb(),$queryINSERT);
}

function readSQL($conn){
    $querySELECT="SELECT`lamparauno`,`lamparados` FROM `estado` WHERE `dispositivo`= 'node1';";
    $result= mysqli_query($conn->conectardb(),$querySELECT);
    $row=mysqli_fetch_row($result);
    return $row;
}
?>